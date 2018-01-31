<?php

class ControllerShippingTcat extends Controller {
	private $error = array();

	public function index() { }

	// post to ecpay server
	public function create_shipping_order() {
		$data = $_POST;

		// 1. save to `tcat_logistics_info`
		$data['MerchantTradeDate'] = date('Y/m/d H:i:s');
		$this->load->model('shipping/tcat');
		$order_id = (int)$this->request->get['order_id'];
		$this->model_shipping_tcat->addInfo($order_id, $data);

		$this->load->model('checkout/order'); // use for getOrder and addOrderHistory
		$order_info = $this->model_checkout_order->getOrder($order_id);

		// 2. send to ecpay server
		$this->load->model('setting/setting');
		$settings = $this->model_setting_setting->getSetting('tcat', $order_info['store_id']);

		// open log file
		$file_name = 'tcat-' . date('Ymd', time()) . '.txt';
		$file = DIR_LOGS . $file_name;
		$fp = fopen($file, 'a');
		
		try {
			include_once('ECPay.Logistics.Integration.php');
		  	$AL = new ECPayLogistics();
		  	$AL->HashKey = (isset($settings['tcat_hash_key'])) ? $settings['tcat_hash_key'] : '5294y06JbISpM5x9';
		  	$AL->HashIV = (isset($settings['tcat_hash_iv'])) ? $settings['tcat_hash_iv'] : 'v77hoKGq4kWxNNIS';
		  	$AL->Send = array(
				'MerchantID' => $data['MerchantID'],
				//'MerchantTradeNo' => '',
				'MerchantTradeDate' => $data['MerchantTradeDate'],
				'LogisticsType' => LogisticsType::HOME,
				'LogisticsSubType' => LogisticsSubType::TCAT,
				'GoodsAmount' => (int)$data['GoodsAmount'],
				'IsCollection' => IsCollection::NO,
				'GoodsName' => $data['GoodsName'],
				'SenderName' => $data['SenderName'],
				//'SenderPhone' => '',
				'SenderCellPhone' => $data['SenderCellPhone'],
				'ReceiverName' => $data['ReceiverName'],
				'ReceiverPhone' => $data['ReceiverPhone'],
				//'ReceiverCellPhone' => '',
				//'ReceiverEmail' => '',
				//'TradeDesc' => '',
				'ServerReplyURL' => $this->url->link('shipping/tcat/feedback', '', 'SSL')
				//'LogisticsC2CReplyURL' => '',
				//'Remark' => '',
				//'PlatformID' => ''
			);
		  	$AL->SendExtend = array(
			  	'SenderZipCode' => $data['SenderZipCode'],
			  	'SenderAddress' => $data['SenderAddress'],
			  	'ReceiverZipCode' => $data['ReceiverZipCode'],
				'ReceiverAddress' => $data['ReceiverAddress'],
				'Temperature' => $data['Temperature'],
				'Distance' => $data['Distance'],
				'Specification' => $data['Specification'],
				'ScheduledDeliveryTime' => $data['ScheduledDeliveryTime'],
			);
		  	$Result = $AL->BGCreateShippingOrder();	// curl post
			fwrite($fp, print_r($Result, true)); 	// write to log
			fclose($fp);
		} catch(Exception $e) {
			fwrite($fp, print_r($e->getMessage(), true));
			fclose($fp);

			$Result = array("ResCode" => 0);
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($Result));
			return;
		}

		if ($Result['ResCode'] == 1) { // 成功
			// 3. save to result table
			$this->model_shipping_tcat->addResult($order_id, $Result);

			// 4. update order history with new status_id
			if ($order_info['order_status_id'] != $settings['tcat_order_finish_status_id']) {
				$comment = '';
				$comment .= '黑貓宅配托運單號: <a href="http://www.t-cat.com.tw/Inquire/Trace.aspx?no=' . $Result['BookingNote'] . '" target="_blank">'. $Result['BookingNote'] . '</a><br/>    ';
				$comment .= '物流狀態: ' . $Result['RtnMsg'] . '<br />    ';
				$comment .= '狀態代碼: <a href="https://www.ecpay.com.tw/Content/files/logistics_status.xlsx" target="_blank">'. $Result['RtnCode'] . '</a><br/>    ';
				$comment .= '交易編號: ' . $Result['MerchantTradeNo'] . '<br />    ';
				$comment .= '更新時間: ' . $Result['UpdateStatusDate'] . '<br />    ';

				$this->model_checkout_order->addOrderHistory($order_id, $settings['tcat_order_finish_status_id'], $comment, true);
			}

			// 5. fill trade number to info table
			$tradeno = array("MerchantTradeNo" => $Result['MerchantTradeNo']);
			$this->model_shipping_tcat->editInfo($order_id, $tradeno);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($Result));
	}

	// 回傳檢查
	public function feedback() {
		$Result = $_POST;

		$this->load->model('setting/setting');
		$settings = $this->model_setting_setting->getSetting('tcat');

		$file_name = 'tcat-' . date('Ymd', time()) . '.txt';
		$file = DIR_LOGS . $file_name;
		$fp = fopen($file, 'a');

		try {
			include_once("ECPay.Logistics.Integration.php");
			$AL = new ECPayLogistics();
			$AL->HashKey = (isset($settings['tcat_hash_key'])) ? $settings['tcat_hash_key'] : '5294y06JbISpM5x9';
			$AL->HashIV = (isset($settings['tcat_hash_iv'])) ? $settings['tcat_hash_iv'] : 'v77hoKGq4kWxNNIS';
			//$AL->CheckOutFeedback($Result); // check md5

			// update to result table by trade number
			$this->load->model('shipping/tcat');
			$this->model_shipping_tcat->editResult($Result, true);

			// update to order
			$comment = '';
			$comment .= '黑貓宅配托運單號: <a href="http://www.t-cat.com.tw/Inquire/Trace.aspx?no=' . $Result['BookingNote'] . '" target="_blank">'. $Result['BookingNote'] . '</a><br/>    ';
			$comment .= '物流狀態: ' . $Result['RtnMsg'] . '<br />    ';
			$comment .= '狀態代碼: <a href="/image/tcat/code.png" target="_blank">'. $Result['RtnCode'] . '</a><br/>    ';
			$comment .= '交易編號: ' . $Result['MerchantTradeNo'] . '<br />    ';
			$comment .= '更新時間: ' . $Result['UpdateStatusDate'] . '<br />    ';

			$this->load->model('checkout/order');
			$data = $this->model_shipping_tcat->getResultbyTradeNo($Result['MerchantTradeNo']); // get order id
			$order_info = $this->model_checkout_order->getOrder($data['order_id']);
			$this->model_checkout_order->addOrderHistory($data['order_id'], $order_info['order_status_id'], $comment, true);
			fwrite($fp, print_r($comment, true));
			echo '1|OK'; // response to server
		} catch (Exception $e) {
			fwrite($fp, 'MD5 解碼失敗');
			fwrite($fp, print_r($e->getMessage(), true));
			echo '0|' . $e->getMessage(); // response to server
		}
		fwrite($fp, "\n");
		fclose($fp);
	}

}
