<?php
 	session_start();
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
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            	
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="">
					<span class="login100-form-title p-b-32">
						Forgot Password
					</span>
                    <?php
					function generateRandomString($length = 8)
					{
						$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$charactersLength = strlen($characters);
						$randomString = '';
						for ($i = 0; $i < $length; $i++) {
							$randomString .= $characters[rand(0, $charactersLength - 1)];
						}
						return $randomString;
					}
				
					if(isset($_POST['resetpass'])) {
						$user_is = mysqli_real_escape_string($mysqli, $_POST['user_email']);
						$getlogin = get_rows("`tbl_user` WHERE `email`='$user_is'");
						if($getlogin > 0)
						{
							$resetKey = generateRandomString();
							$userDeta = get_user_by_email($user_is);
							// Always set content-type when sending HTML email
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							// More headers
							$headers .= 'From: Chess Clips <noreply@chessclips.com>' . "\r\n";

							$mailtxt = '<p>Hello '.$userDeta->fullname.'</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We have received your request to reset your password. 
<br />If you have made this request please click the link below to reset your password.<br /><br /><br />
							<a href="https://chessclips.com/sign.php?type=reset&email='.$userDeta->email.'&key='.$resetKey.'" style="background:#4ac64d; padding:10px; color:#FFF">Click Here to Reset Your Password Now</a><br /><br /></p>
							<p>Regards,<br /><b>Chess Clips Team</b>';
							$sendmail = mail($userDeta->email, "Reset Password", $mailtxt, $headers);
							if($sendmail) {
								$updateuser = $mysqli->query("UPDATE `tbl_user` SET `email_key`='$resetKey' WHERE `email`='$userDeta->email'");
								if($updateuser) 
								{
									echo '<div style="color:#4ac64d; margin-bottom:20px">An email has been sent to you with a link to reset your password.</div>';
								}
							}
							$hideemail = 'hide';
						}
						else {
							echo '<div style="color:#F00">You are not registered or your account is banned.</div>';
						}
					}
					else { 
						echo '<div style="color:#4ac64d; margin-bottom:20px">Please enter your Registered Email Address. We will send you a password reset link.</div>';
					}
					?>
                 	<?php if(empty($hideemail)) { ?>
					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="email" name="user_email" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="resetpass">
							Submit
						</button>
                        
					</div>
                    <?php } ?>
						<span style="float:right; text-align:right; margin-top:10px">Go back to <a href="sign.php">Login</a></span>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>