<?php
require_once 'class/db.php';
require_once 'class/bann.php';

$ban = new Ban($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);
if($ban->checkBanned() == 12) Redirect::to('404.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FAQs</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
        
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
        <link rel="shortcut icon" type="image/x-icon" href="iconss/ms.ico"/>
        
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        <link rel="stylesheet" href="faq/css/faq.css" type="text/css" />
        
        <!-- <script type="text/javascript" src="js/faq.js"></script> -->
        <script type="text/javascript" src="menu/js/menu.js"></script>
    </head>
    <body onload="hideLoadingGif();">
        <?php require_once 'loading/gif.php'; ?>
        <?php require_once 'menu/menu.php'; ?>
        
        <div class="faqHeader">
            <h1> <span>Pripremna nastava - </span>Često postavljena pitanja </h1>
        </div>
        
        <div class="faqWrapper">
            <div class="faqWrapperHeader">
                <h2>Koliko će trajati pripremna nastava?</h2>
            </div>
            <div class="faqWrapperBody">
                <p>
                    Pripremna nastava počinje 13. oktobra 2018. godine i traje do 30. januara 2019. godine. 
                    Održat će se ukupno 65 časova nastave, te uraditi uvodni i završni test u trajanjima 
                    od po 2 časa. Nastava se odvija dva puta sedmično, subotom i nedjeljom, za vrijeme 
                    trajanja nastave u gimnazijama i srednjim školama. Po završetku školske godine, nastava
                    će se odvijati tri puta sedmično. Prilikom određivanja termina, vodit će se računa o 
                    državnim i vjerskim praznicima i o tome će polaznici biti blagovremeno obaviješteni.
                </p>
            </div>
        </div>
        
        <div class="faqWrapper faqWrapperx">
            <div class="faqWrapperHeader">
                <h2>Da li se nastava održava za vrijeme praznika?</h2>
            </div>
            <div class="faqWrapperBody">
                <p>
                    Organizatori nastave će voditi računa o održavanju nastave za vrijeme državnih i vjerskih praznika.
                    Nastava se neće održavati za vrijeme tih praznika
                </p>
            </div>
        </div>
        
        <div class="faqWrapper faqWrapperx">
            <div class="faqWrapperHeader">
                <h2>Gdje se održava nastava?</h2>
            </div>
            <div class="faqWrapperBody">
                <p>
                    Nastava se održava u Drugoj gimnaziji u Sarajevu, adresa : Sutjeska 1, 71000 Sarajevo.
                </p>
            </div>
        </div>
        
        <div class="faqWrapper faqWrapperx">
            <div class="faqWrapperHeader">
                <h2>Gdje se mogu dobiti ili pročitati dodatne infromacije vezane za nastavu?</h2>
            </div>
            <div class="faqWrapperBody">
                <p>
                    Dodatne informacije se mogu dobiti putem <span title="Konktaktirajte nas klikom na ovaj link"><a href="kontakt.php">kontakt forme</a></span>, na 
                    telefon +387 62 759 172 (telefon i viber) ili putem e-maila info@mathsolutions.ba ili putem naše
                    <span>Facebook stranice</span>.
                </p>
            </div>
        </div>
        
        <div class="faqWrapper faqWrapperx">
            <div class="faqWrapperHeader">
                <h2>Gdje se mogu kupiti knjige za pripremnu nastavu iz matematike?</h2>
            </div>
            <div class="faqWrapperBody">
                <p>
                    Pripremna nastava iz matematike se ne održava ni po jednoj knjizi specifično, nego polaznici 
                    dobijaju materijale u elektronskoj formi za samostalan rad kod kuće.
                </p>
            </div>
        </div>
        
        <div class="faqWrapper faqWrapperx faqWrapperlast">
            <div class="faqWrapperHeader">
                <h2>Da li se mogu slušati pojedine oblasti, a ne čitava pripremna nastava?</h2>
            </div>
            <div class="faqWrapperBody">
                <p>
                    Da, cijena jednog časa u tom slučaju iznosi 10 KM. Polaznici koji odluče pohađati cjelokupnu nastavu 
                    ostvaruju popust i plaćaju ukupno 400 KM. Polaznici koji slušaju cjelokupnu pripremnu nastavu imaju 
                    mogućnost da plaćaju u dvije rate.
                </p>
            </div>
        </div>
        
    </body>
</html>