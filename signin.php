<?php

//signin.php
include 'connect.php';
include 'header.php';


//najprv skontroluje, či je používateľ už prihlásený. Ak tomu tak nie je zobrazi formular s prihlasenim
if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
    echo 'If you are already logged in, you can <a href="signout.php">log out</a>  from the system';
} else {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo '<form class="form-signin" role="form" method="post" action="">
                <h2 class="form-signin-heading">Login</h2>
                <label for="inputText" class="sr-only">E-Mail</label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="E-Mail" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                 <input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>';
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
                         '. <br /><a href="index.php"> Continue.. </a>.';
                }
            }
        }
    }
}

include 'footer.php';
