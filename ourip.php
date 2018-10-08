<?php
require_once 'class/db.php';
require_once 'class/bann.php';

$ips = new Ban();

$ips -> insertOurIP($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);