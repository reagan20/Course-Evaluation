<?php
require_once('../config/dbconnect.php');
session_start();

//echo "hello";
if($_POST['id']==''){

}
else{

    $stmt1=$conn->query("SELECT * FROM attendance WHERE pf_number='$_SESSION[lecturer]' AND course_code='$_POST[id]' GROUP BY reg_number");
    $count=1;
    while($row1=mysqli_fetch_assoc($stmt1)){
        $stmt2=mysqli_fetch_assoc($conn->query("SELECT * FROM students WHERE reg_number='$row1[reg_number]'"));

        $count_present=mysqli_fetch_assoc($conn->query("SELECT COUNT(attend) AS present FROM attendance WHERE attend='1' AND course_code='$row1[course_code]' AND reg_number='$row1[reg_number]'"));

        $count_absent=mysqli_fetch_assoc($conn->query("SELECT COUNT(attend) AS absent FROM attendance WHERE attend='0' AND course_code='$row1[course_code]' AND reg_number='$row1[reg_number]'"));
        $full_name=$stmt2['fname'].' '.$stmt2['lname'];
        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $row1['reg_number'];?></td>
            <td><?php echo $full_name;?></td>
            <td><?php echo $row1['course_code'];?></td>
            <td><?php echo $count_present['present'];?></td>
            <td><?php echo $count_absent['absent'];?></td>
            <td>
                <?php
                $total_lectures=$count_present['present']+$count_absent['absent'];
                $attendance_per=($count_present['present']/$total_lectures)*100;
                echo round($attendance_per,0);

                ?>
            </td>
        </tr>
    <?php
        $count++;
    }
}

?>