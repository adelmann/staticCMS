<?php

include 'functions.php';
$caller = $_GET['call'];


if ($caller == 'getMedias') {
    $medias = getMediaFolderContents();
    return $medias;
}
