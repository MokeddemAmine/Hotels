<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- include Bootstrap 5.3.3 style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <!-- include Font Awesome from google -->
    <link rel="stylesheet" href="<?= $css ?>fonts/all.min.css"/>
    <!-- include our style -->
    <link rel="stylesheet" href="<?= $css ?>front-end.css"/>
    <title><?= isset($pageTitle)?$pageTitle:'Hotels'; ?></title>
</head>
<body>
    <!-- Start the navbar -->
    <nav class="navbar navbar-expand-md bg-navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand"><h1 class="text-capitalize text-dark">hotel</h1></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu"><div class="navbar-toggler-icon"></div></button>
            <div class="collapse navbar-collapse justify-content-end" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a id="lang-currency" class="nav-link text-capitalize fw-bold">English</a></li>
                    <li class="nav-item"><a href="support.php" class="nav-link text-capitalize fw-bold">support</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link text-capitalize fw-bold">sign in</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End the navbar -->