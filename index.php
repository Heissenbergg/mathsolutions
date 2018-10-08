<?php 
require_once 'class/db.php';
require_once 'class/date.php';

ClearStatCache();

require_once 'class/bann.php';

$ban = new Ban($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);
if($ban->checkBanned() == 12) Redirect::to('404.php');

$date = new Date(date("d"),date("m"), date("y"), $_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Keywords" content="Pripremna nastava, matematika, matematika za srednju školu, matematika za fakultete">
        <meta name="Description" content="MathSolutions organizuje kurseve za sve zainteresovane. Elementarna matematika za fakultete. Vaš uspjeh zagarantovan.">
        <meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Math Solutions</title>
        
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
        
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
        <link rel="shortcut icon" type="image/x-icon" href="iconss/ms.ico"/>
        
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        <link rel="stylesheet" href="homepage/css/homepage.css" type="text/css" />
        
        <!-- Font awesome -->
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        
        <script type="text/javascript" src="homepage/js/homepage.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript" src="menu/js/menu.js"></script>
    </head>
    <body onload="hideLoadingGif();">
        <?php require_once 'loading/gif.php'; ?>
        <?php require_once 'menu/menu.php'; ?>
        <?php require_once 'homepage/homepage.php'; ?>
    </body>
</html>