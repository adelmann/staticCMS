<?php

namespace admin;

class dbConnection
{
    public $db;

    public function __construct() {
        $this->db   = new \SQLite3('db/staticCMS');
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
     * @param $sql
     * @return array
     */
    public function dbQuery($sql) {
        $query = $this->db->query($sql);
        return $this->handleQuery($query)[0];
    }

    /**
     * @param $id
     * @return array
     */
    public function getPage($id) {
        $page = $this->db->query('SELECT * FROM pages WHERE id = "'.$id.'"');
        return $this->handleQuery($page)[0];
    }

    /**
     * @param $id
     * @return void
     */
    public function deletePage($id) {
        $page   = $this->db->query('DELETE FROM pages WHERE id="'.$id.'";');
    }

    /**
     * @return array
     */
    public function getAllSections($id) {
        $pages = $this->db->query('SELECT * FROM sections WHERE pageId="'.$id.'" ORDER BY sort ASC;');
        return $this->handleQuery($pages);
    }

    /**
     * @return array
     */
    function getSectionContent($pageId, $sectionID) {
        $contents = $this->db->query('SELECT * FROM content WHERE pageId="'.$pageId.'" AND sectionId ="'.$sectionID.'" ORDER BY sort ASC;');
        return $this->handleQuery($contents);
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


}
