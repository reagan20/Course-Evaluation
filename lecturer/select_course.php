<?php require_once('include/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM lec_course WHERE course_code='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $ms= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Course successfully deleted.</div>";
    }
    else{
        $ms= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>

<?php require_once('include/header4.php'); ?>

<div class="wraper container-fluid">

    <div class="row">

        <?php require_once('nav.php');?>

        <div class="col-md-10">
            <div class="row">
                <div class="page-title">
                    <h4 class="title"><i class="fa fa-book"></i> My Courses.</h4>
                </div>
                <div class="col-md-11">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#register"><i class="fa fa-plus-square"></i> Register Course</a>
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div>
                                <?php
                                if(isset($ms)){
                                    echo $ms;
                                }
                                ?>
                            </div>

                            <div class="row">
                                <?php
                                $sql4=$conn->query("SELECT
                                course.course_name
                                , lec_course.pf_number
                                , lec_course.course_code
                            FROM
                                evaluation.lec_course
                                INNER JOIN evaluation.course
                                    ON (lec_course.course_code = course.course_code) WHERE lec_course.pf_number='$pf'");
                                while($row4=mysqli_fetch_assoc($sql4)){
                                    $course_id=$row4['course_code'];
                                    ?>
                                    <div class=" col-md-4">
                                        <div class="panel panel-info paper-shadow" data-z="0.5">

                                            <!--<div class="cover overlay cover-image-full hover">
                                                <span class="img icon-block height-150 bg-default"></span>
                                            <span class="v-center">
                                                <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                            </span>
                                            </div>-->

                                            <div class="panel-body">
                                                <h4><?php echo $course_id;?></h4>
                                                <h4 class="text-headline margin-v-0-10"><a href=""><?php echo $row4['course_name'];?></a></h4>
                                            </div>
                                            <hr class="margin-none">
                                            <a class="btn btn-primary" href="my_students<?php echo '?id2='.$course_id; ?>"><i class="fa fa-eye"></i> View Students</a>
                                            <a class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                               href="?action=transview&id=<?php echo $row4['course_code']?>&act=delete">Delete</a>
                                        </div>
                                    </div>


                                    <?php
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="col-md-6">-->
<!--                    <div class="panel panel-color panel-primary">-->
<!--                        <div class="panel-heading"><i class="fa fa-plus-square"></i> Add Course</div>-->
<!--                        <div class="panel-body">-->
<!--                            <form role="form" method="post" action="">-->
<!--                                --><?php
//                                if(isset($_POST['submit'])){
//                                    $programm=$_POST['programm'];
//                                    $course=$_POST['course'];
//                                    $year=$_POST['year'];
//                                    $level=$_POST['level'];
//                                    $sem=$_POST['sem'];
//
//                                    $sql2=$conn->query("INSERT INTO lec_course(pf_number,program_id,course_code,year_id,level,sem_id) VALUES('$pf','$programm','$course','$year','$level','$sem')");
//                                    if($sql2){
//                                        //echo"<script>location.reload();</script>";
//                                        echo"<div class='alert alert-success'>
//                                <button class='close' data-dismiss='alert'>&times;</button>Course successfully added.
//                                    </div>";
//                                    }
//                                    else{
//                                        echo"<div class='alert alert-warning'>
//                                <button class='close' data-dismiss='alert'>&times;</button>Failed!!.
//                                    </div>".mysqli_error($conn);
//                                    }
//                                }
//                                ?>
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="exampleInputEmail1">Programme Name:</label>-->
<!--                                            <select class="form-control" name="programm" id="programm">-->
<!--                                                <option>~~Select Programme~~</option>-->
<!--                                                --><?php
//                                                $stmt="SELECT * FROM programmes WHERE school_id='$sch'";
//                                                $q=mysqli_query($conn,$stmt);
//                                                while($r=mysqli_fetch_assoc($q)){
//                                                    ?>
<!--                                                    <option value="--><?php //echo $r['program_id']?><!--"> --><?php //echo $r['program_name']?><!--</option>-->
<!--                                                    --><?php
//                                                }
//                                                ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="exampleInputEmail1">Course Name:</label>-->
<!--                                            <select class="form-control" name="course" id="course">-->
<!--                                                <option>~~Select Course~~</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!---->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="exampleInputEmail1">Academic Year:</label>-->
<!--                                            <select class="form-control" name="year">-->
<!--                                                <option>Academic Year</option>-->
<!--                                                --><?php
//                                                $stmt2="SELECT * FROM academic_year";
//                                                $query2=mysqli_query($conn,$stmt2);
//                                                while($row2=mysqli_fetch_assoc($query2)){
//                                                    ?>
<!--                                                    <option value="--><?php //echo $row2['year_id']?><!--">--><?php //echo $row2['year_name']?><!--</option>-->
<!--                                                    --><?php
//                                                }
//                                                ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="exampleInputEmail1">Level of Study:</label>-->
<!--                                            <select class="form-control" name="level">-->
<!--                                                <option>~~Select level of Study~~</option>-->
<!--                                                --><?php
//                                                $stmt3="SELECT * FROM levels";
//                                                $query3=mysqli_query($conn,$stmt3);
//                                                while($row3=mysqli_fetch_assoc($query3)){
//                                                    ?>
<!--                                                    <option value="--><?php //echo $row3['level_id']?><!--">--><?php //echo $row3['level_name']?><!--</option>-->
<!--                                                    --><?php
//                                                }
//                                                ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="exampleInputEmail1">Semester:</label>-->
<!--                                            <select class="form-control" name="sem">-->
<!--                                                <option>~~Semester~~</option>-->
<!--                                                --><?php
//                                                $stmt3="SELECT * FROM semester";
//                                                $query3=mysqli_query($conn,$stmt3);
//                                                while($row3=mysqli_fetch_assoc($query3)){
//                                                    ?>
<!--                                                    <option value="--><?php //echo $row3['sem_id']?><!--">--><?php //echo $row3['sem_name']?><!--</option>-->
<!--                                                    --><?php
//                                                }
//                                                ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-group">-->
<!--                                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>-->
<!--                                            <button type="reset" class="btn btn-warning">Reset</button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <!--Modal-->
                <div id="register" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Register Course:</h4>
                            </div>
                            <div class="modal-body">

                                <form role="form" method="post" action="">
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $programm=$_POST['programm'];
                                        $course=$_POST['course'];
                                        $year=$_POST['year'];
                                        $level=$_POST['level'];
                                        $sem=$_POST['sem'];

                                        $sql2=$conn->query("INSERT INTO lec_course(pf_number,program_id,course_code,year_id,level,sem_id) VALUES('$pf','$programm','$course','$year','$level','$sem')");
                                        if($sql2){
                                            //echo"<script>location.reload();</script>";
                                            echo"<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>&times;</button>Course successfully added.
                                    </div>";
                                        }
                                        else{
                                            echo"<div class='alert alert-warning'>
                                <button class='close' data-dismiss='alert'>&times;</button>Failed!!.
                                    </div>".mysqli_error($conn);
                                        }
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Programme Name:</label>
                                                <select class="form-control" name="programm" id="programm">
                                                    <option>~~Select Programme~~</option>
                                                    <?php
                                                    $stmt="SELECT * FROM programmes WHERE school_id='$sch'";
                                                    $q=mysqli_query($conn,$stmt);
                                                    while($r=mysqli_fetch_assoc($q)){
                                                        ?>
                                                        <option value="<?php echo $r['program_id']?>"> <?php echo $r['program_name']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Course Name:</label>
                                                <select class="form-control" name="course" id="course">
                                                    <option>~~Select Course~~</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Academic Year:</label>
                                                <select class="form-control" name="year">
                                                    <option>Academic Year</option>
                                                    <?php
                                                    $stmt2="SELECT * FROM academic_year";
                                                    $query2=mysqli_query($conn,$stmt2);
                                                    while($row2=mysqli_fetch_assoc($query2)){
                                                        ?>
                                                        <option value="<?php echo $row2['year_id']?>"><?php echo $row2['year_name']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Level of Study:</label>
                                                <select class="form-control" name="level">
                                                    <option>~~Select level of Study~~</option>
                                                    <?php
                                                    $stmt3="SELECT * FROM levels";
                                                    $query3=mysqli_query($conn,$stmt3);
                                                    while($row3=mysqli_fetch_assoc($query3)){
                                                        ?>
                                                        <option value="<?php echo $row3['level_id']?>"><?php echo $row3['level_name']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Semester:</label>
                                                <select class="form-control" name="sem">
                                                    <option>~~Semester~~</option>
                                                    <?php
                                                    $stmt3="SELECT * FROM semester";
                                                    $query3=mysqli_query($conn,$stmt3);
                                                    while($row3=mysqli_fetch_assoc($query3)){
                                                        ?>
                                                        <option value="<?php echo $row3['sem_id']?>"><?php echo $row3['sem_name']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!--<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>-->
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
