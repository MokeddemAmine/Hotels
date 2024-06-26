<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    use function PHPSTORM_META\type;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    require 'vendor/autoload.php';

    ob_start();
    session_start();
    $pageTitle = 'Login & Registration';
    include 'init.php';
    if(isset($_SESSION['username'])){
        redirectPage();
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
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" class="btn btn-outline-primary my-2 my-sm-0"><i class="fa-brands fa-facebook"></i> Facebook</fb:login-button>
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
        }elseif($page == 'signin'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $username       = filter_in('username');
                $password       = filter_in('password');

                $verifySignin   = $pdo->prepare("SELECT * FROM Users WHERE Password = ? AND (Username = ? OR Email = ?)");
                $verifySignin->execute([sha1($password),$username,$username]);

                if($verifySignin->rowCount() == 1){
                    $user = $verifySignin->fetchObject()->Username;
                    $_SESSION['username'] = $user;
                    redirectPage();
                }else{
                    echo '<div class="alert alert-danger fw-bold">Username Or Password was incorrect</div>';
                    redirectPage('back',3);
                }
            }else{
                redirectPage();
            }
        }elseif($page == 'forgotPassword'){
            $email      = filter_in('email','post','email');
            
            $verifyEmail= query('select','Users',['*'],[$email],['Email']);
            if($verifyEmail->rowCount() == 1){
                $user = $verifyEmail->fetchObject();
                $code = createID();
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
                    $mail->Subject = 'Hotels Reset Password';
                    $mail->Body    = "<div style='text-align:center;margin:1rem 0;'>
                    <h2 style='color:#0ecee0;font-weight: bold;'>Hotels Website</h2>
                    <p style='font-size:1.5rem;'>Welcome $user->Name to your home.</p>
                    <p style='font-size:1.5rem;'>You can reset your password now. Click on the link below</p>
                    <a href='hotels.local/login.php?do=ResetPassword&email=$email&code=$code' style='cursor:pointer;background: -webkit-linear-gradient(top left,#0ecee0,#e811fd);padding:.5rem 1rem;text-decoration: none;text-transform: capitalize;border-radius:.5rem;font-weight: bold;'>reset password</a>
                </div>";

                    $mail->send();
                    $updatePass = query('update','Users',['Password_Update'],[$code,$email],['Email']);
                    echo '<div class="alert alert-success fw-bold">Link send to your Email, go it to reset your password</div>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }else{
                echo '<div class="alert alert-danger fw-bold">Email Not Exist</div>';
            }
        }elseif($page == 'ResetPassword'){
            $email      = filter_in('email','get','email');
            $code       = filter_in('code','get');
            $verifyCode = query('select','Users',['*'],[$email,$code],['Email','Password_Update']);
            if($verifyCode->rowCount() == 1){
                ?>
                <div class="mx-auto form-sign text-center py-4 bg-white rounded parent-sign">
                    <div class="px-3 px-sm-5">
                        <form action="?do=UpdatePassword&email=<?= $email ?>&code=<?= $code ?>" method="POST">
                            <h2 class="text-capitalize text-dark my-5">reset password</h2>
                            <input type="password" name="password" placeholder="Enter a password" class="form-control my-4">
                            <input type="password" name="password-confirm" placeholder="Confirm your password" class="form-control my-4">
                            <div class="d-grid gap2">
                                <input type="submit" value="Reset Password" name="sign-up" class="btn btn-main">
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }else{
                redirectPage();
            }
        }elseif($page == 'UpdatePassword'){
            $email      = filter_in('email','get','email');
            $code       = filter_in('code','get');

            $password   = filter_in('password');
            $passConfirm= filter_in('password-confirm');

            $verifyCode = query('select','Users',['*'],[$email,$code],['Email','Password_Update']);
            if($verifyCode->rowCount() == 1){
                $formError = array();

                if(empty($password)){
                    $formError[] = '<div class="alert alert-danger fw-bold">Password must be not empty</div>';
                }elseif(strlen($password) < 8){
                    $formError[] = '<div class="alert alert-danger fw-bold">Password must has at least 8 characters</div>';
                }elseif($password != $passConfirm){
                    $formError[] = '<div class="alert alert-danger fw-bold">Please enter the same password</div>';
                }

                if(!empty($formError)){
                    foreach($formError as $error){
                        echo $error;
                    }
                }else{
                    $updatePass = query('update','Users',['Password','Password_Update'],[sha1($password),1,$email],['Email']);
                    echo '<div class="alert alert-success fw-bold">Password updated with success</div>';
                    redirectPage('login.php',3);
                }
                
            }else{
                redirectPage();
            }
        }elseif($page == 'signup'){

            $email      = filter_in('email','post','email');
            $pass       = filter_in('password');
            $passConfirm= filter_in('password-confirm');

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
                        <a href='hotels.local/login.php?do=confirmEmail&email=$email&code=$emailConfirm' style='cursor:pointer;background: -webkit-linear-gradient(top left,#0ecee0,#e811fd);padding:.5rem 1rem;text-decoration: none;text-transform: capitalize;border-radius:.5rem;font-weight: bold;'>confirm email</a>
                    </div>";

                        $mail->send();
                        
                        echo '<div class="alert alert-success fw-bold">Confirmation send to your Email, Verify it to continue</div>';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
            }
        }elseif($page == 'confirmEmail'){

            $email      = filter_in('email','get','email');
            $code       = filter_in('code','get');
            
            $verifyReg  = query('select','Users',['*'],[$email,$code],['Email','Email_Confirm']);
            if($verifyReg->rowCount() == 1){
            ?>
            <div class="mx-auto form-sign text-center py-4 bg-white rounded parent-sign">
                <div class="px-3 px-sm-5">
                    <form action="?do=confirmSignUp&email=<?= $email ?>&code=<?= $code ?>" method="POST">
                        <h2 class="text-capitalize text-dark my-5">register form</h2>
                        <input type="text" name="username" placeholder="Enter a username" class="form-control my-4">
                        <input type="text" name="name" placeholder="Enter your name" class="form-control my-4">
                        <select name="type" class="form-select">
                            <option hidden>Type</option>
                            <option value="customer">Customer</option>
                            <option value="seller">Seller</option>
                        </select>
                        <input type="date" name="birthday" placeholder="birthday" class="form-control my-4">
                        <div class="d-grid gap2">
                            <input type="submit" value="Go Up" name="sign-up" class="btn btn-main">
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }else{
                redirectPage();
            }
        }elseif($page == 'confirmSignUp'){

            $email      = filter_in('email','get','email');
            $code       = filter_in('code','get');

            $verifyReg  = query('select','Users',['*'],[$email,$code],['Email','Email_Confirm']);
            if($verifyReg->rowCount() == 1){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
                    $username       = filter_in('username');
                    $name           = filter_in('name');
                    $type           = filter_in('type');
                    $birthday       = filter_in('birthday');

                    $formError = array();

                    if(empty($username)){
                        $formError[] = '<div class="alert alert-danger fw-bold">Username must be not empty</div>';
                    }elseif(strlen($username) < 8){
                        $formError[] = '<div class="alert alert-danger fw-bold">Username must have at least 8 characters</div>';
                    }
                    if(empty($name)){
                        $formError[] = '<div class="alert alert-danger fw-bold">Name must be not empty</div>';
                    }
                    if(empty($type)){
                        $formError[] = '<div class="alert alert-danger fw-bold">Type must be not empty</div>';
                    }elseif($type != 'seller' && $type != 'customer'){
                        $formError[] = '<div class="alert alert-danger fw-bold">Type is not valid</div>';
                    }
                    if(empty($birthday)){
                        $formError[] = '<div class="alert alert-danger fw-bold">Birthday must be not empty</div>';
                    }
                    // print errors if exist
                    if(!empty($formError)){
                        echo '<div class="mx-auto form-sign text-center py-4 bg-white rounded parent-sign">';
                        foreach($formError as $error){
                            echo $error;
                        }
                        echo '</div>';
                    }else{
                        $signup = query('update','Users',['Email_Confirm','Username','Name','Type','Birthday'],[1,$username,$name,$type,$birthday,$email],['Email']);
                        echo '<div class="alert alert-success fw-bold">Registration finished with success</div>';
                        $_SESSION['username'] = $username;
                        redirectPage(NULL,3);
                    }
                }else{
                    redirectPage();
                }
            }else{
                redirectPage();
            }
        }else{
            redirectPage();
        }
        echo '</div>';
    }
    // we must have a live website with hosting and privacy_policy  and terms of services for login with facebook account
    include $templates.'footer.php';
    ob_end_flush();
?>