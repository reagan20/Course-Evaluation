<?php require_once('include1/side_bar.php') ?>
<!-- Aside Ends-->
<!--Main Content Start -->
<?php require_once('include1/header2.php') ?>
<!-- Header Ends -->

<div class="wraper container-fluid">
    <div class="page-title">
        <h3 class="title">ADMIN DASHBOARD</h3>
    </div>

    <div class="row">
<!--        <div class="col-lg-3 col-sm-6">-->
<!--            --><?php
//            $sql="SELECT * FROM departments WHERE school_id='$school'";
//            $query=mysqli_query($conn,$sql);
//            $count=mysqli_num_rows($query);
//            ?>
<!--            <a href="departments"><div class="widget-panel widget-style-2 white-bg1">-->
<!--                    <i class="ion-wifi text-purple"></i>-->
<!--                    <h2 class="m-0 counter">--><?php //echo $count;?><!--</h2>-->
<!--                    <div>Departments</div>-->
<!--                </div></a>-->
<!--        </div>-->
        <div class="col-lg-3 col-sm-6">
            <?php
            $sql="SELECT * FROM programmes WHERE school_id='$school'";
            $query=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($query);
            ?>
            <a href="programmes">
                <div class="widget-panel widget-style-2 white-bg2">
                    <i class="ion-ios7-pricetag text-info"></i>
                    <h2 class="m-0 counter"><?php echo $count;?></h2>
                    <div>Programmes</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <?php
            $sql="SELECT * FROM course WHERE school_id='$school'";
            $query=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($query);
            ?>
            <a href="courses">
                <div class="widget-panel widget-style-2 white-bg3">
                    <i class="ion-android-contacts text-success"></i>
                    <h2 class="m-0 counter"><?php echo $count;?></h2>
                    <div>Courses</div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well well-lg">
                <h3>Welcome back, you are logged in as COD</h3>
                <p>The following are the operations that you will be able to perform as a dean.<br/>
                <ol>
                    <li>Assigning lecturers courses.</li>
                    <li>Adding a new programme.</li>
                    <li>Adding new course.</li>
                    <li>Viewing evaluation results from the student feedback.</li>
                </ol>
                </p>
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

<!-- Todo -->
<script src="../admin/js/jquery.todo.js"></script>


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

</body>

</html>
