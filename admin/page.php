<?php

namespace admin;

session_start();

include 'base.php';

require 'dbConnection.php';
include 'Template.php';
include 'functions.php';

$dbConnection   = new \admin\dbConnection();
$db             = $dbConnection->db;
$call           = null;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $call       = $_POST['fnc'];
    $id         = $_POST['id'];
} elseif ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    $call   = $_GET['fnc'];
    $id     = $_GET['id'];
} else {
    $url = parse_url($_SERVER['REQUEST_URI']);
    if(isset($url['fnc']) && isset($url['id'])){
        $_GET['id'] = $url['id'];
        $id         = $url['id'];
        $call       = $url['fnc'];
    }
}

if ($call == 'edit') {
    $page       = $dbConnection->getPage($id);
    $sections   = $dbConnection->getAllSections($id);
    $types      = getAllContentTypes();


    \Template::view('views/page.tpl', [
        'title'     => 'staticCMS Seite',
        'loggedIn'  => true,
        'page'      => $page,
        'sections'  => $sections,
        'types'     => $types,
    ]);
} elseif($call == 'delete') {
    $id     = $_GET['id'];
    $dbConnection->deletePage($id);
    header('Location: pages.php');
    exit;
} elseif($call == 'new') {
    $dbConnection->db->exec(
        "
                    REPLACE INTO pages (internalName,title)
                            VALUES ('Neue Seite', 'Neue Seite');
                "
    );
    $newId = $dbConnection->db->lastInsertRowID();
    header('Location: page.php?fnc=edit&id='.$newId);
    exit;
} elseif ($call == 'update') {

    // Update Page MetaDatas
    $dbConnection->db->exec("
        UPDATE pages SET
                         internalName = '".$_POST['internalName']."',
                         title = '".$_POST['title']."',
                         subTitle = '".$_POST['subTitle']."',
                         keywords = '".$_POST['keywords']."',
                         description = '".$_POST['description']."'
                WHERE id = '".$id."';
    ");


    // Update Sections
    $sections = $_POST['section'];

    foreach ($sections as $key=>$section) {
        // check if section exists
        $exists = $dbConnection->dbQuery("SELECT count(*) as counter FROM sections WHERE id = '".$key."'");
        if ($exists['counter'] == 1) {
            $dbConnection->db->exec("
                UPDATE sections SET
                                    internalName = '".$section['internalName']."',
                                    classes = '".$section['classes']."',
                                    title = '".$section['title']."',
                                    subTitle = '".$section['subTitle']."',
                                    sort = '".$section['sort']."'
                                    WHERE id = '".$key."';
            ");

        } else {
            $dbConnection->db->exec(
                "
                    REPLACE INTO sections (internalName,classes, title, subTitle, sort, pageId)
                            VALUES (
                                '".$section['internalName']."',
                                '".$section['classes']."',
                                '".$section['title']."',
                                '".$section['subTitle']."',
                                '".$section['sort']."',
                                '".$id."'
                            );
                "
            );
        }
    }

    // Update content in sections
    if (array_key_exists('content',$_POST)) {
        $contentBlock = $_POST['content'];
        foreach ($contentBlock as $sectionID=>$contents) {

            foreach ($contents as $key=>$content) {

                $aContentData = $content;
                unset($aContentData['internalName']);
                unset($aContentData['title']);
                unset($aContentData['subTitle']);
                unset($aContentData['type']);

                // new entry
                if ($key < 0) {
                    $sql = "REPLACE INTO content (internalName, title, subTitle, content, pageId, sectionId, type)";
                    $sql .= "VALUES (";
                    $sql .= "'".$content['internalName']."',";
                    $sql .= "'".$content['title']."',";
                    $sql .= "'".$content['subTitle']."',";
                    $sql .= "'".json_encode($aContentData)."',";
                    $sql .= "'".$id."',";
                    $sql .= "'".$sectionID."',";
                    $sql .= "'".$content['type']."'";
                    $sql .= ");";
                    $dbConnection->db->exec($sql);
                } else {
                    $existsContent = $dbConnection->dbQuery("SELECT count(*) as counter FROM content WHERE id = '" . $key . "'");
                    if ($existsContent['counter'] == 1) {
                        die("UPDATE");
                    }
                }


            }
        }
    }

    header('Location: page.php?fnc=edit&id='.$id);
    exit;
}




