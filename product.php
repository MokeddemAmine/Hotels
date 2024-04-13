<?php 
    ob_start();
    session_start();
    $pageTitle = 'Products';
    if(isset($_SESSION['username'])){
        include 'init.php';
        global $getUser;
        if($getUser->Type == 'customer'){
            redirectPage();
        }else{
            ?>
                <div class="container">
                    <div class="our-hotels border rounded my-4 py-3">
                        <h2 class="text-uppercase text-center text-second-color">our hotels</h2>
                        <?php
                            $getHotels = query('select','Hotels',['*'],[$getUser->UserID],['UserID']);
                            if($getHotels->rowCount()){

                            }else{
                                
                            }
                        ?>
                    </div>
                </div>
            <?php
        }
    }else{
        redirectPage();
    }

    include $templates . 'footer.php';
    ob_end_flush();
?>