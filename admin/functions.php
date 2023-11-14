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
            foreach ($content as $key=>$item) {
                $content[$key]['content'] = unescape_string($content[$key]['content']);
            }
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

    function getLinksContents() {
        $id = 6;
        global $dbConnection;
        $content['pages']       = $dbConnection->getAllPages();
        $content['sections']    = $dbConnection->getAllSections($id);
        $linksJSON              = json_encode($content);
        die ($linksJSON);
    }

    function escape_string(string $unescaped_string): string
    {
        $replacementMap = [
            "\0" => "\\0",
            "\n" => "\\n",
            "\r" => "\\r",
            "\t" => "\\t",
            chr(26) => "\\Z",
            chr(8) => "\\b",
            '"' => '\"',
            "'" => "\'",
            '_' => "\_",
            "%" => "\%",
            '\\' => '\\\\'
        ];

        return \strtr($unescaped_string, $replacementMap);
    }

function unescape_string(string $unescaped_string): string
{
    $replacementMap = [
        "\\0" => "\0",
        "\\n" => "\n",
        "\\r" => "\r",
        "\\t" => "\t",
        chr(26) => "\\Z",
        chr(8) => "\\b",
        '\"' => '"',
        "\'" => "'",
        '\_' => "_",
        "\%" => "%",
        '\\\\' => '\\'
    ];

    return \strtr($unescaped_string, $replacementMap);
}


