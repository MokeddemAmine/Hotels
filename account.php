<?php 
    // phpmailer classes
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    use function PHPSTORM_META\type;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    require 'vendor/autoload.php';

    ob_start();
    session_start();
    $pageTitle = 'Products';
    if(isset($_SESSION['username'])){
        include 'init.php';
        global $getUser;
        $page = isset($_GET['do'])?$_GET['do']:'manage';
        ?>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="p-4">
                        <h5 class="text-capitalize">Hi, <?= $getUser->Name ?></h5>
                        <p><?= $getUser->Email ?></p>
                        <ul class="nav flex-column mt-5">
                            <li class="nav-item border rounded w-100 my-2">
                                <a href="?do=profile" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fa-solid fa-user fa-lg me-4"></i> Profile
                                    </div>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="nav-item border rounded w-100 my-2">
                                <a href="?do=payments" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fa-regular fa-credit-card fa-lg me-3"></i> Payments
                                    </div>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="nav-item border rounded w-100 my-2">
                                <a href="?do=settings" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fa-solid fa-gear fa-lg me-3"></i> Settings
                                    </div>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="nav-item border rounded w-100 my-2">
                                <a href="?do=reviews" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fa-solid fa-message fa-lg me-3"></i> Reviews
                                    </div>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="nav-item border rounded w-100 my-2">
                                <a href="?do=helpsAndFeedback" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fa-solid fa-circle-question fa-lg me-3"></i> Helps & Feedback
                                    </div>
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="account-details border rounded p-4">
                        <?php 
                            if($page == 'manage' || $page == 'profile'){
                                ?>
                                <h3 class="text-capitalize"><?= $getUser->Name ?></h3>
                                <div class="basic-info my-5">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h3 class="text-capitalize">basic information</h3>
                                        <a href="?do=edit_basic_info" class="btn btn-white text-second-color fw-bold">Edit</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class='mb-0'>Name</p>
                                            <p class="text-capitalize"><?= $getUser->Name ?></p>
                                            <p class='mb-0'>Date of Birth</p>
                                            <p class="text-capitalize"><?= $getUser->Birthday ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class='mb-0'>Bio</p>
                                            <p class="text-capitalize">Not provided</p>
                                            <p class='mb-0'>Gender</p>
                                            <p class="text-capitalize">Male</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-info my-5">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h3 class="text-capitalize">contact</h3>
                                        <a href="?do=edit_contact_info" class="btn btn-white text-second-color fw-bold">Edit</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class='mb-0'>Mobile Number</p>
                                            <p class="text-capitalize">Not Provided</p>
                                            <p class='mb-0'>Emergency Contact</p>
                                            <p class="text-capitalize">Not Provided</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class='mb-0'>Email</p>
                                            <p class="text-capitalize"><?= $getUser->Email ?></p>
                                            <p class='mb-0'>Address</p>
                                            <p class="text-capitalize">Not Provided</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }elseif($page == 'settings'){
                                ?>
                                <h3 class="text-capitalize">Settings</h3>
                                <div class="security my-4">
                                    <h3>Sign-in and security</h3>
                                    <p>Keep your account safe with a secure password and  by signing out of devices you're not actively using.</p>
                                    <a href="?do=changeEmail" class="d-block rounded border py-2 px-3 text-dark text-decoration-none" style="width:414px; max-width:100%;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Email</p>
                                                <p class="m-0"><?= $getUser->Email ?></p>
                                            </div>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </a>
                                    <a href="?do=changePassword" class="d-block rounded border p-3 text-dark text-decoration-none my-3" style="width:414px; max-width:100%;">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Change Password</p>
                                            </div>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="management">
                                    <h3>Account management</h3>
                                    <p>Control other options to manage your data, like deleting your account.</p>
                                    <a href="?do=deleteAccount" class="text-decoration-none">Delete account</a>
                                </div>
                                <?php
                            }elseif($page == 'payments'){
                                ?>
                                <h3 class="text-capitalize">Payments</h3>
                                <p>We support bussnis account here like paypal</p>
                                <?php if($getUserPlus){
                                    if($getUserPlus->Payments){
                                        echo '<p>'.$getUserPlus->Payments.' <a href="?do=deletePayment" class="confirm-delete btn btn-danger btn-sm">Delete</a></p>';
                                    }else{
                                        echo '<p>Now, you haven\'t any busniss account, you should have one</p>';
                                    }
                                } ?>
                                
                                <a href="?do=AddPayments" class="btn btn-outline-primary btn-sm">Add Payment method</a>
                                <?php
                            }elseif($page == 'helpsAndFeedback'){
                                ?>
                                <h3 class="my-4">Help and feedback</h3>
                                <p>Have questions or feedback for us? We're listening.</p>
                                <ul class="nav flex-column">
                                    <li class="nav-item border rounded my-2" style="width:414px;max-width:100%">
                                        <a href="#" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fa-brands fa-rocketchat me-3"></i> Chat now
                                            </div>
                                            <div class="fa-solid fa-chevron-right"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item border rounded my-2" style="width:414px;max-width:100%">
                                        <a href="#" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fa-solid fa-circle-question me-3"></i> Visit the Help Centre
                                            </div>
                                            <div class="fa-solid fa-chevron-right"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item border rounded my-2" style="width:414px;max-width:100%">
                                        <a href="#" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fa-solid fa-phone me-3"></i> Call Us
                                            </div>
                                            <div class="fa-solid fa-chevron-right"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item border rounded my-2" style="width:414px;max-width:100%">
                                        <a href="#" class="nav-link text-dark d-flex justify-content-between align-items-center">
                                            <div>
                                                Share your feedback
                                            </div>
                                            <div class="fa-solid fa-chevron-right"></div>
                                        </a>
                                    </li>
                                </ul>
                                <?php
                            }elseif($page == 'edit_basic_info'){
                                ?>
                                    <h3 class="text-center my-4">Basic Information</h3>
                                    <form action="?do=update_basic_info" method="post" class="mx-auto" style="width:414px;max-width:100%;">
                                        <label class="fw-bold my-3">Name</label>
                                        <input type="text" name="name" value="<?= $getUser->Name ?>" class="form-control">
                                        <label class="fw-bold my-3">Date of Birth</label>
                                        <input type="date" name="birthday" value="<?= $getUser->Birthday ?>"  class="form-control">
                                        <label class="fw-bold my-3">Bio</label>
                                        <input type="text" name="bio" value="<?php 
                                                
                                                if($getUserPlus){
                                                    echo $getUserPlus->Bio;
                                                }else{
                                                    echo NULL;
                                                }
                                                    
                                            ?>" class="form-control">
                                        <label class="fw-bold my-3">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option hidden>Gender</option>
                                            <option value="male" <?php if($getUserPlus){ if($getUserPlus->Gender == 'male') echo 'selected'; } ?>>Male</option>
                                            <option value="female" <?php if($getUserPlus){ if($getUserPlus->Gender == 'female') echo 'selected'; } ?>>Female</option>
                                        </select>
                                        <input type="submit" value="Update" class="w-100 my-4 btn btn-main btn-sm">
                                    </form>
                                <?php
                            }elseif($page == 'edit_contact_info'){
                                ?>
                                    <h3 class="text-center my-4">Contact Information</h3>
                                    <form action="?do=update_contact_info" method="post" class="mx-auto" style="width:414px;max-width:100%;">
                                        <label class="fw-bold my-3">Mobile Number</label>
                                        <input type="text" name="mobile" class="form-control">
                                        <label class="fw-bold my-3">Email</label>
                                        <input type="email" name="email" value="<?= $getUser->Email ?>"  class="form-control">
                                        <label class="fw-bold my-3">Address</label>
                                        <input type="text" name="address" class="form-control">
                                        <label class="fw-bold my-3">Emergency Contact</label>
                                        <input type="text" name="emergency_contact" class="form-control">
                                        <input type="submit" value="Update" class="w-100 my-4 btn btn-main btn-sm">
                                    </form>
                                <?php
                            }elseif($page == 'changeEmail'){
                                ?>
                                    <h3 class="text-center my-4">Change Email</h3>
                                    <form action="?do=updateEmail" method="post" class="mx-auto" style="width:414px;max-width:100%;">
                                        <label class="fw-bold my-3">Email</label>
                                        <input type="email" name="email" value="<?= $getUser->Email ?>" class="form-control">
                                        <input type="submit" value="Update" class="w-100 my-4 btn btn-main btn-sm">
                                    </form>
                                <?php
                            }elseif($page == 'changePassword'){
                                ?>
                                    <h3 class="text-center my-4">Password</h3>
                                    <form action="?do=updatePassword" method="post" class="mx-auto" style="width:414px;max-width:100%;">
                                        <label class="fw-bold my-3">Current Password</label>
                                        <input type="password" name="current_password" class="form-control">
                                        <label class="fw-bold my-3">New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                        <label class="fw-bold my-3">Repeat New Password</label>
                                        <input type="password" name="repeat_new_password" class="form-control">
                                        <input type="submit" value="Update" class="w-100 my-4 btn btn-main btn-sm">
                                    </form>
                                <?php
                            }elseif($page == 'update_basic_info'){
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    $name           = filter_in('name');
                                    $birthday       = filter_in('birthday');
                                    $bio            = filter_in('bio');
                                    $gender         = filter_in('gender');

                                    $formError = array();

                                    if(empty($name)){
                                        $formError[] = '<div class="alert alert-danger">Name must by Not Empty</div>';
                                    }
                                    if(empty($birthday)){
                                        $formError[] = '<div class="alert alert-danger">Birthday must by Not Empty</div>';
                                    }

                                    if(!empty($formError)){
                                        foreach($formError as $error){
                                            echo $error;
                                        }
                                    }else{
                                        $updateUser = query('update','Users',['Name','Birthday'],[$name,$birthday,$getUser->UserID],['UserID']);

                                        if(!empty($bio) || (!empty($gender) && $gender!='Gender')){
                                            if($gender == 'Gender'){
                                                $gender = NULL;
                                            }
                                            $verifyInUsersPlus = query('select','Users_Plus',['UserID'],[$getUser->UserID],['UserID']);
                                            if($verifyInUsersPlus->rowCount() == 1){
                                                $updateUserPlus = query('update','Users_Plus',['Bio','Gender'],[$bio,$gender,$getUser->UserID],['UserID']);
                                            }else{
                                                $createUserPlus = query('insert','Users_Plus',['UserID','Bio','Gender'],[$getUser->UserID,$bio,$gender]);
                                            }
                                        }
                                        echo '<div class="alert alert-success">Info Updated with success</div>';
                                        redirectPage('back',3);
                                    }
                                }
                            }elseif($page == 'update_contact_info'){
                                $mobile         = !empty(filter_in('mobile'))?filter_in('mobile'):NULL;
                                $email          = filter_in('email','post','email');
                                $address        = !empty(filter_in('address'))?filter_in('address'):NULL;
                                $emergency      = !empty(filter_in('emergency_contact'))?filter_in('emergency_contact'):NULL;

                                $formError = array();

                                if(empty($email)){
                                    $formError[] = '<div class="alert alert-danger">Email must be not Empty</div>';
                                }

                                if(!empty($formError)){
                                    foreach($formError as $error){
                                        echo $error;
                                    }
                                }else{

                                    if(!empty($mobile) || !empty($address) || !empty($emergency)){
                                        if(strlen($mobile) < 10){
                                            $formError[] = '<div class="alert alert-danger">Please Enter a valid mobile number</div>';
                                        }
                                        if(strlen($address) < 10){
                                            $formError[] = '<div class="alert alert-danger">Address must be 10 characters or more</div>';
                                        }

                                        if(!empty($formError)){
                                            foreach($formError as $error){
                                                echo $error;
                                            }
                                        }else{
                                            $verifyInUsersPlus = query('select','Users_Plus',['UserID'],[$getUser->UserID],['UserID']);
                                            if($verifyInUsersPlus->rowCount() == 1){
                                                $updateUserPlus = query('update','Users_Plus',['Mobile','Address','Emergency_Contact'],[$mobile,$address,$emergency,$getUser->UserID],['UserID']);
                                            }else{
                                                $createUserPlus = query('insert','Users_Plus',['UserID','Mobile','Address','Emergency_Contact'],[$getUser->UserID,$mobile,$address,$emergency]);
                                            }
                                        }

                                    }

                                    $updateEmail = query('update','Users',['Email'],[$email,$getUser->UserID],['UserID']);
                                    echo '<div class="alert alert-success">Info Updated with success</div>';
                                    redirectPage('back',3);
                                }
                            }elseif($page == 'updateEmail'){
                                $email          = filter_in('email','post','email');
                                $code           = createID();

                                $mail = new PHPMailer(true);

                                if($email != $getUser->Email){
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
                                        <p style='font-size:1.5rem;'>Welcome $getUser->Name to your home.</p>
                                        <p style='font-size:1.5rem;'>You can change your Email now. Click on the link below</p>
                                        <a href='hotels.local/account.php?do=resetEmail&email=$email&code=$code' style='cursor:pointer;background: -webkit-linear-gradient(top left,#0ecee0,#e811fd);padding:.5rem 1rem;text-decoration: none;text-transform: capitalize;border-radius:.5rem;font-weight: bold;'>reset password</a>
                                    </div>";
                    
                                        $mail->send();
                                        $updatePass = query('update','Users',['Email_Confirm'],[$code,$getUser->Email],['Email']);
                                        echo '<div class="alert alert-success fw-bold">Link send to your Email, go it to change your Email</div>';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                }else{
                                    echo '<div class="alert alert-info">You enter the same Email</div>';
                                    redirectPage('back',3);
                                }
                            }elseif($page == 'resetEmail'){
                                $email  = isset($_GET['email'])?filter_in('email','get','email'):'';
                                $code   = isset($_GET['code'])?filter_in('code','get'):0;

                                $verifyCode = query('select','Users',['*'],[$getUser->Email,$code],['Email','Email_Confirm']);
                                if($verifyCode->rowCount()){
                                    $updateEmail = query('update','Users',['Email','Email_Confirm'],[$email,1,$getUser->UserID],['UserID']);
                                    echo '<div class="alert alert-success">Email has been change successfully</div>';
                                }
                            }elseif($page == 'updatePassword'){
                                $password       = filter_in('current_password');
                                $new_pass       = filter_in('new_password');
                                $new_pass2      = filter_in('repeat_new_password');

                                if(sha1($password) != $getUser->Password){
                                    echo '<div class="alert alert-danger">Your current password is incorrect</div>';
                                    redirectPage('back',3);
                                }else{
                                    if(empty($new_pass) || strlen($new_pass) < 8){
                                        echo '<div class="alert alert-danger">Please enter a valid Password that must has at least 8 characters</div>';
                                        redirectPage('back',3);
                                    }elseif($new_pass != $new_pass2){
                                        echo '<div class="alert alert-danger">Please enter the same Password</div>';
                                        redirectPage('back',3);
                                    }else{
                                        
                                        $updatePassword = query('update','Users',['Password'],[sha1($new_pass),$getUser->UserID],['UserID']);
                                        echo '<div class="alert alert-success">Password reset with success</div>';
                                        redirectPage('back',3);
                                    }
                                }
                            }elseif($page == 'AddPayments'){
                                ?>
                                <h3 class="text-center">Add Payment Method</h3>
                                <p class="text-center">We just accept <span style="color:#003087" class="fs-5 fw-bold">Pay</span><span style="color:#009cde" class="fs-5 fw-bold">Pal</span> payment method</p>
                                <form action="?do=UpdatePayment" method="POST" class="mx-auto" style="width:414px;max-width:100%;">
                                    <input type="email" name="paypal" placeholder="Enter your paypal email account" class="form-control mt-5">
                                    <input type="submit" value="Add Paypal" class="btn btn-block w-100 btn-sm mt-4" style="background-color: #003087;color:white">
                                </form>
                                <?php
                            }elseif($page == 'UpdatePayment'){
                                // in here we just try it, it is just an exemple , so we don't need to add real paypal account
                                $paypal     = filter_in('paypal','post','email');

                                if(empty($paypal)){
                                    echo '<div class="alert alert-danger">Please enter your paypal email account</div>'; 
                                }
                                else{
                                    if($getUserPlus){
                                        $updatePayment = query('update','Users_Plus',['Payments'],[$paypal,$getUser->UserID],['UserID']);  
                                    }else{
                                        $addPayment = query('insert','Users_Plus',['UserID','Payments'],[$getUser->UserID,$paypal]);
                                    }
                                    echo '<div class="alert alert-success">Payment Method added with success</div>';
                                }
                                redirectPage('back',3);
                                
                            }elseif($page == 'deletePayment'){
                                $deletePayment = query('update','Users_Plus',['Payments'],[NULL,$getUser->UserID],['UserID']);
                                echo '<div class="alert alert-success">Payment Method deleted with success</div>';
                                redirectPage('back',3);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
    }else{
        redirectPage();
    }

    include $templates . 'footer.php';
    ob_end_flush();
?>