<?php
class ControllerShippingTcat extends Controller {

	private $error = array(); // This is used to set the errors, if any.

	// create tcat_order form
	public function create_order_form() {
		$data['order_id'] = $this->request->get['order_id'];

		$this->load->language('shipping/tcat_order'); // Loading the language file
		$this->document->setTitle($this->language->get('heading_title')); // Set the title of the page to the heading title in the Language file

		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_create'] = $this->language->get('text_create');

		$data['entry_test_mode'] = $this->language->get('entry_test_mode');
		$data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
		$data['entry_hash_key'] = $this->language->get('entry_hash_key');
		$data['entry_hash_iv'] = $this->language->get('entry_hash_iv');
		$data['entry_sender_name'] = $this->language->get('entry_sender_name');
		$data['entry_sender_phone'] = $this->language->get('entry_sender_phone');
		$data['entry_sender_address'] = $this->language->get('entry_sender_address');
		$data['entry_sender_zip'] = $this->language->get('entry_sender_zip');
		$data['entry_item_desc'] = $this->language->get('entry_item_desc');
		$data['entry_total'] = $this->language->get('entry_total');
		//
		$data['entry_receiver_name'] = $this->language->get('entry_receiver_name');
		$data['entry_receiver_phone'] = $this->language->get('entry_receiver_phone');
		$data['entry_receiver_address'] = $this->language->get('entry_receiver_address');
		$data['entry_receiver_zip'] = $this->language->get('entry_receiver_zip');
		$data['entry_temperature'] = $this->language->get('entry_temperature');
		$data['entry_temperature_room'] = $this->language->get('entry_temperature_room');
		$data['entry_temperature_refrigeration'] = $this->language->get('entry_temperature_refrigeration');
		$data['entry_temperature_freeze'] = $this->language->get('entry_temperature_freeze');
		$data['entry_distance'] = $this->language->get('entry_distance');
		$data['entry_distance_same'] = $this->language->get('entry_distance_same');
		$data['entry_distance_other'] = $this->language->get('entry_distance_other');
		$data['entry_distance_island'] = $this->language->get('entry_distance_island');
		$data['entry_specification'] = $this->language->get('entry_specification');
		$data['entry_specification_cm_60'] = $this->language->get('entry_specification_cm_60');
		$data['entry_specification_cm_90'] = $this->language->get('entry_specification_cm_90');
		$data['entry_specification_cm_120'] = $this->language->get('entry_specification_cm_120');
		$data['entry_delivery_time'] = $this->language->get('entry_delivery_time');
		$data['entry_delivery_time_9_12'] = $this->language->get('entry_delivery_time_9_12');
		$data['entry_delivery_time_12_17'] = $this->language->get('entry_delivery_time_12_17');
		$data['entry_delivery_time_unlimited'] = $this->language->get('entry_delivery_time_unlimited');

		$data['text_success'] = $this->language->get('text_success');
		$data['text_fail'] = $this->language->get('text_fail');
		$data['text_booking_note'] = $this->language->get('text_booking_note');
		$data['text_rtn_msg'] = $this->language->get('text_rtn_msg');

		$this->load->model('sale/order');
		$order_info = $this->model_sale_order->getOrder($data['order_id']);

		$this->load->model('setting/setting');
		$settings = $this->model_setting_setting->getSetting('tcat', $order_info['store_id']);

		$data['test_mode'] = (isset($settings['tcat_test_mode'])) ? $settings['tcat_test_mode'] : '';
		$data['merchant_id'] = (isset($settings['tcat_merchant_id'])) ? $settings['tcat_merchant_id'] : '';
		$data['hash_key'] = (isset($settings['tcat_hash_key'])) ? $settings['tcat_hash_key'] : '';
		$data['hash_iv'] = (isset($settings['tcat_hash_iv'])) ? $settings['tcat_hash_iv'] : '';
		$data['sender_name'] = (isset($settings['tcat_sender_name'])) ? $settings['tcat_sender_name'] : '';
		$data['sender_phone'] = (isset($settings['tcat_sender_phone'])) ? $settings['tcat_sender_phone'] : '';
		$data['sender_address'] = (isset($settings['tcat_sender_address'])) ? $settings['tcat_sender_address'] : '';
		$data['sender_zip'] = (isset($settings['tcat_sender_zip'])) ? $settings['tcat_sender_zip'] : '';

		$this->load->model('shipping/tcat');
		$ship_info = $this->model_shipping_tcat->getInfo($data['order_id']);

		$products = $this->model_sale_order->getOrderProducts($data['order_id']);
		$data['item_desc'] = $this->model_shipping_tcat->getItemDescByProduct($products, $settings);

		$data['total'] = (isset($order_info['total'])) ? $order_info['total'] : '';
		$data['receiver_name'] = (isset($order_info['shipping_firstname'])) ? $order_info['shipping_firstname'] : '';
		$data['receiver_phone'] = (isset($order_info['telephone'])) ? $order_info['telephone'] : '';
		$data['receiver_address'] = (isset($order_info['shipping_address_1'])) ? $order_info['shipping_address_1'] : '';
		$data['receiver_zip'] = (isset($ship_info['Postcode'])) ? $ship_info['Postcode'] : '';
		$data['temperature'] = (isset($ship_info['Temperature'])) ? $ship_info['Temperature'] : '0003';
		$data['distance'] = (isset($ship_info['Distance'])) ? $ship_info['Distance'] : '00';
		$data['specification'] = (isset($ship_info['Specification'])) ? $ship_info['Specification'] : '0001';
		$data['delivery_time'] = (isset($ship_info['ScheduledDeliveryTime'])) ? $ship_info['ScheduledDeliveryTime'] : 4;
		$data['create_order_url'] = HTTPS_CATALOG . 'index.php?route=shipping/tcat/create_shipping_order&token=' . $this->session->data['token'] . '&order_id=' . $data['order_id'];

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		// This Block returns the warning if any
		$data['error_warning'] = (isset($this->error['warning'])) ? $this->error['warning'] : '';

		// Making of Breadcrumbs to be displayed on site
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_shipping'),
			'href' => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('shipping/tcat', 'token=' . $this->session->data['token'], true)
		);

		$data['token'] = $this->session->data['token'];
		$data['action'] = $this->url->link('shipping/tcat', 'token=' . $this->session->data['token'], true);
		$data['cancel'] = $this->url->link('sale/order/info', 'token=' . $this->session->data['token'] . '&order_id=' . $data['order_id'], true);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('shipping/tcat_order', $data));
	}

	public function index() {

		$this->load->language('shipping/tcat'); // Loading the language file
		$this->document->setTitle($this->language->get('heading_title_clear')); // Set the title of the page to the heading title in the Language file
		$this->load->model('setting/setting'); // Load the Setting Model

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) { // Start If: Validates and check if data is coming by save (POST) method
			$this->model_setting_setting->editSetting('tcat', $this->request->post); // Parse all the coming data to Setting Model to save it in database.
			$this->session->data['success'] = $this->language->get('text_success'); // To display the success text on data save
			$this->response->redirect($this->url->link('extension/shipping', 'token=' . $this->session->data['token'], true)); // Redirect to the shipping Listing
		}

		// Assign the language data for parsing it to view
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_rate'] = $this->language->get('entry_rate');
		$data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
		$data['entry_hash_key'] = $this->language->get('entry_hash_key');
		$data['entry_hash_iv'] = $this->language->get('entry_hash_iv');
		$data['entry_item_desc'] = $this->language->get('entry_item_desc');
		$data['entry_item_desc_content'] = $this->language->get('entry_item_desc_content');
		$data['entry_sender_name'] = $this->language->get('entry_sender_name');
		$data['entry_sender_phone'] = $this->language->get('entry_sender_phone');
		$data['entry_sender_zip'] = $this->language->get('entry_sender_zip');
		$data['entry_sender_address'] = $this->language->get('entry_sender_address');

		$data['help_rate'] = $this->language->get('help_rate');
		$data['help_merchant_id'] = $this->language->get('help_merchant_id');
		$data['help_hash_key'] = $this->language->get('help_hash_key');
		$data['help_hash_iv'] = $this->language->get('help_hash_iv');
		$data['help_item_desc'] = $this->language->get('help_item_desc');

		$data['help_sender_name'] = $this->language->get('help_sender_name');
		$data['help_sender_phone'] = $this->language->get('help_sender_phone');
		$data['help_sender_zip'] = $this->language->get('help_sender_zip');
		$data['help_sender_address'] = $this->language->get('help_sender_address');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');

		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_order_finish_status'] = $this->language->get('entry_order_finish_status');
		$data['entry_order_fail_status'] = $this->language->get('entry_order_fail_status');

		// This Block returns the warning if any
		$data['error_warning'] = (isset($this->error['warning'])) ? $this->error['warning'] : '';
		$data['error_warning2'] = (isset($this->error['warning2'])) ? $this->error['warning2'] : '';
		$data['error_warning3'] = (isset($this->error['warning3'])) ? $this->error['warning3'] : '';
		$data['error_warning4'] = (isset($this->error['warning4'])) ? $this->error['warning4'] : '';
		$data['error_warning5'] = (isset($this->error['warning5'])) ? $this->error['warning5'] : '';
		$data['error_warning6'] = (isset($this->error['warning6'])) ? $this->error['warning6'] : '';
		$data['error_warning7'] = (isset($this->error['warning7'])) ? $this->error['warning7'] : '';
		$data['error_warning9'] = (isset($this->error['warning9'])) ? $this->error['warning9'] : '';
		$data['error_warning10'] = (isset($this->error['warning10'])) ? $this->error['warning10'] : '';

		// Making of Breadcrumbs to be displayed on site
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_shipping'),
			'href' => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('shipping/tcat', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('shipping/tcat', 'token=' . $this->session->data['token'], true);
		$data['cancel'] = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], true);

		$this->load->model('localisation/geo_zone');

		$geo_zones = $this->model_localisation_geo_zone->getGeoZones();

		foreach ($geo_zones as $geo_zone) {
			if (isset($this->request->post['tcat_' . $geo_zone['geo_zone_id'] . '_rate'])) {
				$data['tcat_' . $geo_zone['geo_zone_id'] . '_rate'] = $this->request->post['tcat_' . $geo_zone['geo_zone_id'] . '_rate'];
			} else {
				$data['tcat_' . $geo_zone['geo_zone_id'] . '_rate'] = $this->config->get('tcat_' . $geo_zone['geo_zone_id'] . '_rate');
			}

			if (isset($this->request->post['tcat_' . $geo_zone['geo_zone_id'] . '_status'])) {
				$data['tcat_' . $geo_zone['geo_zone_id'] . '_status'] = $this->request->post['tcat_' . $geo_zone['geo_zone_id'] . '_status'];
			} else {
				$data['tcat_' . $geo_zone['geo_zone_id'] . '_status'] = $this->config->get('tcat_' . $geo_zone['geo_zone_id'] . '_status');
			}
		}

		$data['geo_zones'] = $geo_zones;

		if (isset($this->request->post['tcat_tax_class_id'])) {
			$data['tcat_tax_class_id'] = $this->request->post['tcat_tax_class_id'];
		} else {
			$data['tcat_tax_class_id'] = $this->config->get('tcat_tax_class_id');
		}

		$this->load->model('localisation/tax_class');

		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post['tcat_status'])) {
			$data['tcat_status'] = $this->request->post['tcat_status'];
		} else {
			$data['tcat_status'] = $this->config->get('tcat_status');
		}

		if (isset($this->request->post['tcat_sort_order'])) {
			$data['tcat_sort_order'] = $this->request->post['tcat_sort_order'];
		} else {
			$data['tcat_sort_order'] = $this->config->get('tcat_sort_order');
		}

		if (isset($this->request->post['tcat_test_mode'])) {
			$data['tcat_test_mode'] = $this->request->post['tcat_test_mode'];
		} else {
			$data['tcat_test_mode'] = $this->config->get('tcat_test_mode');
		}

		if (isset($this->request->post['tcat_merchant_id'])) {
			$data['merchant_id'] = $this->request->post['tcat_merchant_id'];
		} else {
			$data['merchant_id'] = $this->config->get('tcat_merchant_id');
		}

		if (isset($this->request->post['tcat_sender_name'])) {
			$data['sender_name'] = $this->request->post['tcat_sender_name'];
		} else {
			$data['sender_name'] = $this->config->get('tcat_sender_name');
		}

		if (isset($this->request->post['tcat_sender_phone'])) {
			$data['sender_phone'] = $this->request->post['tcat_sender_phone'];
		} else {
			$data['sender_phone'] = $this->config->get('tcat_sender_phone');
		}

		if (isset($this->request->post['tcat_sender_zip'])) {
			$data['sender_zip'] = $this->request->post['tcat_sender_zip'];
		} else {
			$data['sender_zip'] = $this->config->get('tcat_sender_zip');
		}

		if (isset($this->request->post['tcat_sender_address'])) {
			$data['sender_address'] = $this->request->post['tcat_sender_address'];
		} else {
			$data['sender_address'] = $this->config->get('tcat_sender_address');
		}

		if (isset($this->request->post['tcat_order_status_id'])) {
			$data['order_status_id'] = $this->request->post['tcat_order_status_id'];
		} else {
			$data['order_status_id'] =  $this->config->get('tcat_order_status_id');
		}

		if (isset($this->request->post['tcat_order_finish_status_id'])) {
			$data['order_finish_status_id'] = $this->request->post['tcat_order_finish_status_id'];
		} else {
			$data['order_finish_status_id'] =  $this->config->get('tcat_order_finish_status_id');
		}

		if (isset($this->request->post['tcat_order_fail_status_id'])) {
			$data['order_fail_status_id'] = $this->request->post['tcat_order_fail_status_id'];
		} else {
			$data['order_fail_status_id'] =  $this->config->get('tcat_order_fail_status_id');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('shipping/tcat', $data));
	}

	// Function that validates the data when Save Button is pressed
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'shipping/tcat')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['tcat_merchant_id']) {
			$this->error['warning2'] = $this->language->get('error_merchant_id');
		}

		if (!$this->request->post['tcat_hash_key']) {
			$this->error['warning3'] = $this->language->get('error_hash_key');
		}

		if (!$this->request->post['tcat_hash_iv']) {
			$this->error['warning4'] = $this->language->get('error_hash_iv');
		}

		if (!$this->request->post['tcat_item_desc']) {
			$this->error['warning5'] = $this->language->get('error_item_desc');
		} else if (mb_strlen($this->request->post['tcat_item_desc']) > 50) {
			$this->error['warning5'] = $this->language->get('error_item_desc_length');
		} else if (!preg_match("/^[\x80-\xff_a-zA-Z0-9,_ ]+$/", $this->request->post['tcat_item_desc'])) {
			$this->error['warning5'] = $this->language->get('error_item_desc_content');
		}

		if (!$this->request->post['tcat_sender_name']) {
			$this->error['warning6'] = $this->language->get('error_sender_name');
		} else if (mb_strwidth($this->request->post['tcat_sender_name']) > 10) { // 字元限制為 10 個字元(最多 5 個中文字、10 個英文字)
			$this->error['warning6'] = $this->language->get('error_sender_name');
		} else if (strpos($this->request->post['tcat_sender_name'], ' ', 0) !== false) { // 不可有空白
			$this->error['warning6'] = $this->language->get('error_sender_name');
		}

		if (!$this->request->post['tcat_sender_phone']) {
			$this->error['warning7'] = $this->language->get('error_sender_phone');
		} else if (mb_strlen($this->request->post['tcat_sender_phone']) != 10) {
			$this->error['warning7'] = $this->language->get('error_sender_phone');
		} else if (substr($this->request->post['tcat_sender_phone'], 0, 2) != '09') {
			$this->error['warning7'] = $this->language->get('error_sender_phone');
		}

		if (!$this->request->post['tcat_sender_zip']) {
			$this->error['warning9'] = $this->language->get('error_sender_zip');
		} else if (strlen($this->request->post['tcat_sender_zip']) < 3) {
			$this->error['warning9'] = $this->language->get('error_sender_zip');
		} else if (strlen($this->request->post['tcat_sender_zip']) > 5) {
			$this->error['warning9'] = $this->language->get('error_sender_zip');
		}

		if (!$this->request->post['tcat_sender_address']) {
			$this->error['warning10'] = $this->language->get('error_sender_address');
		} else if (mb_strlen($this->request->post['tcat_sender_address']) < 6) { // 字元限制需大於 6 個字元，且不可超過 60 個字元
			$this->error['warning10'] = $this->language->get('error_sender_address');
		} else if (mb_strlen($this->request->post['tcat_sender_address']) > 60) { // 字元限制需大於 6 個字元，且不可超過 60 個字元
			$this->error['warning10'] = $this->language->get('error_sender_address');
		}

		return !$this->error;
	}

	public function install() 
	{
		$this->load->model('shipping/tcat');
		$this->model_shipping_tcat->install();
	}
	
	public function uninstall() 
	{
		$this->load->model('shipping/tcat');
		$this->model_shipping_tcat->uninstall();
	}

}
