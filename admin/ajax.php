<?php

include 'functions.php';
$caller = $_GET['call'];


if ($caller == 'getMedias') {
    $medias = getMediaFolderContents();
    return $medias;
} elseif ($caller == 'getLinks') {
    $links = getLinksContents();
    return $links;
}
