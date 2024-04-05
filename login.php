<?php
    ob_start();
    session_start();
    $pageTitle = 'Login & Registration';
    include 'init.php';
    if(isset($_SESSION['username'])){
        header('Location: index.php');
        exit();
    }else{
        ?>
        <div class="container my-5 py-5 text-center bg-gradient-page">
            <div class="mx-auto form-sign  py-4 bg-white rounded parent-sign">
                <div class="forgot-password px-3 px-sm-5">
                    <form action="?do=forgotPassword" method="POST">
                        <h2 class="text-capitalize text-dark my-5">forgot password</h2>
                        <input type="email" name="email" placeholder="Enter Your Email" class="form-control my-4">
                        <div class="d-grid gap2">
                            <input type="submit" value="Send Code To Email" name="forgot-password" class="btn btn-main">
                        </div>
                    </form>
                    <p class="my-5">You have an account? <a href="#" class="go-to-sign-in">Signin now</a></p>
                </div>
                <div class="sign-in px-3 px-sm-5">
                    <form action="?do=signin" method="POST">
                        <h2 class="text-capitalize text-dark my-5">login form</h2>
                        <input type="text" name="username" placeholder="Email or Username" class="form-control my-4">
                        <input type="password" name="password" placeholder="Password" class="form-control my-4">
                        <div class="d-grid gap2">
                            <input type="submit" value="Login" name="sign-in" class="btn btn-main">
                        </div>
                    </form>
                    <a href="#" class="text-start d-block my-2 text-capitalize text-second-color fw-bold text-decoration-none" id="forget-password">forget password</a>
                    <p class="text-dark my-4">Or login with</p>
                    <div class="d-flex justify-content-between flex-column flex-sm-row px-lg-2 mx-lg-2 ">
                        <a href="#" class="btn btn-outline-primary my-2 my-sm-0"><i class="fa-brands fa-facebook"></i> Facebook</a>
                        <a href="#" class="btn btn-outline-secondary my-2 my-sm-0"><i class="fa-brands fa-twitter"></i> Twitter</a>
                        <a href="#" class="btn btn-outline-danger my-2 my-sm-0"><i class="fa-brands fa-google"></i> Gmail</a>
                    </div>
                    <p class="my-5">Not a member? <a href="#" id="go-to-sign-up">Signup now</a></p>
                </div>
                <div class="sign-up px-3 px-sm-5">
                    <form action="?do=signin" method="POST">
                        <h2 class="text-capitalize text-dark my-5">register form</h2>
                        <input type="text" name="username" placeholder="Email or Username" class="form-control my-4">
                        <input type="password" name="password" placeholder="Password" class="form-control my-4">
                        <input type="password" name="password-confirm" placeholder="Repeat Password" class="form-control my-4">
                        <div class="d-grid gap2">
                            <input type="submit" value="Sign Up" name="sign-up" class="btn btn-main">
                        </div>
                    </form>
                    <p class="text-dark my-4">Or register with</p>
                    <div class="d-flex justify-content-between flex-column flex-sm-row px-lg-2 mx-lg-2 ">
                        <a href="#" class="btn btn-outline-primary my-2 my-sm-0"><i class="fa-brands fa-facebook"></i> Facebook</a>
                        <a href="#" class="btn btn-outline-secondary my-2 my-sm-0"><i class="fa-brands fa-twitter"></i> Twitter</a>
                        <a href="#" class="btn btn-outline-danger my-2 my-sm-0"><i class="fa-brands fa-google"></i> Gmail</a>
                    </div>
                    <p class="my-5">You have an account? <a href="#" class="go-to-sign-in">Signin now</a></p>
                </div>

            </div>
        </div>
        <?php
    }

    include $templates.'footer.php';
    ob_end_flush();
?>