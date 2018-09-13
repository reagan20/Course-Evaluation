<?php require_once('include/side_bar.php') ?>
        <!-- Aside Ends-->
        <!--Main Content Start -->
<?php require_once('include/header1.php')?>
            <!-- Header Ends -->

            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">ADMIN DASHBOARD</h3>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <?php
                        $sql="SELECT * FROM schools";
                        $query=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($query);
                        ?>
                        <a href="schools"><div class="widget-panel widget-style-2 white-bg">
                            <i class="ion-eye text-pink"></i> 
                            <h2 class="m-0 counter"><?php echo $count;?></h2>
                            <div>Schools</div>
                        </div></a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <?php
                        $sql="SELECT * FROM departments";
                        $query=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($query);
                        ?>
                        <a href="departments"><div class="widget-panel widget-style-2 white-bg1">
                            <i class="ion-wifi text-purple"></i> 
                            <h2 class="m-0 counter"><?php echo $count;?></h2>
                            <div>Departments</div>
                        </div></a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <?php
                        $sql="SELECT * FROM programmes";
                        $query=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($query);
                        ?>
                        <a href="programmes"><div class="widget-panel widget-style-2 white-bg2">
                            <i class="ion-ios7-pricetag text-info"></i> 
                            <h2 class="m-0 counter"><?php echo $count;?></h2>
                            <div>Programmes</div>
                        </div></a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <?php
                        $sql="SELECT * FROM course";
                        $query=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($query);
                        ?>
                        <a href="courses"><div class="widget-panel widget-style-2 white-bg3">
                            <i class="ion-android-contacts text-success"></i> 
                            <h2 class="m-0 counter"><?php echo $count;?></h2>
                            <div>Courses</div>
                        </div></a>
                    </div>
                </div> <!-- end row -->

<!--                <div class="row">-->
<!---->
<!--                    <div class="col-lg-12">-->
<!--                        <div class="portlet">-->
<!--                            <div class="portlet-heading">-->
<!--                                <h3 class="portlet-title text-dark text-uppercase">-->
<!--                                    Yearly Report-->
<!--                                </h3>-->
<!--                                <div class="portlet-widgets">-->
<!--                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>-->
<!--                                    <span class="divider"></span>-->
<!--                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>-->
<!--                                    <span class="divider"></span>-->
<!--                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>-->
<!--                                </div>-->
<!--                                <div class="clearfix"></div>-->
<!--                            </div>-->
<!--                            <div id="portlet2" class="panel-collapse collapse in">-->
<!--                                <div class="portlet-body">-->
<!--                                    <div id="morris-area-example" style="height: 320px;"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div> -->
<!--                        -->
<!--                    </div>-->
<!---->
<!--                </div>-->
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
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>

        <!-- Counter-up -->
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- EASY PIE CHART JS -->
        <script src="assets/easypie-chart/easypiechart.min.js"></script>
        <script src="assets/easypie-chart/jquery.easypiechart.min.js"></script>
        <script src="assets/easypie-chart/example.js"></script>


        <!--C3 Chart-->
        <script src="assets/c3-chart/d3.v3.min.js"></script>
        <script src="assets/c3-chart/c3.js"></script>

        <!--Morris Chart-->
        <script src="assets/morris/morris.min.js"></script>
        <script src="assets/morris/raphael.min.js"></script>

        <!-- sparkline --> 
        <script src="assets/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script> 

        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="js/jquery.app.js"></script>
        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>
        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>


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
