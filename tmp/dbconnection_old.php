<?php

class dbconnection
{
    public $db;

    public function __construct() {
        $this->db   = new SQLite3('data/panzirsch');
    }


    /**
     * @param $results
     * @return array
     */
    public function handleQuery($results) {
        $data= array();
        while ($res= $results->fetchArray(1))
        {
            array_push($data, $res);

        }
        return $data;
    }

    /**
     * @return array
     */
    public function getAllPages() {
        $pages = $this->db->query('SELECT * FROM pages;');
        return $this->handleQuery($pages);
    }

    /**
     * @param $name
     * @return array
     */
    public function getConfigValue($name) {
        $sql = $this->db->query('SELECT value FROM config WHERE name="'.$name.'";');
        $return = $this->handleQuery($sql);
        return $return[0]['value'];
    }

    /**
     * @param $id
     * @return array
     */
    public function getBannerValues($id) {
        $sql = $this->db->query('SELECT * FROM banner WHERE id="'.$id.'"');
        $return =  $this->handleQuery($sql);
        return $return[0];
    }

    public function getImageTextValues($id) {
        $sql = $this->db->query('SELECT * FROM imageText WHERE id="'.$id.'"');
        $return =  $this->handleQuery($sql);
        return $return[0];
    }

    public function getContactValues($id) {
        $sql = $this->db->query('SELECT * FROM contact WHERE id="'.$id.'"');
        $return =  $this->handleQuery($sql);
        return $return[0];
    }

    public function getTimetable($id) {
        $sql = $this->db->query('SELECT * FROM timetable WHERE id="'.$id.'"');
        $return =  $this->handleQuery($sql);
        return $return[0];
    }

    public function getNews() {
        $sql = $this->db->query('SELECT * FROM textonly WHERE id="1"');
        $return =  $this->handleQuery($sql);
        return $return[0];
    }

    /**
     * @param $id
     * @return array
     */
    public function getPage($id) {
        $page = $this->db->query('SELECT * FROM pages WHERE id = "'.$id.'"');
        return $this->handleQuery($page);
    }


    /* *****************************************************************************************************************
        SETUP
    ***************************************************************************************************************** */

    /**
     * @return void
     */
    public function setup() {
        $this->addConfig();
        $this->addBanner();
        $this->addImageText();
        $this->addTeam();
        $this->addGallery();
        $this->addContact();
        $this->addTimeTable();
        $this->textOnly();
    }




    public function addConfig() {
        $this->db->exec("CREATE TABLE 'config' ('id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 'name' TEXT, 'value' TEXT)");
    }

    public function addBanner() {
        $this->db->exec(
            "
                CREATE TABLE 'banner' (
                    'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    'image' TEXT,
                    'title' TEXT,
                    'subtitle' TEXT,
                    'subtitlelink' TEXT,
                    'subtitlelinktitle' TEXT,
                    'bigBoxTitle' TEXT,
                    'bigBoxText' TEXT,
                    'bigBoxLink' TEXT,
                    'bigBoxLinkText' TEXT,
                    'subBox1Title' TEXT,
                    'subBox1Text' TEXT,
                    'subBox2Title' TEXT,
                    'subBox2Text' TEXT
                )"
        );
    }

    public function addImageText() {
        $this->db->exec(
            "
                CREATE TABLE 'imageText' (
                    'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    'title' TEXT,
                    'subtitle' TEXT,
                    'Text' TEXT,
                    'imagelink' TEXT
                )"
        );
    }

    public function addTeam() {
        $this->db->exec(
            "
                CREATE TABLE 'team' (
                    'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    'title' TEXT,
                    'subtitle' TEXT,
                    'text' TEXT
                )"
        );
    }

    public function addGallery() {
        $this->db->exec(
            "
                CREATE TABLE 'gallery' (
                    'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    'title' TEXT,
                    'subtitle' TEXT,
                    'Text' TEXT
                )"
        );
    }

    public function addContact() {
        $this->db->exec(
            "
                CREATE TABLE 'contact' (
                    'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    'title' TEXT,
                    'description' TEXT,
                    'subBox1Title' TEXT,
                    'subBox1Description' TEXT,
                    'subBox2Title' TEXT,
                    'subBox2Description' TEXT,
                    'phoneBoxTitle1' TEXT,
                    'phoneBoxNumber1' TEXT,
                    'phoneBoxTitle2' TEXT,
                    'phoneBoxNumber2' TEXT,
                    'phoneBoxFaxTitle1' TEXT,
                    'phoneBoxFaxNumber1' TEXT
                )"
        );
    }

    public function addTimeTable() {
        $this->db->exec(
            "
                CREATE TABLE 'timetable' (
                    'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    'title' TEXT,
                    'description' TEXT,
                    'info' TEXT,
                    'box1Title' TEXT,
                    'box1Icon' TEXT,
                    'box1Text' TEXT,
                    'box2Title' TEXT,
                    'box2Icon' TEXT,
                    'box2Text' TEXT,
                    'box3Title' TEXT,
                    'box3Icon' TEXT,
                    'box3Text' TEXT,
                    'box4Title' TEXT,
                    'box4Icon' TEXT,
                    'box4Text' TEXT,
                    'box5Title' TEXT,
                    'box5Icon' TEXT,
                    'box5Text' TEXT,
                    'box6Title' TEXT,
                    'box6Icon' TEXT,
                    'box6Text' TEXT
                )"
        );
    }

    public function textOnly()
    {
        $this->db->exec(
            "
                CREATE TABLE 'textonly' (
                    'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                    'title' TEXT,
                    'subtitle' TEXT,
                    'text' TEXT
                )"
        );
    }



}
