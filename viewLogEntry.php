<!-- ================== BEGIN BASE CSS STYL ================== -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="assets/css/animate.min.css" rel="stylesheet" />
<link href="assets/css/style.min.css" rel="stylesheet" />
<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
<!-- ================== END BASE CSS STYLE ================== -->

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/DataTables/extensions/ColReorder/css/colReorder.bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/DataTables/extensions/KeyTable/css/keyTable.bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/DataTables/extensions/RowReorder/css/rowReorder.bootstrap.min.css" rel="stylesheet" />
<link href="assets/plugins/DataTables/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="assets/plugins/pace/pace.min.js"></script>
<!-- ================== END BASE JS ================== -->

<?php


include 'menu_after_login_header.php';
//Najprv vyberie log entry na základe $ _GET ['cat_id']
// WHERE
//            log_user_id = \" . mysql_real_escape_string($_SESSION['user_id']);
//            log_date = \" . mysql_real_escape_string($_GET['datepicker']);
include 'header_log.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo ' <div class="col-md-6">';
    echo '<form class="form-viewLogEntry" role="form" method="post" action="">
        <h2 class="form-viewLogEntry-heading">View Log Entry</h2>
        </br>
   <label for="inputDate" class="sr-only">Date and Time - when the activity was performed</label>
            </br>  <input type="text" name="datepicker" id="datepicker" size="20" class="form-control" placeholder="Log Date" required autofocus>
        </br>
    </br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">View Log entries</button>
      </form>';
    echo ' </div>';
} else {
    $errors = array();
    if (!isset($_POST['datepicker'])) {
        $errors[] = 'Log Date is required.';
    }
    if (!empty($errors)) {
        echo 'Some fields are missing. <br /><br />';
        echo '<ul>';
        foreach ($errors as $key => $value) /* zobrazi všetke chyby */ {
            echo '<li>' . $value . '</li>'; /* toto vytvára pekný zoznam chýb */
        }
        echo '</ul>';
    } else {
        //  05/10/2016
        $date_log = date('Y-m-d', strtotime($_POST['datepicker']));

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
                        log_date = '" . mysql_real_escape_string(($date_log)) . "'";


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




                        echo ' <div class="col-md-10">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                                <h4 class="panel-title">View Log Entry</h4>
                            </div>
                            <div class="panel-body">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                          <tr>
                                               <th width="100px" nowrap>Log date </th>
                                                <th width="100px" nowrap>log_time</th>
                                                <th width="100px" nowrap>log_description</th>
                                                <th width="100px" nowrap>Action</th>
                                          </tr>\';
                                    </thead>
                                    <tbody>
                                    ';

                        while ($row = mysql_fetch_assoc($result)) {
                            echo '<tr odd gradeX>';

                            echo '<td class="rightpart">';
                            echo date('Y-m-d', strtotime($row['log_date']));
                            echo '</td>';

                            echo '<td >';
                            echo($row['log_time']);
                            echo '</td>';

                            echo '<td >';
                            echo($row['log_description']);
                            echo '</td>';
                            echo '<td>';
                            echo '<button type="button" ">Edit</button>';
                            echo('<button type="button" onclick="deleteLog(' . $row['id_log_entry'] . ');">Delete</button>');
                            echo '</td>';
                            echo '</tr>';
                        }

                    echo'                                           
                                </tbody>
                            </table>
                        </div>
                    </div>
			    </div>';
                    }
                }
            }
        }


    }


}

include 'footer.php';
//include 'menu_after_login_footer.php';
echo '
<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.colvis.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js"></script>
	<script src="assets/js/table-manage-combine.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
$(document).ready(function() {
    App.init();
    TableManageCombine.init();
});
	</script>
</body>
</html>
';