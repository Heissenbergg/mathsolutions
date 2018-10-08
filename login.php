<?php
require_once 'class/db.php';
require_once 'class/bann.php';

$ban = new Ban($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);
if($ban->checkBanned() == 12) Redirect::to('404.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Prijavite se</title>
        <!-- i did this -->
        <meta charset="utf-8" >
        
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="login/css/login.css" type="text/css" />
        
        <script type="text/javascript" src="menu/js/menu.js"></script>
        <script type="text/javascript" src="login/js/login.js"></script>
        
    </head>
    
    <body onload="hideLoadingGif();">
        <?php require_once 'loading/gif.php'; ?>
        <div id="mainWrapper" >
            <div id="mainWrapperFormWrapper">
                <!-- naslov -->
                <div id="mainWrapperFormWrapperHeader">
                    <h1><letter>MATH</letter> SOLUTIONS</h1>
                </div>
                
                <!-- input -->
                <div id="mainWrapperFormWrapperInputWrapper">
                    <div id="mainWrapperFormWrapperInputWrapperInput">
                        <p>Email</p>
                        <input type="text" id="username" autocomplete="off" />
                        
                        <p>Šifra</p>
                        <input type="password" id="password" autocomplete="off" />
                        
                        <a id="forgotPassword" href="#">Zaboravili ste šifru?</a>
                        <input id="submit" type="submit" value="Prijava" onclick="login();" />
                        <br><br><br>
                        <a id="kreirajNalog" href="#">Kreirajte nalog</a>
                        <br><br>
                        <a id="termsAndConditions" href="#">Uslovi korištenja</a>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>