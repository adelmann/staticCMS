<?php

require 'dbconnection_old.php';

$db = new dbconnection();
//$db->setup();

// Configuration:
$title          = $db->getConfigValue('title');
$description    = $db->getConfigValue('description');
$keywords       = $db->getConfigValue('keywords');
$mail           = $db->getConfigValue('mail');
$phone          = $db->getConfigValue('phone');
$whatsapp       = $db->getConfigValue('whatsapp');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>###METATITLE###</title>
    <meta name="description"content="###METADESC###">
    <meta name="keywords" content="###METATAGS###">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <form id="save" action="save.php" method="post">
        <section id="configuration">
            <div class="container d-flex">
                <h1>Konfiguration</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 justify-content-center ">
                        <div>
                            <label for="title">Titel</label>
                            <input type="text" class="form-control" name="configtitle" id="title" value="<?php echo $title;?>" placeholder="Titel">
                        </div>
                        <div>
                            <label for="description">Beschreibung</label>
                            <input type="text" class="form-control" name="configdescription" id="description" value="<?php echo $description;?>" placeholder="Beschreibung">
                        </div>
                        <div>
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="configkeywords" value="<?php echo $keywords;?>" placeholder="Keyword, Keyword ...">
                        </div>
                    </div>

                    <div class="col-xl-6 justify-content-center">
                        <div>
                            <label for="mail">E-Mail</label>
                            <input type="email" class="form-control" name="configmail" id="mail" value="<?php echo $mail;?>" placeholder="info@domain.de">
                        </div>
                        <div>
                            <label for="mainphone">Telefonnummer</label>
                            <input type="text" class="form-control" name="configmainphone" id="mainphone" value="<?php echo $phone;?>" placeholder="+41 12 345 67 89">
                        </div>
                        <div>
                            <label for="whatsapp">WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" name="configwhatsapp" value="<?php echo $whatsapp;?>" placeholder="+41123456789">
                        </div>
                    </div>

                </div>
            </div>

        </section>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:info@physio-lanz.ch" class="configmail">###CONFIGMAIL###</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><a href="tel:###CONFIGPHONE###" class="configphone">###CONFIGPHONE###</a></i>
            </div>

            <div class="cta d-none d-md-flex align-items-center">
                <a id="configwhatsapp" href="#" title="Senden Sie uns eine Nachricht über WhatsApp" target="_blank" rel="noreferrer noopener">
                    <i class="bi bi-whatsapp d-flex align-items-center">&nbsp;WhatsApp</i>
                </a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <!-- Uncomment below if you prefer to use an image logo -->
                <div class="d-inline-flex">
                    <a href="#topbar">
                        <img src="assets/img/logo-red.png" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="d-inline-flex margin">
                    <a class="scrollto"  href="#topbar">
                        <p id="main-title">Physiotherapie</p>
                        <p id="sub-title">Lanz Maren Panzirsch</p>
                    </a>
                </div>


            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#therapy">Therapieangebot</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto " href="#praxen">Praxen</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontakt</a></li>
                    <li><a class="nav-link scrollto" href="#openings">Öffnungszeiten</a></li>
                    <li><a class="nav-link scrollto" href="#news">Aktuelles</a></li>
                    <li><a class="nav-link scrollto" href="#bphuman">Blickpunkt Mensch</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
        <div id="whatsappButton">
            <a href="https://api.whatsapp.com/send?phone=+41795660723" title="Senden Sie uns eine Nachricht über WhatsApp" target="_blank" rel="noreferrer noopener">
                <i class="bi bi-whatsapp d-flex align-items-center"></i>
            </a>
        </div>
    </header><!-- End Header -->

    <!-- Herzlich Willkommen -->
    <?php
        $datas          = $db->getBannerValues(1);
    ?>
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container" data-aos="fade-in">
            <input type="hidden" class="form-control" name="welcomeimage" id="image" placeholder="" value="<?php echo $datas['image']; ?>">
            <h1><input type="text" class="form-control" name="welcometitle" id="welcometitle" value="<?php echo $datas['title']; ?>"></h1>
            <h2><input type="text" class="form-control" id="welcomesubtitle" name="welcomesubtitle" value="<?php echo $datas['subtitle']; ?>"></h2>
            <div class="d-flex align-items-center">
                <i class="bx bxs-right-arrow-alt get-started-icon"></i>
                <select class="form-control" name="welcomesubtitlelink">
                    <option value="#therapy"<?php if ($datas['subtitlelink'] == "#therapy") echo" selected"; ?>>Link: Therapieangebot</option>
                    <option value="#team"<?php if ($datas['subtitlelink'] == "#team") echo" selected"; ?>>Link: Team</option>
                    <option value="#praxen"<?php if ($datas['subtitlelink'] == "#praxen") echo" selected"; ?>>Link: Praxen</option>
                    <option value="#contact"<?php if ($datas['subtitlelink'] == "#contact") echo" selected"; ?>>Link: Kontakt</option>
                    <option value="#openings"<?php if ($datas['subtitlelink'] == "#openings") echo" selected"; ?>>Link: Öffnungszeiten</option>
                    <option value="#news"<?php if ($datas['subtitlelink'] == "#news") echo" selected"; ?>>Link: Aktuelles</option>
                    <option value="#bphuman"<?php if ($datas['subtitlelink'] == "#bphuman") echo" selected"; ?>>Link: Blickpunkt Mensch</option>
                </select>
                <input type="text" class="form-control" id="welcomesubtitlelinktitle" name="welcomesubtitlelinktitle" value="<?php echo $datas['subtitlelinktitle']; ?>">
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-xl-4 col-lg-5" data-aos="fade-up">
                        <div class="content">
                            <input type="text" class="form-control" id="welcomebigBoxTitle" name="welcomebigBoxTitle" value="<?php echo $datas['bigBoxTitle']; ?>">
                            <p>
                                <textarea class="form-control" id="welcomebigBoxText" name="welcomebigBoxText" rows="7"><?php echo $datas['bigBoxText']; ?></textarea>
                            </p>
                            <div class="text-center">
                                <select class="form-control" name="welcomebigBoxLink">
                                    <option value="#therapy"<?php if ($datas['bigBoxLink'] == "#therapy") echo" selected"; ?>>Link: Therapieangebot</option>
                                    <option value="#team"<?php if ($datas['bigBoxLink'] == "#team") echo" selected"; ?>>Link: Team</option>
                                    <option value="#praxen"<?php if ($datas['bigBoxLink'] == "#praxen") echo" selected"; ?>>Link: Praxen</option>
                                    <option value="#contact"<?php if ($datas['bigBoxLink'] == "#contact") echo" selected"; ?>>Link: Kontakt</option>
                                    <option value="#openings"<?php if ($datas['bigBoxLink'] == "#openings") echo" selected"; ?>>Link: Öffnungszeiten</option>
                                    <option value="#news"<?php if ($datas['bigBoxLink'] == "#news") echo" selected"; ?>>Link: Aktuelles</option>
                                    <option value="#bphuman"<?php if ($datas['bigBoxLink'] == "#bphuman") echo" selected"; ?>>Link: Blickpunkt Mensch</option>
                                </select>
                                <input type="text" class="form-control" id="welcomebigBoxLinkText" name="welcomebigBoxLinkText" value="<?php echo $datas['bigBoxLinkText']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 d-flex">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bi bi-pin-map"></i>
                                        <input type="text" class="form-control" id="welcomesubBox1Title" name="welcomesubBox1Title" value="<?php echo $datas['subBox1Title']; ?>">
                                        <p><textarea class="form-control" id="welcomesubBox1Text" name="welcomesubBox1Text" rows="5"><?php echo $datas['subBox1Text']; ?></textarea></p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bi bi-pin-map"></i>
                                        <input type="text" class="form-control" id="welcomesubBox2Title" name="welcomesubBox2Title" value="<?php echo $datas['subBox2Title']; ?>">
                                        <p><textarea class="form-control" id="welcomesubBox2Text" name="welcomesubBox2Text" rows="5"><?php echo $datas['subBox2Text']; ?></textarea></p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bi bi-telephone"></i>
                                        <h4>Kontakt<br><br></h4>
                                        <p>
                                            Telefon:<br><a class="configphone" href="#">062 929 11 54</a><br>
                                            <a class="configmail" href="#">info@physio-lanz.ch</a><br>
                                            <a href="#" title="Senden Sie uns eine Nachricht über WhatsApp" target="_blank" rel="noreferrer noopener">
                                                WhatsApp
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <?php
            $datas = $db->getImageTextValues(1);
        ?>
        <section id="therapy" class="about section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-xl-5 d-flex justify-content-center align-items-stretch position-relative" data-aos="fade-right">
                        <input type="hidden" class="form-control" name="utimage" id="image" placeholder="" value="<?php echo $datas['imagelink']; ?>">
                        <img src="assets/img/<?php echo $datas['imagelink']; ?>" class="keyvisual">
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h4 data-aos="fade-up"><input type="text" class="form-control" id="utsubtitle" name="utsubtitle" value="<?php echo $datas['subtitle']; ?>"></h4>
                        <h3 data-aos="fade-up"><input type="text" class="form-control" name="uttitle" id="uttitle" value="<?php echo $datas['title']; ?>"></h3>
                        <div data-aos="fade-up">
                            <textarea class="form-control" name="uttext" id="uttext" rows="8"><?php echo $datas['Text']; ?></textarea>
                        </div>
                    </div>

                </div>
        </section><!-- End About Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Unser Team</h2>
                    <p data-aos="fade-up"></p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/maren.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Maren Panzirsch</h4>
                                <span>Dipl. Physiotherapeutin, Geschäftsinhaberin</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/miriam.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Miriam Ammann</h4>
                                <span>Dipl. Physiotherapeutin</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/sabrina.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Sabrina Bloch</h4>
                                <span>Dipl. Physiotherapeutin</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/joerg.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Jörg Uckermann</h4>
                                <span>Dipl. Physiotherapeut</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/monika.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Monika Pellegrini</h4>
                                <span>Medizinische Masseurin</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/fleur.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Fleur Heath</h4>
                                <span>Dipl. Physiotherapeutin</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Praxen Section ======= -->
        <section id="praxen" class="portfolio section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">Praxen</h2>
                    <p data-aos="fade-up">Es stehen kostenlose Parkplätze direkt vor der Praxis zur Verfügung. Der Bahnhof Roggwil Dorf ist 5 Gehminuten entfernt. Die gesamte Praxis ist behindertengerecht und barrierefrei ausgestattet.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Alle</li>
                            <li data-filter=".filter-pr1">Käsereistrasse</li>
                            <li data-filter=".filter-pr2">Hofmattenweg</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr1">
                        <img src="assets/img/portfolio/praxis-k1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Behandlungsliege</h4>
                            <p>Käsereistrasse</p>
                            <a href="assets/img/portfolio/praxis-k1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Behandlungsliege"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr1">
                        <img src="assets/img/portfolio/praxis-k2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Behandlungsliege</h4>
                            <p>Käsereistrasse</p>
                            <a href="assets/img/portfolio/praxis-k2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Behandlungsliege"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr1">
                        <img src="assets/img/portfolio/praxis-k3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Geräte</h4>
                            <p>Käsereistrasse</p>
                            <a href="assets/img/portfolio/praxis-k3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Geräte"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr1">
                        <img src="assets/img/portfolio/praxis-k4.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Behandlungsliege</h4>
                            <p>Käsereistrasse</p>
                            <a href="assets/img/portfolio/praxis-k4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Behandlungsliege"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr1">
                        <img src="assets/img/portfolio/praxis-k5.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Rezeption</h4>
                            <p>Käsereistrasse</p>
                            <a href="assets/img/portfolio/praxis-k5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Rezeption"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr2">
                        <img src="assets/img/portfolio/praxis2-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Geräte</h4>
                            <p>Hofmattenweg</p>
                            <a href="assets/img/portfolio/praxis2-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Geräte"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr2">
                        <img src="assets/img/portfolio/praxis2-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Geräte</h4>
                            <p>Hofmattenweg</p>
                            <a href="assets/img/portfolio/praxis2-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Geräte"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-pr2">
                        <img src="assets/img/portfolio/praxis2-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Eingang</h4>
                            <p>Hofmattenweg</p>
                            <a href="assets/img/portfolio/praxis2-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Geräte"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <?php
            $datas = $db->getContactValues(1);
        ?>
        <section id="contact" class="contact ">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up"><input type="text" class="form-control" name="ktitle" id="ktitle" placeholder="" value="<?php echo $datas['title']; ?>"></h2>
                    <p data-aos="fade-up"><textarea class="form-control" name="kdescription" id="kdescription" rows="3"><?php echo $datas['description']; ?></textarea></p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <input type="text" class="form-control" name="ksubBox1Title" id="ksubBox1Title" value="<?php echo $datas['subBox1Title']; ?>">
                            <br>
                            <textarea class="form-control" name="ksubBox1Description" id="ksubBox1Description" rows="3"><?php echo $datas['subBox1Description']; ?></textarea>
                            <br><br>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <input type="text" class="form-control" name="ksubBox2Title" id="ksubBox2Title" value="<?php echo $datas['subBox2Title']; ?>">
                            <br>
                            <textarea class="form-control" name="ksubBox2Description" id="ksubBox2Description" rows="3"><?php echo $datas['subBox2Description']; ?></textarea>
                            <br><br>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>E-Mail</h3>
                            <p><a href="#" class="configmail">info@physio-lanz.ch</a></p>
                            <br>
                            <i class="bx bxl-whatsapp-square"></i>
                            <h3>Whatsapp</h3>
                            <p>
                                <a href="#" title="Senden Sie uns eine Nachricht über WhatsApp" target="_blank" rel="noreferrer noopener" class="whatsapp">
                                    +41 79 566 07 23
                                </a>
                            </p>
                            <br><br>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Telefon</h3>
                            <p>
                                <input type="text" class="form-control" name="kphoneBoxTitle1" id="kphoneBoxTitle1" value="<?php echo $datas['phoneBoxTitle1']; ?>">
                                <input type="text" class="form-control" name="kphoneBoxNumber1" id="kphoneBoxNumber1" value="<?php echo $datas['phoneBoxNumber1']; ?>">
                            </p>
                            <p>
                                <input type="text" class="form-control" name="kphoneBoxTitle2" id="kphoneBoxTitle2" value="<?php echo $datas['phoneBoxTitle2']; ?>">
                                <input type="text" class="form-control" name="kphoneBoxNumber2" id="kphoneBoxNumber2" value="<?php echo $datas['phoneBoxNumber2']; ?>">
                            </p>
                            <h3>Fax</h3>
                            <input type="hidden" class="form-control" name="kphoneBoxFaxTitle2" id="kphoneBoxFaxTitle2" value="<?php echo $datas['phoneBoxFaxTitle1']; ?>">
                            <p><input type="text" class="form-control" name="kphoneBoxFaxNumber2" id="kphoneBoxFaxNumber2" value="<?php echo $datas['phoneBoxFaxNumber1']; ?>"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
            $datas = $db->getTimetable(1);
        ?>
        <section id="openings" class="services section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <input type="text" class="form-control" name="tttitle" id="tttitle" placeholder="" value="<?php echo $datas['title']; ?>">
                    <input type="hidden" class="form-control" name="ttdescription" id="ttdescription" placeholder="" value="<?php echo $datas['description']; ?>">
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="icon-box">
                            <div class="icon"><input type="text" class="form-control" name="ttbox1Icon" id="ttbox1Icon" value="<?php echo $datas['box1Icon']; ?>"></div>
                            <h4 class="title">
                                <input type="text" class="form-control" name="ttbox1Title" id="ttbox1Title" value="<?php echo $datas['box1Title']; ?>">
                            </h4>
                            <p class="description">
                                <textarea class="form-control" name="ttbox1Text" id="ttbox1Text"><?php echo $datas['box1Text']; ?></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><input type="text" class="form-control" name="ttbox2Icon" id="ttbox2Icon" value="<?php echo $datas['box2Icon']; ?>"></div>
                            <input type="text" class="form-control" name="ttbox2Title" id="ttbox2Title" value="<?php echo $datas['box2Title']; ?>">
                            <p class="description">
                                <textarea class="form-control" name="ttbox2Text" id="ttbox2Text"><?php echo $datas['box2Text']; ?></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><input type="text" class="form-control" name="ttbox3Icon" id="ttbox3Icon" value="<?php echo $datas['box3Icon']; ?>"></div>
                            <input type="text" class="form-control" name="ttbox3Title" id="ttbox3Title" value="<?php echo $datas['box3Title']; ?>">
                            <p class="description">
                                <textarea class="form-control" name="ttbox3Text" id="ttbox3Text"><?php echo $datas['box3Text']; ?></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><input type="text" class="form-control" name="ttbox4Icon" id="ttbox4Icon" value="<?php echo $datas['box4Icon']; ?>"></div>
                            <input type="text" class="form-control" name="ttbox4Title" id="ttbox4Title" value="<?php echo $datas['box4Title']; ?>">
                            <p class="description">
                                <textarea class="form-control" name="ttbox4Text" id="ttbox4Text"><?php echo $datas['box4Text']; ?></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><input type="text" class="form-control" name="ttbox5Icon" id="ttbox5Icon" value="<?php echo $datas['box5Icon']; ?>"></div>
                            <input type="text" class="form-control" name="ttbox5Title" id="ttbox5Title" value="<?php echo $datas['box5Title']; ?>">
                            <p class="description">
                                <textarea class="form-control" name="ttbox5Text" id="ttbox5Text"><?php echo $datas['box5Text']; ?></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><input type="text" class="form-control" name="ttbox6Icon" id="ttbox6Icon" value="<?php echo $datas['box6Icon']; ?>"></div>
                            <input type="text" class="form-control" name="ttbox6Title" id="ttbox6Title" value="<?php echo $datas['box6Title']; ?>">
                            <p class="description">
                                <textarea class="form-control" name="ttbox6Text" id="ttbox6Text"><?php echo $datas['box6Text']; ?></textarea>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="600">
                        <input type="text" class="form-control" name="ttinfo" id="ttinfo" placeholder="" value="<?php echo $datas['info']; ?>">
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <?php
            $datas = $db->getNews();
        ?>
        <section id="news" class="news">
            <div class="container">

                <div class="section-title">
                    <input type="text" class="form-control" name="nwtitle" id="nwtitle" placeholder="" value="<?php echo $datas['title']; ?>">
                    <input type="hidden" class="form-control" name="nwsubtitle" id="nwsubtitle" placeholder="" value="<?php echo $datas['subtitle']; ?>">
                </div>
                <textarea class="form-control" name="nwText" id="nwText" rows="16"><?php echo $datas['text']; ?></textarea>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Blickpunkt mensch ======= -->
        <section id="bphuman" class="bphuman">
            <div class="container">
                <div class="section-title">
                    <h2 data-aos="fade-up">Blickpunkt Mensch</h2>
                </div>
                <div data-aos="fade-up">
                    <p>Im Gebäude der alten Käserei entstand vor über 30 Jahren die Physiotherapie Lanz. Mit viel Engagement und Hingabe hat Frau Elisabeth Lanz es geschafft, eine Physiotherapie aufzubauen die bis heute fester Bestandteil in der Gemeinde Roggwil ist. Nach dieser langen Zeit ist es nun Frau Lanz gegönnt in den wohl verdienten Ruhestand zu treten.</p>
                    <p>Seit dem 01.01.2019 ist Frau Maren Panzirsch neue Geschäftsführerin der Physiotherapie Lanz. Frau Panzirsch ist seit 2013 Mitglied im Team und führt die Praxis wie gewohnt weiter. Das gesamte Personal bleibt erhalten, damit Sie auch weiterhin auf unsere bewährten Dienstleistungen rund um Ihr Wohlbefinden zählen können.</p>
                    <p>Frau Lanz bedankt sich bei Ihren Patienten, Bekannten und Freunden in und um Roggwil für das entgegengebrachte Vertrauen.</p>
                    <p>Das gesamte Team ist gespannt auf den Neuanfang und freut sich, Sie auch weiterhin bei uns in der Praxis begrüssen zu dürfen.</p>
                </div>
            </div>
        </section><!-- End F.A.Q Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Physiotherapie</h3>
                        <h4>Lanz Maren Panzirsch</h4>
                        <p>
                            Käsereistrasse 9 <br>
                            4914 Roggwil<br>
                            <strong>Telefon:</strong> 062 929 11 54<br>
                            <strong>E-Mail:</strong> info@physio-lanz.ch<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>&nbsp;</h3>
                        <h4>&nbsp;</h4>
                        <p>
                            Hofmattenweg 3 <br>
                            4914 Roggwil<br>
                            <strong>Telefon:</strong> 062 530 08 44<br>
                            <strong>E-Mail:</strong> info@physio-lanz.ch<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Übersicht</h4>
                        <ul>
                            <li><a class="nav-link scrollto" href="#therapy">Therapieangebot</a></li>
                            <li><a class="nav-link scrollto" href="#team">Team</a></li>
                            <li><a class="nav-link scrollto " href="#praxen">Praxen</a></li>
                            <li><a class="nav-link scrollto" href="#contact">Kontakt</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>&nbsp;</h4>
                        <ul>
                            <li><a class="nav-link scrollto" href="#openings">Öffnungszeiten</a></li>
                            <li><a class="nav-link scrollto" href="#news">Aktuelles</a></li>
                            <li><a class="nav-link scrollto" href="#bphuman">Blickpunkt Mensch</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-lg-flex py-4">

            <div class="me-lg-auto text-center text-lg-start">
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="optionPanel">
        <input type="submit" class="btn btn-primary" value="speichern">
        <a href="generate.php?type=preview" class="btn btn-warning" target="_blank">Vorschau</a>
        <a href="generate.php?type=publish" class="btn btn-danger">Veröffentlichen</a>
    </div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/admin.js"></script>
</form>
</body>

</html>
