<?php


include 'menu_after_login_header.php';
include 'header_log.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo '<form class="form-addLogEntry" role="form" method="post" action="">
        <h2 class="form-addLogEntry-heading">Add Log Entry</h2>
        </br>
        
         <label for="inputDate" class="sr-only">Date and Time - when the activity was performed</label>
            </br>  <input type="text" name="datepicker" id="datepicker" size="20" class="form-control" placeholder="Log Date" required autofocus>
        </br>
         <label for="inputDate" class="sr-only">How long lasts a particular activity - the number of hours and minutes</label>
          </br>    <input type="time" name="log_time" id="log_time" class="form-control" placeholder="hh:mm:ss" required autofocus>
          </br>      
         <label for="inputText" class="sr-only">A brief description of the activity</label>
          </br>    <input type="textarea" name="log_description" id="log_description" class="form-control" placeholder="Log Description" required autofocus>
     </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add activity</button>
      </form>';
} else {

    $errors = array();
    if (!isset($_POST['datepicker'])) {
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
        $date_log = date( 'Y-m-d',strtotime( $_POST['datepicker']));

        $sql = "INSERT INTO
                    log_entry(log_date, log_time, log_description, log_id_user)
                VALUES(
                    '" . mysql_real_escape_string($date_log) . "',
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

include 'menu_after_login_footer.php';