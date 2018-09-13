<?php require_once('include/side_bar.php');
$get_id=$_GET['id'];
/*$x=@$_GET['id'];
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
}*/
?>

<?php require_once('include/header5.php'); ?>

<div class="wraper container-fluid">
    <div class="page-title">
        <h4 class="title"></h4>
    </div>
    <div class="row">

        <?php require_once('nav.php');?>

    <div class="col-md-9">
        <h5><b>COURSE EVALUATION BY STUDENTS</b></h5>
        <p>This evaluation is intended to obtain your feedback in order to continue offering quality teaching/services. Please take a few minutes
        to fill in this evaluation form as objectively as you can. <strong>NOTE!!</strong> <b>Your responses are treated with confidentiality.</b></p>
    </div>
        <?php
        $stmt=$conn->query("SELECT students.reg_number ,students.gender, departments.dept_name, programmes.program_name, course.course_code
                , course.course_name,course.sem_id, academic_year.year_name, semester.sem_name,semester.sem_id, lec_course.pf_number FROM evaluation.students
                INNER JOIN evaluation.departments
                    ON (students.dept_id = departments.dept_id)
                INNER JOIN evaluation.programmes
                    ON (programmes.dept_id = departments.dept_id) AND (students.program_id = programmes.program_id)
                INNER JOIN evaluation.course
                    ON (course.program_id = programmes.program_id)
                    INNER JOIN evaluation.lec_course
                ON (lec_course.course_code=course.course_code)
                , evaluation.semester
                INNER JOIN evaluation.academic_year
              ON (semester.year_id = academic_year.year_id) WHERE students.reg_number='$reg' AND course.course_code='$get_id'
              AND semester.sem_id=course.sem_id");
        while($row=mysqli_fetch_assoc($stmt)) {
            $code = $row['course_code'];
            $pf=$row['pf_number'];
            ?>
            <div class="col-md-6" style="font-weight: bold">
                <p>
                    PROGRAMME ENROLLED: <?php echo $row['program_name']; ?></br>
                    COURSE CODE: <?php echo $code; ?></br>
                    DEPARTMENT: <?php echo $row['dept_name']; ?></br>
                    GENDER: <?php echo $gender; ?>
                </p>
            </div>
            <div class="col-md-6" style="font-weight: bold">
                <p>
                    ACADEMIC YEAR: <?php echo $row['year_name']; ?></br>
                    COURSE TITLE: <?php echo $row['course_name']; ?></br>
                    SEMESTER: <?php echo $row['sem_name']; ?>
                    SEMESTER: <?php echo $row['pf_number']; ?>
                </p>
            </div>
            <?php
        }
        ?>
        <div class="col-md-9">
            <p><b>N/B: For each item listed below, check the most appropriate response that applies to you.</b></p>
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"><i class="fa fa-book"></i> Evaluate Course</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <form method="post" action="">
                                    <?php
                                    $sql4=$conn->query("SELECT * FROM tbl_questions WHERE status=1");

                                    if(isset($_POST['evaluate'])){
                                    $count=1;
                                        while($row4=mysqli_fetch_assoc($sql4)){
                                            if(isset($_POST['a'.$count])){
                                                $rate=$_POST['a'.$count];
                                                if(!empty($rate)){
                                                    if($rate=="poor"){
                                                        $mark=1;
                                                    }
                                                    else if($rate=="fair"){
                                                        $mark=2;
                                                    }
                                                    else if($rate=="good"){
                                                        $mark=3;
                                                    }
                                                    else if($rate=="v.good"){
                                                        $mark=4;
                                                    }
                                                    else if($rate=="excellent"){
                                                        $mark=5;
                                                    }
                                                    $query=$conn->query("INSERT INTO tbl_evaluation(course_code,reg_number,pf_number,quiz_id,rate,marks) VALUES('$get_id','$reg','$pf','$count','$rate','$mark')");
                                                    if($query){
//                                                        echo"<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>Thanks for evaluating your courses. We value your feedback.</div>";
                                                        echo "<script> alert('Thanks for evaluating your courses. We value your feedback. ');window.location.href='my_courses'  </script> ";
                                                    }
                                                    else{
                                                        echo"<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button>Attendance not saved..!!</div>";
                                                    }
                                                }

                                            }
                                            $count++;
                                        }
                                    }
                                    else{
                                    ?>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th><strong>S/N</strong></th>
                                            <th><strong>The Lecturer</strong></th>
                                            <th><strong>Poor (1)</strong></th>
                                            <th><strong>Fair (2)</strong></th>
                                            <th><strong>Good (3)</strong></th>
                                            <th><strong>V. Good (4)</strong></th>
                                            <th><strong>Excellent (5)</strong></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $count = 1;
                                        while ($row4 = mysqli_fetch_assoc($sql4)) {
                                            $quiz_id = $row4['quiz_id'];
                                            ?>

                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row4['quiz_desc']; ?></td>
                                                <td>
                                                    <div class="radio">
                                                        <label><input type="radio" id="r1" name="a<?php echo $count; ?>"
                                                          required="required" value="poor"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio">
                                                        <label><input type="radio" id="r2" name="a<?php echo $count; ?>"
                                                                      required="required" value="fair"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio">
                                                        <label><input type="radio" id="r3" name="a<?php echo $count; ?>"
                                                                      required="required" value="good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio">
                                                        <label><input type="radio" id="r4" name="a<?php echo $count; ?>"
                                                                      required="required" value="v.good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio">
                                                        <label><input type="radio" id="r5" name="a<?php echo $count; ?>"
                                                                      required="required" value="excellent"></label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <?php
                                            $count++;
                                        }
                                        ?>
                                        </tbody>

                                        <button type="submit" name="evaluate" class="btn btn-success"><i
                                                class="fa fa-send-o"></i> Submit Evaluation
                                        </button>

                                    </table>
                                    <!--<button type="submit" class="btn btn-success" name="submit">Submit</button>-->
                                </form>
                                <?php
                                }
                                ?>
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
<!--<script type="text/javascript">-->
<!--    $(document).ready(function() {-->
<!--        $('#datatable').dataTable();-->
<!--    } );-->
<!--</script>-->

</body>

</html>
