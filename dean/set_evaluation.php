<?php
require_once('../config/dbconnect.php');
$set_date=$_GET['id'];
if(isset($_POST['set_date'])){
    $academic_year=$_POST['academic_year'];
    $sem=$_POST['sem'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    $status=$_POST['status'];

    $update=$conn->query("UPDATE evaluation_dates SET year_id='$academic_year', sem_id='$sem', start_date='$start_date', end_date='$end_date',status='$status' WHERE evaluation_id='$set_date'");
    if($update){
        echo "<script>alert('Evaluation date successfully updated'); window.location.href='evaluationdates'</script>";
    }
    else{
        echo "<script>alert('Update failed please try again later.!'); window.location.href='evaluationdates'</script>";
    }
}
?>