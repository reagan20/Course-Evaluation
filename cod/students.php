<?php require_once('include1/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM students WHERE user_id='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Student successfully deleted.</div>";
        //echo "<script> alert('Data Successfully Deleted');window.location.href='student.php'  </script> ";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>
<!-- Aside Ends-->

<?php require_once('include1/header2.php') ?>

<div class="wraper container-fluid">
    <!--<div class="page-title">
        <h3 class="title">Datatable</h3>
    </div>-->

    <!-- #4682B4-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <?php
                    $stmt=$conn->query("SELECT * FROM schools WHERE school_id='$school'");
                    while($st=mysqli_fetch_assoc($stmt)){
                        $s=$st['school_name'];
                      ?>
                        <h3 class="panel-title">Student's List: <?php echo $s; ?>.</h3>
                    <?php
                    }
                    ?>

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
                                        <th><strong>Reg Number</strong></th>
                                        <th><strong>First Name</strong></th>
                                        <th><strong>Last Name</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Department</strong></th>
                                        <!--<th><strong>Action</strong></th>-->
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql="SELECT reg_number, fname, lname,gender, email,students.school_id, schools.*, roles.*, departments.dept_id, departments.dept_name
                                FROM
                                    evaluation.students
                                    INNER JOIN evaluation.schools
                                        ON (students.school_id = schools.school_id)
                                    INNER JOIN evaluation.departments
                                        ON (departments.school_id = schools.school_id) AND (students.dept_id = departments.dept_id)
                                    INNER JOIN evaluation.roles
                                        ON (students.role_id = roles.role_id) WHERE students.school_id='$school'";
                                    $qry=mysqli_query($conn,$sql);
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){
                                        $s=$row['school_name'];
                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['reg_number']?></td>
                                            <td><?php echo $row['fname']?></td>
                                            <td><?php echo $row['lname']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['dept_name']?></td>
                                            <!--<td>
                                                <a class="btn btn-sm btn-info" data-target="#stu_details<?php //echo $row['reg_number']?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                                   href="?action=transview&id=<?php //echo $row['reg_number']?>&act=delete"><i class="fa fa-remove"></i></a>
                                            </td>-->

                                        </tr>
                                        <div id="stu_details<?php echo $row['reg_number']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: #E6E6FA;">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="../admin/edit_student.php?id=<?php echo $row['reg_number']?>">
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
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
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

<script src="../admin/js/additional-methods.js"></script>
<script src="../admin/js/jquery.validate.js"></script>
<script src="../admin/js/validator.js"></script>

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
