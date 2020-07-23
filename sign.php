<?php
include('admin/includes/config.php');
include('admin/includes/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Chess Clips</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="assets/img/favicon.png" itemprop="image">
    <link href="assets/img/favicon.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <?php
            if(isset($_POST['login'])) {
                $user_is = mysqli_real_escape_string($mysqli, $_POST['user_email']);
                $pass_is = mysqli_real_escape_string($mysqli, base64_encode($_POST['user_pass']));

                $getlogin = get_rows("`tbl_user` WHERE `email`='$user_is' AND `pass_word`='$pass_is' AND `user_status`='1'");
                if($getlogin > 0)
                {
                    session_start();
                    $_SESSION['studentorcoach'] = $user_is;

                    if(empty($_GET['redirect'])) {
                        $redirectto = "home.php";
                    } else {
                        $redirectto = $_GET['redirect'];
                    }
                    header("Location: ". $redirectto);
                }
                else {
                    echo '<div style="color:#F00">Incorrect Username or Password or your account is not activated yet</div>';
                }
            }

            if(isset($_POST['resetpass'])) {
                $user_is = mysqli_real_escape_string($mysqli, $_POST['user_emailr']);
                $pass_is = mysqli_real_escape_string($mysqli, base64_encode($_POST['user_passr']));
                $key_is = mysqli_real_escape_string($mysqli, $_POST['keyr']);

                $getreset = get_rows("`tbl_user` WHERE `email`='$user_is' AND `email_key`='$key_is' AND `user_status`='1'");
                if($getreset > 0) {
                    $updatereset = $mysqli->query("UPDATE `tbl_user` SET `email_key`='', `pass_word`='$pass_is' WHERE `email`='$user_is'");
                    if($updatereset)
                    {
                        echo '<div style="color:#0C0">Password Resetted Successfully. Please Login using below form</div>';
                    }
                }
                else {
                    echo '<div style="color:#F00">Either your account is inactive or reset key expired</div>';
                }
            }

            if(isset($_GET['type'])) {
                echo '<script>alert("Your message is correct");</script>';
                $typenow = $_GET['type'];
                if($typenow == 'verify') {
                    $verEmail = $_GET['email'];
                    $verKey = $_GET['key'];
                    $verifynow = get_rows("`tbl_user` WHERE `email`='$verEmail' AND `email_key`='$verKey'");
                    if($verifynow > 0)
                    {
                        $updateverify = $mysqli->query("UPDATE `tbl_user` SET `email_key`='', `user_status`='1' WHERE `email`='$verEmail'");
                        if($updateverify)
                        {
                            echo '<div style="color:#0C0">Account Activated Successfully. Please Login using Below Form. Or <a href="./sign.php">Click Here</a> to Login';
                        }
                    }
                    else {
                        echo '<div style="color:#F00">Incorrect Verification Key Entered</div>';
                    }
                }
                else if(isset($_GET['type']) == 'reset') {
                    $restEmail = mysqli_real_escape_string($mysqli, $_GET['email']);
                    $restKey = mysqli_real_escape_string($mysqli, $_GET['key']);

                    $resetynow = get_rows("`tbl_user` WHERE `email`='$restEmail' AND `email_key`='$restKey'");
                    if($resetynow > 0)
                    {
                        ?>
                        <form class="login100-form validate-form flex-sb flex-w" method="post" action="sign.php">
							<span class="login100-form-title p-b-32">
								Reset Password
							</span>

                            <span class="txt1 p-b-11">
								Email
							</span>
                            <div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
                                <input type="hidden" name="keyr" value="<?=$_GET['key']?>" />
                                <input class="input100" type="email" name="user_emailr" value="<?=$_GET['email']?>" readonly="readonly">
                                <span class="focus-input100"></span>
                            </div>

                            <span class="txt1 p-b-11">
								Password
							</span>
                            <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
								<span class="btn-show-pass">
									<i class="fa fa-eye"></i>
								</span>
                                <input class="input100" type="password" name="user_passr" placeholder="New Password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" name="resetpass">
                                    Reset Password
                                </button>

                            </div>
                        </form>
                        <?php
                    }
                    else {
                        echo '<div style="color:#F00">Incorrect Reset Key Entered</div>';
                    }
                }
            } else { ?>

                <form class="login100-form validate-form flex-sb flex-w" method="post" action="">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

                    <span class="txt1 p-b-11">
						Email
					</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
                        <input class="input100" type="email" name="user_email" >
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
						Password
					</span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                        <input class="input100" type="password" name="user_pass" >
                        <span class="focus-input100"></span>
                    </div>
                    <div class="flex-sb-m w-full p-b-48">
                        <div class="contact100-form-checkbox">
                        </div>

                        <div>
                            <a href="forgotpass.php" class="txt3">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>

                    </div>
                </form>



            <?php } ?>






        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
</body>
</html>