<?php
session_start();

include 'Template.php';

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $_SESSION['message'] = '';
}
Template::view('views/login.tpl', [
    'title'     => 'Admin Start',
    'message'   => $message,
    'loggedIn'  => false
]);
