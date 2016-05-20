<?php

session_start();
$server = 'localhost'; //server takmer vzdy localhost
$username = 'azet'; //uzivatelske meno pre databazu
$password = 'matematika'; //heslo k databazy
$database = 'log_system'; // nazov databazy

if (!mysql_connect($server, $username, $password)) {
    exit('Chyba: Nemohlo nadviazat pripojenie k databaze');
}
if (!mysql_select_db($database)) {
    exit('Chyba: Nemozno vybrat databazu');
}

