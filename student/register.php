<?php require_once('include/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM stude_course_lec WHERE course_code='$x' AND reg_number='$reg'";
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
                <h4 class="title"><i class="fa fa-book"></i> Course Registration</h4>
            </div>
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"></div>
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
                                <?php
                                if(isset($_POST['register'])){
                                    for($i=0; $i<count($_POST['checked']); $i++){
                                        $lec=$_POST['lecturer'][$i];
                                        $details= $_POST['checked'][$i];
                                        $record= $conn->query("INSERT INTO stude_course_lec (reg_number,pf_number,course_code) VALUES ('$reg','$lec','$details')");
                                    }
                                    echo "<div class='alert alert-success'>
                                    <button class='close' data-dismiss='alert'>&times;</button>
                                    Congratulations. You have registered units. </div>";
                                }

                                ?>
                                <form method="post">

                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th><strong>S/N</strong></th>
                                            <th>Check</th>
                                            <th><strong>Course Code</strong></th>
                                            <th><strong>Course Name</strong></th>
                                            <th><strong>Academic Year</strong></th>
                                            <th><strong>Semester</strong></th>
                                            <th><strong>Status</strong></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $lec_course=$conn->query("SELECT * FROM lec_course WHERE program_id='$programme' AND year_id='$academic_year' AND level='$level' AND sem_id='$semester' ");
                                        $count=1;
                                        while($row=mysqli_fetch_assoc($lec_course)){
                                            $lec_id=$row['pf_number'];
                                            $lec_co=$row['course_code'];
                                            $course=mysqli_fetch_assoc($conn->query("SELECT * FROM course WHERE program_id='$row[program_id]' AND course_code='$lec_co'"));
                                            $semester=mysqli_fetch_assoc($conn->query("SELECT * FROM semester WHERE sem_id='$row[sem_id]'"));
                                            $year=mysqli_fetch_assoc($conn->query("SELECT * FROM academic_year WHERE year_id='$row[year_id]'"));
                                            $level=mysqli_fetch_assoc($conn->query("SELECT * FROM levels WHERE level_id='$row[level]'"));
                                            ?>
                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php
                                                    $stmt1=$conn->query("SELECT * FROM stude_course_lec WHERE reg_number='$reg' AND course_code='$lec_co'");
                                                    $count1=$stmt1->num_rows;
                                                    if($count1>0){
                                                        ?>
                                                        <!-- no check boxes-->
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <input type="checkbox" name="checked[]" value="<?php echo $row['course_code']; ?>" class="form-control">
                                                        <input type="text" name="lecturer[]" value="<?php echo $lec_id; ?>" class="form-control" style="display: none">
                                                        <?php
                                                    }
                                                    ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                <td><?php echo $course['course_name']; ?></td>
                                                <td><?php echo $year['year_name'];?></td>
                                                <td><?php echo $semester['sem_name']; ?></td>
                                                <td>
                                                    <?php
                                                    $stmt=$conn->query("SELECT * FROM stude_course_lec WHERE reg_number='$reg' AND course_code='$lec_co'");
                                                    $row=$stmt->fetch_array();
                                                    $count2=$stmt->num_rows;
                                                    if($count2==1){
                                                        ?>
                                                        <a class="btn btn-sm btn-warning"> Already registered</a>
                                                        <a class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Sure to remove this course from your list..!?')"
                                                           href="?action=transview&id=<?php echo $row['course_code']?>&act=delete">Remove</a>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <a class="btn btn-sm btn-info"> Register Course</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                    <button type="submit" name="register" class="btn btn-success"><i class="fa fa-send-o"></i> Register Now</button>
                                </form>
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
    &copy; <strong><?php echo date('Y')?> MMUST Course Evaluation Syatem.</strong>
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
