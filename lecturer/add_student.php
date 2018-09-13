<?php require_once('include/side_bar.php'); ?>

<?php require_once('include/header4.php'); ?>
<?php $get_id=$_GET['id2'];?>

<div class="wraper container-fluid">
    <div class="page-title">
        <h3 class="title">
            <a class="btn btn-primary" href="my_students<?php echo '?id2='.$get_id; ?>"><i class="fa fa-backward"></i> Back</a>
        </h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-color panel-info">
                <div class="panel-heading">
                    <i class="fa fa-users"></i> Students List
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th><strong>S/N</strong></th>
                                        <th><strong>Profile</strong></th>
                                        <th><strong>Reg. No.</strong></th>
                                        <th><strong>First Name</strong></th>
                                        <th><strong>Last Name</strong></th>
                                        <th><strong>Phone</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql4="SELECT * FROM students WHERE school_id='$sch'";
                                    $qry=mysqli_query($conn,$sql4);
                                    $count=1;
                                    while($row4=mysqli_fetch_assoc($qry)){
                                    $check=$row4['reg_number'];
                                        ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row4['passport']; ?></td>
                                        <td><?php echo $row4['reg_number']; ?></td>
                                        <td><?php echo $row4['fname']; ?></td>
                                        <td><?php echo $row4['lname']; ?></td>
                                        <td><?php echo $row4['phone']; ?></td>
                                        <td><?php echo $row4['email']; ?></td>
                                        <td>
                                            <?php
                                            $sql5=$conn->query("SELECT * FROM stude_course_lec WHERE reg_number='$check' AND course_code='$get_id'");
                                            $cn=mysqli_num_rows($sql5);
                                            if($cn==1){
                                                ?>
                                                <a class="btn btn-warning"><i class=""></i> Already assigned</a>
                                            <?php

                                            }
                                            else{
                                                ?>
                                                <a class="btn btn-success" data-target="#stude<?php echo $count; ?>" data-toggle="modal"><i class="fa fa-plus-square"></i> Add</a>
                                            <?php
                                            }

                                            ?>

                                        </td>

                                    </tr>

                                    <div id="stude<?php echo $count; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                    <h4 class="modal-title" id="myModalLabel"> Assign Student a Course</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="assign_course?id=<?php echo $row4['reg_number']?>">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Registration Number:</label>
                                                                    <input type="text" name="reg" class="form-control" id="reg" value="<?php echo $row4['reg_number']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">PF Number:</label>
                                                                    <input type="text" name="pf" class="form-control" id="pf" value="<?php echo $pf; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Course Code:</label>
                                                                    <input type="text" name="code" class="form-control" id="code" value="<?php echo $get_id; ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="save" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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

<!-- Modal-Effect -->
<script src="assets/modal-effect/js/classie.js"></script>
<script src="assets/modal-effect/js/modalEffects.js"></script>

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
