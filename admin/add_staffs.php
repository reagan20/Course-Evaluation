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
                <h3 class="panel-title">Create New Staff</h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($_POST['submit'])){
                    $title=$_POST['title'];
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $pf_no=$_POST['pf_no'];
                    $gender=$_POST['gender'];
                    $role=$_POST['role'];
                    $email=$_POST['email'];
                    $dept=$_POST['department'];
                    $school=$_POST['school'];

                    $sql="INSERT INTO users(school_id,dept_id,role_id,title,fname,mname,lname,pf_number,gender,email) VALUES ('$school','$dept','$role','$title','$fname','$mname','$lname','$pf_no','$gender','$email')";
                    $query=mysqli_query($conn,$sql);
                    if($query){
                        echo"<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>Data Successfully Saved
                        </div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>Failed!! Please try again.
                        </div>".mysqli_error($conn);
                    }
                }
                ?>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">School: <span class="required">*</span></label>
                                <select class="form-control" name="school" id="school">
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
                                <select class="form-control" name="department" id="department">
                                    <option value="">~~Select Department~~</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title: <span class="required">*</span></label>
                                <select class="form-control" name="title">
                                    <option value="">~~Select Title~~</option>
                                    <option value="PROF.">PROF.</option>
                                    <option value="DR.">DR.</option>
                                    <option value="MR.">MR.</option>
                                    <option value="MRS.">MRS.</option>
                                    <option value="MS">MS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name: <span class="required">*</span></label>
                                <input type="text" name="fname" class="form-control" id="exampleInputEmail1" placeholder="Enter firstname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Middle Name:</label>
                                <input type="text" name="mname" class="form-control" id="exampleInputEmail1" placeholder="Enter middlename">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name: <span class="required">*</span></label>
                                <input type="text" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Enter lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">PF Number: <span class="required">*</span></label>
                                <input type="text" name="pf_no" class="form-control" id="exampleInputEmail1" placeholder="Enter PF Number.">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gender: <span class="required">*</span></label>
                                <select class="form-control" name="gender">
                                    <option>~~Select Gender~~</option>
                                    <option value="MALE">MALE</option>
                                    <option VALUE="FEMALE">FEMALE</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Role: <span class="required">*</span></label>
                                <select class="form-control" name="role">
                                    <option value="">~~Select User Role~~</option>
                                    <?php
                        $stmt="SELECT * FROM roles WHERE role_id IN (2,3,4)";
                        $q=mysqli_query($conn,$stmt);

                        while($row=mysqli_fetch_assoc($q)){
                        ?>
                                    <option value="<?php echo $row['role_id']?>"><?php echo $row['role_name']?></option>
                                    <?php
                        }
                        ?>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address: <span class="required">*</span></label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address">
                            </div>
                        </div>


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
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/loader.js"></script>


<script src="js/jquery.app.js"></script>



</body>

</html>
