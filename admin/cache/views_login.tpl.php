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
    <div class="card-header">LOGIN</div>
    <div class="card-body">
        <?php if ($message != '') { ?>
        <p class="alert alert-warning"><?php echo $message ?></p>
        <?php } ?>
        <form action="authenticate.php" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" class="form-control" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" id="password" required>
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
    </div>
</div>


        </div>
    </main>
</div>
</body>
</html>




