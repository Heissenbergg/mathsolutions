<?php 
require '../class/db.php';
require '../class/user.php';
if(!Session::getUsername()) Redirect::to('../login.php');

require_once '../class/date.php';
//if(!$user->isAdmin() && $user->isModerator() or $user->isAdmin() and !$user->isModerator()) Redirect::to('../index.php');
$d = new Date();
$date = $d->days(date("m"));

?>
<html>
    <head>
        <title>DASHBOARD</title>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/adminStyle.css" type="text/css" />
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        <link rel="stylesheet" href="charts/css/chart.css" type="text/css" />
        
        <script type="text/javascript" src="charts/js/chart.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    </head>
    <body>
        <?php require_once 'menu/menu.php'; ?>
        <section>
            <div id="chart_div" style="height:600px;"></div>
            <?php require_once 'charts/googleChart.php'; ?>
        </section>
    </body>
</html>