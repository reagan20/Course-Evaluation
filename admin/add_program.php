<?php
require_once('../config/dbconnect.php');
if(isset($_POST['submit'])){
    $program=$_POST['prog_name'];
    $program_id=$_POST['prog_id'];
    $dept=$_POST['dept_id'];
    $school=$_POST['school'];

    $sql="INSERT INTO programmes(school_id,dept_id,program_id,program_name) VALUES ('$school','$dept','$program','$program_id')";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "<script> alert('Programme Successfully Added');window.location.href='programmes'  </script> ";
    }
    else{
        echo "<script> alert('Failed.!! Kindly Check Internet Connection.');window.location.href='programmes'  </script> ";
    }
}
?>