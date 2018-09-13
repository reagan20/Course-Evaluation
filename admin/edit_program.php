<?php
require_once('../config/dbconnect.php');
$program_id=$_GET['id'];
if(isset($_POST['update'])){
    $program=$_POST['program_name'];
    $dept=$_POST['dept_name'];

    $sql="UPDATE programmes SET dept_id='$dept',program_name='$program' WHERE program_id='$program_id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "<script> alert('Program Successfully Updated.');window.location.href='programmes.php'  </script> ";
    }
    else{
        echo "<script> alert('Failed.!! Kindly Check Internet Connection.');window.location.href='programmes.php'  </script> ";
    }
}
?>