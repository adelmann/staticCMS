<?php

namespace admin;

session_start();

include 'base.php';

require 'dbConnection.php';
include 'Template.php';

$dbConnection   = new \admin\dbConnection();
$db             = $dbConnection->db;
$pages          = $dbConnection->getAllPages();

\Template::view('views/pages.tpl', [
    'title' => 'staticCMS Seiten',
    'loggedIn'  => true,
    'pages' => $pages
]);

