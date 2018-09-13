<?php
require_once('../config/dbconnect.php');
$course_id=$_GET['id'];

if(isset($_POST['update'])){
    $lecturer=$_POST['lecturer'];
    $programm=$_POST['programm'];
    $course=$_POST['course'];
    $year=$_POST['year'];
    // $level=$_POST['level'];
    $sem=$_POST['sem'];

    //$check=$conn->query("SELECT * FROM lec_course");

    $sql2=$conn->query("UPDATE lec_course SET pf_number='$lecturer', program_id='$programm', course_code='$course', year_id='$year', sem_id='$sem' WHERE course_code='$course_id'");
    if($sql2){
        //echo"<script>location.reload();</script>";
        echo"<div class='alert alert-success'> <button class='close' data-dismiss='alert'>&times;</button>Changes successfully saved.</div>";
    }
    else{
        echo"<div class='alert alert-warning'> <button class='close' data-dismiss='alert'>&times;</button>Failed to save changes!!.
                                    </div>".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>