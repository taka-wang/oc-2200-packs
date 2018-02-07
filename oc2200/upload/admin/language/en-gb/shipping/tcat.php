<?php
// Heading
$_['heading_title']    = '<span style="color:#449DD0; font-weight:bold">TCAT Shipping</span>';
$_['heading_title_clear']    = 'TCAT Shipping';

// Text
$_['text_shipping']    = 'Shipping';
$_['text_success']     = 'Success: You have modified TCAT shipping!';
$_['text_edit']        = 'Edit TCAT Shipping';

// Entry
$_['entry_rate']       = 'Rates';
$_['entry_tax_class']  = 'Tax Class';
$_['entry_geo_zone']   = 'Geo Zone';
$_['entry_status']     = 'Status';
$_['entry_sort_order'] = 'Sort Order';
$_['entry_merchant_id'] = 'Merchant ID';
$_['entry_hash_key'] = 'Hash Key';
$_['entry_hash_iv'] = 'Hash IV';
$_['entry_item_desc_content'] = '長度不可超過50 且 內容僅可輸入中文、英文、數字、底線、逗號與空白';
$_['entry_item_desc'] = 'Item Desc';
$_['entry_sender_name'] = 'Sender Name';
$_['entry_sender_phone'] = 'Sender Cell Phone';
$_['entry_sender_zip'] = 'Sender Zip Code';
$_['entry_sender_address'] = 'Sender Address';
$_['entry_order_status'] = 'Shipment Order Default Status:';
$_['entry_order_finish_status'] = 'Shipment Order Finish Status:';
$_['entry_order_fail_status'] = 'Shipment Order Fail Status:';

// Help
$_['help_rate']        = 'Rates format:<br/>MaxPrice1*Weight:Cost,Weight:Cost,...<br/>MaxPrice2*Weight:Cost,Weight:Cost,...<br/>Example:<br/>20.0*5:6.00,20:10.00,1000:0.0<br/>1000.0*20:5.00,100:10.00,400:8.00,1000:0.0<br/><br/>In this example, the order total price intervals are (0, 20.0> eur and (20.0,1000.0> eur.<br/>Related weight shipping intervals are:<br/>(0, 20.0>&nbsp;&nbsp;&nbsp;&nbsp;eur: (0,5> kg shipping=6eur, (5,20> kg shipping=10eur, (20, 1000> kg shipping=0eur<br/>(20.0,1000.0> eur: (0,20> kg shipping=5eur, (20,100> kg shipping=10eur, (100,400> kg shipping=8eur, (400,1000> kg shipping=0eur';
$_['help_merchant_id'] = '2000132';
$_['help_hash_key'] = '5294y06JbISpM5x9';
$_['help_hash_iv'] = 'v77hoKGq4kWxNNIS';
$_['help_item_desc'] = 'Some items';
$_['help_sender_name'] = '張無忌';
$_['help_sender_phone'] = '0912345678';
$_['help_sender_zip'] = '236';
$_['help_sender_address'] = '新北市市政府';

// Error
$_['error_permission'] = 'Warning: You do not have permission to modify TCAT shipping!';
$_['error_merchant_id'] = 'Please type merchant id!';
$_['error_hash_key'] = 'Please type hash key!';
$_['error_hash_iv'] = 'Please type hash iv!';
$_['error_item_desc'] = 'Please type item desc!';
$_['error_item_desc_length'] = 'At least 50 words!';
$_['error_item_desc_content'] = '商品資訊限中文、英文、數字、底線、逗號與空白!';
$_['error_sender_name'] = '字元限制為 10 個字元(最多 5 個中文字、10 個英文字)、不可有空白';
$_['error_sender_phone'] = '只允許數字、10 碼、09 開頭';
$_['error_sender_zip'] = '請設定寄件人郵遞區號(3或5碼)';
$_['error_sender_address'] = '字元限制需大於 6 個字元，且不可超過 60 個字元';