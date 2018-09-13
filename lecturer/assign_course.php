<?php require_once('../config/dbconnect.php');
if(isset($_POST['save'])){
    $reg=$_POST['reg'];
    $pf=$_POST['pf'];
    $code=$_POST['code'];

    $s=$conn->query("SELECT * FROM stude_course_lec WHERE reg_number='$reg' AND course_code='$code'");
    $count=mysqli_num_rows($s);
    if($count==1){
        echo "<script> alert('Student already assigned this course.');window.location.href='dashboard'  </script> ";
    }
    else{
        $stmt=$conn->query("INSERT INTO stude_course_lec(reg_number,pf_number,course_code) VALUES ('$reg','$pf','$code')");
        if($stmt){
            echo "<script> alert('Course Successfully assigned.');window.location.href='dashboard'  </script> ";
        }
        else{
            echo "<script> alert('Failed!!');window.location.href='dashboard'  </script> ";
        }
    }
}
?>