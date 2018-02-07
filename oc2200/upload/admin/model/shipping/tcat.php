<?php
class ModelShippingTcat extends Model {

    public function getItemDescByProduct($products, $settings) {
        if (!isset($products)) return $settings['tcat_item_desc'];
        $item_desc = '';
        foreach ($products as $_ind => $product) {
                if (($_ind+1) == count($products)) {
                        $item_desc .= $product['name'].' x '.$product['quantity'];
                        break;
                }
                $item_desc .= $product['name'].' x '.$product['quantity'].', ';
        }
        if (strlen($item_desc) > 50) return $settings['tcat_item_desc'];
        return $item_desc;
    }

    public function getInfo($order_id) {
        try {
            $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tcat_logistics_info` WHERE order_id = '" . (int)$order_id . "'");
            return $query->row;
        } catch(Exception $exception) {
            return;
        }
    }

    public function getResult($order_id) {
        try {
            $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "tcat_logistics_result` WHERE order_id = '" . (int)$order_id . "'");
            return $query->row;
        } catch(Exception $exception) {
            return;
        }
    }

    public function install() {
        $this->db->query("
            CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tcat_logistics_info` (
                `order_id` INT(11) NOT NULL,
                `Distance` VARCHAR(2) NOT NULL DEFAULT '00',
                `MerchantTradeDate` datetime NOT NULL,
                `MerchantTradeNo` VARCHAR(20),
                `Postcode` varchar(10) NOT NULL,
                `Specification` VARCHAR(4) NOT NULL DEFAULT '0001',
                `ScheduledDeliveryTime` INT(1) NOT NULL DEFAULT 4,
                `Temperature` VARCHAR(4) NOT NULL DEFAULT '0003',
                PRIMARY KEY (`order_id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tcat_logistics_result` (
                `order_id` INT(11) NOT NULL,
                `MerchantTradeNo` VARCHAR(20) NOT NULL,
                `AllPayLogisticsID` VARCHAR(20) NOT NULL,
                `BookingNote` VARCHAR(50) NOT NULL,
                `RtnMsg` VARCHAR(200) NOT NULL,
                `RtnCode` INT(4) NOT NULL,
                `UpdateStatusDate` datetime NOT NULL,
                PRIMARY KEY (`MerchantTradeNo`),
                KEY `order_id` (`order_id`)
          ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

    }

    public function uninstall() {
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tcat_logistics_info`;");
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tcat_logistics_result`;");
    }

}
