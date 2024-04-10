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
    <div class="container">
        <section class="search my-5">
            <h2 class="text-capitalize mb-3">where to ?</h2>
            <form action="" method="GET" class="form-inline">
                <div class="row">
                    <div class=" col-md col-12 mb-3 mb-md-0 destination">
                        <input type="text" name="place" placeholder="Going To" class="form-control px-4 h-100">
                        <i class="fa-solid fa-location-dot location-des"></i>
                    </div>
                    <div class=" col-md col-12 mb-3 mb-md-0">
                        <div class="dates d-flex align-items-center rounded border" type="button" data-bs-toggle="modal" data-bs-target="#calendar-modal">
                            <i class="fa-regular fa-calendar mx-3 fa-lg"></i>
                            <div class="dates-info">
                                <h7 class="text-capitalize fw-bold" style="font-size:.8rem">dates</h7>
                                <p class="dates-info-changed m-0" name="date"><?= date('m-d'); ?> - <?php $today = new DateTime(); $nextDay = $today->modify('+1 day'); echo $nextDay->format('m-d'); ?></p>
                            </div>
                        </div>
                        <div class="modal fade mt-1" id="calendar-modal">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row text-center global-dates">
                                            <?php
                                                $days = ['Monday'=>1,'Tuesday'=>2,'Wednesday'=>3,'Thursday'=>4,'Friday'=>5,'Saturday'=>6,'Sunday'=>7];
                                                $months = ['January'=>31,'February'=>28,'March'=>31,'April'=>30,'May'=>31,'June'=>30,'July'=>31,'August'=>31,'September'=>30,'October'=>31,'November'=>30,'December'=>31];
                                                $year = date('Y');
                                            ?>
                                            <div class="col-12 py-3">
                                                <h5><?= date('F'); ?> <?= $year ?></h5>
                                                <p class="days-name row my-3">
                                                    <span class="col">M</span>
                                                    <span class="col">T</span>
                                                    <span class="col">W</span>
                                                    <span class="col">T</span>
                                                    <span class="col">F</span>
                                                    <span class="col">S</span>
                                                    <span class="col">S</span>
                                                </p>
                                                <?php

                                                    $firstDayOfCurrentMonth = date('l',strtotime(date('Y-m-01')));
                                                    
                                                    $nameOfCurrentMonth = date('F');
                                                    $currentDay = date('j');
                                                    $currentMonth           = date('F', strtotime('+0 month'));
                                                    echo $currentMonth;
                                                    $monthNumber            = date('n', strtotime("$currentMonth 1, $year"));

                                                    $dayNumber = 2;
                                                    echo '<div class="days-number">';
                                                        echo '<div class="row my-3">';
                                                            for($i = 1;$i < 8;$i++){
                                                                echo '<span class="col">';
                                                                if($i == $days[$firstDayOfCurrentMonth]){
                                                                    echo '<span class="';
                                                                        if($currentDay > 1)
                                                                        echo ' text-secondary';
                                                                        elseif($currentDay == 1){
                                                                            echo ' bg-main-color p-1 m-0 circle can-add';
                                                                        }
                                                                    echo '" data-date="'.$year.'-'.$monthNumber.'-1">1</span>';
                                                                }elseif($i > $days[$firstDayOfCurrentMonth]){
                                                                    echo '<span class="'; 
                                                                        if($currentDay > $dayNumber)
                                                                        echo ' text-secondary';
                                                                        elseif($currentDay == $dayNumber){
                                                                            echo ' bg-main-color p-1 m-0 can-add';
                                                                        }else{
                                                                            echo ' can-add';
                                                                        }
                                                                    echo '" data-date="'.$year.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span>';
                                                                    $dayNumber++;
                                                                }
                                                                echo '</span>';
                                                            }
                                                        echo '</div>';
                                                        for($j = 1;$j < 4;$j++){
                                                            echo '<div class="row my-3">';
                                                                for($i = 1;$i < 8;$i++){
                                                                    echo '<span class="col"><span class="'; 
                                                                        if($currentDay > $dayNumber)
                                                                            echo ' text-secondary';
                                                                        elseif($currentDay == $dayNumber){
                                                                            echo ' bg-main-color p-1 m-0 circle can-add';
                                                                        }else{
                                                                            echo ' can-add';
                                                                        }
                                                                    echo '" data-date="'.$year.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span></span>';
                                                                    $dayNumber++;
                                                                }
                                                            echo '</div>';
                                                        }
                                                        if($months[$nameOfCurrentMonth] >= $dayNumber){
                                                            echo '<div class="row my-3">';
                                                                for($i = 1;$i < 8;$i++){
                                                                    echo '<span class="col">';
                                                                    if($dayNumber <= $months[$nameOfCurrentMonth]){
                                                                        echo '<span class="'; 
                                                                            if($currentDay > $dayNumber)
                                                                            echo ' text-secondary';
                                                                            elseif($currentDay == $dayNumber){
                                                                                echo ' bg-main-color p-1 m-0 circle can-add';
                                                                            }else{
                                                                                echo ' can-add';
                                                                            }
                                                                        echo '" data-date="'.$year.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span>';
                                                                        $dayNumber++;
                                                                    }
                                                                    echo '</span>';
                                                                }
                                                            echo '</div>';
                                                        }
                                                        if($months[$nameOfCurrentMonth] >= $dayNumber){
                                                            echo '<div class="row my-3">';
                                                                for($i = 1;$i <= 7;$i++){
                                                                    echo "<span class='col'>";
                                                                    
                                                                        if($dayNumber <= $months[$nameOfCurrentMonth]){
                                                                            echo '<span class="'; 
                                                                                if($currentDay > $dayNumber)
                                                                                echo ' text-secondary';
                                                                                elseif($currentDay == $dayNumber){
                                                                                    echo 'bg-main-color p-1 m-0 circle can-add';
                                                                                }else{
                                                                                    echo 'can-add';
                                                                                }
                                                                            echo '" data-date="'.$year.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span>';
                                                                            $dayNumber++;
                                                                        }else{
                                                                            
                                                                        }
                                                                    echo "</span>";
                                                                }
                                                            echo '</div>';
                                                        }
                                                    echo '</div>';
                                                ?>
                                            </div>
                                            <?php
                                            for($m = 1; $m < 18 ; $m++){
                                                
                                                $currentMonth           = date('F', strtotime('+'.$m.' month'));
                                                $currentYear            = $currentMonth == 'January'?++$year:$year;
                                                $monthNumber            = date('n', strtotime("$currentMonth 1, $currentYear"));
                                                $firstDayOfCurrentMonth = date('l', mktime(0, 0, 0, $monthNumber, 1, $currentYear));

                                                ?>
                                            <div class="col-12 py-3">
                                                <h5><?= $currentMonth; ?> <?= $currentYear; ?></h5>
                                                <p class="days-name row my-3">
                                                    <span class="col">M</span>
                                                    <span class="col">T</span>
                                                    <span class="col">W</span>
                                                    <span class="col">T</span>
                                                    <span class="col">F</span>
                                                    <span class="col">S</span>
                                                    <span class="col">S</span>
                                                </p>
                                                <?php

                                                    

                                                    $dayNumber = 2;
                                                    echo '<div class="days-number">';
                                                        echo '<div class="row my-3">';
                                                            for($i = 1;$i < 8;$i++){
                                                                echo '<span class="col">';
                                                                if($i == $days[$firstDayOfCurrentMonth]){
                                                                    echo '<span class="can-add" data-date="'.$currentYear.'-'.$monthNumber.'-1">1</span>';

                                                                }elseif($i > $days[$firstDayOfCurrentMonth]){
                                                                    echo '<span class="can-add" data-date="'.$currentYear.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span>';
                                                                    $dayNumber++;
                                                                }
                                                                echo '</span>';
                                                            }
                                                        echo '</div>';
                                                        for($j = 1;$j < 4;$j++){
                                                            echo '<div class="row my-3">';
                                                                for($i = 1;$i < 8;$i++){
                                                                    echo '<span class="col"><span class="can-add" data-date="'.$currentYear.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span></span>';
                                                                    $dayNumber++;
                                                                }
                                                            echo '</div>';
                                                        }
                                                        if($months[$currentMonth] >= $dayNumber){
                                                            echo '<div class="row my-3">';
                                                                for($i = 1;$i < 8;$i++){
                                                                    echo '<span class="col">';
                                                                    if($dayNumber <= $months[$currentMonth]){
                                                                        echo '<span class="can-add" data-date="'.$currentYear.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span>';
                                                                        $dayNumber++;
                                                                    }
                                                                    echo '</span>';
                                                                }
                                                            echo '</div>';
                                                        }
                                                        if($months[$currentMonth] >= $dayNumber){
                                                            echo '<div class="row my-3">';
                                                                for($i = 1;$i < 8;$i++){
                                                                    echo '<span class="col"';
                                                                    if($dayNumber <= $months[$currentMonth]){
                                                                        echo '<span class="can-add" data-date="'.$currentYear.'-'.$monthNumber.'-'.$dayNumber.'">'.$dayNumber.'</span>';
                                                                        $dayNumber++;
                                                                    }
                                                                    echo '</span>';
                                                                }
                                                            echo '</div>';
                                                        }
                                                    echo '</div>';
                                                ?>
                                            </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-grid gap-2 flex-grow-1">
                                            <button type="button" id="done-date" class="btn btn-block btn-primary" data-bs-dismiss="modal">Done</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md col-12 mb-3 mb-md-0">
                        <div class="travellers d-flex align-items-center rounded border">
                            <i class="fa-solid fa-user mx-3 fa-lg"></i>
                            <div class="travellers-info">
                                <h7 class="text-capitalize fw-bold" style="font-size:.8rem;">travellers</h7>
                                <p class="travellers-info-changed m-0">2 travellers, 1 room</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-1 col-12 mb-3 mb-md-0">
                        <div class="d-grid gap-2">
                            <input type="submit" value="Search" class="btn btn-primary btn-lg">
                        </div>  
                    </div>
                </div>
            </form>
        </section>
    </div>
    <!-- End the navbar -->