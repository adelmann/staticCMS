<?php

$post = $_POST;
if (!empty($post)) {

    require 'dbconnection_old.php';
    $db = new dbconnection();

    $sqlConfigMeta = "
        REPLACE INTO config (id, name, value)
        VALUES(1, 'title', '".$post['configtitle']."');
        REPLACE INTO config (id, name, value)
        VALUES(2, 'description', '".$post['configdescription']."');
        REPLACE INTO config (id, name, value)
        VALUES(3, 'keywords', '".$post['configkeywords']."');
        REPLACE INTO config (id, name, value)
        VALUES(4, 'mail', '".$post['configmail']."');
        REPLACE INTO config (id, name, value)
        VALUES(5, 'phone', '".$post['configmainphone']."');
        REPLACE INTO config (id, name, value)
        VALUES(6, 'whatsapp', '".$post['configwhatsapp']."');
    ";

    $sqlWelcome = "
        REPLACE INTO banner(
            id,
            image,
            title,
            subtitle,
            subtitlelink,
            subtitlelinktitle,
            bigBoxTitle,
            bigBoxText,
            bigBoxLink,
            bigBoxLinkText,
            subBox1Title,
            subBox1Text,
            subBox2Title,
            subBox2Text
            )
        VALUES(
            1,
            '".$post['welcomeimage']."',
            '".$post['welcometitle']."',
            '".$post['welcomesubtitle']."',
            '".$post['welcomesubtitlelink']."',
            '".$post['welcomesubtitlelinktitle']."',
            '".$post['welcomebigBoxTitle']."',
            '".$post['welcomebigBoxText']."',
            '".$post['welcomebigBoxLink']."',
            '".$post['welcomebigBoxLinkText']."',
            '".$post['welcomesubBox1Title']."',
            '".$post['welcomesubBox1Text']."',
            '".$post['welcomesubBox2Title']."',
            '".$post['welcomesubBox2Text']."'
            );
    ";

    $sqltherapy = "
        REPLACE INTO imageText (id,title,subtitle,Text,imagelink) VALUES (
            1,
            '".$post['uttitle']."',
            '".$post['utsubtitle']."',
            '".$post['uttext']."',
            '".$post['utimage']."'
        );
    ";

    $sqlcontact = "
        REPLACE INTO contact (id,title,description,subBox1Title,subBox1Description,subBox2Title, subBox2Description,phoneBoxTitle1,phoneBoxNumber1,phoneBoxTitle2,phoneBoxNumber2,phoneBoxFaxTitle1,phoneBoxFaxNumber1) VALUES(
            1,
            '".$post['ktitle']."',
            '".$post['kdescription']."',
            '".$post['ksubBox1Title']."',
            '".$post['ksubBox1Description']."',
            '".$post['ksubBox2Title']."',
            '".$post['ksubBox2Description']."',
            '".$post['kphoneBoxTitle1']."',
            '".$post['kphoneBoxNumber1']."',
            '".$post['kphoneBoxTitle2']."',
            '".$post['kphoneBoxNumber2']."',
            '".$post['kphoneBoxFaxTitle2']."',
            '".$post['kphoneBoxFaxNumber2']."'
        );
    ";

    $sqltimetable = "
        REPLACE INTO timetable (id,title,description,info,box1Title,box1Icon,box1Text,box2Title,box2Icon,box2Text,box3Title,box3Icon,box3Text,box4Title,box4Icon,box4Text,box5Title,box5Icon,box5Text,box6Title,box6Icon,box6Text) VALUES (
            1,
            '".$post['tttitle']."',
            '".$post['ttdescription']."',
            '".$post['ttinfo']."',
            '".$post['ttbox1Title']."',
            '".$post['ttbox1Icon']."',
            '".$post['ttbox1Text']."',
            '".$post['ttbox2Title']."',
            '".$post['ttbox2Icon']."',
            '".$post['ttbox2Text']."',
            '".$post['ttbox3Title']."',
            '".$post['ttbox3Icon']."',
            '".$post['ttbox3Text']."',
            '".$post['ttbox4Title']."',
            '".$post['ttbox4Icon']."',
            '".$post['ttbox4Text']."',
            '".$post['ttbox5Title']."',
            '".$post['ttbox5Icon']."',
            '".$post['ttbox5Text']."',
            '".$post['ttbox6Title']."',
            '".$post['ttbox6Icon']."',
            '".$post['ttbox6Text']."'
        );
    ";

    $sqlNews = "
        REPLACE INTO textonly (id,title,subtitle,text) VALUES (
            1,
            '".$post['nwtitle']."',
            '".$post['nwsubtitle']."',
            '".$post['nwText']."'
        );
    ";



    $db->db->exec($sqlConfigMeta);
    $db->db->exec($sqlWelcome);
    $db->db->exec($sqltherapy);
    $db->db->exec($sqlcontact);
    $db->db->exec($sqltimetable);
    $db->db->exec($sqlNews);


    header("Location: ../admin/index.php");

}
