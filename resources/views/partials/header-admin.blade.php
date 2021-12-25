<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ URL::to('src/images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ URL::to('src/images/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ URL::to('src/images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::to('src/images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>

            <li class="treeview">
                <a href="{{ route('admin.account') }}">
                    <i class="fa fa-dashboard"></i> <span>Account</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>


            <li class="treeview">
                <a href="{{ route('admin.users') }}">
                    <i class="fa fa-files-o"></i>
                    <span>Users</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<span class="label label-primary pull-right">4</span>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>--}}
                {{--<li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>--}}
                {{--<li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>--}}
                {{--<li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>--}}
                {{--</ul>--}}
            </li>
            <li>
                <a href="{{ route('admin.products') }}">
                    <i class="fa fa-th"></i> <span>Products</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<small class="label pull-right bg-green">Hot</small>--}}
                    {{--</span>--}}
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories') }}">
                    <i class="fa fa-pie-chart"></i>
                    <span>Categories</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>--}}
                {{--<li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>--}}
                {{--<li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>--}}
                {{--<li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>--}}
                {{--</ul>--}}
            </li>
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-laptop"></i>--}}
            {{--<span>UI Elements</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>--}}
            {{--<li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>--}}
            {{--<li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>--}}
            {{--<li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>--}}
            {{--<li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>--}}
            {{--<li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-edit"></i> <span>Forms</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>--}}
            {{--<li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>--}}
            {{--<li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-table"></i> <span>Tables</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
            {{--<li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            <li>
                <a href="{{ route('admin.messages') }}">
                    <i class="fa fa-envelope"></i> <span>Messages</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-yellow">12</small>
                      <small class="label pull-right bg-green">16</small>
                      <small class="label pull-right bg-red">5</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports') }}">
                    <i class="fa fa-calendar"></i> <span>Abuse Reports</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-red">3</small>
                      <small class="label pull-right bg-blue">17</small>
                    </span>
                </a>
            </li>
            {{--<li class="treeview active">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-folder"></i> <span>Examples</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>--}}
            {{--<li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>--}}
            {{--<li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>--}}
            {{--<li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>--}}
            {{--<li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>--}}
            {{--<li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>--}}
            {{--<li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>--}}
            {{--<li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>--}}
            {{--<li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
            {{--<a href="">--}}
            {{--<i class="fa fa-share"></i> <span>Payments</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--<li>--}}
            {{--<a href="#"><i class="fa fa-circle-o"></i> Level One--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
            {{--<li>--}}
            {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            <li><a href="{{ route('admin.pages') }}"><i class="fa fa-book"></i> <span>Pages</span></a></li>
            <li><a href="{{ route('admin.logout') }}"><i class="fa fa-circle-o"></i> <span>Logout</span></a></li>
            {{--<li class="header">LABELS</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

{{--<header class="mb20">--}}
{{--<div class="nav-container">--}}


{{--<nav id="nav" class="navbar navbar-default navbar-fixed-top sb-slide">--}}
{{--<div class="container">--}}

{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav" aria-expanded="false" aria-controls="topnav">--}}
{{--<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<div id="logo" class="hidden-xsx">--}}
{{--<a href="/"><img id="logo-img" src="{{ URL::to('src/images/logo.png') }}" alt=""/></a>--}}
{{--</div>--}}
{{--</div>--}}


{{--<div id="topnav" class="hidden-xsx">--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li></li>--}}
{{--<li><a href="{{ route('home') }}">Fron Page</a></li>--}}


{{--@if(Auth::check())--}}
{{--<li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
{{--<li><a href="{{ route('admin.products') }}">Requests</a></li>--}}
{{--<li><a href="{{ route('admin.users') }}">Users</a></li>--}}
{{--<li><a href="{{ route('admin.categories') }}">Categories</a></li>--}}

{{--<li>--}}
{{--<div class="btn-group" style="margin-left:10px">--}}
{{--<button id="myid" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
{{--<img src="" class="img-circle" alt=""/>&nbsp;<span class="menutext">{{ Auth::user()->name }}</span>&nbsp; <span class="caret"></span>--}}
{{--</button>--}}
{{--<ul class="dropdown-menu dropdown-menu-right" role="menu">--}}
{{--<li><a href="{{ route('profile') }}">Profile</a></li>--}}
{{--<li><a href="{{ route('settings') }}">Credit</a></li>--}}

{{--<!--<li><a href="/xfers/wallet">Airfrov Wallet</a></li>-->--}}
{{--<li><a href="{{ route('wallet') }}">Wallet</a></li>--}}

{{--<!--<li><a href="/xfers/wallet">Airfrov Wallet</a></li>-->--}}
{{--<li><a href="{{ route('settings') }}">Settings</a></li>--}}
{{--<li><a href="{{ route('admin.logout') }}">Logout</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</li>--}}

{{--@else--}}
{{--<li><a href="#">How it works</a></li>--}}
{{--<li><a href="{{ route('login') }}">Login</a></li>--}}
{{--<li><a href="{{ route('register') }}">Register</a></li>--}}
{{--@endif--}}

{{--</ul>--}}
{{--</div>--}}
{{--</div> <!-- end container div -->--}}
{{--</nav>--}}
{{--</div>--}}
{{--</header>--}}