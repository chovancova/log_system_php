<?php include 'connect.php'; ?>


<head>
    <meta charset="utf-8"/>
    <title>Log System</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic"
        rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/style.min.css" rel="stylesheet"/>
    <link href="assets/css/style-responsive.css" rel="stylesheet"/>
    <link href="assets/css/theme/default.css" rel="stylesheet" id="theme"/>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"/>
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader">
    <div class="material-loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
        <div class="message">Loading...</div>
    </div>
</div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed navbar-toggle-left" data-click="sidebar-minify">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="navbar-brand">
                    Log System
                </a>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">


                <li class="dropdown navbar-user">
                    <a href="signout.php;">Logout</a>
                </li>
            </ul>
            <!-- end header navigation right -->

            <div class="search-form">
                <button class="search-btn" type="submit"><i class="material-icons">hľadaj</i></button>
                <input type="text" class="form-control" placeholder="Search Something...">
                <a href="#" class="close" data-dismiss="navbar-search"><i class="material-icons">zatvor</i></a>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <a href="#" data-toggle="nav-profile">
                        <div class="image">
                            <img src="assets/img/user.jpg" alt=""/>
                        </div>
                        <div class="info">
                            <small>Log system user</small>
                        </div>
                    </a>
                </li>

            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Menu</li>
                <li class="has-sub active">
                    <a href="addLogEntry.php">

                        <i class="material-icons">add</i>
                        <span>Add Log Entry</span>
                    </a>

                    <a href="viewLogEntry.php">
                               <i class="material-icons">home</i>
                        <span>View Log Entry</span>
                    </a>





                </li>

                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                            class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->






    <div id="content" class="content">