<?php
include 'connect.php'; ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Log System</title>
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
<body class="pace-top">
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
	    <!-- begin login -->
        <div class="login bg-grey-900 animated fadeInDown">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand text-inverse">
                    <span class="logo"></span> Log System
                    <small>just log your time...</small>
                </div>
                <div class="icon">
                    <i class="material-icons">lock</i>
                </div>
            </div>
            <!-- end brand
            <div class="login-content">
                <form action="index.html" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg without-border inverse-mode" placeholder="Email Address" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg without-border inverse-mode" placeholder="Password" />
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-info btn-block btn-lg">Sign me in</button>
                    </div>
                </form>
            </div>
        </div>-->
        <!-- end login -->

        <?php

        //najprv skontroluje, či je používateľ už prihlásený. Ak tomu tak nie je zobrazi formular s prihlasenim
        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
            echo 'If you are already logged in, you can <a href="signout.php">log out</a>  from the system';
        } else {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                echo '<div class="login-content">';
                echo '<form class="margin-bottom-0" role="form" method="post" action="">
               <div class="form-group m-b-20">
                <input type="text"  name="user_name" id="user_name"  class="form-control input-lg without-border inverse-mode" placeholder="Email Address" required autofocus/>
                </div>
                
                 <div class="form-group m-b-20">
                        <input type="password" name="user_pass" id="user_pass"  class="form-control input-lg without-border inverse-mode" required placeholder="Password" />
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign me in</button>
                    </div>
            </form>';
                echo '</div>';
                // echo '<div class="container1"></div>';
            } else {
                /* formulár bol odoslany, budeme spracovávať dáta v troch krokoch:
                 * 1. Skontrolujte dáta
                 * 2. Necha užívateľa doplňit zle polia (v prípade potreby)
                 * 3. ak je vsetko správne odošle odpoveď
                 */
                $errors = array(); /* deklarovať pole pre neskoršie použitie */

                if (!isset($_POST['user_name'])) {
                    $errors[] = 'Username (e-mail) is required.';
                }

                if (!isset($_POST['user_pass'])) {
                    $errors[] = 'Password is required.';
                }

                if (!empty($errors)) /* skontrolujte, či je prázdne pole, ak sa vyskytnú chyby, sú v tomto poli (všimnite si! operátora) */ {
                    echo 'Some fields are missing. <br /><br />';
                    echo '<ul>';
                    foreach ($errors as $key => $value) /* zobrazi všetke chyby */ {
                        echo '<li>' . $value . '</li>'; /* toto vytvára pekný zoznam chýb */
                    }
                    echo '</ul>';
                } else {
                    //tže forma bola zverejnená bez chýb, takže ho uložiť
                    // použitie mysql_real_escape_string, kvoli security

                    $sql = "SELECT 
                        id_user,
                        user_first_name,
                        user_email,
                        user_level
                    FROM
                        user
                    WHERE
                        user_email = '" . mysql_real_escape_string($_POST['user_name']) . "'
                    AND
                        user_pass = '" . sha1($_POST['user_pass']) . "'";
//    password = '" . sha1($_POST['user_pass']) . "'";
                    $result = mysql_query($sql);
                    if (!$result) {
                        echo 'Something is wrong, you can not login please try again later.';
                        echo mysql_error();
                    } else {
                        //dotaz bol úspešne vykonaný, sú tam 2 možnosti
                        //1. dotaz vrátil do mysql,  takže môže byť používateľ prihlásený
                        //2. dotaz vrátil prázdny výsledok , poverenia boli zlé
                        if (mysql_num_rows($result) == 0) {
                            echo 'You entered a bad username / password. Please try again.';
                        } else {
                            $_SESSION['signed_in'] = true;
                            //USER_ID a user_name hodnoty v $ _SESSION, môžeme použiť na rôzne stránky
                            while ($row = mysql_fetch_assoc($result)) {
                                $_SESSION['user_id'] = $row['id_user'];
                                $_SESSION['user_name'] = $row['user_first_name'];
                                $_SESSION['user_level'] = $row['user_level'];
                            }

                            echo 'Welcome, ' . $_SESSION['user_name'] .
                                '. <br /><a href="viewLogEntry.php"> Continue.. </a>.';
                        }
                    }
                }
            }
        }
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
