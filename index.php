<?php
    ob_start();
    session_start();
    $pageTitle = 'Hotels - Reservation From Luxury Hotels';
    $search = 'include';
    include 'init.php';
    ?>
    <div class="container">
        <section class="features my-5">
            <div class="row bg-gradient-page rounded-mine py-2 px-4 align-items-center">
                <div class="col-md-6 col-lg-3">
                    <h3 class="text-white">Find and book your perfect stay</h3>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="bg-danger my-2 d-flex align-items-center py-4 px-3 gap-3 rounded-mine">
                        <i class="fa-solid fa-moon fa-2xl text-white" style="font-size:4rem;"></i>
                        <div class="feature-text text-white my-4" style="font-size:1.2rem;">Earn rewards on every night you stay</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="bg-danger my-2 d-flex align-items-center py-4 px-3 gap-3 rounded-mine">
                        <i class="fa-solid fa-tag fa-2xl text-white" style="font-size:4rem;"></i>
                        <div class="feature-text text-white my-4" style="font-size:1.2rem;">Save more with Member Prices</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="bg-danger my-2 d-flex align-items-center py-4 px-2 gap-3 rounded-mine">
                        <i class="fa-solid fa-calendar-days fa-2xl text-white" style="font-size:3rem;"></i>
                        <div class="feature-text text-white my-4" style="font-size:1.2rem;">Free cancellation options if plans change</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="discover-new-fav">
            <h3 class="text-main-color">Discover your new favourite stay</h3>
            <div id="carouselDiscover" class="carousel slide my-5">
                <div class="carousel-inner">
                    
                </div>
                <button class="carousel-control ccl" type="button" data-bs-target="#carouselDiscover" data-bs-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control ccr" type="button" data-bs-target="#carouselDiscover" data-bs-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section class="perfect-places my-5">
        <?php
                        $getPerfetHotels = query('select','Hotels',['*'],NULL,NULL,'rate','DESC',8);
                        if($getPerfetHotels){
                            while($hotel = $getPerfetHotels->fetchObject()){
                                echo '<div class="hotel-perfect hotel-'.$hotel->HotelID.'" style="display:none;">';
                                    echo '<span class="folder-photo">'.query('select','Users',['Username'],[$hotel->UserID],['UserID'])->fetchObject()->Username.'</span>';
                                    echo '<span class="hotel-id">'.$hotel->HotelID.'</span>';
                                    echo '<span class="hotel-name">'.$hotel->Name.'</span>';
                                    echo '<span class="hotel-city">'.$hotel->City.'</span>';
                                    echo '<span class="hotel-rate">'.$hotel->Rate.'</span>';
                                    echo '<span class="hotel-photo">'.json_decode($hotel->Photos)[0].'</span>';
                                echo '</div>';
                            }
                        }
                    ?>
            <h3 class="text-main-color">Looking for the perfect place to stay?</h3>
            <div id="carouselPerfectPlaces" class="carousel slide my-5">
                <div class="carousel-inner">
                    
                </div>
                <button class="carousel-control ccl" type="button" data-bs-target="#carouselPerfectPlaces" data-bs-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control ccr" type="button" data-bs-target="#carouselPerfectPlaces" data-bs-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>
    <?php
    $groupMedia = 'include';
    include $templates.'footer.php';
    ob_end_flush();
?>