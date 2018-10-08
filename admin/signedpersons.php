<?php 
require '../class/db.php';
require '../class/user.php';
require '../class/courses.php';
if(!Session::getUsername()) Redirect::to('../login.php');

$courseID = Input::get('courseId');
$course = new Course();

$courseCat = $course->getCouseCat($courseID);


$lessions = new Lessions();
$lessions -> getLessons($courseID);
$lessionsLength = $lessions->getLessonsLength();


//DATABASE CONNECTION
$db = new DB();
$courseRequests = $db->query("courseRequest");

$cRequests = new courseRequest();
$totalRequest = $cRequests -> total($courseID);

$lRequests = new lessonRequest();


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prijavljeni korisnici</title>
        <meta charset="UTF-8">
        
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- font awesome -->
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        
        
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/adminStyle.css" type="text/css" />
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        
        <link rel="stylesheet" href="courses/css/signedpersons.css" type="text/css" />
        
        <script type="text/javascript" src="courses/js/signedpersons.js"></script>
        <script type="text/javascript" src="courses/js/courses.js"></script>
    </head>
    <body>
        <?php require_once 'menu/menu.php'; ?>
        <section>
            <div id="allCoursesHeader" class="mainHeader">
                <h1>
                    <?php echo $course->getSingleCourseName($courseID); ?> 
                    / Prijavljeni korisnici
                </h1>
            </div>
            <div id="allCoursesBody" class="mainBody">
                <div class="thisCourse">
                    <p><?php echo $course->getSingleCourseName($courseID); ?> </p>
                    
                    <div class="thisCourseShowMore" onclick="showMoreAboutPeople(0);">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="thisCourseSignedPeoples">
                        <i class="fa fa-users" title="Ukupan broj prijavljenih korisnika"></i>
                        <p id="totalCourseRequests"><?php echo $totalRequest; ?></p>
                    </div>
                </div>
                
                <div class="thisCourseSigned">
                    <div class="thisCourseSignedOption">
                        <div class="thisCourseSignedOptionID">
                            <p>ID</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>ADRESA</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>IME RODITELJA</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>TELEFON</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>MAIL</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>FAKULTET</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt thisCourseSignedOptionOpt1">
                            <p>IME KORISNIKA</p>
                        </div>
                    </div>
                    <?php 
                        //just for indexing for deleting
                        $counter = 0;
                        while($courseReq = $courseRequests -> fetch()){
                            if($courseReq['course_id'] == $courseID){
                                $newUser = new User($courseReq['user_id']);
                                ?>
                                
                                <div class="thisCourseSignedOption thisCourseSignedOption2">
                                    <div class="thisCourseSignedOptionID">
                                        <p><?php echo $newUser->getID(); ?></p>
                                    </div>
                                    <div class="thisCourseSignedOptionOpt">
                                        <p><?php echo $newUser->getAdress(); ?></p>
                                    </div>
                                    <div class="thisCourseSignedOptionOpt">
                                        <p><?php echo $newUser->getParent(); ?></p>
                                    </div>
                                    <div class="thisCourseSignedOptionOpt">
                                        <p><?php echo $newUser->getPhone(); ?></p>
                                    </div> 
                                    <div class="thisCourseSignedOptionOpt">
                                        <p><?php echo $newUser->getMail(); ?></p>
                                    </div>
                                    <div class="thisCourseSignedOptionOpt">
                                        <p><?php echo $newUser->getSchool(); ?></p>
                                    </div>
                                    <div class="thisCourseSignedOptionOpt thisCourseSignedOptionOpt1">
                                        <p><?php echo $newUser->getName(); ?></p>
                                    </div>
                                    <div class="thisCourseSignedOptionDelete" onclick="deleteFromCourses('<?php echo $newUser->getID(); ?>', 'courses', '<?php echo $courseID; ?>', '<?php echo $counter++; ?>');" title="Obrišite prijavu">
                                        <i class="fa fa-trash"></i>
                                    </div>
                                </div>
                                
                                <?php
                            }
                        }
                    
                    ?>
                </div>
                <?php 
                $counter = 0;
                $totalRequestIndex = 0;
                if($courseCat == 0){
                    for($i=0; $i< $lessionsLength; $i++){ ?>
                        <div class="thisCourse thisCourse1">
                            <p><?php echo $lessions->getName($i); ?> </p>
                            
                            <div class="thisCourseShowMore" onclick="showMoreAboutPeople(<?php echo ($i+1); ?>);">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="thisCourseSignedPeoples">
                                <i class="fa fa-users" title="Ukupan broj prijavljenih korisnika"></i>
                                <p class="totalLessonsRequests"><?php echo $lRequests->total($lessions->getLessionID($i)); ?></p>
                            </div>
                        </div>
                        
                        <div class="thisCourseSigned">
                            <div class="thisCourseSignedOption">
                                <div class="thisCourseSignedOptionID">
                                    <p>ID</p>
                                </div>
                                <div class="thisCourseSignedOptionOpt">
                                    <p>ADRESA</p>
                                </div>
                                <div class="thisCourseSignedOptionOpt">
                                    <p>IME RODITELJA</p>
                                </div>
                                <div class="thisCourseSignedOptionOpt">
                                    <p>TELEFON</p>
                                </div>
                                <div class="thisCourseSignedOptionOpt">
                                    <p>MAIL</p>
                                </div>
                                <div class="thisCourseSignedOptionOpt thisCourseSignedOptionOpt1">
                                    <p>IME KORISNIKA</p>
                                </div>
                            </div>
                            
                        <?php
                            $lessonRequests = $db->query("lessonsRequest");
                            while($lessonReq = $lessonRequests -> fetch()){
                                if($lessonReq['lesson_id'] == $lessions->getLessionID($i)){
                                    $newUser = new User($lessonReq['user_id']);
                                    ?>
                                    <div class="thisCourseSignedOption thisCourseSignedOption2 thisCourseSignedOption3">
                                        <div class="thisCourseSignedOptionID">
                                            <p><?php echo $newUser->getID(); ?></p>
                                        </div>
                                        <div class="thisCourseSignedOptionOpt">
                                            <p><?php echo $newUser->getAdress(); ?></p>
                                        </div>
                                        <div class="thisCourseSignedOptionOpt">
                                            <p><?php echo $newUser->getParent(); ?></p>
                                        </div>
                                        <div class="thisCourseSignedOptionOpt">
                                            <p><?php echo $newUser->getPhone(); ?></p>
                                        </div>
                                        <div class="thisCourseSignedOptionOpt">
                                            <p><?php echo $newUser->getMail(); ?></p>
                                        </div>
                                        <div class="thisCourseSignedOptionOpt thisCourseSignedOptionOpt1">
                                            <p><?php echo $newUser->getName(); ?></p>
                                        </div>
                                        <div class="thisCourseSignedOptionDelete"  onclick="deleteFromCourses('<?php echo $newUser->getID(); ?>', 'lessons', '<?php echo $courseID; ?>', '<?php echo $counter++; ?>', '<?php echo $totalRequestIndex; ?>');" title="Obrišite prijavu">
                                            <i class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    
                                    <?php
                                }
                            } $totalRequestIndex ++;
                        ?>
                        </div>
                        <?php 
                        }
                }
                
                ?>
                <!--
                <div class="thisCourseSigned">
                    <div class="thisCourseSignedOption">
                        <div class="thisCourseSignedOptionID">
                            <p>ID</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>ADRESA</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>IME RODITELJA</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>TELEFON</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>MAIL</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt thisCourseSignedOptionOpt1">
                            <p>IME KORISNIKA</p>
                        </div>
                    </div>
                    <div class="thisCourseSignedOption thisCourseSignedOption2">
                        <div class="thisCourseSignedOptionID">
                            <p>12</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>Asafa Serdarevića 12</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>Murat kurat</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>nema telefona</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt">
                            <p>murat@murat.ba</p>
                        </div>
                        <div class="thisCourseSignedOptionOpt thisCourseSignedOptionOpt1">
                            <p>Muratov sin</p>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </section>
    </body>
</html>