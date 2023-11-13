<?php
session_start();

include 'base.php';

include 'Template.php';
Template::view('views/index.tpl', [
    'title' => 'Admin Start',
    'loggedIn'  => true
]);
