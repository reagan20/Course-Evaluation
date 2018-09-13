<?php require_once('include1/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM course WHERE course_code='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        //echo "<script> alert('Data Successfully Deleted');window.location.href='my_courses.php'  </script> ";
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Course successfully deleted.</div>";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed.</div>";
    }
}
?>
<!--Main Content Start -->
<?php require_once('include1/header2.php') ?>

<div class="wraper container-fluid">
    <!--<div class="page-title">
        <h3 class="title">Datatable</h3>
    </div>-->

    <!-- #4682B4-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"><i class="fa fa-plus-square"></i> Add Course</div>
                <div class="panel-body">
                    <form id="login" method="post" class="" action="">
                        <?php
                        if(isset($_POST['submit'])){
                            $program=$_POST['program'];
                            $level=$_POST['level'];
                            $semester=$_POST['semester'];
                            $c_code=$_POST['c_code'];
                            $c_name=$_POST['c_name'];
                            $sch=$_POST['school'];
                            $dept=$_POST['department'];
                            $category=$_POST['course_cat'];

                            $sql="INSERT INTO course(school_id,dept_id,program_id,level_id,sem_id,course_code,course_name,category) VALUES ('$sch','$dept','$program','$level','$semester','$c_code','$c_name','$category')";
                            $query=mysqli_query($conn,$sql);
                            if($query){
                                echo"<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>&times;</button>Course Successfully added.</div>";
                            }
                            else{
                                echo"<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>Failed!! Please try again.
                        </div>".mysqli_error($conn);
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="school" id="school">
                                        <option>~~Select School~~</option>
                                        <?php
                                        $s=$conn->query("SELECT * FROM schools WHERE school_id='$school'");
                                        while($rows=mysqli_fetch_assoc($s)){
                                            ?>
                                            <option value="<?php echo $rows['school_id']?>"><?php echo $rows['school_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="department" id="department">
                                        <option>~~Select Department~~</option>
                                    </select>
                                </div></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="program" id="program">
                                        <option value="">~~Select Programme~~</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="level">
                                        <option value="">~~Select Study Level~~</option>
                                        <?php
                                        $stmt="SELECT * FROM levels";
                                        $q=mysqli_query($conn,$stmt);

                                        while($row=mysqli_fetch_assoc($q)){
                                            ?>
                                            <option value="<?php echo $row['level_id']?>"><?php echo $row['level_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="semester">
                                        <option value="">~~Select Semester~~</option>
                                        <?php
                                        $stmt="SELECT * FROM semester";
                                        $q=mysqli_query($conn,$stmt);

                                        while($row=mysqli_fetch_assoc($q)){
                                            ?>
                                            <option value="<?php echo $row['sem_id']?>"><?php echo $row['sem_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="course_cat">
                                        <option value="">~~Select Category~~</option>
                                        <option value="Core">Core</option>
                                        <option value="Elective">Elective</option>
                                    </select>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="c_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="c_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <button name="submit" class="btn btn-success btn-block w-md" type="submit"><i class="fa fa-save"></i> Save</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="reset" class="btn btn-warning btn-block w-md"><i class="fa fa-remove"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                    </form></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-book"></i> Courses List</h3>
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
                                        <th><strong>Course Code</strong></th>
                                        <th><strong>Course Name</strong></th>
                                        <th><strong>Program Name</strong></th>
                                        <th><strong>Level</strong></th>
                                        <th><strong>Semester</strong></th>
                                        <th><strong>Category</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql="SELECT * FROM evaluation.course
                                INNER JOIN evaluation.programmes
                                    ON (course.program_id = programmes.program_id)
                                INNER JOIN evaluation.levels
                                    ON (course.level_id = levels.level_id)
                                INNER JOIN evaluation.semester
                                    ON (course.sem_id = semester.sem_id) WHERE course.school_id='$school'";
                                    $qry=mysqli_query($conn,$sql);
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){

                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['course_code']?></td>
                                            <td><?php echo $row['course_name']?></td>
                                            <td><?php echo $row['program_name']?></td>
                                            <td><?php echo $row['level_name']?></td>
                                            <td><?php echo $row['sem_name']?></td>
                                            <td><?php echo $row['category']?></td>
                                            <td>
                                                <button class="btn btn-xs btn-info" data-target="#course<?php echo $count;?>" data-toggle="modal" data-backdrop="static"><i class="fa fa-pencil"></i>  Edit</button>
                                                <a class="btn btn-xs btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                                   href="?action=transview&id=<?php echo $row['course_code']?>&act=delete">Delete</a>
                                            </td>

                                        </tr>

                                        <!--update modal-->
                                        <div id="course<?php echo $count;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h4 class="modal-title" id="myModalLabel">Course Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="edit_course?id=<?php echo $row['course_code']?>">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Program: <span class="required"></span></label>
                                                                        <select class="form-control" name="program">
                                                                            <?php
                                                                            $s="SELECT * FROM programmes WHERE school_id='$school' ORDER BY program_name ASC";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($r=mysqli_fetch_assoc($q)) {
                                                                                ?>
                                                                                <option value="<?php echo $r['program_id']?>"<?php if($row['program_id']==$r['program_id']) echo 'selected="selected"';?>>
                                                                                    <?php echo $r['program_name']?>
                                                                                </option>

                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Level: <span class="required"></span></label>
                                                                        <select class="form-control" name="level">
                                                                            <?php
                                                                            $s="SELECT * FROM levels";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($r=mysqli_fetch_assoc($q)) {
                                                                                ?>
                                                                                <option value="<?php echo $r['level_id']?>"<?php if($row['level_id']==$r['level_id']) echo 'selected="selected"';?>>
                                                                                    <?php echo $r['level_name']?>
                                                                                </option>

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
                                                                        <label for="exampleInputEmail1">Semester: <span class="required"></span></label>
                                                                        <select class="form-control" name="semester">
                                                                            <?php
                                                                            $s="SELECT * FROM semester";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($r=mysqli_fetch_assoc($q)) {
                                                                                ?>
                                                                                <option value="<?php echo $r['sem_id']?>"<?php if($row['sem_id']==$r['sem_id']) echo 'selected="selected"';?>>
                                                                                    <?php echo $r['sem_name']?>
                                                                                </option>

                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Course Code:</label>
                                                                        <input type="text" name="code" class="form-control" id="exampleInputEmail1" value="<?php echo $row['course_code']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Course Name:</label>
                                                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $row['course_name']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Category: <span class="required"></span></label>
                                                                        <select class="form-control" name="category">
                                                                            <?php
                                                                            $s="SELECT DISTINCT (category) FROM course";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($r=mysqli_fetch_assoc($q)) {
                                                                                ?>
                                                                                <option value="<?php echo $r['category']?>"<?php if($row['category']==$r['category']) echo 'selected="selected"';?>>
                                                                                    <?php echo $r['category']?>
                                                                                </option>

                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
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
                </div>
            </div>
        </div>

    </div>
</div>

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
