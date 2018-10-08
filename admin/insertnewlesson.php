<?php 
require '../class/db.php';
require '../class/user.php';
require '../class/courses.php';

if(!Session::getUsername()) Redirect::to('../login.php');

$course = new Course();
$courseID = Input::get('courseId');


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Svi kursevi</title>
        <meta charset="UTF-8">
        
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- font awesome -->
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        
        
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/adminStyle.css" type="text/css" />
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        
        <link rel="stylesheet" href="courses/css/insertnewlesson.css" type="text/css" />
        
        <script type="text/javascript" src="courses/js/insertnewlesson.js"></script>
        <script type="text/javascript" src="courses/js/courses.js"></script>
    </head>
    <body>
        <?php require_once 'menu/menu.php'; ?>
        <section>
            <div id="allCoursesHeader" class="mainHeader">
                <h1>
                    <a href="courseoverview.php?courseId=<?php echo $courseID; ?>">
                        <?php echo $course->getSingleCourseName($courseID); ?>
                    </a> 
                    / Unos nove lekcije
                </h1>
            </div>
            <div id="allCoursesBody" class="mainBody">
                <p id="courseID" style="display:none;"><?php echo Input::get('courseId'); ?></p>
                <div class="newLessionOption">
                    <div class="newLessionOptionLeft">
                        <p>Ikona</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <form enctype="multipart/form-data">
                            <label for="file">
                            	<i class="fa fa-picture-o" title="Dodajte nove fotografije"></i>
                            </label>
                            <input onchange="uploadIcon();" type="file" class="hiddenElements" id="file" name="file" style="display: none;">
                           	<!--<div onclick="uploadAllPictures();" id="imagesUpload">UPLOAD ICON</div> -->
                        </form>
                        <img id="uploadedIcon" src=""></img>
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Naziv</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="nameOfLesson" placeholder="Naziv lekcije"/>
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Trajanje</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="durationOfLesson" placeholder="2 Časa"/>
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Datum</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="dateOfLesson" placeholder="24. Mart 2018"/>
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Lokacija</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="locationOfLesson" placeholder="Druga Gimnazija"/ >
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Cijena</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="priceOfLesson" placeholder="30KM"/>
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Kratki opis</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="shortDescOfLesson" placeholder="Kratki opis (kol'ko hoš karaktera)"/>
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Predavač 1</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="teach1OfLesson" placeholder="Ime i titula"/>
                    </div>
                </div>
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Predavač 2</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="teach2OfLesson" placeholder="Ime i titula"/>
                    </div>
                </div>
                
                <div class="newLessionOption newLessionOption2">
                    <div class="newLessionOptionLeft">
                        <p>Predavač 3</p>
                    </div>
                    <div class="newLessionOptionRight">
                        <input type="text" id="teach3OfLesson" placeholder="Ime i titula"/>
                    </div>
                </div>
                
                <div class="newLessionOption newLessionOption3" onclick="savePost();">
                    <p>SPREMITE</p>
                </div>
            </div>
        </section>
    </body>
</html>