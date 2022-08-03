<?php
require_once('functions.php');
session_start();
$card = $_GET;
addCardToDb($card);
header('Location: index.php');
