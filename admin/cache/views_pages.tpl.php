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
            

<div class="card">
    <div class="card-header">Seiten</div>
    <div class="card-body">
        <a href="page.php?fnc=new" class="btn btn-outline-primary">Neu</a>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Interner Name</td>
                    <td>Aktion</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pages as $page): ?>
                    <tr>
                        <td><?php echo $page['id'] ?></td>
                        <td><?php echo $page['internalName'] ?></td>
                        <td>
                            <a href="page.php?fnc=edit&id=<?php echo $page['id'] ?>" class="btn btn-primary">Bearbeiten</a>
                            <a href="page.php?fnc=delete&id=<?php echo $page['id'] ?>" class="btn btn-danger">Löschen</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <tr>

                </tr>
            </tbody>

        </table>
    </div>
</div>


        </div>
    </main>
</div>
</body>
</html>



