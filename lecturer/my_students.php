<?php require_once('include/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM stude_course_lec WHERE reg_number='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        echo "<script> alert('Student Successfully removed.');window.location.href='dashboard'  </script> ";
        //$msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Student successfully removed.</div>";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>

<?php require_once('include/header4.php'); ?>

<?php $get_id=$_GET['id2'];?>

<div class="wraper container-fluid">

    <div class="row">

        <?php require_once('nav.php');?>

        <div class="col-md-9">
            <div class="page-title">
                <h3 class="title">
                    <a class="btn btn-primary" href="select_course"><i class="fa fa-backward"></i> Back</a>
                    <?php
                    $sql4="SELECT * FROM
            evaluation.stude_course_lec
            INNER JOIN evaluation.students
                ON (stude_course_lec.reg_number = students.reg_number)
            INNER JOIN evaluation.lecturers
                ON (stude_course_lec.pf_number = lecturers.pf_number)
            INNER JOIN evaluation.course
                ON (stude_course_lec.course_code = course.course_code) WHERE stude_course_lec.pf_number='$pf' AND stude_course_lec.course_code='$get_id'";
                    $qry=mysqli_query($conn,$sql4);
                    $c=mysqli_num_rows($qry);
                    if($c>0){
                        ?>
                        <a class="btn btn-default" href="class_attendance<?php echo '?id2='.$get_id; ?>">Mark Attendance <i class="fa fa-ticket"></i></a>
                        <?php
                    }
                    else{
                        ?>
                        <button class="btn btn-default" href="" disabled>Mark Attendance <i class="fa fa-ticket"></i></button>
                        <?php
                    }
                    ?>
                    <a class="btn btn-danger" target="_blank" href="student_listpdf<?php echo '?id2='.$get_id; ?>">Export PDF <i class="fa fa-sign-out"></i></a>
                </h3>
            </div>
            <div class="panel panel-color panel-info">
                <div class="panel-heading">
                    <i class="fa fa-book"></i> My Students List
                </div>
                <div class="panel-body">
                    <div>
                        <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr style="color: dodgerblue;">
                                        <th><strong>S/N</strong></th>
                                        <!--<th><strong>Profile</strong></th>-->
                                        <th><strong>Reg. No.</strong></th>
                                        <th><strong>Full Name</strong></th>
                                        <th><strong>Phone</strong></th>
                                        <th><strong>Email</strong></th>
<!--                                        <th><strong>Action</strong></th>-->
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql4="SELECT * FROM
                                        evaluation.stude_course_lec
                                        INNER JOIN evaluation.students
                                            ON (stude_course_lec.reg_number = students.reg_number)
                                        INNER JOIN evaluation.lecturers
                                            ON (stude_course_lec.pf_number = lecturers.pf_number)
                                        INNER JOIN evaluation.course
                                            ON (stude_course_lec.course_code = course.course_code) WHERE stude_course_lec.pf_number='$pf' AND stude_course_lec.course_code='$get_id'";
                                    $qry=mysqli_query($conn,$sql4);
                                    $c=mysqli_num_rows($qry);
                                    $count=1;
                                    if($c>0){
                                    while($row4=mysqli_fetch_assoc($qry)){
                                     $m=$row4['email'];
                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <!--<td><?php //echo $row4['passport']; ?></td>-->
                                            <td><?php echo $row4['reg_number']; ?></td>
                                            <td><?php echo $row4['fname'].' &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row4['lname']; ?></td>
                                            <td><?php echo $row4['phone']; ?></td>
                                            <td><?php echo $m; ?></td>
<!--                                            <td>-->
<!--                                                <a class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Sure to remove the student from this course!?')"-->
<!--                                                   href="?action=transview&id=--><?php //echo $row4['reg_number']?><!--&act=delete">Remove</a>-->
<!--                                            </td>-->

                                        </tr>

                                        <?php
                                        $count++;
                                    }
                                    }
                                    else{
                                     echo "nothing here";
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
    </div>

</div>
<!-- Footer Start -->
<footer class="footer" style="text-align: center;">
    <strong>MMUST COURSE EVALUATION SYSTEM &copy; <?php echo date('Y')?> DESIGNED BY: OTIENO REAGAN</strong>
</footer>
<!-- Footer Ends -->

</section>
<!-- Main Content Ends -->

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
