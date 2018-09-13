<?php
require_once('../config/dbconnect.php');
$pf_number=$_GET['id'];
if(isset($_POST['update'])){
    $title=$_POST['title'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $pf_no=$_POST['pf_no'];
    $role=$_POST['role'];
    $email=$_POST['email'];
    $school=$_POST['school'];
    $dept=$_POST['department'];

    $sql="UPDATE lecturers SET title='$title',firstname='$fname',lastname='$lname',pf_number='$pf_no',role_id='$role',mail='$email',dept_id='$dept',school_id='$school' WHERE pf_number='$pf_number'";
    $query=mysqli_query($conn,$sql);
    $login=$conn->query("UPDATE login SET username='$pf_no' WHERE username='$pf_number'");
    if($query){
        echo "<script> alert('Data Successfully Updated');window.location.href='staffs'  </script> ";
    }
    else{
        echo "<script> alert('Editing failed!!');window.location.href='staffs'  </script> ";
        //  echo mysqli_error($conn);
    }
}

?>