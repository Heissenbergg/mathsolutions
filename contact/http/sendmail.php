<?php
require '../../class/mail.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$message = $_POST['msg'];

$mailObj = new Mail();

$msg = 'Korisnik : '.$name.' vam je poslao poruku putem servisa "Kontaktirajte nas."<br><br>';
$msg .= 'Kontakt informacije : <br>';
$msg .= 'e-Mail : '.$mail.'<br><br><br>';
$msg .= 'Poruka : <br>'.$message;

$mailObj->send('info@mathsolutions.ba', 'Upit sa stranice', $msg);