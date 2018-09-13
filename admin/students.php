<?php require_once('include/side_bar.php');
//$x=@$_GET['id'];
//$y=@$_GET['act'];
//if (@$_GET['act']=="delete") {
//    $sql1 = "DELETE FROM students WHERE reg_number='$x'";
//    $results = mysqli_query($conn, $sql1);
//    if($results){
//        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Student successfully deleted.</div>";
//        //echo "<script> alert('Data Successfully Deleted');window.location.href='student.php'  </script> ";
//    }
//    else{
//        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Sorry!, Student data could not be deleted.</div>";
//    }
//}
?>
<!-- Aside Ends-->

<?php require_once('include/header1.php')?>

<div class="wraper container-fluid">
    <!--<div class="page-title">
        <h3 class="title">Datatable</h3>
    </div>-->

    <!-- #4682B4-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">Add Student</div>
                <div class="panel-body">
                <form method="post" >
                    <?php
                    if(isset($_POST['submit'])){
                        $fname=$_POST['fname'];
                        $lname=$_POST['lname'];
                        $regno=$_POST['regno'];
                        $gender=$_POST['gender'];
                        //$role=$_POST['role'];
                        $role=5;
                        $email=$_POST['email'];
                        $dept=$_POST['department'];
                        $school=$_POST['school'];
                        $program=$_POST['program'];
                        $password=1234;
                        $phone=$_POST['phone'];
                        $academic_year=$_POST['academic_year'];
                        $level=$_POST['level'];
                        $semester=$_POST['semester'];

                        $sql="INSERT INTO students(school_id,dept_id,program_id,role_id,fname,lname,reg_number,gender,phone,email,password,academic_year,level,semester) VALUES ('$school','$dept','$program','$role','$fname','$lname','$regno','$gender','$phone','$email','$password','$academic_year','$level','$semester')";

                        $query=mysqli_query($conn,$sql);
                        $login= $conn->query("INSERT INTO login (username,password,role_id) VALUES('$regno','$password','$role')");
                        if($query){
                            echo"<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>Data Successfully Saved
                        </div>";
                        }
                        else{
                            echo"<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>Failed!! Please try again.
                        </div>";
                        }
                    }
                    ?>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="school" id="school" required="required">
                                <option value="">~~Select School~~</option>
                                <?php
                                $stmt="SELECT * FROM schools";
                                $q=mysqli_query($conn,$stmt);

                                while($row=mysqli_fetch_assoc($q)){
                                    ?>
                                    <option value="<?php echo $row['school_id']?>"><?php echo $row['school_name']?></option>
                                    <?php
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="department" id="department" required="required">
                                <option value="">~~Select Department~~</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="program" id="program" required="required">
                                <option value="">~~Select Programme~~</option>
                            </select>

                        </div>
                    </div></div>

                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="regno" class="form-control" id="regno" required="required" placeholder="Enter Registration Number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control" id="fname" required="required" placeholder="Enter firstname">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control" id="lname" required="required" placeholder="Enter lastname">
                        </div>
                    </div></div>

                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="gender" id="gender" required="required">
                                <option>~~Select Gender~~</option>
                                <option value="MALE">MALE</option>
                                <option VALUE="FEMALE">FEMALE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" id="phone" required="required" placeholder="Enter Phone">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" required="required" placeholder="Enter Email Address">
                        </div>
                    </div></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="academic_year" id="academic_year" required="required">
                                    <option value="">~~Select Academic Year~~</option>
                                    <?php
                                    $stmt="SELECT * FROM academic_year";
                                    $q=mysqli_query($conn,$stmt);

                                    while($row=mysqli_fetch_assoc($q)){
                                        ?>
                                        <option value="<?php echo $row['year_id']?>"><?php echo $row['year_name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="level" id="level" required="required">
                                    <option value="">~~Select Year of study~~</option>
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
                                <select class="form-control" name="semester" id="semester" required="required">
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
                    </div>

                    <div class="row">
                    <div class="form-group">
                        <div class="col-md-3">
                            <button name="submit" class="btn btn-success btn-block w-md" type="submit"><i class="fa fa-send"></i> Save</button>
                        </div>
                        <div class="col-md-3">
                            <button type="reset" class="btn btn-warning btn-block w-md">Reset</button>
                        </div>
                    </div>
                    </div>
                </form></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Student's List</h3>
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
                                    <th><strong>First Name</strong></th>
                                    <th><strong>Last Name</strong></th>
                                    <th><strong>Reg Number</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $sql="SELECT reg_number, fname, lname,gender, email, schools.*, roles.*, departments.dept_id, departments.dept_name
                                FROM
                                    evaluation.students
                                    INNER JOIN evaluation.schools
                                        ON (students.school_id = schools.school_id)
                                    INNER JOIN evaluation.departments
                                        ON (departments.school_id = schools.school_id) AND (students.dept_id = departments.dept_id)
                                    INNER JOIN evaluation.roles
                                        ON (students.role_id = roles.role_id)";
                                $qry=mysqli_query($conn,$sql);
                                $count=1;
                                while($row=mysqli_fetch_assoc($qry)){
                                    ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row['fname']?></td>
                                        <td><?php echo $row['lname']?></td>
                                        <td><?php echo $row['reg_number']?></td>
                                        <td>
                                            <a class="btn btn-xs btn-info" data-target="#stu_details<?php echo $count;?>" data-toggle="modal"><i class="fa fa-pencil"></i> Update</a>
                                            <a class="btn btn-xs btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                               href="students?id=<?php echo $row['reg_number']?>"><i class="fa fa-remove"></i> Delete</a>
                                        </td>

                                    </tr>
                                    <!--Edit student details modal-->
                                    <div id="stu_details<?php echo $count;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="edit_student.php?id=<?php echo $row['reg_number']?>">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">First Name: <span class="required">*</span></label>
                                                                    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" value="<?php echo $row['fname']?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Last Name: <span class="required">*</span></label>
                                                                    <input type="text" name="lname" class="form-control" id="exampleInputEmail1" value="<?php echo $row['lname']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Reg. Number: <span class="required">*</span></label>
                                                                    <input type="text" name="regno" class="form-control" id="exampleInputEmail1" value="<?php echo $row['reg_number']?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Gender: <span class="required">*</span></label>
                                                                    <select class="form-control" name="gender">
                                                                        <option value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>
                                                                        <option value="MALE">MALE</option>
                                                                        <option value="FEMALE">FEMALE</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">User Role: <span class="required">*</span></label>
                                                                    <select class="form-control" name="role">
                                                                        <option value="<?php echo $row['role_id']?>"><?php echo $row['role_name']?></option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email Address: <span class="required">*</span></label>
                                                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $row['email']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Department: <span class="required">*</span></label>
                                                                    <select class="form-control" name="department" >
                                                                        <?php
                                                                        $s="SELECT * FROM departments";
                                                                        $q=mysqli_query($conn,$s);
                                                                        while($r=mysqli_fetch_assoc($q)){
                                                                        ?>
                                                                        <option value="<?php echo $r['dept_id'];?>" <?php if($row['dept_id']==$r['dept_id'])echo 'selected="selected"';?>><?php echo $r['dept_name']?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                </div>
                                                            </div>

                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>

                                    <?php
                                    $count++;
                                }

                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $sql1 =$conn->query("DELETE FROM students WHERE reg_number='$id'");
                                    if($sql1){
                                        ?>
                                        <script>
                                            alert("Student successfully deleted.");
                                            window.location.href='students';
                                        </script>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <script>
                                            alert("Student data could not be deleted.");
                                            window.location.href='students';
                                        </script>
                                        <?php
                                    }
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="js/additional-methods.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/validator.js"></script>

<!-- Modal-Effect -->
<script src="assets/modal-effect/js/classie.js"></script>
<script src="assets/modal-effect/js/modalEffects.js"></script>


<script src="js/jquery.app.js"></script>
<script src="js/loader.js"></script>

<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>

</html>
