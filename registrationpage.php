<?php
require_once('functions.php');
session_start();
$card = $_GET;
addCardToDb($card);
print_r($card);
//unset($_GET);//take this out when finished testing
