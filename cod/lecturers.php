<?php require_once('include1/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM users WHERE user_id='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Staff successfully deleted.</div>";
        //echo "<script> alert('Data Successfully Deleted');window.location.href='departments.php'  </script> ";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>
<!-- Aside Ends-->

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
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Staff List <a href="lecturers_listpdf.php?sess=<?php echo $school;  ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Export PDF</a></h3>
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
                                        <th><strong>Title</strong></th>
                                        <th><strong>First Name</strong></th>
                                        <th><strong>Last Name</strong></th>
                                        <th><strong>PF Number</strong></th>
                                        <th><strong>Role</strong></th>
<!--                                        <th><strong>Action</strong></th>-->
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql="SELECT pf_number, title, firstname, lastname, mobile,mail,lecturers.role_id, schools.school_id, school_name, dept_name,departments.dept_id
                                , roles.role_name FROM lecturers
                                INNER JOIN schools
                                    ON (lecturers.school_id = schools.school_id)
                                INNER JOIN departments
                                    ON (departments.school_id = schools.school_id) AND (lecturers.dept_id = departments.dept_id)
                                INNER JOIN roles
                                    ON (lecturers.role_id = roles.role_id) WHERE lecturers.school_id='$school'";
                                    $qry=mysqli_query($conn,$sql);
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){

                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['title']?></td>
                                            <td><?php echo $row['firstname']?></td>
                                            <td><?php echo $row['lastname']?></td>
                                            <td><?php echo $row['pf_number']?></td>
                                            <td><?php echo $row['role_name']?></td>
<!--                                            <td>-->
<!--                                                <a class="btn btn-sm btn-info" data-target="#stu_details--><?php //echo $count; ?><!--" data-toggle="modal"><i class="fa fa-pencil"></i></a>-->
<!--                                                <a class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"-->
<!--                                                   href="?action=transview&id=--><?php //echo $row['pf_number']?><!--&act=delete"><i class="fa fa-remove"></i></a>-->
<!--                                            </td>-->

                                        </tr>

                                        <!--update modal-->
                                        <div id="stu_details<?php echo $count; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h4 class="modal-title" id="myModalLabel"> Personal Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="../admin/edit_staff.php?id=<?php echo $row['pf_number']?>">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Title:</label>
                                                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?php echo $row['title']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">First Name:</label>
                                                                        <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" value="<?php echo $row['firstname']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Last Name:</label>
                                                                        <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" value="<?php echo $row['lastname']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">PF Number:</label>
                                                                        <input type="text" name="pf_no" class="form-control" id="exampleInputEmail1" value="<?php echo $row['pf_number']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">School: <span class="required">*</span></label>
                                                                        <select class="form-control" name="school" >
                                                                            <?php
                                                                            $s="SELECT * FROM schools WHERE school_id='$school'";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($r=mysqli_fetch_assoc($q)){
                                                                                ?>
                                                                                <option value="<?php echo $r['school_id']?>" <?php if($row['school_id']==$r['school_id']) echo 'selected="selected"'?>
                                                                                    ><?php echo $r['school_name']?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Department: <span class="required">*</span></label>
                                                                        <select class="form-control" name="department" >
                                                                            <?php
                                                                            $s="SELECT * FROM departments WHERE school_id='$school'";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($r=mysqli_fetch_assoc($q)){
                                                                                ?>
                                                                                <option value="<?php echo $r['dept_id']?>" <?php if($row['dept_id']==$r['dept_id']) echo 'selected="selected"'?>
                                                                                    ><?php echo $r['dept_name']?></option>
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
                                                                        <label for="exampleInputEmail1">Email Address:</label>
                                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $row['mail']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">User Role:</label>
                                                                        <select class="form-control" name="role">
                                                                            <?php
                                                                            $sq="SELECT * FROM roles WHERE role_id IN (1,2,3,4)";
                                                                            $qu=mysqli_query($conn,$sq);
                                                                            while($ro=mysqli_fetch_assoc($qu)){
                                                                                ?>
                                                                                <option
                                                                                    value="<?php echo $ro['role_id']?>" <?php if($row['role_id']==$ro['role_id']) echo 'selected="selected"';?>
                                                                                    ><?php echo $ro['role_name']?></option>
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
