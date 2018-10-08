<?php 
require '../class/db.php';
require '../class/user.php';
require '../class/courses.php';

if(!Session::getUsername()) Redirect::to('../login.php');
$courseID = Input::get('courseId');
$course = new Course();

$lessions = new Lessions();
$lessions -> getLessons($courseID);
$lessionsLength = $lessions->getLessonsLength();
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
        
        <link rel="stylesheet" href="courses/css/courseoverview.css" type="text/css" />
        
        <script type="text/javascript" src="courses/js/courseoverview.js"></script>
        <script type="text/javascript" src="courses/js/courses.js"></script>
    </head>
    <body>
        <?php require_once 'menu/menu.php'; ?>
        <section>
            <div id="allCoursesHeader" class="mainHeader">
                <h1>
                    <?php echo $course->getSingleCourseName($courseID); ?>
                </h1>
            </div>
            <div id="allCoursesBody" class="mainBody">
                <?php 
                for($i=0; $i< $lessionsLength; $i++){ ?>
                    <div class="courseName">
                        <a href="">
                            <?php echo $lessions->getName($i); ?>
                        </a>
                        <div class="courseShowMore" onclick="showMoreAboutCourse('<?php echo $i; ?>');">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="courseShowMore" onclick="showCourseForEdit('<?php echo $i; ?>');" title="Uredite lekciju">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="courseShowMore" onclick="deleteLession('<?php echo $lessions->getLessionID($i); ?>', '<?php echo $courseID ?>');" title="Obrišite lekciju">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    
                    <div class="moreaboutcourse">
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Trajanje</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <p><?php echo $lessions->getDuration($i); ?></p>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Datum</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <p><?php echo $lessions->getDate($i); ?></p>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Lokacija</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <p><?php echo $lessions->getLocation($i); ?></p>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Cijena</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <p><?php echo $lessions->getPrice($i); ?></p>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption moreaboutcourseOption2">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Kratki opis</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <p><?php echo $lessions->getShortDesc($i); ?></p>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Predavači</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <p><?php echo $lessions->getTeachOne($i).', '.$lessions->getTeachTwo($i).', '.$lessions->getTeachThree($i); ?> </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- edit this lesson -->
                    
                    <div class="moreaboutcourseEdit">
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Naziv</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <input type="text" id="editName<?php echo $i; ?>" value="<?php echo $lessions->getName($i); ?>"/>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Trajanje</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <input type="text" id="editDuration<?php echo $i; ?>" value="<?php echo $lessions->getDuration($i); ?>"/>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Datum</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <input type="text" id="editDate<?php echo $i; ?>" value="<?php echo $lessions->getDate($i); ?>"/>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Lokacija</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <input type="text" id="editLocation<?php echo $i; ?>" value="<?php echo $lessions->getLocation($i); ?>"/>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Cijena</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <input type="text" id="editPrice<?php echo $i; ?>" value="<?php echo $lessions->getPrice($i); ?>"/>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption moreaboutcourseOption2">
                            <div class="moreaboutcourseOptionLeft">
                                <p>Kratki opis</p>
                            </div>
                            <div class="moreaboutcourseOptionRight">
                                <textarea id="editDescription<?php echo $i; ?>"><?php echo $lessions->getShortDesc($i); ?></textarea>
                            </div>
                        </div>
                        <div class="moreaboutcourseOption moreaboutcourseOptionSaveEditingPost">
                            <div class="moreaboutcourseOptionSaveEditingPostButton" onclick="editLesson('<?php echo $lessions->getLessionID($i); ?>', '<?php echo $i; ?>');">
                                <p>SPREMITE</p>
                            </div>
                        </div>
                    </div>
                    
                    
                <?php }
                
                ?>
                
                <!-- 
                <div class="courseName">
                    <a href="">
                        Naziv prve lekcije
                    </a>
                    <div class="courseShowMore" onclick="showMoreAboutCourse(0);">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                
                
                <div class="moreaboutcourse">
                    <div class="moreaboutcourseOption">
                        <div class="moreaboutcourseOptionLeft">
                            <p>Trajanje</p>
                        </div>
                        <div class="moreaboutcourseOptionRight">
                            <p>2 časa</p>
                        </div>
                    </div>
                    <div class="moreaboutcourseOption">
                        <div class="moreaboutcourseOptionLeft">
                            <p>Datum</p>
                        </div>
                        <div class="moreaboutcourseOptionRight">
                            <p>24. Mart 2018</p>
                        </div>
                    </div>
                    <div class="moreaboutcourseOption">
                        <div class="moreaboutcourseOptionLeft">
                            <p>Lokacija</p>
                        </div>
                        <div class="moreaboutcourseOptionRight">
                            <p>Druga Gimnazija</p>
                        </div>
                    </div>
                    <div class="moreaboutcourseOption">
                        <div class="moreaboutcourseOptionLeft">
                            <p>Cijena</p>
                        </div>
                        <div class="moreaboutcourseOptionRight">
                            <p>15 KM / Čas</p>
                        </div>
                    </div>
                    <div class="moreaboutcourseOption moreaboutcourseOption2">
                        <div class="moreaboutcourseOptionLeft">
                            <p>Kratki opis</p>
                        </div>
                        <div class="moreaboutcourseOptionRight">
                            <p>Ovo je neki kratki opis (maximalno malo slova)</p>
                        </div>
                    </div>
                    <div class="moreaboutcourseOption">
                        <div class="moreaboutcourseOptionLeft">
                            <p>Predavači</p>
                        </div>
                        <div class="moreaboutcourseOptionRight">
                            <p>Šefko , Murat, Mustafa </p>
                        </div>
                    </div>
                </div>
                
                -->
                
                <div class="courseName courseNameNew">
                    <div class="newLection">
                        <a href="insertnewlesson.php?courseId=<?php echo $courseID; ?>">
                            Unesite novu lekciju
                        </a>
                    </div>
                </div>
                
            </div>
        </section>
    </body>
</html>