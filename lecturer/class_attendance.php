<?php require_once('include/side_bar.php');
$get_id=$_GET['id2'];
?>

<?php require_once('include/header4.php'); ?>

<div class="wraper container-fluid">
    <div class="page-title">
        <h4 class="title"></h4>
    </div>
    <div class="row">
        <?php require_once('nav.php');?>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h5><b>STUDENTS LECTURE ATTENDANCE</b></h5><hr>
                </div>
                <?php
                $s=$conn->query("SELECT * FROM evaluation.stude_course_lec
        INNER JOIN evaluation.students
            ON (stude_course_lec.reg_number = students.reg_number)
        INNER JOIN evaluation.programmes
            ON (students.program_id=programmes.program_id)
            INNER JOIN evaluation.departments
            ON (students.dept_id=departments.dept_id)
        INNER JOIN evaluation.lecturers
            ON (stude_course_lec.pf_number = lecturers.pf_number)
        INNER JOIN evaluation.academic_year
        INNER JOIN evaluation.semester
        INNER JOIN evaluation.lec_course
            ON (lec_course.year_id=academic_year.year_id) AND (lec_course.sem_id=semester.sem_id)
        INNER JOIN evaluation.course
            ON (stude_course_lec.course_code = course.course_code) AND (course.sem_id=lec_course.sem_id) WHERE stude_course_lec.pf_number='$pf'
            AND stude_course_lec.course_code='$get_id'");
                while($details=mysqli_fetch_assoc($s)) {
                    $depart = $details['dept_name'];
                    $program=$details['program_name'];
                    $course=$details['course_name'];
                    $year=$details['year_name'];
                    $sem=$details['sem_name'];
                }
                ?>
                <div class="col-md-6" style="font-weight: bold">
                    <p>

                        DEPARTMENT: <?php echo $depart;  ?></br>
                        PROGRAMME: <?php echo $program; ?></br>
                        PF. NUMBER: <?php echo $pf; ?></br>
                        FULLNAME: <?php echo $fullname; ?>
                    </p>
                </div>
                <div class="col-md-6" style="font-weight: bold">
                    <p>
                        COURSE CODE: <?php echo $get_id; ?></br>
                        COURSE TITLE: <?php echo $course; ?></br>
                        ACADEMIC YEAR: <?php echo $year;?></br>
                        SEMESTER: <?php echo $sem;?>
                    </p>
                </div>
                <!--         --><?php
                //       }
                //        ?>
                <div class="col-md-12">
                    <p></p>
                    <div class="panel panel-color panel-info">
                        <div class="panel-heading"><i class="fa fa-book"></i> My Students List</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <?php
                                        $sql4=$conn->query("SELECT * FROM
                                        evaluation.stude_course_lec
                                        INNER JOIN evaluation.students
                                            ON (stude_course_lec.reg_number = students.reg_number)
                                        INNER JOIN evaluation.departments
                                            ON (students.dept_id=departments.dept_id)
                                        INNER JOIN evaluation.lecturers
                                            ON (stude_course_lec.pf_number = lecturers.pf_number)
                                        INNER JOIN evaluation.course
                                            ON (stude_course_lec.course_code = course.course_code) WHERE stude_course_lec.pf_number='$pf'
                                            AND students.semester='$sem' AND stude_course_lec.course_code='$get_id'");

                                        if(isset($_POST['attend'])){
                                            $count=1;
                                            while($row4=mysqli_fetch_assoc($sql4)){
                                                $regno = $row4['reg_number'];
                                                $depart=$row4['dept_name'];
                                                if(isset($_POST['a'.$count])){
                                                    $status=$_POST['a'.$count];
                                                    if(!empty($status)){
                                                        if($status=="present"){
                                                            $attend=1;
                                                        }
                                                        else if($status=="absent"){
                                                            $attend=0;
                                                        }
                                                        $d_time =date('Y-m-d');
                                                        $query=$conn->query("INSERT INTO attendance(pf_number,reg_number,course_code,status,attend,date_time) VALUES ('$pf','$regno','$get_id','$status','$attend','$d_time')");
                                                        if($query){
                                                            // echo"<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>Attendance successfully saved</div>";
                                                        }
                                                        else{
                                                            echo"<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button>Attendance not saved..!!</div>";
                                                        }
                                                    }
                                                    else{
                                                        echo"<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Kindly mark attendance of all students..!!</div>";
                                                    }
                                                }
                                                $count++;
                                            }
//                                        echo"<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>Attendance successfully saved</div>";
                                            echo "<script> alert('Attendance successfully saved');window.location.href='class_attendance?id2=$get_id'  </script> ";

                                        }
                                        else {
                                            ?>
                                            <form method="post" action="">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr style="color: dodgerblue;">
                                                        <th><strong>S/N</strong></th>
                                                        <th><strong>Reg. Number</strong></th>
                                                        <th><strong>Fullname</strong></th>
                                                        <th><strong>Phone</strong></th>
                                                        <th><strong>Attendance Status</strong></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php

                                                    $count = 1;
                                                    while ($row4 = mysqli_fetch_assoc($sql4)) {
                                                        $regno = $row4['reg_number'];
                                                        $fname = $row4['fname'];
                                                        $lname = $row4['lname'];
                                                        $pn = $row4['phone'];
                                                        $fullname = $fname . ' ' . $lname;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $regno; ?></td>
                                                            <td><?php echo $fullname; ?></td>
                                                            <td><?php echo $pn; ?></td>
                                                            <td>
                                                                <div class="radio">
                                                                    <label><input type="radio" name="a<?php echo $count; ?>" value="present" required="required">Present</label>
                                                                    <label><input type="radio" name="a<?php echo $count; ?>" value="absent" required="required">Absent</label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                        $count++;
                                                    }//end while
                                                    ?>
                                                    </tbody>
                                                </table></br>
                                                <?php
//                                                $check =date('Y-m-d');
//                                                $q=$conn->query("SELECT * FROM attendance WHERE pf_number='$pf' AND course_code='$get_id' AND date_time='$check'");
//                                                $cc=mysqli_num_rows($q);
//                                                if($cc>0) {
                                                    ?>
<!--                                                    <button class="btn btn-warning" disabled type="submit" name="attend"><i class="fa fa-warning"></i> Attendance already marked!.</button>-->
                                                    <?php
                                                //}
                                                //else{
                                                    ?>
                                                    <button class="btn btn-success" type="submit" name="attend"><i class="fa fa-save"></i> Save Attendance</button>
                                                    <?php
                                                //}
                                                ?>



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
<!--<script type="text/javascript">-->
<!--    $(document).ready(function() {-->
<!--        $('#datatable').dataTable();-->
<!--    } );-->
<!--</script>-->

</body>

</html>
