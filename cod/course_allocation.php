<?php require_once('include1/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM lec_course WHERE course_code='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Assigned course successfully deleted.</div>";
        //echo "<script> alert('Data Successfully Deleted');window.location.href='departments.php'  </script> ";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>

<!--Main Content Start -->
<?php require_once('include1/header2.php') ?>
<!-- Header Ends -->

<!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">
    <!--<div class="page-title">
        <h3 class="title">Datatable</h3>
    </div>-->

    <!-- #4682B4-->
    <div class="row">

        <div class="col-md-12">
            <a class="btn btn-success" data-toggle="modal" data-target="#assign-course" ><i class="fa fa-plus"></i> Assign Course</a>
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Lecturer Course Allocation <a class="btn btn-danger" href="course_reg_report.php?sess=<?php echo $school;  ?>"><i class="fa fa-sign-out"></i> Export PDF</a></h3>
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
                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>PF No.</strong></th>
                                        <th><strong>Title</strong></th>
                                        <th><strong>First Name</strong></th>
                                        <th><strong>Last Name</strong></th>
                                        <th><strong>Course Code</strong></th>
                                        <th><strong>Course Name</strong></th>
                                        <th><strong>Academic Year</strong></th>
                                        <th><strong>Semester</strong></th>
                                        <th><strong>Programme</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql="SELECT
                                lecturers.pf_number
                                , lecturers.title
                                , lecturers.firstname
                                , lecturers.lastname
                                , lecturers.school_id
                                , lec_course.course_code
                                , course.course_name
                                , academic_year.year_name
                                , academic_year.year_id
                                , semester.sem_name
                                , semester.sem_id
                                , programmes.program_name
                                , programmes.program_id
                            FROM
                                evaluation.lec_course
                                INNER JOIN evaluation.lecturers
                                    ON (lec_course.pf_number = lecturers.pf_number)
                                INNER JOIN evaluation.course
                                    ON (lec_course.course_code = course.course_code)
                                INNER JOIN evaluation.academic_year
                                    ON (lec_course.year_id = academic_year.year_id)
                                INNER JOIN evaluation.semester
                                    ON (semester.year_id = academic_year.year_id) AND (lec_course.sem_id = semester.sem_id) AND (course.sem_id = semester.sem_id)
                                INNER JOIN evaluation.programmes
                                    ON (lec_course.program_id = programmes.program_id) AND (course.program_id = programmes.program_id) WHERE lecturers.school_id='$school'";
                                    $qry=mysqli_query($conn,$sql);
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){

                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['pf_number']?></td>
                                            <td><?php echo $row['title']?></td>
                                            <td><?php echo $row['firstname']?></td>
                                            <td><?php echo $row['lastname']?></td>
                                            <td><?php echo $row['course_code']?></td>
                                            <td><?php echo $row['course_name']?></td>
                                            <td><?php echo $row['year_name']?></td>
                                            <td><?php echo $row['sem_name']?></td>
                                            <td><?php echo $row['program_name']?></td>
                                            <td>
                                                <a class="btn btn-xs btn-info" data-target="#alter_assignment<?php echo $count; ?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-xs btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                                   href="?action=transview&id=<?php  echo $row['course_code']?>&act=delete"><i class="fa fa-remove"></i></a>
                                            </td>

                                        </tr>

                                        <!--Alter course allocation modal-->
                                        <div id="alter_assignment<?php echo $count; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Alter Course Assignment:</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form role="form" method="post" action="edit_course_assign?id=<?php echo $row['course_code'];?>">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Lecturer:</label>
                                                                        <select class="form-control" name="lecturer" id="lecturer">
                                                                            <option>~~Select Lecturer~~</option>
                                                                            <?php
                                                                            $stmt="SELECT * FROM lecturers WHERE school_id='$school'";
                                                                            $q=mysqli_query($conn,$stmt);
                                                                            while($r=mysqli_fetch_assoc($q)){
                                                                                ?>
                                                                                <option value="<?php echo $r['pf_number']?>" <?php if($row['pf_number']==$r['pf_number']) echo 'selected="selected"';?> > <?php echo $r['title']?> <?php echo $r['firstname']?></option>
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
                                                                        <label for="exampleInputEmail1">Programme Name:</label>
                                                                        <select class="form-control" name="programm" id="programm">
                                                                            <option>~~Select Programme~~</option>
                                                                            <?php
                                                                            $stmt="SELECT * FROM programmes WHERE school_id='$school'";
                                                                            $q=mysqli_query($conn,$stmt);
                                                                            while($r=mysqli_fetch_assoc($q)){
                                                                                ?>
                                                                                <option value="<?php echo $r['program_id']?>" <?php if($row['program_id']==$r['program_id']) echo 'selected="selected"';?> > <?php echo $r['program_name']?></option>
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
                                                                            <?php
                                                                            $stmt="SELECT * FROM course WHERE school_id='$school'";
                                                                            $q=mysqli_query($conn,$stmt);
                                                                            while($r=mysqli_fetch_assoc($q)){
                                                                                ?>
                                                                                <option value="<?php echo $r['course_code']?>" <?php if($row['course_code']==$r['course_code']) echo 'selected="selected"';?> > <?php echo $r['course_name']?></option>
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
                                                                        <label for="exampleInputEmail1">Academic Year:</label>
                                                                        <select class="form-control" name="year">
                                                                            <option>Academic Year</option>
                                                                            <?php
                                                                            $stmt2="SELECT * FROM academic_year";
                                                                            $query2=mysqli_query($conn,$stmt2);
                                                                            while($row2=mysqli_fetch_assoc($query2)){
                                                                                ?>
                                                                                <option value="<?php echo $row2['year_id']?>" <?php if($row['year_id']==$row2['year_id']) echo 'selected="selected"';?> ><?php echo $row2['year_name']?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Level of Study:</label>
                                                                        <select class="form-control" name="level">
                                                                            <option>~~Select level of Study~~</option>
                                                                            <?php
                                                                            //$stmt3="SELECT * FROM levels";
                                                                            //$query3=mysqli_query($conn,$stmt3);
                                                                            //while($row3=mysqli_fetch_assoc($query3)){
                                                                                ?>
                                                                                <option value="<?php //echo $row3['level_id']?>" <?php //if($row['level_id']==$row3['level_id']) echo 'selected="selected"';?>><?php //echo $row3['level_name']?></option>
                                                                                <?php
                                                                            //}
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>-->
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
                                                                                <option value="<?php echo $row3['sem_id']?>" <?php if($row['sem_id']==$row3['sem_id']) echo 'selected="selected"';?> ><?php echo $row3['sem_name']?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" name="update" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
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

                                        <?php
                                        $count++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--Assign course modal-->
                    <div id="assign-course" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Assign Course:</h4>
                                </div>
                                <div class="modal-body">

                                    <form role="form" method="post" action="">
                                        <?php
                                        if(isset($_POST['submit'])){
                                            $lecturer=$_POST['lecturer'];
                                            $programm=$_POST['programm'];
                                            $course=$_POST['course'];
                                            $year=$_POST['year'];
                                            $level=$_POST['level'];
                                            $sem=$_POST['sem'];

                                            //$check=$conn->query("SELECT * FROM lec_course");

                                            $sql2=$conn->query("INSERT INTO lec_course(pf_number,program_id,course_code,year_id,level,sem_id) VALUES('$lecturer','$programm','$course','$year','$level','$sem')");
                                            if($sql2){
                                                //echo"<script>location.reload();</script>";
                                                echo"<div class='alert alert-success'> <button class='close' data-dismiss='alert'>&times;</button>Course successfully assigned.</div>";
                                            }
                                            else{
                                                echo"<div class='alert alert-warning'> <button class='close' data-dismiss='alert'>&times;</button>Failed!!.
                                    </div>".mysqli_error($conn);
                                            }
                                            mysqli_close($conn);
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Lecturer:</label>
                                                    <select class="form-control" name="lecturer" id="lecturer">
                                                        <option>~~Select Lecturer~~</option>
                                                        <?php
                                                        $stmt="SELECT * FROM lecturers WHERE school_id='$school'";
                                                        $q=mysqli_query($conn,$stmt);
                                                        while($r=mysqli_fetch_assoc($q)){
                                                            ?>
                                                            <option value="<?php echo $r['pf_number']?>"> <?php echo $r['title']?> <?php echo $r['firstname']?></option>
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
                                                    <label for="exampleInputEmail1">Programme Name:</label>
                                                    <select class="form-control" name="programm" id="programm">
                                                        <option>~~Select Programme~~</option>
                                                        <?php
                                                        $stmt="SELECT * FROM programmes WHERE school_id='$school'";
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
</div>

<!-- Page Content Ends -->
<!-- ================== -->

<!-- Footer Start -->
<footer class="footer" style="text-align: center;">
    &copy; <strong><?php echo date('Y')?> DESIGNED BY: OTIENO REAGAN</strong>
</footer>
<!-- Footer Ends -->
</section>
<!-- Main Content Ends -->

<!-- js placed at the end of the document so the pages load faster -->
<script src="../admin/js/jquery.js"></script>
<script src="../admin/js/bootstrap.min.js"></script>
<script src="../admin/js/pace.min.js"></script>
<script src="../admin/js/wow.min.js"></script>
<script src="../admin/js/jquery.nicescroll.js" type="text/javascript"></script>

<!-- Modal-Effect -->
<script src="../admin/assets/modal-effect/js/classie.js"></script>
<script src="../admin/assets/modal-effect/js/modalEffects.js"></script>


<script src="../admin/js/jquery.app.js"></script>
<script src="../admin/js/loader.js"></script>

<script src="../admin/assets/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/assets/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>

</html>
