<?php

$post = $_POST;

$merchant_username = 'shahtr_1354930404_biz_api1.gmail.com';
$merchant_password = '1354930427';
$merchant_signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31A1mqIs4dspFHemQXZlaEsLVRfCVh';

$domain = 'http://local.givingjoy.org';

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp'); 
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'USER=' . $merchant_username . '&PWD=' . $merchant_password . '&SIGNATURE=' . $merchant_signature . '&METHOD=SetExpressCheckout&VERSION=95&PAYMENTREQUEST_0_PAYMENTACTION=Authorization&PAYMENTREQUEST_0_AMT=' . $post['amount'] . '&PAYMENTREQUEST_0_CURRENCYCODE=MYR&cancelUrl=' . $domain . '/transaction_cancel.php&returnUrl=' . $domain . '/transaction_success.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
$head = curl_exec($ch); 
curl_close($ch); 

var_dump($head);

?>