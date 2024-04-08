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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
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
                    <li class="nav-item d-flex-column languages">
                        <a class="nav-link text-capitalize fw-bold" data-bs-toggle="collapse" href="#collapseLanguages" aria-expanded="false" aria-controls="collapseLanguages">
                            English
                        </a>
                        <div class="collapse"  id="collapseLanguages">
                            <div class="card card-body p-0">
                                <ul class="navbar-nav flex-column text-center">
                                    <li class="nav-item"><a  class="nav-link text-capitalize fw-bold p-1">arabic</a></li>
                                    <li class="nav-item"><a  class="nav-link text-capitalize fw-bold p-1">French</a></li>
                                    <li class="nav-item"><a  class="nav-link text-capitalize fw-bold p-1">Germany</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                    <li class="nav-item"><a href="support.php" class="nav-link text-capitalize fw-bold">support</a></li>
                    <?php
                        if(isset($_SESSION['username'])){
                            ?>
                            <li class="nav-item profile">
                                <a class="nav-link text-capitalize fw-bold" data-bs-toggle="collapse" href="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile"><?= $_SESSION['username'] ?></a>
                                <div class="collapse"  id="collapseProfile">
                                    <div class="card card-body p-0">
                                        <ul class="navbar-nav flex-column text-center">
                                            <li class="nav-item"><a  class="nav-link text-capitalize fw-bold p-1">profile</a></li>
                                            <li class="nav-item"><a  class="nav-link text-capitalize fw-bold p-1">settings</a></li>
                                            <li class="nav-item"><a  class="nav-link text-capitalize fw-bold p-1">log out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }else{
                            echo '<li class="nav-item"><a href="login.php" class="nav-link text-capitalize fw-bold">sign in</a></li>';
                        }
                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- End the navbar -->