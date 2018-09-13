<?php require_once('include/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM lec_course WHERE course_code='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Course successfully deleted.</div>";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>

<?php require_once('include/header5.php'); ?>

<div class="wraper container-fluid">
    <div class="page-title">
        <h4 class="title"></h4>
    </div>

    <div class="row">
        <?php require_once('nav.php');?>
        <div class="col-md-9">
            <div class="page-title">
                <h4 class="title"><i class="fa fa-book"></i> Evaluate Courses.</h4>
            </div>
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        $sql4=$conn->query("SELECT
                                    stude_course_lec.reg_number
                                    , stude_course_lec.pf_number
                                    , stude_course_lec.course_code
                                    , course.course_name
                                    , academic_year.year_name
                                    , semester.sem_name
                                FROM
                                    evaluation.stude_course_lec
                                    INNER JOIN evaluation.course
                                        ON (stude_course_lec.course_code = course.course_code)
                                    INNER JOIN evaluation.semester
                                        ON (course.sem_id = semester.sem_id)
                                    INNER JOIN evaluation.academic_year
                                        ON (semester.year_id = academic_year.year_id) WHERE stude_course_lec.reg_number='$reg'");
                        while($row4=mysqli_fetch_assoc($sql4)){
                            $course_id=$row4['course_code'];
                            ?>

                            <div class="col-md-4">
                                <div class="well well-sm">
                                    <div align="center">
                                        <a href=""><span class="fa fa-graduation-cap" style="font-size:30px;color: green;"></span></a><hr>
                                        <small class="badge badge-success"><?php echo $course_id;?></small>
                                        <h5><?php echo $row4['course_name'];?></h5>
                                        <h4>

                                            <?php
                                            $check_session=$conn->query("SELECT * FROM evaluation_dates WHERE status='1'");
                                            $cnt=$check_session->num_rows;
                                            if($cnt>0){
                                                $stm=$conn->query("SELECT * FROM tbl_evaluation WHERE reg_number='$reg' AND course_code='$course_id'");
                                                //$r=$stm->fetch_array();

                                                $count_present=mysqli_fetch_assoc($conn->query("SELECT COUNT(attend) AS present FROM attendance WHERE attend='1' AND course_code='$course_id' AND reg_number='$reg'"));

                                                $count_absent=mysqli_fetch_assoc($conn->query("SELECT COUNT(attend) AS absent FROM attendance WHERE attend='0' AND course_code='$course_id' AND reg_number='$reg'"));

                                                $total_lectures=$count_present['present']+$count_absent['absent'];
                                                if($total_lectures>0){

                                                    $attendance_percentage=($count_present['present']/$total_lectures)*100;
                                                    $attend_round=round($attendance_percentage,0);

                                                    $c=$stm->num_rows;
                                                    if($c==0 AND $attend_round>=75){
                                                        ?>
                                                        <a class="btn btn-primary" href="evaluate_course<?php echo '?id=' . $course_id; ?>">Evaluate Course <i class="fa fa-arrow-right"></i></a>
                                                        <?php
                                                    }
                                                    elseif($c==0 AND $attend_round < 75){
                                                        ?>
                                                        <button class="btn btn-warning" disabled>Attendance below required % <i class="fa fa-warning"></i></button>
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <button class="btn btn-sm btn-success" disabled>Already Evaluated <i class="fa fa-save"></i></button>
                                                        <?php
                                                    }

                                                }
                                                else{

                                                }




                                            }
                                            else{
                                                    ?>
                                                    <button class="btn btn-default" disabled>EVALUATION SESSION CLOSED</button>
                                                    <?php

                                                }
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Footer Start -->
<footer class="footer" style="text-align: center;">
    &copy; <strong><?php echo date('Y')?> MMUST Course Evaluation Syatem.</strong>
</footer>
<!-- Footer Ends -->
<!-- js placed at the end of the document so the pages load faster -->
<script src="../admin/js/jquery.js"></script>
<script src="../admin/js/bootstrap.min.js"></script>
<script src="../admin/js/modernizr.min.js"></script>
<script src="../admin/js/pace.min.js"></script>
<script src="../admin/js/wow.min.js"></script>
<script src="../admin/js/jquery.scrollTo.min.js"></script>
<script src="../admin/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../admin/assets/chat/moment-2.2.1.js"></script>

<!-- Counter-up -->
<script src="../admin/js/waypoints.min.js" type="text/javascript"></script>
<script src="../admin/js/jquery.counterup.min.js" type="text/javascript"></script>

<!-- EASY PIE CHART JS -->
<script src="../admin/assets/easypie-chart/easypiechart.min.js"></script>
<script src="../admin/assets/easypie-chart/jquery.easypiechart.min.js"></script>
<script src="../admin/assets/easypie-chart/example.js"></script>


<!--C3 Chart-->
<script src="../admin/assets/c3-chart/d3.v3.min.js"></script>
<script src="../admin/assets/c3-chart/c3.js"></script>

<!--Morris Chart-->
<script src="../admin/assets/morris/morris.min.js"></script>
<script src="../admin/assets/morris/raphael.min.js"></script>

<!-- sparkline -->
<script src="../admin/assets/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="../admin/assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script>

<!-- sweet alerts -->
<script src="../admin/assets/sweet-alert/sweet-alert.min.js"></script>
<script src="../admin/assets/sweet-alert/sweet-alert.init.js"></script>

<script src="../admin/js/jquery.app.js"></script>
<!-- Chat -->
<script src="../admin/js/jquery.chat.js"></script>
<!-- Dashboard -->
<script src="../admin/js/jquery.dashboard.js"></script>

<!-- Todo -->
<script src="../admin/js/jquery.todo.js"></script>

<script src="../admin/assets/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/assets/datatables/dataTables.bootstrap.js"></script>

<script src="../admin/js/loader.js"></script>
<script type="text/javascript">

    /* ==============================================
     Counter Up
     =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>

</html>
