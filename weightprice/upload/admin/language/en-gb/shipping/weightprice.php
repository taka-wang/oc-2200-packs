<?php
// Heading
$_['heading_title']    = 'Weight/Price Based Shipping';

// Text
$_['text_shipping']    = 'Shipping';
$_['text_success']     = 'Success: You have modified weight/price based shipping!';
$_['text_edit']        = 'Edit Weight/Price Based Shipping';

// Entry
$_['entry_rate']       = 'Rates';
$_['entry_tax_class']  = 'Tax Class';
$_['entry_geo_zone']   = 'Geo Zone';
$_['entry_status']     = 'Status';
$_['entry_sort_order'] = 'Sort Order';

// Help
$_['help_rate']        = 'Rates format:<br/>MaxPrice1*Weight:Cost,Weight:Cost,...<br/>MaxPrice2*Weight:Cost,Weight:Cost,...<br/>Example:<br/>20.0*5:6.00,20:10.00,1000:0.0<br/>1000.0*20:5.00,100:10.00,400:8.00,1000:0.0<br/><br/>In this example, the order total price intervals are (0, 20.0> eur and (20.0,1000.0> eur.<br/>Related weight shipping intervals are:<br/>(0, 20.0>&nbsp;&nbsp;&nbsp;&nbsp;eur: (0,5> kg shipping=6eur, (5,20> kg shipping=10eur, (20, 1000> kg shipping=0eur<br/>(20.0,1000.0> eur: (0,20> kg shipping=5eur, (20,100> kg shipping=10eur, (100,400> kg shipping=8eur, (400,1000> kg shipping=0eur';

// Error
$_['error_permission'] = 'Warning: You do not have permission to modify weight/price based shipping!';