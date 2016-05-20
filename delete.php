<?php
include 'connect.php';


    $sql = "delete from log_entry
                                      WHERE
                    log_entry.id_log_entry =  " . mysql_real_escape_string($_POST['delete_id']);
$result = mysql_query($sql);
if($result){
    echo json_encode(['success'=>true]);
}else{
    echo json_encode(['success'=>false]);
}
