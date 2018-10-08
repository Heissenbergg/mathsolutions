<?php

class Course{
    private $_pdo, $_query, $_course_name, $_course_category;
    public $_courseNames = array(), $_courseIDs = array();
    
    public function __construct(){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("courses");
    }
    
    public function getCourses(){
        while($course = $this->_query -> fetch()){
            array_push($this->_courseNames, $course['name_of_course']);
            array_push($this->_courseIDs, $course['id']);
        }
    }
    public function getCouseCat($id){
        $this->_query = $this->_pdo -> query("courses");
        while($course = $this->_query -> fetch()){
            if($course['id'] ==  $id) {
                $this->_course_category = $course['category'];
                return $this->_course_category;
            }
        }
    }
    
    public function getCoursesLength(){
        return count($this->_courseNames);
    }
    public function getCourseName($index){
        return $this->_courseNames[$index];
    }
    public function getCourseId($index){
        return $this->_courseIDs[$index];
    }
    
    public function getSingleCourseName($id){
        $this->_query = $this->_pdo -> query("courses");
        while($course = $this->_query -> fetch()){
            if($course['id'] ==  $id) return $course['name_of_course'];
        }
    }
    
    public function firstID(){
        $this->_query = $this->_pdo -> query("courses");
        while($course = $this->_query -> fetch()){
            return $course['id'];
        }
    }
    
}


class Lessions{
    private $_pdo, $_query, $_lessionsID = array(), $_courseID, $_icon = array(),
            $_name = array(), $_duration = array(), $_date = array(), $_location = array(),
            $_price = array(), $_shortDesc = array(), $_teach1 = array(), $_teach2 = array(), $_teach3 = array();
    
    public $_courseNames = array(), $_courseIDs = array();
    
    public function __construct(){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("lessons");
    }
    
    public function getLessons($courseID){
        while($les = $this->_query->fetch()){
            if($les['courseID'] == $courseID){
                array_push($this->_lessionsID, $les['id']);
                $this->_courseID = $les['courseID'];
                array_push($this->_icon, $les['icon']);
                array_push($this->_name, $les['name']);
                array_push($this->_duration, $les['duration']);
                array_push($this->_date, $les['date']);
                array_push($this->_location, $les['location']);
                array_push($this->_price, $les['price']);
                array_push($this->_shortDesc, $les['short_desc']);
                array_push($this->_teach1, $les['teach1']);
                array_push($this->_teach2, $les['teach2']);
                array_push($this->_teach3, $les['teach3']);
            }
        }
    }
    
    public function getLessonsLength(){return count($this->_lessionsID);}
    
    public function getLessionID($index){return $this->_lessionsID[$index];}
    public function getCourseID(){return $this->_courseID;}
    public function getIcon($index){return $this->_icon[$index];}
    public function getName($index){return $this->_name[$index];}
    public function getDuration($index){return $this->_duration[$index];}
    public function getDate($index){return $this->_date[$index];}
    public function getLocation($index){return $this->_location[$index];}
    public function getPrice($index){return $this->_price[$index];}
    public function getShortDesc($index){return $this->_shortDesc[$index];}
    public function getTeachOne($index){return $this->_teach1[$index];}
    public function getTeachTwo($index){return $this->_teach2[$index];}
    public function getTeachThree($index){return $this->_teach3[$index];}
}


class courseRequest{
    private $_pdo, $_query, $_request_id, $_request_course_id, $_request_user_id, $_total = 0;
    //public $_courseRequests = array();
    
    public function __construct(){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("courseRequest");
    }
    
    public function insert($course_id, $user_id){
        $this->_pdo -> action("INSERT into `courseRequest` (`course_id`,`user_id`) VALUES ('{$course_id}','{$user_id}') ");
    }
    
    public function total($id){
        $this->_query = $this->_pdo -> query("courseRequest");
        
        while($req = $this->_query -> fetch()){
            if($req['course_id'] == $id){
                $this->_total ++;
            }
        }
        
        return $this->_total;
    }
}


class lessonRequest{
    private $_pdo, $_query, $_request_id, $_request_lesson_id, $_request_user_id, $_total = 0;
    
    public function __construct(){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("lessonsRequest");
    }
    
    public function insert($course_id, $user_id){
        $this->_pdo -> action("INSERT into `lessonsRequest` (`lesson_id`,`user_id`) VALUES ('{$course_id}','{$user_id}') ");
    }
    
    public function total($id){
        $this->_query = $this->_pdo -> query("lessonsRequest");
        $this->_total = 0;
        
        while($req = $this->_query -> fetch()){
            if($req['lesson_id'] == $id){
                $this->_total ++;
            }
        }
        
        return $this->_total;
    }
}