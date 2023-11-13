<?php

namespace admin;

session_start();

//include('dbConnection.php');
require 'dbConnection.php';


$dbConnection   = new \admin\dbConnection();
$db             = $dbConnection->db;

if ( !isset($_POST['username'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Bitter Nutzernamen und Passwort angeben.');
}

$username   = $_POST['username'];
$password   = md5($_POST['password']);

$sql    = $db->query('SELECT * FROM user WHERE username="'.$username.'";');
$return = $dbConnection->handleQuery($sql);

if (array_key_exists(0,$return)) {
    if ($return[0]['userpassword'] == $password && $return[0]['username'] == $username) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $return[0]['id'];
        header('Location: index.php');
        exit;
    }
}
$_SESSION['message'] = 'Falsche Login Daten';
header('Location: login.php');
exit;




