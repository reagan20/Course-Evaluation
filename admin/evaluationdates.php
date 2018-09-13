<?php require_once('include/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM evaluation_dates WHERE evaluation_id='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        echo "<script> alert('Data Successfully Deleted');window.location.href='evaluationdates'  </script> ";
    }
    else{
        echo "<script> alert('Data could not be deleted!!');window.location.href='evaluationdates'  </script> ";
    }
}
?>
<!-- Aside Ends-->

<!--Main Content Start -->
<?php require_once('include/header1.php')?>
<!-- Header Ends -->

<!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-lg-4">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Add Academic Year</h3></div>
                <div class="panel-body">
                    <?php
                    if(isset($_POST['submit'])){
                        $year=$_POST['year'];

                        $s="INSERT INTO academic_year(year_name) VALUES('$year')";
                        $q=mysqli_query($conn,$s);
                        if($q){
                            echo"<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>Academic year added successfully.
                        </div>";
                        }
                        else{
                            echo"<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>Failed!!.
                        </div>";
                        }
                    }
                    ?>
                <form id="login" method="post" action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Academin Year</label> <span class="required">*</span>
                                <input class="form-control" type="text"name="year" placeholder="FROM/TO">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="form-control" type="submit" name="submit" style="background-color: #6495ED;color: white;">Submit</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="form-control" type="reset" name="submit" style="background-color: orange;color: white;">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Add Evaluation Dates</h3></div>
                <div class="panel-body">
                    <?php
                    if(isset($_POST['add'])){
                        $academic=$_POST['academic'];
                        $semester=$_POST['semester'];
                        $start=$_POST['start'];
                        $close=$_POST['close'];

                        $sql="INSERT INTO evaluation_dates(year_id,sem_id,start_date,end_date)VALUES ('$academic','$semester','$start','$close')";
                        $query=mysqli_query($conn,$sql);
                        if($query){
                            echo"<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>Success
                        </div>";
                        }
                        else{
                            echo"<div class='alert alert-warning'>
                        <button class='close' data-dismiss='alert'>&times;</button>Failed!
                        </div>";
                        }
                    }
                    ?>
                    <form id="register" method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Academin Year</label> <span class="required">*</span>
                                            <select class="form-control" id="academic" name="academic" required="required">
                                              <option value="">~~Select academic year~~</option>
                                                <?php
                                                $stmt="SELECT * FROM academic_year";
                                                $qr=mysqli_query($conn,$stmt);

                                                while($row=mysqli_fetch_assoc($qr)){
                                                    ?>
                                                    <option value="<?php echo $row['year_id']?>"><?php echo $row['year_name']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Semester</label> <span class="required">*</span>
                                            <select class="form-control" name="semester" required="required">
                                                <option value="">~~Select semester~~</option>
                                                <?php
                                                $stmt="SELECT * FROM semester";
                                                $qr=mysqli_query($conn,$stmt);

                                                while($row=mysqli_fetch_assoc($qr)){
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group date">
                                            <label class="control-label">Start Date</label> <span class="required">*</span>
                                            <input class="form-control mydatepicker" data-date-start-date="-d" data-date-format="yyyy-mm-dd" id="bdate2" type="text" name="start" placeholder="Start date" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn-default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group date">
                                            <label class="control-label">Close Date</label> <span class="required">*</span>
                                            <input class="form-control mydatepicker"  data-date-start-date="-d" data-date-format="yyyy-mm-dd" type="text"name="close" placeholder="Close date" readonly>
                                                <span class="input-group-btn">
                                                <button class="btn-default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <button class="form-control" type="submit" name="add" style="background-color: #6495ED;color: white;">Submit</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="form-control" type="reset" name="clear" style="background-color: orange;color: white;">Reset</button>
                                    </div>
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
            <!--<div class="row">
                <div class="col-lg-4">
                    <a href="add_students"><button type="button"  class="btn btn-primary">Create New +</button></a>
                </div> </div>-->
            <br/>
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Evaluation Dates</h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>Academic Year</strong></th>
                                        <th><strong>Semester</strong></th>
                                        <th><strong>Open From</strong></th>
                                        <th><strong>Open To</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql="SELECT
                                    evaluation_dates.year_id
                                    , evaluation_dates.sem_id
                                    , evaluation_dates.start_date
                                    , evaluation_dates.end_date
                                    , evaluation_dates.status
                                    , evaluation_dates.evaluation_id
                                    , academic_year.year_name
                                    , semester.sem_name
                                FROM
                                    evaluation.evaluation_dates
                                    INNER JOIN evaluation.semester
                                        ON (evaluation_dates.sem_id = semester.sem_id)
                                    INNER JOIN evaluation.academic_year
                                        ON (evaluation_dates.year_id = academic_year.year_id)";
                                    $qry=mysqli_query($conn,$sql);
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){

                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['year_name']?></td>
                                            <td><?php echo $row['sem_name']?></td>
                                            <td><?php echo $row['start_date']?></td>
                                            <td><?php echo $row['end_date']?></td>
                                            <td><?php echo $row['status']?></td>
                                            <td>
                                                <a class="btn btn-xs btn-info" data-target="#set_date<?php echo $row['evaluation_id'];?>" data-toggle="modal" data-backdrop="false"><i class="fa fa-pencil"></i>Edit</a>
                                                <a class="btn btn-xs btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                                   href="?action=transview&id=<?php echo $row['evaluation_id']?>&act=delete"><i class="fa fa-remove"></i>Remove</a>
                                            </td>

                                        </tr>
                                        <!--Update evaluation date modal-->
                                        <div id="set_date<?php echo $row['evaluation_id'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Set Evaluation Date</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="set_evaluation.php?id=<?php echo $row['evaluation_id'];?>">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Academic Year:</label>
                                                                    <select class="form-control" name="academic_year">
                                                                        <?php
                                                                        $stmt1=$conn->query("SELECT * FROM academic_year");
                                                                        while($r=mysqli_fetch_assoc($stmt1)){
                                                                            ?>
                                                                            <option value="<?php echo $row['year_id']?>"><?php echo $r['year_name'];?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Semester:</label>
                                                                    <select class="form-control" name="sem">
                                                                        <?php
                                                                        $stmt2=$conn->query("SELECT * FROM semester");
                                                                        while($r2=mysqli_fetch_assoc($stmt2)){
                                                                            ?>
                                                                            <option value="<?php echo $row['sem_id']?>"><?php echo $r2['sem_name'];?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Start Date:</label>
                                                                    <input value="<?php echo $row['start_date'];?>" class="form-control mydatepicker" data-date-start-date="-d" data-date-format="yyyy-mm-dd" type="text" name="start_date" readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="control-label">End Date:</label>
                                                                    <input value="<?php echo $row['end_date'];?>" class="form-control mydatepicker" data-date-start-date="-d" data-date-format="yyyy-mm-dd" type="text" name="end_date" readonly>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Status:</label>
                                                                    <select class="form-control" name="status">
                                                                        <option value="">~~Select Status~~</option>
                                                                        <?php
                                                                        $stmt3=$conn->query("SELECT * FROM status");
                                                                        while($r3=mysqli_fetch_assoc($stmt3)){
                                                                            ?>
                                                                            <option value="<?php echo $r3['status_id'];?>"><?php echo $r3['status_name'];?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="set_date" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save Updates</button>
                                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

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
<script src="js/validator.js"></script>
<script src="js/additional-methods.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="assets/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    // Date Picker
    jQuery('.mydatepicker').datepicker();
</script>

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
