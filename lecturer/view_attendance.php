<?php
require_once('include/side_bar.php');
?>

<?php require_once('include/header4.php'); ?>

<div class="wraper container-fluid">
    <div class="row">

        <?php require_once('nav.php');?>

        <div class="col-md-10">
            <div class="page-title">
                <h4 class="title">Class Attendance Report.</h4>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-7">
                                <select id="filter_students" onchange="getData(this)" class="form-control" data-live-search style="height: 50px; text-align: center;" name="filter_course">
                                    <option value="">~~Select Course~~</option>
                                    <?php
                                    $stmt=$conn->query("SELECT
                                    course.course_name
                                    , stude_course_lec.course_code
                                    FROM
                                    evaluation.stude_course_lec
                                    INNER JOIN evaluation.course
                                        ON (stude_course_lec.course_code = course.course_code) WHERE pf_number='$pf' GROUP BY stude_course_lec.course_code");
                                    while($row=mysqli_fetch_assoc($stmt)){
                                        ?>
                                        <option value="<?php echo $row['course_code'];?>" style="height: 30px;"><?php echo $row['course_name'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div><br/>
            <div class="row">
                <div class="col-md-11">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <!--<i class="fa fa-book"></i> My Students List-->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr style="color: dodgerblue;">
                                                <th><strong>S/N</strong></th>
                                                <th><strong>Reg. No.</strong></th>
                                                <th><strong>Full Name</strong></th>
                                                <th><strong>Course Code</strong></th>
                                                <th><strong>Present Times</strong></th>
                                                <th><strong>Absent Times</strong></th>
                                                <th><strong>Attendance(%)</strong></th>
                                            </tr>
                                            </thead>

                                            <tbody id="getStudents">

                                            </tbody>
                                        </table>
                                    </div>
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

<script>
    function getData(e){
        var course_code= e.value;
        //alert(course_code);

        $.ajax({
            url: 'attendance_query.php',
            type: 'POST',
            data: 'id='+course_code,
            cache: false,
            success: function(html){
                $('#getStudents').html(html);
            }
        });
    }
</script>

</body>

</html>
