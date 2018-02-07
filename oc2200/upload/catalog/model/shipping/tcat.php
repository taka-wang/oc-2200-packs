<?php
class ModelShippingTcat extends Model {

    public function getQuote($address) {
        $this->load->language('shipping/tcat');

        $quote_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "geo_zone ORDER BY name");

        foreach ($query->rows as $result) {
            if ($this->config->get('tcat_' . $result['geo_zone_id'] . '_status')) {
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

                $ratelines = explode("\r\n", $this->config->get('tcat_' . $result['geo_zone_id'] . '_rate'));
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
                    $quote_data['tcat_' . $result['geo_zone_id']] = array(
                        'code'         => 'tcat.tcat_' . $result['geo_zone_id'],
                        //'title'        => $result['name'] . '  (' . $this->language->get('text_weight') . ' ' . $this->weight->format($weight, $this->config->get('config_tcat_class_id')) . ')',
                        'title'        => $this->language->get('text_title') . ' (' . $result['name'] . ')',
                        'cost'         => $cost,
                        'tax_class_id' => $this->config->get('tcat_tax_class_id'),
                        'text'         => $this->currency->format($this->tax->calculate($cost, $this->config->get('tcat_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency'])
                    );
                }
            }
        }

        $method_data = array();

        if ($quote_data) {
            $method_data = array(
                'code'       => 'tcat',
                'title'      => $this->language->get('text_title'),
                'quote'      => $quote_data,
                'sort_order' => $this->config->get('tcat_sort_order'),
                'error'      => false
            );
        }

        return $method_data;
    }

    public function addInfo($order_id, $data) {

        $this->db->query("DELETE FROM `" . DB_PREFIX . "tcat_logistics_info` WHERE order_id = '" . (int)$order_id . "'");

        $sql  = "INSERT INTO `" . DB_PREFIX . "tcat_logistics_info` SET order_id = '" . (int)$order_id;

        if (isset($data['Distance'])) {
            $sql .= "', Distance = '" . $this->db->escape($data['Distance']);
        }
        if (isset($data['MerchantTradeDate'])) {
            $sql .= "', MerchantTradeDate = '" . $this->db->escape($data['MerchantTradeDate']);
        }
        if (isset($data['MerchantTradeNo'])) {
            $sql .= "', MerchantTradeNo = '" . $this->db->escape($data['MerchantTradeNo']);
        }
        if (isset($data['ReceiverZipCode'])) {
            $sql .= "', Postcode = '" . $this->db->escape($data['ReceiverZipCode']);
        }
        if (isset($data['Specification'])) {
            $sql .= "', Specification = '" . $this->db->escape($data['Specification']);
        }
        if (isset($data['ScheduledDeliveryTime'])) {
            $sql .= "', ScheduledDeliveryTime = '" . (int)$data['ScheduledDeliveryTime'];
        }
        if (isset($data['Temperature'])) {
            $sql .= "', Temperature = '" . $this->db->escape($data['Temperature']);
        }
        $sql .= "'";

        $this->db->query($sql);
    }

    public function editInfo($order_id, $data, $fallthrough = false) {

        if (isset($data['Distance'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_info` SET Distance = '" . $this->db->escape($data['Distance']) . "' WHERE order_id = "  . (int)$order_id);
            if (!$fallthrough) return;
        }
        if (isset($data['MerchantTradeDate'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_info` SET MerchantTradeDate = '" . $this->db->escape($data['MerchantTradeDate']) . "' WHERE order_id = "  . (int)$order_id);
            if (!$fallthrough) return;
        }
        if (isset($data['MerchantTradeNo'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_info` SET MerchantTradeNo = '" . $this->db->escape($data['MerchantTradeNo']) . "' WHERE order_id = "  . (int)$order_id);
            if (!$fallthrough) return;
        }
        if (isset($data['ReceiverZipCode'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_info` SET Postcode = '" . $this->db->escape($data['ReceiverZipCode']) . "' WHERE order_id = "  . (int)$order_id);
            if (!$fallthrough) return;
        }
        if (isset($data['Specification'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_info` SET Specification = '" . $this->db->escape($data['Specification']) . "' WHERE order_id = "  . (int)$order_id);
            if (!$fallthrough) return;
        }
        if (isset($data['ScheduledDeliveryTime'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_info` SET ScheduledDeliveryTime = " . (int)$data['ScheduledDeliveryTime'] . " WHERE order_id = "  . (int)$order_id);
            if (!$fallthrough) return;
        }
        if (isset($data['Temperature'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_info` SET Temperature = '" . $this->db->escape($data['Temperature']) . "' WHERE order_id = "  . (int)$order_id);
            if (!$fallthrough) return;
        }
    }

    public function addResult($order_id, $data) {
        $this->db->query("DELETE FROM `" . DB_PREFIX . "tcat_logistics_result` WHERE order_id = '" . (int)$order_id . "'");

        $sql  = "INSERT INTO `" . DB_PREFIX . "tcat_logistics_result` SET MerchantTradeNo = '" . $this->db->escape($data['MerchantTradeNo']);
        $sql .= "', order_id = '" . (int)$order_id;

        if (isset($data['AllPayLogisticsID'])) {
            $sql .= "', AllPayLogisticsID = '" . $this->db->escape($data['AllPayLogisticsID']);
        }
        if (isset($data['BookingNote'])) {
            $sql .= "', BookingNote = '" . $this->db->escape($data['BookingNote']);
        }
        if (isset($data['RtnMsg'])) {
            $sql .= "', RtnMsg = '" . $this->db->escape($data['RtnMsg']);
        }
        if (isset($data['UpdateStatusDate'])) {
            $sql .= "', UpdateStatusDate = '" . $this->db->escape($data['UpdateStatusDate']);
        }
        if (isset($data['RtnCode'])) {
            $sql .= "', RtnCode = '" . (int)$data['AllPayLogisticsID'];
        }

        $sql .= "'";

        $this->db->query($sql);
    }

    public function editResult($data, $fallthrough = false) {
        // notice: use MerchantTradeNo in where clause
        if (isset($data['UpdateStatusDate'])) {
            $this->db->query("UPDATE `" . DB_PREFIX . "tcat_logistics_result` SET UpdateStatusDate = '" . $this->db->escape($data['UpdateStatusDate']) . "' WHERE MerchantTradeNo = '"  . $this->db->escape($data['MerchantTradeNo']). "'");
            if (!$fallthrough) return;
        }
    }

    public function getResultbyTradeNo($MerchantTradeNo) {
        try {
            $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tcat_logistics_result` WHERE MerchantTradeNo = '" . $this->db->escape($MerchantTradeNo) . "'");
            return $query->row;
        } catch(Exception $exception) {
            return;
        }
    }

}
