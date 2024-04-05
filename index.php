<?php
    ob_start();
    session_start();
    $pageTitle = 'Hotels - Reservation From Luxury Hotels';
    include 'init.php';

    include $templates.'footer.php';
    ob_end_flush();
?>