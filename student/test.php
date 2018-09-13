<?php require_once('include/side_bar.php');
$get_id=$_GET['id'];
?>

<?php require_once('include/header5.php'); ?>

<div class="wraper container-fluid">
    <div class="page-title">
        <h4 class="title"></h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5><b>COURSE EVALUATION BY STUDENTS</b></h5>
            <p>This evaluation is intended to obtain your feedback in order to continue offering quality teaching/services. Please take a few minutes
                to fill in this evaluation form as objectively as you can. <strong>NOTE!!</strong> <b>Your responses are treated with confidentiality.</b></p>
        </div>
        <?php
        $stmt=$conn->query("SELECT students.reg_number ,students.gender, departments.dept_name, programmes.program_name, course.course_code
                , course.course_name,course.sem_id, academic_year.year_name, semester.sem_name,semester.sem_id FROM evaluation.students
                INNER JOIN evaluation.departments
                    ON (students.dept_id = departments.dept_id)
                INNER JOIN evaluation.programmes
                    ON (programmes.dept_id = departments.dept_id) AND (students.program_id = programmes.program_id)
                INNER JOIN evaluation.course
                    ON (course.program_id = programmes.program_id)
                , evaluation.semester
                INNER JOIN evaluation.academic_year
              ON (semester.year_id = academic_year.year_id) WHERE students.reg_number='$reg' AND course.course_code='$get_id'
              AND semester.sem_id=course.sem_id");
        while($row=mysqli_fetch_assoc($stmt)) {
            $code = $row['course_code'];
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
                    ACADEMIC YEAR: <?php echo $row['year_name']?></br>
                    COURSE TITLE: <?php echo $row['course_name']?></br>
                    SEMESTER: <?php echo $row['sem_name']?>
                </p>
            </div>
            <?php
        }
        ?>
        <div class="col-md-12">
            <p><b>N/B: For each item listed below, check the most appropriate response that applies to you.</b></p>
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-book"></i> My Course List</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" method="post">
                                <?php

                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>1. Did the lecturer set clear objectives?</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="one" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="one" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="one" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="one" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="one" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="one" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>2. Followed and completed the course comprehensively?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="two" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="two" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="two" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="two" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="two" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="two" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>3. Had good rapport, encouraged student/lecturer interaction in class and feedback?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="three" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="three" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="three" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="three" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="three" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="three" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>4. Was well prepared for each class?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="four" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="four" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="four" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="four" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="four" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="four" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>5. Handled individual student problems and questions in class well?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="five" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="five" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="five" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="five" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="five" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="five" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>6. Was accessible to students outside lecture periods(personally,through email or by phone)?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="six" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="six" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="six" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="six" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="six" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="six" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>7. Explained course materials clearly,logically effectively?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="seven" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="seven" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="seven" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="seven" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="seven" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="seven" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>8. Used teaching aids effectively?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eight" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eight" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eight" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eight" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eight" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eight" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>9. Marked and returned CATS and assignments in time?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="nine" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="nine" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="nine" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="nine" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="nine" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="nine" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>10. Suggested adequate, relevant and up-to-date reading materials(handouts and references)?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="ten" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="ten" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="ten" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="ten" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="ten" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="ten" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>11. Met all scheduled lecturers and tutorials punctually?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eleven" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eleven" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eleven" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eleven" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eleven" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="eleven" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>12. Related information in this course to other fields?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="twelve" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="twelve" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="twelve" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="twelve" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="twelve" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="twelve" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>13. Used examples/illustrations to explain concepts and principles of the course?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="thirteen" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="thirteen" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="thirteen" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="thirteen" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="thirteen" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="thirteen" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>14. Had clear audible voice during lectures?</label></br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="fourteen" value="1">Poor</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="fourteen" value="2">Fair</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="fourteen" value="3">Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="fourteen" value="4">V. Good</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="fourteen" value="5">Excellent</label></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio"><label><input type="radio" name="fourteen" value="0">Don't Know</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Submit Evaluation</button>
                                    </div>
                                </div>


                            </form>
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
</body>

</html>
