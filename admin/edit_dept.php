<?php
require_once('../config/dbconnect.php');
$dept_id=$_GET['id'];
if(isset($_POST['update'])){
    $sch=$_POST['sch_name'];
    $dept=$_POST['dept_name'];

    $sql="UPDATE departments SET school_id='$sch',dept_name='$dept' WHERE dept_id='$dept_id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "<script> alert('Data Successfully Updated');window.location.href='departments'  </script> ";
    }
    else{
        echo "<script> alert('Error in connection');window.location.href='departments'  </script> ";
        //  echo mysqli_error($conn);
    }
}

?>