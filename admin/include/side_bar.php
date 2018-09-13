
<?php require_once('../config/dbconnect.php');
session_start();
//$role=  $_SESSION['role_session'];
if(!isset($_SESSION['admin'])  && (!isset($_SESSION['role_session'])))
{
    //header("Location:../index.php");
    echo " <script> window.location.href='../index.php';  </script>";
}
elseif($_SESSION['role_session']!=1){
    echo " <script> window.location.href='../index.php';  </script>";
}

else{
    $session_id= $_SESSION['admin'];
    $query=$conn->query("SELECT lecturers.*, login.username
 FROM lecturers INNER JOIN login  ON (lecturers.pf_number = login.username) WHERE (login.username ='$session_id')");
    $row=$query->fetch_array();
    $count=$query->num_rows;
    $fname=$row['firstname'];
    $lname=$row['lastname'];
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

    <link rel="shortcut icon" href="img/logo.png">

    <title>MMUST|Admin_Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">

    <!--Animation css-->
    <link href="css/animate.css" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

    <!-- Plugins css -->
    <link href="assets/modal-effect/css/component.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/morris/morris.css">

    <script src="assets/bootstrap-datepicker/bootstrap-datepicker.min.css"></script>

    <!-- sweet alerts -->
    <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

    <!--data tables-->
    <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <script src="js/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">

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
    <style>
        .required,.error{
            color: red;
        }
    </style>

</head>
<body>

<!-- Aside Start-->
<aside class="left-panel">

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="active"><a href="index"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a></li>
            <li class="has-submenu"><a href=""><i class="fa fa-cog"></i> <span class="nav-label">System Management</span>

                </a>
                <ul class="list-unstyled">
                    <li><a href="evaluationdates"><i class="fa fa-calendar"></i>Evaluation Dates</a></li>
                    <li><a href="schools">Schools</a></li>
                    <li><a href="departments">Departments</a></li>
                    <li><a href="programmes">Programmes</a></li>
                    <li><a href="courses">Courses/Units</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span>

                </a>
                <ul class="list-unstyled">
                    <li><a href="admin_accounts">Admin</a></li>
                    <li><a href="staffs">Staffs</a></li>
                    <li><a href="students">Students</a></li>
                </ul>
            </li>
            <li class=""><a href="course_allocation"><i class="fa fa-book"></i> <span class="nav-label">Course Allocation</span></a></li>
            <li class=""><a href="evaluation_results"><i class="fa fa-bell"></i> <span class="nav-label">Evaluation Results</span></a></li>
            <!--<li class="has-submenu"><a href="#"><i class="fa fa-book"></i> <span class="nav-label">Reports</span>-->

                </a>
                <ul class="list-unstyled">
                    <li><a href="#">Test</a></li>
                </ul>
            </li>
           <!-- <li class="has-submenu"><a href="#"><i class="ion-flask"></i> <span class="nav-label">UI Elements</span>

                </a>
                <ul class="list-unstyled">
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="panels.html">Panels</a></li>
                    <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                    <li><a href="modals.html">Modals</a></li>
                    <li><a href="bootstrap-ui.html">BS Elements</a></li>
                    <li><a href="progressbars.html">Progress Bars</a></li>
                    <li><a href="notification.html">Notification</a></li>
                    <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-settings"></i> <span class="nav-label">Components</span><span class="badge bg-success">New</span></a>
                <ul class="list-unstyled">
                    <li><a href="grid.html">Grid</a></li>
                    <li><a href="portlets.html">Portlets</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="nestable-list.html">Nesteble</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                    <li><a href="ui-sliders.html">Range Slider</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-compose"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="form-elements.html">General Elements</a></li>
                    <li><a href="form-validation.html">Form Validation</a></li>
                    <li><a href="form-advanced.html">Advanced Form</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                    <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                    <li><a href="code-editor.html">Code Editors</a></li>
                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    <li><a href="image-crop.html">Image Crop</a></li>
                    <li><a href="form-xeditable.html">X-Editable</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-grid"></i> <span class="nav-label">Data Tables</span></a>
                <ul class="list-unstyled">
                    <li><a href="tables.html">Basic Tables</a></li>
                    <li><a href="table-datatable.html">Data Table</a></li>
                    <li><a href="tables-editable.html">Editable Table</a></li>
                    <li><a href="responsive-table.html">Responsive Table</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-stats-bars"></i> <span class="nav-label">Charts</span><span class="badge bg-purple">1</span></a>
                <ul class="list-unstyled">
                    <li><a href="morris-chart.html">Morris Chart</a></li>
                    <li><a href="chartjs.html">Chartjs</a></li>
                    <li><a href="flot-chart.html">Flot Chart</a></li>
                    <li><a href="rickshaw-chart.html">Rickshaw Chart</a></li>
                    <li><a href="peity-chart.html">Peity Chart</a></li>
                    <li><a href="c3-chart.html">C3 Chart</a></li>
                    <li><a href="other-chart.html">Other Chart</a></li>
                </ul>
            </li>

            <li class="has-submenu"><a href="#"><i class="ion-email"></i> <span class="nav-label">Mail</span></a>
                <ul class="list-unstyled">
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="email-compose.html">Compose Mail</a></li>
                    <li><a href="email-read.html">View Mail</a></li>
                    <li><a href="email-templates.html">Email Templates</a></li>
                </ul>
            </li>

            <li class="has-submenu"><a href="#"><i class="ion-location"></i> <span class="nav-label">Maps</span></a>
                <ul class="list-unstyled">
                    <li><a href="gmap.html"> Google Map</a></li>
                    <li><a href="vector-map.html"> Vector Map</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-document"></i> <span class="nav-label">Pages</span><span class="badge bg-pink">5</span></a>
                <ul class="list-unstyled">
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="contact.html">Contact-list</a></li>
                    <li><a href="../index.php">Login</a></li>
                    <li><a href="../register.php">Register</a></li>
                    <li><a href="../recover_password.php">Recover Password</a></li>
                    <li><a href="lock-screen.html">Lock Screen</a></li>
                    <li><a href="blank.html">Blank Page</a></li>
                    <li><a href="404.html">404 Error</a></li>
                    <li><a href="404_alt.html">404 alt</a></li>
                    <li><a href="500.html">500 Error</a></li>
                </ul>
            </li>-->
        </ul>
    </nav>

</aside>