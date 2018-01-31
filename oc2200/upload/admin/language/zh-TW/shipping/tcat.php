<?php
// Heading
$_['heading_title']    = '<span style="color:#449DD0; font-weight:bold">黑貓宅急便</span>';
$_['heading_title_clear']    = '黑貓宅急便';

// Text
$_['text_shipping']    = '運送';
$_['text_success']     = '成功: 你已經修改黑貓宅急便!';
$_['text_edit']        = '編輯黑貓宅急便';

// Entry
$_['entry_rate']       = '稅率';
$_['entry_tax_class']  = '稅類';
$_['entry_geo_zone']   = '地區';
$_['entry_status']     = '狀態';
$_['entry_sort_order'] = '排序';
$_['entry_merchant_id'] = '商店代號';
$_['entry_hash_key'] = '加密傳送KEY (Hash Key)';
$_['entry_hash_iv'] = '加密傳送IV (Hash IV)';
$_['entry_item_desc_content'] = '長度不可超過50 且 內容僅可輸入中文、英文、數字、底線、逗號與空白';
$_['entry_item_desc'] = '商品資訊 (Item Desc)';
$_['entry_sender_name'] = '寄件人姓名';
$_['entry_sender_phone'] = '寄件人手機';
$_['entry_sender_zip'] = '寄件人郵遞區號';
$_['entry_sender_address'] = '寄件人地址';
$_['entry_order_status'] = '配送訂單初始狀態:';
$_['entry_order_finish_status'] = '配送訂單建立成功狀態:';
$_['entry_order_fail_status'] = '配送訂單建立失敗狀態:';

// Help
$_['help_rate']        = '稅率格式:<br/>MaxPrice1*Weight:Cost,Weight:Cost,...<br/>MaxPrice2*Weight:Cost,Weight:Cost,...<br/><br/>範例:<br/>20.0*5:6.00,20:10.00,1000:0.0<br/>1000.0*20:5.00,100:10.00,400:8.00,1000:0.0<br/><br/>在這個範例中，訂單總金額在0~20.0元與20.0~1000.0元這兩個區間時，其對應重量的運費關係為:<br/><br/>1. 若總金額介於0~20.0元間，此時0~5公斤的運費=6元, 5~20公斤的運費=10元, 20~100公斤的運費=0元<br/>2. 若總金額介於20.0~1000.0元間，此時0~20公斤的運費=5元, 20~100公斤的運費=10元, 100~400公斤的運費=8元, 400~1000公斤的運費=0元';
$_['help_merchant_id'] = '2000132';
$_['help_hash_key'] = '5294y06JbISpM5x9';
$_['help_hash_iv'] = 'v77hoKGq4kWxNNIS';
$_['help_item_desc'] = '一批貨';
$_['help_sender_name'] = '張無忌';
$_['help_sender_phone'] = '0912345678';
$_['help_sender_zip'] = '236';
$_['help_sender_address'] = '新北市市政府';

// Error
$_['error_permission'] = '警告: 你沒有權限修改黑貓宅急便!';
$_['error_merchant_id'] = '請輸入商店代號!';
$_['error_hash_key'] = '請設定加密傳送KEY!';
$_['error_hash_iv'] = '請設定加密傳送IV!';
$_['error_item_desc'] = '請設定商品資訊!';
$_['error_item_desc_length'] = '商品資訊字數不得超過 50 字!';
$_['error_item_desc_content'] = '商品資訊限中文、英文、數字、底線、逗號與空白!';
$_['error_sender_name'] = '字元限制為 10 個字元(最多 5 個中文字、10 個英文字)、不可有空白';
$_['error_sender_phone'] = '只允許數字、10 碼、09 開頭';
$_['error_sender_zip'] = '請設定寄件人郵遞區號(3或5碼)';
$_['error_sender_address'] = '字元限制需大於 6 個字元，且不可超過 60 個字元';