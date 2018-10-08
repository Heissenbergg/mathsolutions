<?php 
require 'class/db.php';
require 'class/user.php';
require 'class/courses.php';

Session::setIP($_SERVER['HTTP_X_FORWARDED_FOR']);
Session::setIP2($_SERVER['REMOTE_ADDR']);

$course = new Course();
//Strpaj sve kurseve u jedan niz
$course->getCourses();

//get course ID

$courseID = $course->firstID();
if(Input::get('what')) $courseID = Input::get('what');

$lessonNumber = Input::get('lesson');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pregled kurseva</title>
        
        <meta charset="utf-8" >
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
        
        <link rel="shortcut icon" type="image/x-icon" href="iconss/ms.ico"/>
        
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        <link rel="stylesheet" href="courses/css/courses.css" type="text/css" />
        
        <!-- Font awesome -->
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        
        <script type="text/javascript" src="courses/js/courses.js"></script>
        <script type="text/javascript" src="menu/js/menu.js"></script>
    </head>
    
    <body onload="hideLoadingGif();">
        <?php require_once 'loading/gif.php'; ?>
        <?php require_once('menu/menu.php'); ?>
        
        <div id="mainWrapper">
            <?php require_once'courses/rightmenu1.php'; ?>
            <div id="mainWrapperTabsWrapper">
                <?php 
                require_once'courses/firstRun.php';
                ?>
            </div>
        </div>
    </body>
</html>