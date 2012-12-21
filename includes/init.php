<?php
include_once('./includes/functions.php');
$db_host = 'localhost';
$db_name = 'givingjoydb';
$db_user = 'givingjoyuser';
$db_pass = '5w*29e1gef1#$#u@';

$con = mysql_connect($db_host,$db_user,$db_pass) or die('Error connecting to database');
$db = mysql_select_db($db_name,$con) or die('Error selecting database.');

//Email name and address for the server.
$adminemail = 'info@givingjoy.org';
$adminname = 'GivingJoy.org';


//PayPal details.
$merchant_username = 'shahtr_1354930404_biz_api1.gmail.com';
$merchant_password = '1354930427';
$merchant_signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31A1mqIs4dspFHemQXZlaEsLVRfCVh';
$sandbox = true;
$currency = 'USD';
$version = 93;
/*
$merchant_username = 'ViennaGivingJoy_api1.gmail.com';
$merchant_password = '48HDA8J7H5MZ9TWV';
$merchant_signature = 'AIbDCu0i3MgcY.hhHffCdT2hZUZJACoH0hAYK13jrtJdWAjvSaDe7lPF';
$sandbox = false;
$currency = 'MYR';
*/


$domain = 'http://' . $_SERVER['SERVER_NAME'];

session_start();



?>