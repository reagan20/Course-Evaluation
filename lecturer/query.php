<?php
require_once('../config/dbconnect.php');
session_start();
if($_POST['id'] == '')
{
/*if no course selected*/
}
else
{
    $total_students=mysqli_fetch_assoc($conn->query("SELECT COUNT(DISTINCT reg_number) AS total_students FROM evaluation.tbl_evaluation WHERE course_code='$_POST[id]' AND pf_number='$_SESSION[lecturer]'"));

    $stmt1=$conn->query("SELECT
                    tbl_evaluation.quiz_id
                    , tbl_questions.quiz_desc
                FROM
                    evaluation.tbl_evaluation
                    INNER JOIN evaluation.tbl_questions
                        ON (tbl_evaluation.quiz_id = tbl_questions.quiz_id) WHERE pf_number='$_SESSION[lecturer]' AND course_code='$_POST[id]' GROUP BY quiz_id");
    while($row1=mysqli_fetch_assoc($stmt1)){
        ?>

        <tr>
            <td><?php echo $row1['quiz_id'];?></td>
            <td><?php echo $row1['quiz_desc'];?></td>
            <td>
                <?php
                $query=mysqli_fetch_assoc($conn->query("SELECT SUM(marks) AS test FROM evaluation.tbl_evaluation WHERE quiz_id='$row1[quiz_id]' AND course_code='$_POST[id]'"));
                //echo $query['test'];
                $percent=($query['test']/($total_students['total_students']*5))*100;
                //echo $percent;
                echo round($percent,0);
                ?>
            </td>
        </tr>

        <?php
    }
}
//echo"hello";
?>