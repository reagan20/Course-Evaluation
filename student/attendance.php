<?php
require_once('include/side_bar.php');
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
                <h4 class="title"><i class="fa fa-book"></i> Lectures Attendance. <a class="btn btn-sm btn-danger">Export PDF <i class="fa fa-sign-out"></i></a></h4>
            </div>
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="row">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th><strong>S/N</strong></th>
                                <th><strong>Course Title</strong></th>
                                <th><strong>Course Code</strong></th>
                                <th><strong>Attended</strong></th>
                                <th><strong>Missed</strong></th>
                                <th><strong>Total</strong></th>
                                <th><strong>Attendance(%)</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $attendance=$conn->query("SELECT * FROM attendance WHERE reg_number='$reg' GROUP BY course_code");
                            $count=1;
                            while($row=mysqli_fetch_assoc($attendance)){
                                $course_details=mysqli_fetch_assoc($conn->query("SELECT * FROM course WHERE course_code='$row[course_code]'"));

                                $student_details=mysqli_fetch_assoc($conn->query("SELECT * FROM students WHERE reg_number='$row[reg_number]'"));

                                $count_present=mysqli_fetch_assoc($conn->query("SELECT COUNT(attend) AS present FROM attendance WHERE attend='1' AND course_code='$row[course_code]' AND reg_number='$row[reg_number]'"));

                                $count_absent=mysqli_fetch_assoc($conn->query("SELECT COUNT(attend) AS absent FROM attendance WHERE attend='0' AND course_code='$row[course_code]' AND reg_number='$row[reg_number]'"));
                                $total_lectures=$count_present['present']+$count_absent['absent'];
                                $attendance_percentage=($count_present['present']/$total_lectures)*100;
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $course_details['course_name'];?></td>
                                    <td><?php echo $row['course_code'];?></td>
                                    <td><?php echo $count_present['present'];?></td>
                                    <td><?php echo $count_absent['absent'];?></td>
                                    <td><?php echo $total_lectures;?></td>
                                    <td><?php echo round($attendance_percentage);?></td>
                                </tr>
                            <?php
                                $count++;
                            }
                            ?>

                            </tbody>
                        </table>
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
