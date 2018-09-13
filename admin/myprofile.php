<?php require_once('include/side_bar.php')?>

<?php require_once('include/header1.php')?>

<div class="wraper container-fluid">
    <div class="row">
    <div class=" col-md-7 col-sm-7 col-lg-7">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ADMINISTRATOR DETAILS</h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($_POST['submit'])){
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];

                    $sql="UPDATE users SET fname='$fname',mname='$mname',lname='$lname',email='$email',phone='$phone' WHERE email='$session_id'";
                    $query=mysqli_query($conn,$sql);
                    if($query){
                        echo"<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>&times;</button>Profile Successfully Updated
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
                            <img src="img/33.png" style="height: 150px; width: 150px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name:</label>
                                <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $row['firstname']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Middle Name:</label>
                                <input type="text" name="mname" class="form-control" id="mname" value="<?php echo $row['midname']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name:</label>
                                <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $row['lastname']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone:</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $row['mobile']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address:</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['mail']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo:</label>
                                <input type="file" name="email" class="form-control" id="email" value="<?php// echo $row['mail']; ?>">
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
        <div class=" col-md-5 col-sm-5 col-lg-5">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">RESETTING PASSWORD</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if(isset($_POST['update'])){
                        $password=$_POST['password'];
                        $password2=$_POST['password'];
                        //$safe=md5($password);

                        $sql="UPDATE users SET password='$password' WHERE email='$session_id'";
                        if(mysqli_query($conn, $sql)){
                            echo"<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>&times;</button>Password Update
                                </div>";
                        }
                        else{
                            echo"<div class='alert alert-warning'>error encountered</div>".mysqli_error($conn);
                        }
                        mysqli_close($conn);
                    }
                    ?>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Enter New Password: <span class="required">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password: <span class="required">*</span></label>
                                    <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="update" class="form-control" style="background-color: #4682B4;color: white;">Update</button>
                            </div>
                            <div class="col-md-6"><button type="reset" class="form-control" style="background-color: orange;color: white;">Reset</button></div>
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>


<script src="js/jquery.app.js"></script>



</body>

</html>
