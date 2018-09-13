<?php require_once('config/dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="admin/img/logo.png">

        <title>MMUST Course Evaluation|Recover_Password</title>

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


    <body style="background-image: url('admin/img/page-background.png')">
    <div class="container-fluid" style="background-color:#4682B4">
        <div class="row">
            <div class="col-md-12">
                <h1 STYLE="color: white; font-family:  font-family: Georgia, serif; font-size: 30px; font-weight: 600; text-align: center;">MMUST COURSE EVALUATION SYSTEM</h1>
            </div>
        </div>
    </div>

        <div class="wrapper-page animated fadeInDown" style="margin-top: 80px;">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <img src="admin/img/logo.png" style="width: 120px; height: 100px; margin-left: 100px;">
                </div>
                <!--<div class="panel-heading" style="text-align: center;font-weight: bold;">RESET PASSWORD</div>--><br/>

                <form id="login" method="post" action="" role="form" class="text-center">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        Enter your <b>Email</b> and your password will be sent to you!
                    </div>
                    <div class="form-group m-b-0"> 
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" placeholder="Enter Email">
                            <span class="input-group-btn"> <button type="submit" class="btn btn-primary">Reset</button> </span> 
                        </div> <br/>
                        <a class="btn btn-sm btn-info" href="index"><i class="glyphicon glyphicon-backward"></i> Home</a>
                    </div> 
                    
                </form>
                
            </div>
        </div>

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
