<?php require_once('include1/side_bar.php');
?>

<?php require_once('include1/header2.php'); ?>

<div class="wraper container-fluid">
    <div class="page-title">
        <!--<h4 class="title">LECTURER DASHBOARD</h4>-->
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-color panel-info">
                <div class="panel-heading"><i class="fa fa-user"></i> My Profile</div>
                <div class="panel-body">
                    <form role="form" method="post" action="">
                        <?php
                        if(isset($_POST['update'])){
                            $t=$_POST['title'];
                            $f=$_POST['fname'];
                            $m=$_POST['mname'];
                            $l=$_POST['lname'];
                            $e=$_POST['email'];
                            $mo=$_POST['mobile'];

                            $sql2=$conn->query("UPDATE lecturers SET title='$t', firstname='$f', midname='$m', lastname='$l', mail='$e', mobile='$mo' WHERE pf_number='$pf'");
                            if($sql2){
                                echo"<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>&times;</button>Profile successfully updated..
                                    </div>";
                                echo " <script> window.location.href='myprofile';  </script>";
                            }
                            else{
                                echo"<div class='alert alert-warning'>
                                <button class='close' data-dismiss='alert'>&times;</button>Failed!!.
                                    </div>".mysqli_error($conn);
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">PF Number:</label>
                                    <input type="text" class="form-control" name="pf" value="<?php echo $pf;?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title:</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $title;?>" readonly>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name:</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Middle Name:</label>
                                    <input type="text" class="form-control" name="mname" value="<?php echo $mname;?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name:</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $mail;?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile:</label>
                                    <input type="text" class="form-control" name="mobile" value="<?php echo $mobile;?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-color panel-info">
                <div class="panel-heading"><i class="fa fa-lock"></i> Change Password</div>
                <div class="panel-body">
                   <form method="post" action="">
                       <?php
                       if(isset($_POST['update_pass'])){
                           $p=$_POST['password'];
                           $pp=md5($p);
                           $sql3=$conn->query("UPDATE login SET password='$pp' WHERE username='$pf'");
                           if($sql3){
                               echo"<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>&times;</button>Password successfully updated.</div>";
                               //echo " <script> window.location.href='myprofile';  </script>";
                           }
                           else{
                               echo"<div class='alert alert-warning'>
                                <button class='close' data-dismiss='alert'>&times;</button>Failed.</div>";
                           }
                       }
                       ?>
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-group">
                                   <label for="exampleInputEmail1">New Password:</label>
                                   <input type="password" class="form-control" name="password">
                               </div>
                           </div>
                           <div class="col-md-12">
                               <div class="form-group">
                                   <label for="exampleInputEmail1">Confirm New Password:</label>
                                   <input type="password" class="form-control" name="password2">
                               </div>
                           </div>

                       </div>
                       <div class="row">
                           <div class="col-md-12">
                               <button type="submit" name="update_pass" class="form-control" style="background-color: cornflowerblue">Reset Password</button>
                           </div>
                           <div class="col-md-12">
                               <button type="reset" class="form-control" style="background-color: darkorange">Cancel</button>
                           </div>
                       </div>
                   </form>
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
