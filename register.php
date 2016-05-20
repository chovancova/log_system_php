<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Log System | Register Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
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
	<div id="page-container" class="fade">
	    <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="assets/img/login-bg/bg-6.jpg" alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="material-icons text-cyan pull-left m-r-5">edit</i> Announcing the Log System app</h4>
                    <p>
                        The aim is to create a web application where the user can log in using their working time, and write a brief note on what worked. The application will be accessible only to logged-in users, and the user will be able to register through a simple form, which fills in name, email address and password. Records should include:
                    <ul>
                        <li>Date and Time - when the activity is performed
                        <li>the number of hours and minutes - How long lasts a particular activity
                        <li>a brief description of the activity
                        <li>Name of the user who created this record
                    </ul>
                    Logged in user can only see your records, you will be able to browse them and edit.
                    Records should be able to navigate through the days, weeks or months.
                    Also, you will be able to export these records to a CSV file.
                    Records should be sorted by date.
                    A user with administrator rights will be able to browse the records of all users, but will not be able to edit them.
                    The administrator should see a summary overview of users worked (login) in hours.
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Sign Up
                    <small>Create your Log System Account.</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->


<?php

//signup.php
include 'connect.php';
//include 'header.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    echo '     <div class="register-content">
                    <form action="" method="POST" class="margin-bottom-0">
                        <label class="control-label">Name</label>
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15">
                                <input name="user_first_name" id="user_first_name" 
                                type="text" class="form-control" placeholder="First name" required autofocus>
                            </div>
                            <div class="col-md-6 m-b-15">
                                <input name="user_last_name" id="user_last_name" 
                                type="text" class="form-control" placeholder="Last name" required autofocus>
                            </div>
                        </div>
                        <label class="control-label">Email</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="email" id="user_email" name="user_email" 
                                type="text" class="form-control" placeholder="Email address" required autofocus>
                            </div>
                        </div>
                        
                        <label class="control-label">Password</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" name="user_pass" id="user_pass"  
                                 class="form-control" placeholder="Password" required autofocus>
                            </div>
                        </div>
                        <label class="control-label">Re-enter Password</label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input name="user_pass_check" id="user_pass_check" type="password" class="form-control" placeholder="Re-enter Password" required autofocus>
                            </div>
                        </div>
                        
                         <div class="register-buttons">
                            <button type="submit" class="btn btn-info btn-block btn-lg">Sign Up</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                            Already a member? Click <a href="login.php">here</a> to login.
                        </div>
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; Log System - Chovancova 2016
                        </p>
                    </form>
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->';




    /*echo '<form class="form-signin" role="form" method="post" action="">
        <h2 class="form-signin-heading">Sign up</h2>
        <label for="inputText" class="sr-only">Name</label>
             <input type="text" name="user_first_name" id="user_first_name" class="form-control" placeholder="First Name" required autofocus>
        <label for="inputText" class="sr-only">Surname</label>
             <input type="text" name="user_last_name" id="user_last_name" class="form-control" placeholder="Last Name" required autofocus>
              <label for="inputEmail" class="sr-only">E-Mail</label>
             <input type="email" id="user_email" name="user_email" class="form-control" placeholder="E-Mail" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
             <input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Password again </label>
             <input type="password" name="user_pass_check" id="user_pass_check" class="form-control" placeholder="Password again" required>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      </form>';
    */
} else {

    if (isset($_POST['user_first_name'])) {

        if (!ctype_alpha($_POST['user_first_name'])) {
            $errors[] = 'Name can only contain letters.';
        }
        if (strlen($_POST['user_first_name']) > 30) {
            $errors[] = 'Name may not be longer than 30 characters.';
        }
    } else {
        $errors[] = 'Name is required. ';
    }

    if (isset($_POST['user_last_name'])) {

        if (!ctype_alpha($_POST['user_last_name'])) {
            $errors[] = 'Surname can only contain letters.';
        }
        if (strlen($_POST['user_last_name']) > 30) {
            $errors[] = 'Surname may not be longer than 30 characters.';
        }
    } else {
        $errors[] = 'Surname is required. ';
    }

    if (isset($_POST['user_email'])) {

        if (strlen($_POST['user_email']) > 30) {
            $errors[] = 'Email may not be longer than 30 characters.';
        }
    } else {
        $errors[] = 'Email is required. ';
    }

    if (isset($_POST['user_pass'])) {
        if ($_POST['user_pass'] != $_POST['user_pass_check']) {
            $errors[] = 'Please check that your passwords match and try again.';
        }
    } else {
        $errors[] = 'Password is required.';
    }

    if (!empty($errors)) {

        echo 'There was a problem:<br /><br />';
        echo '<ul>';
        foreach ($errors as $key => $value) {

            echo '<li>' . $value . '</li>';
        }
        echo '</ul>';
    } else {

        $sql = "INSERT INTO
                    user(user_email, user_pass, user_level, user_first_name, user_last_name)
                VALUES('" . mysql_real_escape_string($_POST['user_email']) . "',
                       '" . sha1($_POST['user_pass']) . "',
                        0,
                       '" . mysql_real_escape_string($_POST['user_first_name']) . "',
                        '" . mysql_real_escape_string($_POST['user_last_name']) . "'
                                   )";//nastavim si level na , jednotku nastavujem administratorovi

        $result = mysql_query($sql);
        if (!$result) {
            echo "<div> 'Something went wrong. Please try again later..'  </div>";
            echo mysql_error();
        } else {
            echo 'Successfully registered. Now you can <a href="login.php">Sign in</a>. ';
        }
    }
}

include 'footer.php';
?>



	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
