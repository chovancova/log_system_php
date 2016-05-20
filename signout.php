<?php
//signout.php
include 'header.php';
include 'menu_after_login_header.php';
include 'header_log.php';


echo '<h2>Sign Out</h2>';
 
//skontroluje uživateľa
if($_SESSION['signed_in'] == true)
{
    //strážiť všetky premenné
    $_SESSION['signed_in'] = NULL;
    $_SESSION['user_name'] = NULL;
    $_SESSION['user_id']   = NULL;
 
    echo 'You have successfully logged out, thank you for visiting.';
}
else
{
    echo 'You are not log in <a href="login.php">Login</a>?';
}
 include 'footer.php';

include 'menu_after_login_footer.php';