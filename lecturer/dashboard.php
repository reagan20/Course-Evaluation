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

<?php require_once('include/header4.php'); ?>

<div class="wraper container-fluid">
    <div class="row">

        <?php require_once('nav.php');?>

        <div class="col-md-10">
            <div class="page-title">
                <h4 class="title">LECTURER DASHBOARD</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <?php
                        $sql="SELECT * FROM lec_course WHERE pf_number='$pf'";
                        $query=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($query);
                        ?>
                        <a href="select_course"><div class="widget-panel widget-style-2 white-bg">
                                <i class="fa fa-book text-primary"></i>
                                <h2 class="m-0 counter"><?php echo $count;?></h2>
                                <div>My Courses</div>
                            </div></a>
                    </div>
                    <!--<div class="col-md-3">
                        <?php
//                        $sql="SELECT * FROM lec_course WHERE pf_number='$pf'";
//                        $query=mysqli_query($conn,$sql);
//                        $count=mysqli_num_rows($query);
                        ?>
                        <a href=""><div class="widget-panel widget-style-2 white-bg1">
                                <i class="ion-wifi text-purple"></i>
                                <h2 class="m-0 counter"><?php //echo $count;?></h2>
                                <div>Departments</div>
                            </div></a>
                    </div>-->
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading"><i class="fa fa-question-circle"></i> Guidelines</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><strong>About Course Evaluation</strong></h4><hr>
                                    <p>Course evaluation is a questionnaire that provides a means to produce useful as well as timely feedback from students
                                        on course coverage. These feedback are used by the instructors and their departments to improve the quality of instructions
                                        provided by the assigned lecturer.
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <h4><strong>Requirements</strong></h4><hr>
                                    <p>It is our lecturers' responsibility to register for the course he/she would want to take students through in a semester.
                                        Therefore the lecturer should take this first step so that the course be available for the students to register as well.</p>
                                    <ol>
                                        <li>Any registered lecturer for a particular course has to ensure he/she marks the attendance of students for that course,
                                            this will help filter those to cary the evaluation process by the end of the semester.</li>
                                        <li>Only the students who have cleared at least 80% of the total required fee amount will be able to evaluate courses they take in a semester. </li>
                                        <li>A student will only be eligible to evaluate any particular course if he/she meets at least 80% of the total class attendance of that course.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Footer Start -->
<footer class="footer" style="text-align: center;">
    <strong>MMUST COURSE EVALUATION SYSTEM &copy; <?php echo date('Y')?> DESIGNED BY: OTIENO REAGAN</strong>
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
