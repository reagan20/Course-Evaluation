<?php require_once('include1/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM departments WHERE dept_id='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Department successfully deleted.</div>";
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

<div class="wraper container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    ADD DEPARTMENT
                </div>
                <div class="panel-body">
                    <?php
                    if(isset($_POST['submit'])){
                        $sch=$_POST['school'];
                        $dept=$_POST['department'];

                        $sql="INSERT INTO departments(school_id,dept_name) VALUES ('$sch','$dept')";
                        if(mysqli_query($conn,$sql)){
                            echo"<div class='alert alert-success'>
                           <button class='close' data-dismiss='alert'>&times;</button>Data Successfully Entered
                        </div>";
                        }
                        else{
                            echo"<div class='alert alert-warning'>
                    <button class='close' data-dismiss='alert'>&times;</button>Failed!! Kindly check network connectivity
                        </div>";
                        }
                    }
                    ?>
                    <form role="form" method="post" action="">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">School Name:</label>
                                    <select class="form-control" name="school" required="required">
                                        <option>~~Select School~~</option>
                                        <?php
                                        $s="SELECT * FROM schools";
                                        $q=mysqli_query($conn,$s);
                                        while($r=mysqli_fetch_assoc($q)) {
                                            ?>
                                            <option value="<?php echo $r['school_id']?>"><?php echo $r['school_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Department Name:</label>
                                    <input type="text" class="form-control" name="department" id="department" placeholder="Enter Department Name" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-send"></i> Submit</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- #4682B4-->
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Department's List</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>
                    </div>
                    <?php
                    $sql="SELECT schools.school_id,schools.school_name, departments.dept_id, departments.dept_name FROM evaluation.departments
                    INNER JOIN evaluation.schools ON (departments.school_id = schools.school_id) WHERE departments.school_id='$school'";
                    $qry=mysqli_query($conn,$sql);
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!--<div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="">tttt</h3>
                                    <div class="panel-body">

                                    </div>
                                </div>
                            </div>-->
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <!--<th><strong>Serial Number</strong></th>-->
                                        <th><strong>School Name</strong></th>
                                        <th><strong>Department Name</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){
                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <!--<td><?php //echo $row['dept_id']?></td>-->
                                            <td><?php echo $row['school_name']?></td>
                                            <td><?php echo $row['dept_name']?></td>
                                            <td>
                                                <a class="btn btn-sm btn-info" data-target="#edit_dept<?php echo $row['dept_id']?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                                   href="?action=transview&id=<?php echo $row['dept_id']?>&act=delete"><i class="fa fa-remove"></i></a>
                                            </td>

                                        </tr>
                                        <!--edit dept modal   data-backdrop="false"-->
                                        <div id="edit_dept<?php echo $row['dept_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                        <h4 class="modal-title">Update Department</h4>
                                                    </div>
                                                    <form method="post" action="edit_dept.php?id=<?php echo $row['dept_id']?>">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label"><strong>School Name:</strong></label>
                                                                        <select class="form-control" name="sch_name">
                                                                            <?php
                                                                            $s="SELECT * FROM schools ;";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($row5=mysqli_fetch_assoc($q)) {
                                                                                ?>
                                                                                <option
                                                                                    value="<?php echo $row5['school_id']; ?> " <?php if($row['school_id']==$row5['school_id']) echo 'selected="selected"';?> > <?php echo $row5['school_name'] ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label"><strong>Department Name:</strong></label>
                                                                        <input type="text" name="dept_name" class="form-control" id="field-1" value="<?php echo $row['dept_name']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="update" class="btn btn-info">Save changes</button>
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

<script src="../admin/assets/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/assets/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>

</html>
