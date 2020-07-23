<?php
	session_start();
	include("admin/includes/config.php");
	include("admin/includes/functions.php");

	// Include and instantiate the class.
	require_once 'admin/includes/mobiledetect/Mobile_Detect.php';
	$detect = new Mobile_Detect;

	$actual_link = basename($_SERVER['REQUEST_URI']);

	if(empty($_SESSION['studentorcoach']))
	{
		header("Location: sign.php?redirect=" . $actual_link);
		exit();
	}
	else {
		$logged_user = $_SESSION['studentorcoach'];
	}

	$userDet = get_user_by_email($logged_user);

    if(isset($_POST['addmember'])) {
        $usrName = mysqli_real_escape_string($mysqli, $_POST['usName']);
        $usrEmail = mysqli_real_escape_string($mysqli, $_POST['usEmail']);
		$usrPassword = mysqli_real_escape_string($mysqli, base64_encode($_POST['usPassword']));
		$usrTitle = mysqli_real_escape_string($mysqli, $_POST['usTitle']);
		$usrType = mysqli_real_escape_string($mysqli, $_POST['usType']);
		
        $datetime_now = date("Y-m-d H:i:s");
		
		$userExist = get_rows("`tbl_user` WHERE `email`='$usrEmail'");
		if($userExist > 0) {
			$mstatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> User Already Exist with Same Email.</div>';
		} else {
			$adduser = $mysqli->query("INSERT INTO `tbl_user`(`fullname`, `email`, `pass_word`, `user_balance`, `title`, `pref_lang`, `user_type`, `reg_date`, `user_status`) VALUES ('$usrName', '$usrEmail', '$usrPassword', '0', '$usrTitle', 'English', '$usrType', '$datetime_now', '1')");
			if($adduser) {
				$mstatus = '<div class="alert alert-success"><i class="icon-user-md"></i> Thanks for registering with www.chessclips.com. Please verify your email</div>';
			}
			else {
				$mstatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> Error Adding User. Please Try Again</div>';
			}
		}
    }
    
    if(isset($_GET['delid'])) {
        $delusr = mysqli_real_escape_string($mysqli, $_GET['delid']);
        $deleteusr = $mysqli->query("DELETE FROM `tbl_user` WHERE `id`='$delusr'");
        if($deleteusr) {
            $delstatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> User Deleted Successfully.</div>';
        }
    }

	if(isset($_GET['delles'])) {
        $delless = mysqli_real_escape_string($mysqli, $_GET['delles']);
        $deletelesson = $mysqli->query("DELETE FROM `tbl_games` WHERE `id`='$delless'");
        if($deletelesson) {
			$delmoves = $mysqli->query("DELETE FROM `tbl_game_history` WHERE `game_id`='$delless'");
            $gamestatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> Game Deleted Successfully.</div>';
        }
    }
    
    if(isset($_GET['do']) && isset($_GET['usr'])) {
        $action = mysqli_real_escape_string($mysqli, $_GET['do']);
        $resusr = mysqli_real_escape_string($mysqli, $_GET['usr']);
        
        if($action == 'ban') {
            $newstatus = '0';
        }
        else if($action == 'unban') {
            $newstatus = '1';
        }
        
        $updateusr = $mysqli->query("UPDATE `tbl_user` SET `user_status`='$newstatus' WHERE `id`='$resusr'");
        if($updateusr) {
            $updstatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> User Status Updated Successfully.</div>';
        }
    }
    
	if(isset($_POST['ratecoach'])) { 
		$rGame = mysqli_real_escape_string($mysqli, $_POST['game']);
		$rCoach = mysqli_real_escape_string($mysqli, $_POST['coach']);
		$rRating = mysqli_real_escape_string($mysqli, $_POST['crat']);
		$rComments = mysqli_real_escape_string($mysqli, $_POST['comments']);
		
		$updategame = $mysqli->query("UPDATE `tbl_games` SET `coach_rating`='$rRating', `rating_comment`='$rComments' WHERE `id`='$rGame' AND `submit_to`='$rCoach' AND `user_id`='$userDet->id'");
		if($updategame) {
			$ratestatus = '<div class="alert alert-success"><i class="icon-envelope"></i> Coach Rated Successfully.</div>';
		}
		else {
			$ratestatus = '<div class="alert alert-danger"><i class="icon-envelope"></i> You are not allowed to rate Coach.</div>' . $mysqli->error;
		}
	}

if(isset($_POST['submitlesson'])) {


    $gameID = mysqli_real_escape_string($mysqli, $_POST['gameidnow']);
    $coachID = mysqli_real_escape_string($mysqli, $_POST['coacheselect']);
    $wp = mysqli_real_escape_string($mysqli, $_POST['white_name']);
    $bp = mysqli_real_escape_string($mysqli, $_POST['black_name']);
    $result_game = mysqli_real_escape_string($mysqli, $_POST['result_game']);
    $pgn = mysqli_real_escape_string($mysqli, $_POST['pgn'])." ".$result_game;
    $timenow = date("Y-m-d H:i:s");

    $coachdet = get_user_by_id($coachID);
    $gamedeta = get_game_details($gameID);
    $studentdet = get_user_by_id($gamedeta->user_id);

    $updategame = $mysqli->query("UPDATE `tbl_games` SET `wp_name`='$wp',`bp_name`='$bp',`game_pgn`='$pgn',`score`='$result_game',`end_time`='$timenow', `submit_to`='$coachID', `status`='0' WHERE `id`='$gameID'");


    if($updategame) {
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: Chess Clips <noreply@chessclips.com>' . "\r\n";

        $mailtxt = '<p>Hello '.$coachdet->fullname.'</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$studentdet->fullname.' has submitted a game for you to annotate.<br/><br />
				<br /><br />Regards,<br /><b>Chess Clips Team</b>';

        $coachmailsent = mail($coachdet->email, "New Game Submitted", $mailtxt, $headers);
        if($coachmailsent) {
            $add_maillogs = $mysqli->query("INSERT INTO `tbl_emails`(`sent_to`, `send_by`, `subject`, `bodytxt`, `sent_time`) VALUES ('$coachdet->email', '$gamedeta->user_id', 'New Game Submitted', '$mailtxt', '$timenow')");
            if($add_maillogs) {
                $gamestatus = '<div class="alert alert-success"><i class="icon-envelope"></i> Lesson Submitted Successfully.</div>' . $mysqli->error;

            }
        }
    }
}

if(isset($_POST['comment_game'])) {

    $gameID = mysqli_real_escape_string($mysqli, $_POST['gameidnow']);
    $update_pgn = mysqli_real_escape_string($mysqli, $_POST['Update_pgn']);
    $getgamehist = $mysqli->query("SELECT * FROM `tbl_game_history` WHERE `game_id`='$gameID'");
    $timenow = date("Y-m-d H:i:s");


//    if($getgamehist->num_rows > 0) {
//        while($gamhist = $getgamehist->fetch_object()) {
//            $moveid = 'move_' . $gamhist->id;
//            $movecom = mysqli_real_escape_string($mysqli, $_POST[$moveid]);
//            if($movecom != '') {
//                //$updatecom = $mysqli->query("UPDATE `tbl_game_history` SET `mv_question`='$movecom' WHERE `id`='$gamhist->id'");
//            }
//        }
//    }

    $gamedeta = get_game_details($gameID);
    $coachdet = get_user_by_id($gamedeta->submit_to);
    $studentdet = get_user_by_id($gamedeta->user_id);


    $updategame = $mysqli->query("UPDATE `tbl_games` SET `game_pgn`='$update_pgn', `end_time`='$timenow', `status`='0' WHERE `id`='$gameID'");

    if($updategame) {


        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: Chess Clips <noreply@chessclips.com>' . "\r\n";

        $mailtxt = '<p>Hello '.$studentdet->fullname.'</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$coachdet->fullname.' has annotated your game.<br/><br />
				<br /><br />Regards,<br /><b>Chess Clips Team</b>';



        $studmailsent = mail($studentdet->email, "Game Automated", $mailtxt, $headers);
        if($studmailsent) {
            $add_maillogs = $mysqli->query("INSERT INTO `tbl_emails`(`sent_to`, `send_by`, `subject`, `bodytxt`, `sent_time`) VALUES ('$studentdet->email', '$coachdet->id', 'Game Automated', '$mailtxt', '$timenow')");
            if($add_maillogs) {
                $mysqli->query("UPDATE `tbl_games` SET `status`='2' WHERE `id`='$gameID'");
                $gamestatus = '<div class="alert alert-success"><i class="icon-envelope"></i> Comment Submitted Successfully.</div>' . $mysqli->error;
            }
        }
    }
}
	
    
    if(isset($_POST['updateprofile'])) {
        $upusrid = mysqli_real_escape_string($mysqli, $_POST['myuid']);
        $upname = mysqli_real_escape_string($mysqli, $_POST['myname']);
        $upuser = mysqli_real_escape_string($mysqli, $_POST['myusername']);
        $uppass = mysqli_real_escape_string($mysqli, $_POST['mypass']);
        $upemail = mysqli_real_escape_string($mysqli, $_POST['myemail']);
        $upmobile = mysqli_real_escape_string($mysqli, $_POST['mymobile']);
        
        if($uppass != '') {
            $passwordnew = base64_encode($uppass);
            $edituser = $mysqli->query("UPDATE `tbl_user` SET `fullname`='$upname', `staff_user`='$upuser', `staff_pass`='$passwordnew', `email`='$upemail', `phone`='$upmobile' WHERE `id`='$upusrid'");
        }
        else { 
            $edituser = $mysqli->query("UPDATE `tbl_user` SET `fullname`='$upname', `staff_user`='$upuser', `email`='$upemail', `phone`='$upmobile' WHERE `id`='$upusrid'");
        }
        if($edituser) {
            $updateprofile = '<div class="alert alert-success"><i class="icon-user-md"></i> Account Updated Successfully.</div>';
        }
    }