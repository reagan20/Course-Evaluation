<?php require_once('include/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM schools WHERE school_id='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> School successfully deleted.</div>";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>

<?php require_once('include/header1.php')?>

    <div class="wraper container-fluid">
        <!--<div class="page-title">
            <h3 class="title">Datatable</h3>
        </div>-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">ADD SCHOOLS</div>
                    <div class="panel-body">
                        <?php
                        if(isset($_POST['submit'])){
                            $sch=$_POST['school'];

                            $sql="INSERT INTO schools(school_name) VALUES ('$sch')";
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
                                        <label for="exampleInputEmail1">School Name:</label>
                                        <input type="text" class="form-control" name="school" id="school" placeholder="Enter School Name" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
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
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-xs btn-danger">Export PDF <i class="fa fa-sign-out"></i></button>
                    </div>
                </div>
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">School List</h3>
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
                                        <th><strong>S/N</strong></th>
                                        <th><strong>School Name</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql="SELECT * FROM schools ";
                                    $qry=mysqli_query($conn,$sql);
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){

                                    ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <!--<td><?php //echo $row['school_id']?></td>-->
                                        <td><?php echo $row['school_name']?></td>
                                        <td>
                                            <a class="btn btn-xs btn-info" data-target="#edit_school<?php echo $row['school_id']?>"  data-toggle="modal" data-backdrop="static"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-xs btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                               href="?action=transview&id=<?php echo $row['school_id']?>&act=delete"><i class="fa fa-remove"></i> Remove</a>
                                        </td>

                                    </tr>
                                    <!--edit school modal-->
                            <div id="edit_school<?php echo $row['school_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                            <h4 class="modal-title">Update School</h4>
                                        </div>
                                        <form method="post" action="edit_sch.php?id=<?php echo $row['school_id']?>" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label"><strong>School Name:</strong></label>
                                                            <input type="text" name="sch_name" class="form-control" value="<?php echo $row['school_name']?>" id="field-1" placeholder="">
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!-- Modal-Effect -->
<script src="assets/modal-effect/js/classie.js"></script>
<script src="assets/modal-effect/js/modalEffects.js"></script>


<script src="js/jquery.app.js"></script>

<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>

</html>
