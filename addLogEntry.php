<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo '<form class="form-addLogEntry" role="form" method="post" action="">
        <h2 class="form-addLogEntry-heading">Add Log Entry</h2>
        </br>
         <label for="inputDate" class="sr-only">Date and Time - when the activity was performed</label>
             <input type="date" name="log_date" id="log_date" class="form-control" placeholder="Log Date" required autofocus>
        </br>
         <label for="inputDate" class="sr-only">How long lasts a particular activity - the number of hours and minutes</label>
             <input type="time" name="log_time" id="log_time" class="form-control" placeholder="Log Time" required autofocus>
          </br>      
         <label for="inputText" class="sr-only">A brief description of the activity</label>
             <input type="textarea" name="log_description" id="log_time" class="form-control" placeholder="Log Description" required autofocus>
     </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add activity</button>
      </form>';
} else {

    $errors = array();
    if (!isset($_POST['log_date'])) {
        $errors[] = 'Log Date is required.';
    }

    if (!isset($_POST['log_time'])) {
        $errors[] = 'Log Time is required.';
    }

    if (!isset($_POST['log_description'])) {
        $errors[] = 'Log Description is required.';
    }
    
    if (!empty($errors))  {
        echo 'Some fields are missing. <br /><br />';
        echo '<ul>';
        foreach ($errors as $key => $value) /* zobrazi všetke chyby */ {
            echo '<li>' . $value . '</li>'; /* toto vytvára pekný zoznam chýb */
        }
        echo '</ul>';
    } else {


        $sql = "INSERT INTO
                    log_entry(log_date, log_time, log_description, log_id_user)
                VALUES(
                    '" . mysql_real_escape_string($_POST['log_date']) . "',
                    '" . mysql_real_escape_string($_POST['log_time']) . "',
                    '" . mysql_real_escape_string($_POST['log_description']) . "',
                    '" . mysql_real_escape_string($_SESSION['user_id']) . "'
                                   )";
        $result = mysql_query($sql);
        if (!$result) {
            echo "<div> 'Something went wrong. Please try again later..'  </div>";
            echo mysql_error();
        } else {
            echo 'You Successfully add log_entry.</a>. ';
        }
        ///
        ///
        ///
        ///
    }
}