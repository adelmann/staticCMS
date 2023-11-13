<?php class_exists('Template') or exit; ?>
<!doctype html>
<html lang="de">
<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>staticCMS</title>

    <!-- Scripts -->
    <script src="src/js/jquery-3.6.0.min.js" defer></script>
    <script src="src/js/bootstrap.min.js" defer></script>
    <script src="src/js/staticCMS.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/all.css" rel="stylesheet">
</head>
<body>

<div id="app">
    <nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                static<b>CMS</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                loggedIn
                <?php if ($loggedIn == false) { ?>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">login</a>
                    </li>
                </ul>

                <?php } else { ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="pages.php">
                            Seiten
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Menus</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Konfiguration</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-danger" aria-current="page" href="#">Generieren</a>
                    </li>
                </ul>


                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php } ?>

            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            
<script>
    var elements = [];
    <?php foreach($types as $type): ?>
        elements['<?php echo $type['type'] ?>'] = [];
        elements['<?php echo $type['type'] ?>']['name'] = '<?php echo $type['name'] ?>';
        elements['<?php echo $type['type'] ?>']['type'] = '<?php echo $type['type'] ?>';
        elements['<?php echo $type['type'] ?>']['fields'] = [];
        <?php foreach($type['fields'] as $key=>$field): ?>
            elements['<?php echo $type['type'] ?>']['fields']['<?php echo $key ?>'] = '<?php echo $field ?>';
        <?php endforeach; ?>
<?php endforeach; ?>
</script>
<form action="page.php" method="POST" id="pageEdit">
    <input type="hidden" name="fnc" value="update" />
    <input type="hidden" name="id" value="<?php echo $page['id'] ?>" />
    <div class="card mb-3">
        <div class="card-header">Seite: <?php echo $page['internalName'] ?></div>
        <div class="card-body">
            <div class="mb-3">
                <label for="internalName" class="form-label">Interner Name</label>
                <input type="text" name="internalName" class="form-control" id="internalName" placeholder="Interner Name" value="<?php echo $page['internalName'] ?>">
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Titel/Name" value="<?php echo $page['title'] ?>">
                </div>
                <div class="col-6">
                    <label for="subTitle" class="form-label">Untertitel</label>
                    <input type="text" name="subTitle" class="form-control" id="subTitle" placeholder="subTitle/Untertitel" value="<?php echo $page['subTitle'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Keyword1,Keyword2,Keyword3" value="<?php echo $page['keywords'] ?>">
                </div>
                <div class="col-6">
                    <label for="description" class="form-label">Beschreibung</label>
                    <textarea class="form-control" name="description"><?php echo $page['description'] ?></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="speichern">
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body text-center">
            Neue Sektion: <span class="newSection btn btn-outline-primary">+</span>
        </div>
    </div>
    <?php foreach($sections as $section): ?>
        <div class="card mb-3 sectionPart" data-id="<?php echo $section['id'] ?>">
            <div class="card-header">Sektion: <?php echo $section['internalName'] ?></div>
            <div class="card-body text-center">
                <input type="hidden" name="section[<?php echo $section['id'] ?>][sort]" value="<?php echo $section['sort'] ?>" />
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="internalName" class="form-label">Interner Name</label>
                        <input type="text" name="section[<?php echo $section['id'] ?>][internalName]" class="form-control" id="internalName" placeholder="Interner Name" value="<?php echo $section['internalName'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="classes" class="form-label">CSS Klassen</label>
                        <input type="text" name="section[<?php echo $section['id'] ?>][classes]" class="form-control" id="classes" placeholder="dark,fullsize" value="<?php echo $section['classes'] ?>">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="section[<?php echo $section['id'] ?>][title]" class="form-control" id="title" placeholder="Titel/Name" value="<?php echo $section['title'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="subTitle" class="form-label">Untertitel</label>
                        <input type="text" name="section[<?php echo $section['id'] ?>][subTitle]" class="form-control" id="subTitle" placeholder="subTitle/Untertitel" value="<?php echo $section['subTitle'] ?>">
                    </div>
                </div>
                <div class="row mb-3 justify-content-md-center">
                    <div class="col-12"><hr></div>
                    <div class="col-12 elementForm">
                        <div class="contentElements">---</div>
                        <?php $sectionContent = getSectionContentByPage($page['id'],$section['id']) ?>

                        <?php if (!empty($sectionContent)) { ?>
                            <?php foreach($sectionContent as $key=>$data): ?>
                                <div class="alert alert-warning m-3">
                                    <h3 class="elementType">
                                        <?php if ($data != null) { ?>
                                            <?php echo $data['type'] ?>
                                        <?php } else { ?>
                                        ---
                                        <?php } ?>
                                    </h3>
                                    <div class="row">
                                        <div class="col-4 text-sm-start">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Interner name</label>
                                                <input type="text" class="form-control" name="content[<?php echo $section['id'] ?>][<?php echo $data['id'] ?>]['internalName']" value="<?php echo $data['internalName'] ?>" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">Titel</label>
                                                <input type="text" class="form-control" name="content[<?php echo $section['id'] ?>][<?php echo $data['id'] ?>]['title']" value="<?php echo $data['title'] ?>" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">Untertitel</label>
                                                <input type="text" class="form-control" name="content[<?php echo $section['id'] ?>][<?php echo $data['id'] ?>]['subTitle']" value="<?php echo $data['subTitle'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <?php $tmpContentDatas = json_decode($data['content']) ?>
                                            <?php $type = $data['type'] ?>
                                            <?php $choosenType = $types[$type] ?>
                                            <?php $fields = $choosenType['fields'] ?>
                                            <?php unset($fields['internalName']) ?>
                                            <?php unset($fields['Title']) ?>
                                            <?php unset($fields['Description']) ?>
                                            
                                            <div class="row">
                                                <?php foreach($tmpContentDatas as $key=>$contentData): ?>
                                                    <div class="col-6 mb-3">
                                                        <div class="form-group">
                                                            <label><?php echo $key ?></label>
                                                            <?php if ($fields[$key] == 'image') { ?>
                                                                <input name="content[<?php echo $section['id'] ?>][<?php echo $data['id'] ?>][<?php echo $key ?>]" type="text" value="<?php echo $contentData ?>" class="form-control" />
                                                            <?php } elseif ($fields[$key] == 'text') { ?>
                                                                <textarea name="content[<?php echo $section['id'] ?>][<?php echo $data['id'] ?>][<?php echo $key ?>]" class="form-control" ><?php echo $contentData ?></textarea>
                                                            <?php } elseif ($fields[$key] == 'string') { ?>
                                                                <input name="content[<?php echo $section['id'] ?>][<?php echo $data['id'] ?>][<?php echo $key ?>]" type="text" value="<?php echo $contentData ?>" class="form-control" />
                                                            <?php } elseif ($fields[$key] == 'link') { ?>
                                                                <input name="content[<?php echo $section['id'] ?>][<?php echo $data['id'] ?>][<?php echo $key ?>]" type="text" value="<?php echo $contentData ?>" class="form-control" />
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        <?php } ?>
                    </div>

                    <div class="col-6 elementChoose">
                        Neues Element:
                        <div class="input-group w-auto">
                            <select class="chooseContentType form-control">
                                <option value="none">Bitte wählen</option>
                                <?php foreach($types as $type): ?>
                                <option value="<?php echo $type['type'] ?>"><?php echo $type['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-primary addContent" type="button">
                                Hinzufügen
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="card mb-3">
        <div class="card-body text-center">
            Neue Sektion: <span class="newSection btn btn-outline-primary">+</span>
        </div>
    </div>

</form>

<div id="basicContentEmpty" class="d-none">
    <div class="alert alert-warning m-3" data-contentid="-">
        <h3 class="elementType">
        </h3>
        <div class="row">
            <div class="col-4 text-sm-start">
                <div class="form-group mb-3">
                    <label class="form-label">Interner name</label>
                    <input type="text" class="form-control internalName" name="" value="" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Titel</label>
                    <input type="text" class="form-control title" name="" value="" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Untertitel</label>
                    <input type="text" class="form-control subTitle" name="" value="" />
                </div>
                <input type="hidden" class="type" name="" value="" />
            </div>
            <div class="col-8">
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>


        </div>
    </main>
</div>
</body>
</html>




