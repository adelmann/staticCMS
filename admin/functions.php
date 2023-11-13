<?php

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

    function getSectionContentByPage($pageId, $sectionId) {
        $dbConnection   = new \admin\dbConnection();
        $content        = $dbConnection->getSectionContent($pageId,$sectionId);
        if ($content != null) {
            return $content;
        }
        return null;
    }


