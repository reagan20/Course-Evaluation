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
                <h3 class="panel-title">Add New Course</h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($_POST['submit'])){
                    $program=$_POST['program'];
                    $level=$_POST['level'];
                    $semester=$_POST['semester'];
                    $c_code=$_POST['c_code'];
                    $c_name=$_POST['c_name'];

                    $sql="INSERT INTO course(program_id,level_id,sem_id,course_code,course_name) VALUES ('$program','$level','$semester','$c_code','$c_name')";
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
                                <label for="exampleInputEmail1">Program: <span class="required">*</span></label>
                                <select class="form-control" name="program">
                                    <option value="">~~Select Program~~</option>
                                    <?php
                                    $stmt="SELECT * FROM programmes";
                                    $q=mysqli_query($conn,$stmt);

                                    while($row=mysqli_fetch_assoc($q)){
                                        ?>
                                        <option value="<?php echo $row['program_id']?>"><?php echo $row['program_name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Study Level: <span class="required">*</span></label>
                                <select class="form-control" name="level">
                                    <option value="">~~Select Level~~</option>
                                    <?php
                                    $stmt="SELECT * FROM levels";
                                    $q=mysqli_query($conn,$stmt);

                                    while($row=mysqli_fetch_assoc($q)){
                                        ?>
                                        <option value="<?php echo $row['level_id']?>"><?php echo $row['level_name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Semester: <span class="required">*</span></label>
                                <select class="form-control" name="semester">
                                    <option value="">~~Select Semester~~</option>
                                    <?php
                                    $stmt="SELECT * FROM semester";
                                    $q=mysqli_query($conn,$stmt);

                                    while($row=mysqli_fetch_assoc($q)){
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Code: <span class="required">*</span></label>
                                <input type="text" name="c_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Code">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Name: <span class="required">*</span></label>
                                <input type="text" name="c_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" name="submit" class="form-control" style="background-color: #4682B4;color: white;">Submit</button>
                        </div>
                        <div class="col-md-3">
                            <button type="reset" class="form-control" style="background-color: orange;color: white;">Reset</button>
                        </div>
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


<script src="js/jquery.app.js"></script>



</body>

</html>
