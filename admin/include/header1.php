<section class="content">

    <!-- Header -->
    <header class="top-head container-fluid"  style="background-color:#4682B4">
        <button type="button" class="navbar-toggle pull-left">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Search -->
        <form role="search" class="navbar-left app-search pull-left hidden-xs">
            <h4 style="color: white;">MMUST COURSE EVALUATION SYSTEM</h4>
        </form>

        <!-- Right navbar -->
        <ul class="list-inline navbar-right top-menu top-right-menu">
            <!--
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-envelope-o "></i>
                    <span class="badge badge-sm up bg-purple count">4</span>
                </a>
                <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                    <li>
                        <p>Messages</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><img src="img/avatar-4.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                            <span class="block"><strong>John smith</strong></span>
                            <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 minutes ago</small></span>
                        </a>
                    </li>
                    <li>
                        <p><a href="inbox.html" class="text-right">See all Messages</a></p>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-sm up bg-pink count">3</span>
                </a>
                <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                    <li class="noti-header">
                        <p>Notifications</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
                            <span>New user registered<br><small class="text-muted">5 minutes ago</small></span>
                        </a>
                    </li>

                    <li>
                        <p><a href="#" class="text-right">See all notifications</a></p>
                    </li>
                </ul>
            </li>-->

            <!-- user login dropdown start-->
            <li class="dropdown text-center">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="img/logo.png" style=" width: 60px; height: 50px;" class="img-circle profile-img thumb-sm">
                    <span class="username" style="color: white;"><?php echo $fullname ;?> </span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                    <li><a href="myprofile"><i class="fa fa-briefcase"></i>Profile</a></li>
                    <!--<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                  <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li>-->
                    <li><a href="../logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- End right navbar -->

    </header>