<?php 
    ob_start();
    session_start();
    $pageTitle = 'Products';
    if(isset($_SESSION['username'])){
        include 'init.php';
        global $getUser;
        if($getUser->Type == 'seller'){
            redirectPage();
        }else{
            
        }
    }else{
        redirectPage();
    }

    include $templates . 'footer.php';
    ob_end_flush();
?>