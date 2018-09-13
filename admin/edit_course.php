<?php
require_once('../config/dbconnect.php');
$course_id=$_GET['id'];
if(isset($_POST['update'])){
    $program=$_POST['program'];
    $level=$_POST['level'];
    $sem=$_POST['semester'];
    $code=$_POST['code'];
    $name=$_POST['name'];
    $category=$_POST['category'];

    $sql="UPDATE course SET program_id='$program',level_id='$level',sem_id='$sem',course_code='$code',course_name='$name',category='$category' WHERE course_code='$course_id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "<script> alert('Data Successfully Updated');window.location.href='courses'  </script> ";
    }
    else{
        echo "<script> alert('Error in connection');window.location.href='courses'  </script> ";
        //  echo mysqli_error($conn);
    }
}

?>