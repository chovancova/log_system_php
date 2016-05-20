<?php
include 'header_log.php';

//Najprv vyberie log entry na základe $ _GET ['cat_id']
// WHERE
//            log_user_id = \" . mysql_real_escape_string($_SESSION['user_id']);
//            log_date = \" . mysql_real_escape_string($_GET['datepicker']);

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo '<form class="form-viewLogEntry" role="form" method="post" action="">
        <h2 class="form-viewLogEntry-heading">View Log Entry</h2>
        </br>
   <label for="inputDate" class="sr-only">Date and Time - when the activity was performed</label>
            </br>  <input type="text" name="datepicker" id="datepicker" size="20" class="form-control" placeholder="Log Date" required autofocus>
        </br>
    </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">View Log entries</button>
      </form>';
}else{
    $errors = array();
    if (!isset($_POST['datepicker'])) {
        $errors[] = 'Log Date is required.';
    }
    if (!empty($errors))  {
        echo 'Some fields are missing. <br /><br />';
        echo '<ul>';
        foreach ($errors as $key => $value) /* zobrazi všetke chyby */ {
            echo '<li>' . $value . '</li>'; /* toto vytvára pekný zoznam chýb */
        }
        echo '</ul>';
    } else {


        $sql = "SELECT      id_log_entry,
                    log_date,
                    log_time,
                    log_description,
                    log_id_user
                    FROM
                        log_entry
                    WHERE
                        log_id_user = '" . mysql_real_escape_string($_SESSION['user_id']) . "'
                    AND
                        log_date = '" . mysql_real_escape_string($_POST['datepicker']) . "'";


        $result = mysql_query($sql);

        if (!$result) {
            echo 'Log entry can not be displayed, please try again later.' . mysql_error();
        } else {
            if (mysql_num_rows($result) == 0) {
                echo 'Log entry does  not exist. ';
            } else {
                //dotaz k log entry

                $result = mysql_query($sql);

                if (!$result) {
                    echo 'Log entry sa nedá zobraziť, skúste to prosím neskôr znovu.';
                } else {
                    if (mysql_num_rows($result) == 0) {
                        echo 'There are no log entry.';
                    } else {
                        //prepare the table
                        echo '<table border="1">
                      <tr>
                        <th>log_date</th>
                        <th>log_time</th>
                        <th>log_description</th>
                        <th>Action</th>
                      </tr>';

                        while ($row = mysql_fetch_assoc($result)) {
                            echo '<tr>';

                            echo '<td class="rightpart">';
                            echo date('Y-m-d', strtotime($row['log_date']));
                            echo '</td>';

                            echo '<td >';
                            echo ($row['log_time']);
                            echo '</td>';

                            echo '<td >';
                            echo ($row['log_description']);
                            echo '</td>';
                           echo '<td>';
                            echo '<button type="button">Edit</button>';
                            echo '<button type="button">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                }
            }
        }
        echo '</table>';




    }


}

include 'footer.php';


