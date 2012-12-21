<?php
include_once('/includes/functions.php');
$db_host = 'localhost';
$db_name = 'givingjoydb';
$db_user = 'givingjoyuser';
$db_pass = '5w*29e1gef1#$#u@';

$con = mysql_connect($db_host,$db_user,$db_pass) or die('Error connecting to database');
$db = mysql_select_db($db_name,$con) or die('Error selecting database.');


$adminemail = 'info@givingjoy.org';
$adminname = 'GivingJoy.org';

session_start();



?>