<?php

class Date{
    public $_pdo, $_query, $_day=null, $_month=null, $_year=null, $_numberOfViews;
    public function __construct($day = null, $month = null, $year = null, $ip = null, $ip2 = null){
        $this->_pdo = DB::getInstance();
        if($day == null) return;
        $this->_query = $this->_pdo -> query("views");
        while($dayy = $this->_query -> fetch()){
            if($dayy['day'] == $day and $dayy['month'] == $month and $dayy['year'] == $year){
                $this->_day = $day;
                $this->_month = $month;
                $this->_year = $year;
                $this->_numberOfViews = $dayy['numOfViews'];
                $this->_numberOfViews++;
                break;
            }
        }
        if(!$this->arewe($ip, $ip2)){
            if(!$this->_day){
                $number = 1;
                $insert = "INSERT INTO `views`(`day`,`month`,`year`,`numOfViews`) VALUES ('{$day}','{$month}','{$year}','{$number}')";
                $this->_pdo->insert($insert);
            }else{
                $update = "UPDATE `views` SET `numOfViews` = '{$this->_numberOfViews}' WHERE day = $this->_day AND month = $this->_month ";
                $this->_pdo->insert($update);
            }   
        }
    }
    
    public function arewe($ip, $ip2){
        $this->_query = $this->_pdo -> query("ourips");
        while($we = $this->_query -> fetch()){
            if($we['ip'] == $ip || $we['ip'] == $ip2 || $we['ip2'] == $ip || $we['ip2'] == $ip2){
                return true;
            }
        }return false;
    }
    public function days($month){
        $date = array();
        $this->_query = $this->_pdo -> query("views");
        while($day = $this->_query -> fetch()){
            if($day['month'] == $month){
                array_push($date, $day['day'], $day['numOfViews']);
            }
        }
        return $date;
    }

    public function numOfViews(){
        $views = 0;
        $this->_query = $this->_pdo -> query("views");
        while($view = $this->_query -> fetch()){
            $views += $view['numOfViews'];
        }
        return $views;
    }

}