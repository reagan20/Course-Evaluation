<?php
require_once('../config/dbconnect.php');
session_start();
//$role=  $_SESSION['role_session'];
if(!isset($_SESSION['student'])  && (!isset($_SESSION['role_session'])))
{
    echo " <script> window.location.href='../index.php';  </script>";
}
elseif($_SESSION['role_session']!=5){
    echo " <script> window.location.href='../index.php';  </script>";
}

else{
    $session_id= $_SESSION['student'];
    $query=$conn->query("SELECT students.*, login.username
    FROM evaluation.students INNER JOIN evaluation.login  ON (students.reg_number = login.username) WHERE (login.username ='$session_id')");
    $row=$query->fetch_array();
    $count=$query->num_rows;
    $fname=$row['fname'];
    $lname=$row['lname'];
    $reg=$row['reg_number'];
    $gender=$row['gender'];
    $academic_year=$row['academic_year'];
    $level=$row['level'];
    $semester=$row['semester'];
    $programme=$row['program_id'];
    //$photo=$row['photo'];
    $fullname= $fname.' '.$lname;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="../admin/img/logo.png">

    <title>MMUST|Student_Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/css/bootstrap-reset.css" rel="stylesheet">

    <!--Animation css-->
    <link href="../admin/css/animate.css" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="../admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../admin/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

    <!-- Plugins css -->
    <link href="../admin/assets/modal-effect/css/component.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../admin/assets/morris/morris.css">

    <script src="../admin/assets/bootstrap-datepicker/bootstrap-datepicker.min.css"></script>

    <!-- sweet alerts -->
    <link href="../admin/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

    <!--data tables-->
    <link href="../admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <script src="../admin/js/jquery.min.js"></script>
    <link href="../admin/css/style.css" rel="stylesheet">
    <link href="../admin/css/helper.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="../admin/js/html5shiv.js"></script>
    <script src="../admin/js/respond.min.js"></script>
    <![endif]-->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-62751496-1', 'auto');
        ga('send', 'pageview');

    </script>
    <style>
        .required,.error{
            color: red;
        }
    </style>

</head>
<body>

<!-- Aside Start-->
<!--<aside class="left-panel">

    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="active"><a href="dashboard"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a></li>
            <li class=""><a href="register_course"><i class="fa fa-book"></i> <span class="nav-label">Register Courses</span></a></li>
            <li class=""><a href="courses"><i class="fa fa-book"></i> <span class="nav-label">Courses</span></a></li>
        </ul>
    </nav>

</aside>-->