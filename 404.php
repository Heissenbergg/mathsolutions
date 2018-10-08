<?php
require_once 'class/db.php';
require_once 'class/bann.php';

$ban = new Ban();

$ban -> insertBan($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);

?>


<h1 style="font-size:40px;">404 <span style="font-size:15px;">not found</span></h1>
<h4>Since you think  that you are smart, well you are not smart enough <3 </h4>