<?php
//signout.php
include 'connect.php';
include 'header.php';
 
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
    echo 'You are not log in <a href="signin.php">Login</a>?';
}
 include 'footer.php';