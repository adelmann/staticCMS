<?php

    namespace admin;

    include('dbConnection.php');

    use admin\dbconnection;

    $setup = new setup();
    $setup->addTables();
    $setup->addAdminUser();

    class setup {
        public $dbConnection = null;
        public $db = null;

        public function __construct() {
            $dbConnection = new dbconnection();
            $this->db           = $dbConnection->db;
        }

        public function addTables() {
            $this->db->exec(
                "
                    CREATE TABLE 'user' (
                        'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        'username' TEXT,
                        'userpassword' TEXT
                    )"
            );

            $this->db->exec(
                "
                    CREATE TABLE 'pages' (
                        'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        'internalName' TEXT,
                        'title' TEXT,
                        'subTitle' TEXT,
                        'description' TEXT,
                        'keywords' TEXT
                    )"
            );

            $this->db->exec(
                "
                    CREATE TABLE 'sections' (
                        'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        'internalName' TEXT,
                        'pageId' INTEGER,
                        'title' TEXT,
                        'subTitle' TEXT,
                        'classes' TEXT,
                        'sort' INTEGER
                    )"
            );

            $this->db->exec(
                "
                    CREATE TABLE 'content' (
                        'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        'internalName' TEXT,
                        'pageId' INTEGER,
                        'sectionId' INTEGER,
                        'type' TEXT,
                        'title' TEXT,
                        'subTitle' TEXT,
                        'content' TEXT,
                        'classes' TEXT,
                        'sort' INTEGER
                    )"
            );

            $this->db->exec(
                "
                    CREATE TABLE 'menus' (
                        'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        'internalName' TEXT,
                        'menuType' INTEGER,
                        'title' TEXT,
                        'layer' TEXT,
                        'link' TEXT,
                        'classes' TEXT
                    )"
            );
        }

        public function addAdminUser() {

            $defaultPWD = md5('-=!ADMIN!=-');
            $this->db->exec(
                "
                    REPLACE INTO user (username,userpassword)
                            VALUES ('admin', '".$defaultPWD."');
                "
            );
        }

    }
