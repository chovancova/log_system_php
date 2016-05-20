<?php

//signup.php
include 'connect.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo '<form class="form-signin" role="form" method="post" action="">
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
            echo 'Successfully registered. Now you can <a href="signin.php">Sign in</a>. ';
        }
    }
}

include 'footer.php';
