<?php
$course = new Course();

$lessions = array("id" => array(), "naslov" => array(), "trajanje" => array(), "datum" => array(),"lokacija" => array(), "cijena" => array(), "opis" => array());
$db = new DB();
$LessonQuery = $db->query("lessons");
while($less = $LessonQuery -> fetch()){
    if($less['id'] == $lessonNumber){
        array_push($lessions['id'], $less['id']);
        array_push($lessions['naslov'], $less['name']);
        array_push($lessions['trajanje'], $less['duration']);
        array_push($lessions['datum'], $less['date']);
        array_push($lessions['lokacija'], $less['location']);
        array_push($lessions['cijena'], $less['price']);
        array_push($lessions['opis'], $less['short_desc']);
    }
}


?>
<!-- ispiši naslov kursa i njegove opcije -->
<div id="mainWrapperTabsWrapperHeader">
    <div id="nameOfCourse">
        <h4 id="fullCourseNameee"><?php echo strtoupper($course->getSingleCourseName($courseID)); ?></h4>
        <p id="thisCourseUniqueID" style="display:none;"><?php echo $courseID; ?></p>
    </div>
    
    <div class="mainWrapperTabsWrapperHeaderOption" onclick="move('courses')" id="mainWrapperTabsWrapperHeaderOption0">
        <p>LEKCIJE</p>
    </div>
    
    <div class="mainWrapperTabsWrapperHeaderOption" onclick="move('reservation', 'fullCourse')" id="mainWrapperTabsWrapperHeaderOption1">
        <p>REZERVIŠI CIJELI KURS</p>
    </div>
</div>
<div id="tabsCourses" class="hugeTabs">
<?php 

for($i=0; $i<count($lessions['datum']);$i++){ ?>
    <div class="tabsCoursesCourseOne" style="margin-top:20px;">
        <div class="tabsCoursesCourseOneHeader">
            <h4><?php echo strtoupper($lessions['naslov'][$i]); ?></h4>
        </div>
        <div class="tabsCoursesCourseOneDet">
            <div class="tabsCoursesCourseOneDetDetail tabsCoursesCourseOneDetDetail1" title="Trajanje lekcije">
                <img src="courses/icons/clock.png"></img>
                <p><?php echo $lessions['trajanje'][$i]; ?></p>
            </div>
            <div class="tabsCoursesCourseOneDetDetail tabsCoursesCourseOneDetDetail2" title="Datum održavanja lekcije">
                <i class="fa fa-calendar"></i>
                <p><?php echo $lessions['datum'][$i]; ?></p>
            </div>
            <div class="tabsCoursesCourseOneDetDetail tabsCoursesCourseOneDetDetail3" title="Lokacija">
                <i class="fa fa-location-arrow"></i>
                <p><?php echo $lessions['lokacija'][$i]; ?></p>
            </div>
            <div class="tabsCoursesCourseOneDetDetail tabsCoursesCourseOneDetDetail4" title="Cijena ">
                <i class="fa fa-credit-card"></i>
                <p><?php echo $lessions['cijena'][$i]; ?></p>
            </div>
            <!--
            <div class="moreArrow">
                <i class="fa fa-plus" title="Više" onclick="showCourse('<?php echo $i; ?>');"></i>
                <i class="fa fa-minus" onclick="hideCourses('<?php echo $i; ?>');"></i>
            </div> -->
        </div>
        <div class="tabsCoursesCourseOneDesc">
            <p>
                <?php echo $lessions['opis'][$i]; ?>
            </p>
        </div>
        
        <div class="tabsCoursesCourseOneReservation" onclick="move('reservation', '<?php echo $lessions['naslov'][$i]; ?>', '<?php echo $lessions['id'][$i]; ?>')">
            <div class="tabsCoursesCourseOneReservationButton">
                <p>REZERVIŠI LEKCIJU</p>
            </div>
        </div>
        
    </div>
<?php }

?>
</div>

<div id="secondHugeTab" class="hugeTabs hugeTabs2">
    <div class="hugeTabForm">
        <div class="hugeTabFormHeader" id="reservationName">
            <h4>
                <?php echo $course->getSingleCourseName($courseID); ?>
            </h4>
        </div> 
        <div class="hugeTabFormBody">
            <div class="hugeTabFormBodynameOf">
                <p>Ime i prezime</p>
            </div>
            <div class="hugeTabFormBodyInput">
                <input type="text" id="reservationNamee"/>
            </div>
            
            <div class="hugeTabFormBodynameOf">
                <p>Email</p>
            </div>
            <div class="hugeTabFormBodyInput">
                <input type="text" id="reservationMail"/>
            </div>
            
            <div class="hugeTabFormBodynameOf">
                <p>Broj telefona</p>
            </div>
            <div class="hugeTabFormBodyInput">
                <input type="text" id="reservationPhone"/>
            </div>
            
            <div class="hugeTabFormBodynameOf">
                <p>Ime jednog roditelja</p>
            </div>
            <div class="hugeTabFormBodyInput">
                <input type="text" id="reservationParent"/>
            </div>
            
            <div class="hugeTabFormBodynameOf">
                <p>Adresa</p>
            </div>
            <div class="hugeTabFormBodyInput">
                <input type="text" id="reservationAdress"/>
            </div>
            <div class="hugeTabFormBodyInput hugeTabFormBodySubmit">
                <div class="hugeTabFormBodySubmitSubmit" onclick="makeReservation();">
                    <p>REZERVIŠI</p>
                </div>
            </div>
            
            <div class="hugeTabFormBodyInput">
                <input type="hidden" name=""/>
            </div>
    </div>
</div>