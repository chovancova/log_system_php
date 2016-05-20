<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="LOG_SYSTEM" />
        <meta name="keywords" content="LOG_SYSTEM" />
        <title>Log system</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="signin.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-1.11.1.js" type="text/javascript"></script>
        <script src="script.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    </head>
    <body>
        <h1>Log system</h1>
        <div id="wrapper">
            <div id='cssmenu'>

              <div id="userbar">
                    <?php
                    if ($_SESSION['signed_in']) {
                        echo 'Hello <b>' . htmlentities($_SESSION['user_name'])
                        . '</b>. <a class="item" href="signout.php">Sign out</a>';

                        echo '</b>. <a class="item" href="addLogEntry.php">Add Log entry</a>';
                    } else {
                        echo '<a class="item" href="signin.php">Sign in</a> '
                        . 'alebo <a class="item" href="signup.php">Sign up</a>';
                    }
                    ?>
                </div>
            </div>
            <div id="content">


