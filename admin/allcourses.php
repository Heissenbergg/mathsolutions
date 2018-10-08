<?php 
require '../class/db.php';
require '../class/user.php';
require '../class/courses.php';
if(!Session::getUsername()) Redirect::to('../login.php');

$course = new Course();
//Strpaj sve kurseve u jedan niz
$course->getCourses();

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
        
        <link rel="stylesheet" href="courses/css/allcourses.css" type="text/css" />
        
        <script type="text/javascript" src="courses/js/allcourses.js"></script>
        <script type="text/javascript" src="courses/js/courses.js"></script>
    </head>
    <body>
        <?php require_once 'menu/menu.php'; ?>
        <section>
            <div id="allCoursesHeader" class="mainHeader">
                <h1>Svi kursevi</h1>
            </div>
            <div id="allCoursesBody" class="mainBody">
                <?php 
                for($i=0; $i<$course->getCoursesLength();$i++){ ?>
                    <div class="singleCourse">
                        <a href=""><?php echo $course->getCourseName($i); ?></a>
                        <div class="singleCourseSee" title="Pregled kursa">
                            <a href="courseoverview.php?courseId=<?php echo $course->getCourseId($i); ?>">
                                <i class="fa fa-paper-plane"></i>
                            </a>
                        </div>
                        <div class="singleCourseSee" title="Prijavljeni korisnici">
                            <a href="signedpersons.php?courseId=<?php echo $course->getCourseId($i); ?>">
                                <i class="fa fa-users"></i>
                            </a>
                        </div>
                        <div class="singleCourseSee" title="Uredite kurs">
                            <a href="">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div class="singleCourseSee" title="Obrišite kurs">
                            <a href="">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>  
                <?php }
                ?>


                <div class="singleCourse singleCourseAddNew">
                    <input type="text" placeholder="Unesite novi kurs" id="newCourse"/>
                    <div class="singleCourseAddNewButton" onclick="saveCourse();">
                        <p>SPREMITE</p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>