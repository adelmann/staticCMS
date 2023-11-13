<?php

require 'dbconnection_old.php';
$db = new dbconnection();

// load TPL in variable
$template = file_get_contents('renderers/template.tpl');


// Configuration
$title          = $db->getConfigValue('title');
$description    = $db->getConfigValue('description');
$keywords       = $db->getConfigValue('keywords');
$mail           = $db->getConfigValue('mail');
$phone          = $db->getConfigValue('phone');
$whatsapp       = $db->getConfigValue('whatsapp');

$replace = preg_replace('/###METATITLE###/', $title, $template);
$replace = preg_replace('/###METADESC###/', $description, $replace);
$replace = preg_replace('/###METATAGS###/', $keywords, $replace);
$replace = preg_replace('/###CONFIGMAIL###/', $mail, $replace);
$replace = preg_replace('/###CONFIGPHONE###/', $phone, $replace);
$replace = preg_replace('/###CONFIGWHATSAPP###/', $whatsapp, $replace);


$datas          = $db->getBannerValues(1);
$replace = preg_replace('/###WELCOME###/', $datas['title'], $replace);
$replace = preg_replace('/###WELCOMEDESC###/', $datas['subtitle'], $replace);
$replace = preg_replace('/###WELCOMELINK###/', $datas['subtitlelink'], $replace);
$replace = preg_replace('/###WELCOMELINKTITLE###/', $datas['subtitlelinktitle'], $replace);
$replace = preg_replace('/###WELCOMEBOXREDTITLE###/', $datas['bigBoxTitle'], $replace);
$replace = preg_replace('/###WELCOMEBOXREDTEXT###/', $datas['bigBoxText'], $replace);
$replace = preg_replace('/###WELCOMEBOXREDLINK###/', $datas['bigBoxLink'], $replace);
$replace = preg_replace('/###WELCOMEBOXREDLINKTITLE###/', $datas['bigBoxLinkText'], $replace);

$replace = preg_replace('/###WELCOMEBOXPRAXIS1TITLE###/', $datas['subBox1Title'], $replace);
$replace = preg_replace('/###WELCOMEBOXPRAXIS1TEXT###/', $datas['subBox1Text'], $replace);

$replace = preg_replace('/###WELCOMEBOXPRAXIS2TITLE###/', $datas['subBox2Title'], $replace);
$replace = preg_replace('/###WELCOMEBOXPRAXIS2TEXT###/', $datas['subBox2Text'], $replace);

// Therapieangebot
$datas = $db->getImageTextValues(1);
$replace = preg_replace('/###SERVICEIMAGE###/', $datas['imagelink'], $replace);
$replace = preg_replace('/###SERVICESUBTITLE###/', $datas['subtitle'], $replace);
$replace = preg_replace('/###SERVICETITLE###/', $datas['title'], $replace);
$replace = preg_replace('/###SERVICETEXT###/', $datas['Text'], $replace);


// Contact
$datas = $db->getContactValues(1);
$replace = preg_replace('/###CONTACTTITLE###/', $datas['title'], $replace);
$replace = preg_replace('/###CONTACTTEXT###/', $datas['description'], $replace);
$replace = preg_replace('/###CONTACTBOX1TITLE###/', $datas['subBox1Title'], $replace);
$replace = preg_replace('/###CONTACTBOX1DESC###/', $datas['subBox1Description'], $replace);

$replace = preg_replace('/###CONTACTBOX2TITLE###/', $datas['subBox2Title'], $replace);
$replace = preg_replace('/###CONTACTBOX2DESC###/', $datas['subBox2Description'], $replace);

$replace = preg_replace('/###CONTACTPHONEBOXTITLE1###/', $datas['phoneBoxTitle1'], $replace);

$praxis1Street  = $datas['phoneBoxTitle1'];
$praxis1Phone   = $datas['phoneBoxNumber1'];
$praxis2Street  = $datas['phoneBoxTitle2'];
$praxis2Phone   = $datas['phoneBoxNumber2'];

$replace = preg_replace('/###CONTACTPHONEBOXNUMBER1###/', $datas['phoneBoxNumber1'], $replace);

$replace = preg_replace('/###CONTACTPHONEBOXTITLE2###/', $datas['phoneBoxTitle2'], $replace);
$replace = preg_replace('/###CONTACTPHONEBOXNUMBER2###/', $datas['phoneBoxNumber2'], $replace);
$replace = preg_replace('/###CONTACTPHONEBOXFAXNUMBER###/', $datas['phoneBoxFaxNumber1'], $replace);

// Öffnungszeiten
$datas = $db->getTimetable(1);
$replace = preg_replace('/###OPENINGSTITLE###/', $datas['title'], $replace);
$replace = preg_replace('/###OPENINGICON1###/', $datas['box1Icon'], $replace);
$replace = preg_replace('/###OPENINGTITLE1###/', $datas['box1Title'], $replace);
$replace = preg_replace('/###OPENINGDESC1###/', $datas['box1Text'], $replace);

$replace = preg_replace('/###OPENINGICON2###/', $datas['box2Icon'], $replace);
$replace = preg_replace('/###OPENINGTITLE2###/', $datas['box2Title'], $replace);
$replace = preg_replace('/###OPENINGDESC2###/', $datas['box2Text'], $replace);

$replace = preg_replace('/###OPENINGICON3###/', $datas['box3Icon'], $replace);
$replace = preg_replace('/###OPENINGTITLE3###/', $datas['box3Title'], $replace);
$replace = preg_replace('/###OPENINGDESC3###/', $datas['box3Text'], $replace);

$replace = preg_replace('/###OPENINGICON4###/', $datas['box4Icon'], $replace);
$replace = preg_replace('/###OPENINGTITLE4###/', $datas['box4Title'], $replace);
$replace = preg_replace('/###OPENINGDESC4###/', $datas['box4Text'], $replace);

$replace = preg_replace('/###OPENINGICON5###/', $datas['box5Icon'], $replace);
$replace = preg_replace('/###OPENINGTITLE5###/', $datas['box5Title'], $replace);
$replace = preg_replace('/###OPENINGDESC5###/', $datas['box5Text'], $replace);

$replace = preg_replace('/###OPENINGICON6###/', $datas['box6Icon'], $replace);
$replace = preg_replace('/###OPENINGTITLE6###/', $datas['box6Title'], $replace);
$replace = preg_replace('/###OPENINGDESC6###/', $datas['box6Text'], $replace);
$replace = preg_replace('/###OPENINGHINT###/', $datas['info'], $replace);

// AKTUELLES
$datas = $db->getNews();
$replace = preg_replace('/###NEWSTITLE###/', $datas['title'], $replace);
$replace = preg_replace('/###NEWSCONTENT###/', $datas['text'], $replace);


// FOOTER
$replace = preg_replace('/###PRAXIS1STREET###/', $praxis1Street, $replace);
$replace = preg_replace('/###PRAXIS1PHONE###/', $praxis1Phone, $replace);
$replace = preg_replace('/###PRAXIS2STREET###/', $praxis2Street, $replace);
$replace = preg_replace('/###PRAXIS2PHONE###/', $praxis2Phone, $replace);



if ($_GET['type'] == 'preview') {
    if (!file_exists('preview')) {
        mkdir('preview', 0777, true);
    }
    unlink('../admin/preview/index.html');
    $myfile = fopen("preview/index.html", "w") or die("Unable to open file!");
    fwrite($myfile, $replace);
    fclose($myfile);
    header("Location: ../admin/preview/index.html");
    die('preview');

} elseif($_GET['type'] == 'publish') {
    $date = date('Y-m-d');
    if (!file_exists('../admin/archiv/'.$date)) {
        mkdir('../admin/archiv/'.$date, 0777, true);
    }
    shell_exec("cp -r ../index.html ../admin/archiv/".$date."/index.html");
    unlink('../index.html');
    $myfile = fopen("../index.html", "w") or die("Unable to open file!");
    fwrite($myfile, $replace);
    fclose($myfile);
    header("Location: ../admin/index.php");
} else {
    header("Location: ../admin/index.php");
}
echo $replace;



function recursiveRemove($dir) {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
        foreach($structure as $file) {
            if (is_dir($file)) recursiveRemove($file);
            elseif (is_file($file)) unlink($file);
        }
    }
    rmdir($dir);
}
