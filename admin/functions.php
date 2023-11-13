<?php

    /**
     * @return array
     */
    function getAllContentTypes() {
        $typeFolders = scandir('contentTypes');
        unset($typeFolders[0]);
        unset($typeFolders[1]);
        $types = [];

        foreach ($typeFolders as $typeFolder) {
            if (file_exists('contentTypes/'.$typeFolder.'/definition.php')) {
                require ('contentTypes/'.$typeFolder.'/definition.php');
                $functionName = $typeFolder.'GetElement';
                $types[$typeFolder] = $functionName();
            }
        }

        return $types;
    }

    /**
     * @param $pageId
     * @param $sectionId
     * @return array|null
     */
    function getSectionContentByPage($pageId, $sectionId) {
        $dbConnection   = new \admin\dbConnection();
        $content        = $dbConnection->getSectionContent($pageId,$sectionId);
        if ($content != null) {
            return $content;
        }
        return null;
    }

    /**
     * @return array|false
     */
    function getMediaFolderContents() {
        $mediaFolder    = glob("medias/*.{jpg,jpeg,webp,png,gif}", GLOB_BRACE);
        $mediaJSON      = json_encode($mediaFolder);
        die($mediaJSON);
    }


