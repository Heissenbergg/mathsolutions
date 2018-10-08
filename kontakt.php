<?php
require_once 'class/db.php';
require_once 'class/bann.php';

$ban = new Ban($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);
if($ban->checkBanned() == 12) Redirect::to('404.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kontaktirajte nas</title>
        <link rel="shortcut icon" type="image/x-icon" href="iconss/ms.ico"/>
        <!-- i did this -->
        <meta charset="utf-8" >
        
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
        
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="../contact/css/contact.css" type="text/css" />
        
        
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        <script type="text/javascript" src="menu/js/menu.js"></script>
        <script type="text/javascript" src="contact/js/contact.js"></script>
    </head>
    
    <body onload="hideLoadingGif();">
        <?php require_once 'loading/gif.php'; ?>
        <?php require_once('menu/menu.php') ?>
        <div id="wrapper">
            <div id="contactWrapper">
                <div id="contactWrapperBijeli">
                    <div id="contactWrapperBijeliHeader">
                        <p>POŠALJITE PORUKU</p>
                    </div>
                    <div id="contactWrapperBijeliImeiPrezime">
                        <div id="imeIprezime">
                            <p>Ime i prezime</p>
                        </div>
                        <div id="inputImeiPrezime">
                            <input type="text" name="imePrezime" id="contactName"/>
                        </div>
                        
                        <div id="email">
                            <p>Email</p>
                        </div>
                        <div id="inputEmail">
                            <input type="text" name="email" id="contactMail"/>
                        </div>
                    </div>
                    <div id="contactWrapperBijeliMessage">
                        <textarea placeholder="Poruka" id="contactMsg"></textarea>
                    </div>
                    
                    <div id="contactWrapperBijeliButton" onclick="sendMail();">
                        <input id="button" type="submit" name="submit" value="POŠALJITE"/>
                    </div>
                </div>
                
                <div id="contactWrapperCrni">
                    <div id="contactWrapperCrniheader">
                        <p>Kontaktirajte nas</p>
                    </div>
                    <div id="body">
                        <div id="bodyItem1">
                            <div id="icon">
                                <img src="contact/icons/mail.png"></img>
                            </div>
                            <div id="content">
                                <p>info@mathsolutions.ba</p>
                            </div>
                        </div>
                        
                        <div id="bodyItem1">
                            <div id="icon">
                                <img src="contact/icons/mail.png"></img>
                            </div>
                            <div id="content">
                                <p>mehmed.brkic@mathsolutions.ba</p>
                            </div>
                        </div>
                        <div id="bodyItem1">
                            <div id="icon">
                                <img src="contact/icons/mail.png"></img>
                            </div>
                            <div id="content">
                                <p>zlatan.tucakovic@mathsolutions.ba</p>
                            </div>
                        </div>
                        <div id="bodyItem1">
                            <div id="icon">
                                <img src="contact/icons/phone1.png"></img>
                            </div>
                            <div id="content">
                                <p>+387 62 759 172</p>
                            </div>
                        </div>
                        
                    </div>
                    <div id="footer">
                        <div class="footerIcons">
                            <img id="icon1" src="contact/icons/facebook.png" title="Facebook"></img>
                        </div>
                        <div class="footerIcons footerIcons1">
                            <img id="icon2" src="contact/icons/youtube.png" title="Youtube"></img>
                        </div>
                        <div class="footerIcons footerIcons1">
                            <img id="icon3" src="contact/icons/instagram.png" title="Instagram"></img>
                        </div>
                        <div class="footerIcons footerIcons1">
                            <img id="icon4" src="contact/icons/pinterest.png" title="Pinterest"></img>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>