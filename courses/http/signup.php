<?php
require '../../class/db.php';
require '../../class/courses.php';
require '../../class/user.php';

$whatToSign = $_POST['whatToSign'];
$name = $_POST['name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$parent = $_POST['parent'];
$adress = $_POST['adress'];
$lessonID = $_POST['lessonID'];
$courseID = $_POST['courseID'];
$schoolName = $_POST['schoolName'];

$user = new User();
echo $span = $user->insert($mail, $name, $phone, $parent, $adress, $schoolName);
$userID = $user->lastID();
if($span == 7){
    if(!$whatToSign){
        //sign up for whole fucking course
        $courseRequest = new courseRequest();
        $courseRequest->insert($courseID, $userID);
        
    }else{
        //sign up for lesson
        $lessonRequest = new lessonRequest();
        $lessonRequest -> insert($lessonID, $userID);
    }    
}

