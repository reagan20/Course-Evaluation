<?php require_once('include1/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM programmes WHERE program_id='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Programme successfully deleted.</div>";
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
    <!--<div class="page-title">
        <h3 class="title">Datatable</h3>
    </div>-->

    <!-- #4682B4-->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-4">
                    <button type="button" data-target="#add_program" data-toggle="modal" class="btn btn-primary" data-whatever="@mdo">Create New +</button>
                </div> </div>
            <br/>
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
                    $sql="SELECT * FROM evaluation.programmes INNER JOIN evaluation.departments
                    ON (programmes.dept_id = departments.dept_id) INNER JOIN evaluation.schools
                    ON (departments.school_id = schools.school_id)WHERE programmes.school_id='$school' GROUP BY programmes.program_id ASC ;";
                    $qry=mysqli_query($conn,$sql);
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><strong>Programme ID</strong></th>
                                        <th><strong>Programme Name</strong></th>
                                        <th><strong>School</strong></th>
                                        <th><strong>Departmet</strong></th>
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
                                            <td><?php echo $row['program_id']?></td>
                                            <td><?php echo $row['program_name']?></td>
                                            <td><?php echo $row['school_name']?></td>
                                            <td><?php echo $row['dept_name']?></td>
                                            <td>
                                                <a class="btn btn-xs btn-info" data-target="#edit_program<?php echo $count;?>" data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a>
                                                <a class="btn btn-xs btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                                   href="?action=transview&id=<?php echo $row['program_id']?>&act=delete">Delete</a>
                                            </td>

                                        </tr>

                                        <!--edit prog modal-->
                                        <div id="edit_program<?php echo $count;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                        <h4 class="modal-title">Edit Program</h4>
                                                    </div>
                                                    <form method="post" action="edit_program.php?id=<?php echo $row['program_id']?>">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label"><strong>Department Name:</strong></label>
                                                                        <select class="form-control" name="dept_name">
                                                                            <?php
                                                                            $s="SELECT * FROM departments WHERE school_id='$school' ;";
                                                                            $q=mysqli_query($conn,$s);
                                                                            while($row5=mysqli_fetch_assoc($q)) {
                                                                                ?>
                                                                                <option
                                                                                    value="<?php echo $row5['dept_id']; ?> " <?php if($row['dept_id']==$row5['dept_id']) echo 'selected="selected"';?> > <?php echo $row5['dept_name'] ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label"><strong>Program Name:</strong></label>
                                                                        <input type="text" name="program_name" class="form-control" id="field-1" value="<?php echo $row['program_name']?>">
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

    <!--add program modal-->
    <div id="add_program" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">New Department</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="../admin/add_program.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">School Name:</label>
                                    <select class="form-control" name="school">
                                        <option value="">~~select school~~</option>
                                        <?php
                                        $stmt="SELECT * FROM schools WHERE school_id='$school'";
                                        $qry=mysqli_query($conn,$stmt);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            ?>
                                            <option value="<?php echo $row['school_id']?>"><?php echo $row['school_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label"><strong>Department Name:</strong></label>
                                    <select class="form-control" name="dept_id">
                                        <option value="">~~select department~~</option>
                                        <?php
                                        $stmt="SELECT * FROM departments WHERE school_id='$school'";
                                        $qry=mysqli_query($conn,$stmt);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            ?>
                                            <option value="<?php echo $row['dept_id']?>"><?php echo $row['dept_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label"><strong>Program ID:</strong></label>
                                    <input type="text" name="prog_id" class="form-control" id="field-1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label"><strong>Program Name:</strong></label>
                                    <input type="text" name="prog_name" class="form-control" id="field-1" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
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
