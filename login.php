<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    require 'vendor/autoload.php';

    ob_start();
    session_start();
    $pageTitle = 'Login & Registration';
    include 'init.php';
    if(isset($_SESSION['username'])){
        header('Location: index.php');
        exit();
    }else{
        $page = isset($_GET['do'])?$_GET['do']:'manage';
        echo '<div class="container my-5 py-5 bg-gradient-page">';
        if($page == 'manage'){
        ?>
            <div class="mx-auto form-sign text-center  py-4 bg-white rounded parent-sign">
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
                    <form action="?do=signup" method="POST">
                        <h2 class="text-capitalize text-dark my-5">register form</h2>
                        <input type="email" name="email" placeholder="Email Please" class="form-control my-4">
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
        <?php
        }elseif($page == 'signup'){
            $email      = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            $pass       = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $passConfirm= filter_var($_POST['password-confirm'],FILTER_SANITIZE_STRING);

            $formError = array();

            if(empty($email)){
                $formError[] = '<div class="alert alert-danger fw-bold">Email must be Not Empty</div>';
            }
            if(empty($pass)){
                $formError[] = '<div class="alert alert-danger fw-bold">Password must be Not Empty</div>';
            }
            if($pass != $passConfirm){
                $formError[] = '<div class="alert alert-danger fw-bold">Please Enter the same Password</div>';
            }
            
            if(!empty($formError)){
                foreach($formError as $error){
                    echo $error;
                }
            }else{
                $emailConfirm = createID();

                $addUser = query('insert','Users',['Email','Email_Confirm','Password'],[$email,$emailConfirm,sha1($pass)]);
        
                if($addUser){

                    $mail = new PHPMailer(true);

                    try {
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                        $mail->isSMTP();                                           
                        $mail->Host       = 'smtp.gmail.com';                   
                        $mail->SMTPAuth   = true;                                 
                        $mail->Username   = 'mokeddemamine1707@gmail.com';                 
                        $mail->Password   = 'hfwc pscq lukp gurw';                            
                        $mail->SMTPSecure = 'ssl';            
                        $mail->Port       = 465;                                    

                        
                        $mail->setFrom('mokeddemamine1707@gmail.com', 'Hotels Website');
                        $mail->addAddress($email);
                        $mail->addReplyTo('mokeddemamine1707@gmail.com', 'Hotels Website');

                        
                        $mail->isHTML(true);                                  
                        $mail->Subject = 'Confirmation Email registration';
                        $mail->Body    = "<div style='text-align:center;margin:1rem 0;'>
                        <h2 style='color:#0ecee0;font-weight: bold;'>Hotels Website</h2>
                        <p style='font-size:1.5rem;'>Welcome to your home. You can book and reserve a hotel room here or publish your hotel if you are a seller</p>
                        <p style='font-size:1.5rem;'>Thank you for register in our hotel site</p>
                        <a href='ecommerce.local/login.php?do=confirmEmail&email=$email&code=$emailConfirm' style='cursor:pointer;background: -webkit-linear-gradient(top left,#0ecee0,#e811fd);padding:.5rem 1rem;text-decoration: none;text-transform: capitalize;border-radius:.5rem;font-weight: bold;'>confirm email</a>
                    </div>";

                        $mail->send();
                        
                        echo '<div class="alert alert-success fw-bold">Confirmation send to your Email, Verify it to continue</div>';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
            }
        }elseif($page == 'confirmEmail'){
            // continue this
        }else{
            header("Location: index.php");
            exit();
        }
        echo '</div>';
    }

    include $templates.'footer.php';
    ob_end_flush();
?>