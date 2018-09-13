<?php
require_once('../config/dbconnect.php');
    if(isset($_POST['submit'])){
        $ans1 = $_POST['1'];
        $ans2 = $_POST['2'];
        $ans3 = $_POST['3'];
        /*$ans4 = $_POST['4'];
        $ans5 = $_POST['5'];
        $ans6 = $_POST['6'];
        $ans7= $_POST['7'];
        $ans8 = $_POST['8'];
        $ans9 = $_POST['9'];
        $ans10 = $_POST['10'];
        $ans11 = $_POST['11'];
        $ans12= $_POST['12'];
        $ans13 = $_POST['13'];
        $ans14 = $_POST['14'];*/

        echo 'question1 answer is '.$ans1.' question2 answer is '.$ans2.' question3 answer is '.$ans3;
    }else{
        echo ' i am not set';
    }


?>