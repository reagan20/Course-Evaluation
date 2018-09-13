<?php
require_once('../config/dbconnect.php');
$user_id=$_GET['id'];
if(isset($_POST['update'])){
    $fname=$_POST['fname'];
    //$mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $regno=$_POST['regno'];
    $gender=$_POST['gender'];
    $role=$_POST['role'];
    $email=$_POST['email'];
    $dept=$_POST['department'];

    $sql="UPDATE students SET fname='$fname',lname='$lname',reg_number='$regno',gender='$gender',role_id='$role',email='$email',dept_id='$dept' WHERE reg_number='$user_id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "<script> alert('Data Successfully Updated');window.location.href='students'  </script> ";
    }
    else{
        echo "<script> alert('Error in connection');window.location.href='students'  </script> ";
        //  echo mysqli_error($conn);
    }
}

?>