<?php require_once('include/side_bar.php')?>
<!-- Aside Ends-->

<!--Main Content Start -->
<?php require_once('include/header1.php')?>

<!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">
    <div class=" col-md-12 col-sm-12 col-lg-12">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Create New Student</h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($_POST['submit'])){
                $fname=$_POST['fname'];
                $mname=$_POST['mname'];
                $lname=$_POST['lname'];
                $regno=$_POST['regno'];
                $gender=$_POST['gender'];
                //$role=$_POST['role'];
                $role=5;
                $email=$_POST['email'];
                $dept=$_POST['department'];
                    $school=$_POST['school'];
                    $program=$_POST['program'];

                 $sql="INSERT INTO users(school_id,dept_id,program_id,role_id,fname,mname,lname,reg_number,gender,email) VALUES ('$school','$dept','$program','$role','$fname','$mname','$lname','$regno','$gender','$email')";
                    $query=mysqli_query($conn,$sql);
                    if($query){
                        echo"<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>Data Successfully Saved
                        </div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>Failed!! Please try again.
                        </div>";
                    }
                }
                ?>
                <form id="register" method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">School: <span class="required">*</span></label>
                                <select class="form-control" name="school" id="school" required="required">
                                    <option value="">~~Select School~~</option>
                                    <?php
                                    $stmt="SELECT * FROM schools";
                                    $q=mysqli_query($conn,$stmt);

                                    while($row=mysqli_fetch_assoc($q)){
                                        ?>
                                        <option value="<?php echo $row['school_id']?>"><?php echo $row['school_name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Department: <span class="required">*</span></label>
                                <select class="form-control" name="department" id="department" required="required">
                                    <option value="">~~Select Department~~</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Programme: <span class="required">*</span></label>
                                <select class="form-control" name="program" id="program" required="required">
                                    <option value="">~~Select Programme~~</option>
                                </select>

                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name: <span class="required">*</span></label>
                            <input type="text" name="fname" class="form-control" id="fname" required="required" placeholder="Enter firstname">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name:</label>
                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Enter middlename">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name: <span class="required">*</span></label>
                            <input type="text" name="lname" class="form-control" id="lname" required="required" placeholder="Enter lastname">
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reg. Number: <span class="required">*</span></label>
                                <input type="text" name="regno" class="form-control" id="regno" required="required" placeholder="Enter RegNo.">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gender: <span class="required">*</span></label>
                                <select class="form-control" name="gender" id="gender" required="required">
                                    <option>~~Select Gender~~</option>
                                    <option value="MALE">MALE</option>
                                    <option VALUE="FEMALE">FEMALE</option>
                                </select>
                            </div>
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address: <span class="required">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" required="required" placeholder="Enter Email Address">
                        </div>
                    </div>
                </div>
                    <div class="row">


                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" name="submit" class="form-control" style="background-color: #4682B4;color: white;">Submit</button>
                        </div>
                        <div class="col-md-3"><button type="reset" class="form-control" style="background-color: orange;color: white;">Reset</button></div>
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
<script src="js/jquery.js"></script>
<script src="js/additional-methods.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/validator.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/loader.js"></script>

<script src="js/jquery.app.js"></script>



</body>

</html>
