<?php
    include 'admin/connect.php';

    $functions  = 'include/functions/';
    $templates  = 'include/templates/';
    $css        = 'layout/css/';
    $js         = 'layout/js/';
    $imgs       = 'layout/imgs/';
    $uploads    = 'data/uploads/';

    include $functions.'functions.php';

    $getUser = NULL;
    if(isset($_SESSION['username'])){
        $getUser = query('select','Users',['*'],[$_SESSION['username']],['Username'])->fetchObject();
    }


    include $templates.'header.php';

    

?>