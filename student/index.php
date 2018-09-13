<?php require_once('include/side_bar.php') ?>
        <!-- Aside Ends-->
        <!--Main Content Start -->
<?php require_once('include/header5.php') ?>
            <!-- Header Ends -->

            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">


<!--                <div class="row">-->
<!--                    <div class="col-lg-3 col-sm-6">-->
<!--                        --><?php
//                        $sql="SELECT * FROM schools";
//                        $query=mysqli_query($conn,$sql);
//                        $count=mysqli_num_rows($query);
//                        ?>
<!--                        <a href="schools"><div class="widget-panel widget-style-2 white-bg">-->
<!--                            <i class="ion-eye text-pink"></i> -->
<!--                            <h2 class="m-0 counter">--><?php //echo $count;?><!--</h2>-->
<!--                            <div>Schools</div>-->
<!--                        </div></a>-->
<!--                    </div>-->
<!--                    <div class="col-lg-3 col-sm-6">-->
<!--                        --><?php
//                        $sql="SELECT * FROM departments";
//                        $query=mysqli_query($conn,$sql);
//                        $count=mysqli_num_rows($query);
//                        ?>
<!--                        <a href="departments"><div class="widget-panel widget-style-2 white-bg1">-->
<!--                            <i class="ion-wifi text-purple"></i> -->
<!--                            <h2 class="m-0 counter">--><?php //echo $count;?><!--</h2>-->
<!--                            <div>Departments</div>-->
<!--                        </div></a>-->
<!--                    </div>-->
<!--                    <div class="col-lg-3 col-sm-6">-->
<!--                        --><?php
//                        $sql="SELECT * FROM programmes";
//                        $query=mysqli_query($conn,$sql);
//                        $count=mysqli_num_rows($query);
//                        ?>
<!--                        <a href="programs"><div class="widget-panel widget-style-2 white-bg2">-->
<!--                            <i class="ion-ios7-pricetag text-info"></i> -->
<!--                            <h2 class="m-0 counter">--><?php //echo $count;?><!--</h2>-->
<!--                            <div>Programs</div>-->
<!--                        </div></a>-->
<!--                    </div>-->
<!--                    <div class="col-lg-3 col-sm-6">-->
<!--                        --><?php
//                        $sql="SELECT * FROM course";
//                        $query=mysqli_query($conn,$sql);
//                        $count=mysqli_num_rows($query);
//                        ?>
<!--                        <a href="courses"><div class="widget-panel widget-style-2 white-bg3">-->
<!--                            <i class="ion-android-contacts text-success"></i> -->
<!--                            <h2 class="m-0 counter">--><?php //echo $count;?><!--</h2>-->
<!--                            <div>Courses</div>-->
<!--                        </div></a>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="row">
                <?php require_once('nav.php');?>
                    <div class="col-md-9">
                        <div class="page-title">
                            <h4 class="title">STUDENT DASHBOARD</h4>
                        </div>
                        <?php
                        $check=$conn->query("SELECT * FROM evaluation_dates WHERE status='1'");
                        $count=$check->num_rows;
                        if($count>0){
                            ?>
                            <div class="alert alert-success"><marquee>EVALUATION SESSION CURRENTLY OPENED. Please evaluate your courses.</marquee></div>
                        <?php
                        }
                        else{
                            ?>
                            <div class="alert alert-warning"><marquee>EVALUATION SESSION CURRENTLY CLOSED. Please keep checking when it is opened to evaluate your courses.</marquee></div>
                        <?php
                        }

                        ?>

                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading"><i class="fa fa-question"></i> Guidelines</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><strong>About Course Evaluation</strong></h4><hr>
                                        <p>Course evaluation is a questionnaire that provides a means to produce useful as well as timely feedback from students
                                            on course coverage. These feedback are used by the instructors and their departments to improve the quality of instructions
                                            provided by the assigned lecturer.
                                        </p>
                                        <p><strong>MMUST guarantees the students anonymity of there responses. </strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><strong>Requirements</strong></h4><hr>
                                        <p>You are eligible to evaluate the courses you take in a semester if the following conditions are met:</p>
                                        <ol>
                                            <li>First you must have registered for the courses at the beginning of the semester. </li>
                                            <!--<li>You must have cleared at least 80% of the total required fee amount. </li>-->
                                            <li>You must have attended at least 75% of the total class attendance.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>

            <footer class="footer" style="text-align: center;">
                &copy; <strong><?php echo date('Y')?> MMUST Course Evaluation System.</strong>
            </footer>
            <!-- Footer Ends -->

        <!--</section>-->

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
