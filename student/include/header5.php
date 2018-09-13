<!--<section class="content">-->

    <!-- Header -->
    <header class="top-head container-fluid"  style="background-color:#4682B4">

        <!-- Search -->
        <form role="search" class="navbar-left app-search pull-left hidden-xs">
            <h4 style="color: white;">WELCOME TO: MMUST COURSE EVALUATION SYSTEM</h4>
        </form>

        <!-- Right navbar -->
        <ul class="list-inline navbar-right top-menu top-right-menu">
            <li class="dropdown text-center">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="../admin/img/logo.png" style=" width: 60px; height: 50px;" class="img-circle profile-img thumb-sm">
                    <span class="username" style="color: white;"><?php echo $fullname ;?> </span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                    <li><a href="myprofile"><i class="fa fa-briefcase"></i>Profile</a></li>
                    <li><a href="../logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
        <!-- End right navbar -->

    </header>