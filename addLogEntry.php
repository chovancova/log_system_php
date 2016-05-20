<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Datepicker - Format date</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        });
    </script>
</head>
<body>


<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo '<form class="form-addLogEntry" role="form" method="post" action="">
        <h2 class="form-addLogEntry-heading">Add Log Entry</h2>
        </br>
        
         <label for="inputDate" class="sr-only">Date and Time - when the activity was performed</label>
            </br>  <input type="text" name="datepicker" id="datepicker" size="20" class="form-control" placeholder="Log Date" required autofocus>
        </br>
         <label for="inputDate" class="sr-only">How long lasts a particular activity - the number of hours and minutes</label>
          </br>    <input type="time" name="log_time" id="log_time" class="form-control" placeholder="Log Time" required autofocus>
          </br>      
         <label for="inputText" class="sr-only">A brief description of the activity</label>
          </br>    <input type="textarea" name="log_description" id="log_time" class="form-control" placeholder="Log Description" required autofocus>
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


        $sql = "INSERT INTO
                    log_entry(log_date, log_time, log_description, log_id_user)
                VALUES(
                    '" . mysql_real_escape_string($_POST['datepicker']) . "',
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