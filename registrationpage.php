<?php
require_once('functions.php');
session_start();
$card = $_GET;
addCardToDb($card);
unset($_GET);
header('Location: index.php');
