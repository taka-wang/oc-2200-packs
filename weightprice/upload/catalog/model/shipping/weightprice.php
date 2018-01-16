<?php
class ModelShippingWeightprice extends Model {
	public function getQuote($address) {
		$this->load->language('shipping/weightprice');

		$quote_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "geo_zone ORDER BY name");

		foreach ($query->rows as $result) {
			if ($this->config->get('weightprice_' . $result['geo_zone_id'] . '_status')) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$result['geo_zone_id'] . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

				if ($query->num_rows) {
					$status = true;
				} else {
					$status = false;
				}
			} else {
				$status = false;
			}

			if ($status) {
				$cost = '';
				$weight = $this->cart->getWeight();
				$totalprice = $this->cart->getTotal();

				$ratelines = explode("\r\n", $this->config->get('weightprice_' . $result['geo_zone_id'] . '_rate'));
				foreach ($ratelines as $rateline) {

					$rateMaxPrice = explode('*',$rateline);
					$rateWeights = $rateMaxPrice[1];
					$rateMaxPrice = $rateMaxPrice[0];
					if($rateMaxPrice >= $totalprice) {
						
						$rates = explode(',', $rateWeights);
						foreach($rates as $rate) {
							
							$data = explode(':', $rate);
							if ($data[0] >= $weight) {
								if (isset($data[1])) {
									$cost = $data[1];
								}

								break;
							}
						}
						
						break;
					}
				}

				if ((string)$cost != '') {
					$quote_data['weightprice_' . $result['geo_zone_id']] = array(
						'code'         => 'weightprice.weightprice_' . $result['geo_zone_id'],
						//'title'        => $result['name'] . '  (' . $this->language->get('text_weight') . ' ' . $this->weight->format($weight, $this->config->get('config_weightprice_class_id')) . ')',
						'title'        => $result['name'],
						'cost'         => $cost,
						'tax_class_id' => $this->config->get('weightprice_tax_class_id'),
						'text'         => $this->currency->format($this->tax->calculate($cost, $this->config->get('weightprice_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency'])
					);
				}
			}
		}

		$method_data = array();

		if ($quote_data) {
			$method_data = array(
				'code'       => 'weightprice',
				'title'      => $this->language->get('text_title'),
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('weightprice_sort_order'),
				'error'      => false
			);
		}

		return $method_data;
	}
}