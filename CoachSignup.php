<?php
 	session_start();
	include('admin/includes/config.php');
	include('admin/includes/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Chess Clips</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/img/favicon.png" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            	<?php
				function generateRandomString($length = 12)
				{
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, $charactersLength - 1)];
					}
					return $randomString;
				}

				if(isset($_POST['signupnow'])) {
					
					$regName = mysqli_real_escape_string($mysqli, $_POST['usrName']);
					$regPass = mysqli_real_escape_string($mysqli, base64_encode($_POST['usrPass']));
					$regEmail = mysqli_real_escape_string($mysqli, $_POST['usrEmail']);
					$regTitle = mysqli_real_escape_string($mysqli, $_POST['usrTitle']);
					$regUsrType = mysqli_real_escape_string($mysqli, $_POST['usrType']);
					$userEmailKey = generateRandomString();
					
					$emailExist = get_rows("`tbl_user` WHERE `email`='$regEmail'");
					if($emailExist > 0)
					{
						echo '<div style="color:#F00">User is already registered with Same Email. <a href="sign.php">Click Here</a> to Login</div>';
					}
					else {
						$datetimenow = date("Y-m-d H:i:s");
						$regUser = $mysqli->query("INSERT INTO `tbl_user`(`fullname`, `email`, `pass_word`, `user_balance`, `title`, `pref_lang`, `user_type`, `reg_date`, `email_key`, `user_status`) VALUES ('$regName', '$regEmail', '$regPass', '0', '$regTitle', 'English', '$regUsrType', '$datetimenow', '$userEmailKey', '0')");
						if($regUser) {
							// Always set content-type when sending HTML email
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							// More headers
							$headers .= 'From: Chess Clips <noreply@chessclips.com>' . "\r\n";

                            $mailtxt = '<p>Hello '.$regName.'</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thanks for registering with <a href="http://www.chessclips.com/" target="blank">www.chessclips.com</a><br />Please verify your account by clicking the link below<br /><br /><br />
							<a href="https://chessclips.com/sign.php?type=verify&email='.$regEmail.'&key='.$userEmailKey.'" style="background:#4ac64d; padding:10px; color:#FFF">Click Here to Verify Email Now</a><br /><br /></p>
							<p>Regards,<br /><b>Chess Clips Team</b>';
                            mail($regEmail, "Welcome to ChessClips.com", $mailtxt, $headers);
                            echo '<div style="color:#0C0">Registration Completed Successfully. Please verify your email. <a href="sign.php">Click Here</a> to Login';
                            $hideformnow = 'hide';
						}
					}
				}
				?>
                <?php if(empty($hideformnow)) { ?>
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="">
					<span class="login100-form-title p-b-32">
						Coach Registration
					</span>

					<span class="txt1 p-b-11" style="margin-top:-20px">
						Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Name is required">
						<input class="input100" type="text" name="usrName" required="required">
						<span class="focus-input100"></span>
					</div>
                    
                    <span class="txt1 p-b-11" style="margin-top:-20px">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="email" name="usrEmail" required="required">
						<span class="focus-input100"></span>
					</div>
                    
					
					<span class="txt1 p-b-11" style="margin-top:-20px">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="usrPass" required="required">
						<span class="focus-input100"></span>
					</div>


                    <span class="txt1 p-b-11" style="margin-top:0px">
						Title
					</span>


                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Title is required">
						<select class="input100" name="usrTitle">
                        	<option value="" >None</option>
                            <option value="FM" >FM</option>
                            <option value="WFM" >WFM</option>
                            <option value="IM" >IM</option>
                            <option value="WIM" >WIM</option>
                            <option value="GM" >GM</option>
                            <option value="WGM" >WGM</option>
                        </select>
						<span class="focus-input100"></span>
					</div>
					
                    <span class="txt1 p-b-11" style="margin-top:-20px">
						User / Account Type
					</span>



                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Title is required">
                        <select class="input100" name="usrType">
                            <option value="coach">Coach</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>


					<div class="container-login100-form-btn" style="float:right; text-align:right">
						<button class="login100-form-btn" name="signupnow">
							Signup
						</button>
                        
					</div>
					<a href="./sign.php">Already Registered? Login</a>
						
				</form>
                <?php } ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
</body>
</html>