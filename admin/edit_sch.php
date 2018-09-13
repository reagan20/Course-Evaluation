<?php
require_once('../config/dbconnect.php');
$sch_id=$_GET['id'];
if(isset($_POST['update'])){
    $sch=$_POST['sch_name'];

    $sql="UPDATE schools SET school_name='$sch' WHERE school_id='$sch_id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "<script> alert('Data Successfully Updated');window.location.href='schools'  </script> ";
    }
    else{
        echo "<script> alert('Error in connection');window.location.href='schools'  </script> ";
     //  echo mysqli_error($conn);
    }
}
?>