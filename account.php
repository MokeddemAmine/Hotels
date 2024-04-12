<?php 
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
                                <p>Now, you haven't any busniss account, you should have one</p>
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
                                        <input type="text" name="bio" class="form-control">
                                        <label class="fw-bold my-3">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option hidden>Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
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
                                        <input type="email" name="mobile" value="<?= $getUser->Email ?>" class="form-control">
                                        <input type="submit" value="Update" class="w-100 my-4 btn btn-main btn-sm">
                                    </form>
                                <?php
                            }elseif($page == 'changePassword'){
                                ?>
                                    <h3 class="text-center my-4">Password</h3>
                                    <form action="?do=updateEmail" method="post" class="mx-auto" style="width:414px;max-width:100%;">
                                        <label class="fw-bold my-3">Current Password</label>
                                        <input type="password" name="current_password" class="form-control">
                                        <label class="fw-bold my-3">New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                        <label class="fw-bold my-3">Repeat New Password</label>
                                        <input type="password" name="repeat_password" class="form-control">
                                        <input type="submit" value="Update" class="w-100 my-4 btn btn-main btn-sm">
                                    </form>
                                <?php
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