<?php
session_start();
require_once('config/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="admin/img/logo.png">

        <title>MMUST Course Evaluation|Login</title>

        <!-- Bootstrap core CSS -->
        <link href="admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="admin/css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="admin/css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="admin/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="admin/assets/morris/morris.css">


        <!-- Custom styles for this template -->
        <link href="admin/css/style.css" rel="stylesheet">
        <link href="admin/css/helper.css" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62751496-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>
<script>
    .required,.error(){
        color:red;
    }
</script>

    <body style="background-image: url('admin/img/page-background.png')">
    <div class="container-fluid" style="background-color:#4682B4">
        <div class="row">
            <div class="col-md-12">
                <h1 STYLE="color: white; font-family:  font-family: Georgia, serif; font-size: 30px; font-weight: 600; text-align: center;">COURSE EVALUATION SYSTEM</h1>
            </div>
        </div>
    </div>

        <div class="wrapper-page animated fadeInDown" style="margin-top: 50px">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <img src="admin/img/logo.png" style="width: 120px; height: 100px; margin-left: 100px;">
                   <!--<h3 class="text-center m-t-10 panel-title" ><strong>SIGN IN</strong> </h3>-->
                </div>
                    <form id="login" method="post" class="form-horizontal m-t-40" action="">
                        <?php
                        if(isset($_POST['login'])){
                            $username=mysqli_real_escape_string($conn,trim($_POST['username']));
                            $password=mysqli_real_escape_string($conn,trim($_POST['password']));
                            //$key=md5($password);

                            $query=$conn->query("SELECT * FROM login WHERE username='$username'");
                            $row=$query->fetch_array();
                            $count=$query->num_rows;

                            if($count==1){
                                if(password_verify($password, $row['password'])){
                                    if($row['role_id']==1){
                                        $_SESSION['admin']= $row['username'];
                                        $_SESSION['role_session']= $row['role_id'];
                                        echo " <script> window.location.href='admin/index';  </script>";
                                    }
                                    elseif($row['role_id']==2){
                                        $_SESSION['dean']= $row['username'];
                                        $_SESSION['role_session']= $row['role_id'];
                                        echo " <script> window.location.href='dean/dashboard';  </script>";
                                    }
                                    elseif($row['role_id']==3){
                                        $_SESSION['cod']= $row['username'];
                                        $_SESSION['role_session']= $row['role_id'];
                                        echo " <script> window.location.href='cod/dashboard';  </script>";
                                    }
                                    elseif($row['role_id']==4){
                                        $_SESSION['lecturer']= $row['username'];
                                        $_SESSION['role_session']= $row['role_id'];
                                        echo " <script> window.location.href='lecturer/dashboard';  </script>";
                                    }
                                    elseif($row['role_id']==5){
                                        $_SESSION['student']= $row['username'];
                                        $_SESSION['role_session']= $row['role_id'];
                                        echo " <script> window.location.href='student/index';  </script>";
                                    }
                                }

                                else{
                                    echo "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>
                                Sorry!! You Provided Wrong Password!! Kindly contact the administrator.</div>";
                                }
                            }

                            else{
                                echo "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>
                                Wrong Usename & Password!! Kindly check and try again</div>";
                            }
                        }

                        ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label class="control-label">Username: <span class="required">*</span></label>
                                <input name="username" class="form-control" type="text" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label>Password: <span class="required">*</span></label>
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-7"><a href="recover_password"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a></div>
                            <!--<div class="col-md-5">
                                <label class="cr-styled">
                                    <input type="checkbox" checked>
                                    <i class="fa"></i>
                                    Remember me
                                </label>
                            </div>-->
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button name="login" class="btn btn-info btn-block w-md" type="submit"><i class="fa fa-lock"></i> Log In</button>
                            </div>
                            <div class="col-md-6">
                                <a name="login" class="btn btn-default btn-block w-md" href="register">Register</a>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    <footer class="footer1" style="text-align: center; background-color: lightgrey;"> &copy; <strong><?php echo date('Y')?> EVALUATION SYSTEM</strong></footer>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="admin/js/jquery.js"></script>
    <script src="admin/js/validator.js"></script>
    <script src="admin/js/additional-methods.js"></script>
    <script src="admin/js/jquery.validate.js"></script>
        <script src="admin/js/bootstrap.min.js"></script>
        <script src="admin/js/pace.min.js"></script>
        <script src="admin/js/wow.min.js"></script>
        <script src="admin/js/jquery.nicescroll.js" type="text/javascript"></script>

        <!--common script for all pages-->
        <script src="admin/js/jquery.app.js"></script>

    </body>

</html>
