<?php
	error_reporting( 0 );
	set_time_limit(0);
	ini_set('max_execution_time', 0);
	ini_set('memory_limit', '256M');
	ini_set("auto_detect_line_endings", true);
	
	session_start();
	include("includes/config.php");
	include("includes/functions.php");
	
	if($_SESSION['admin_user'] == '') 
	{
		header("Location: sign.php");
	}
	else {
		$logged_user = $_SESSION['admin_user'];
	}

	$admindet = get_user_by_email($logged_user);
	
	$actual_link = basename($_SERVER['PHP_SELF']);

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
				$mstatus = '<div class="alert alert-success"><i class="icon-user-md"></i> User Added Successfully.</div>';
			}
			else {
				$mstatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> Error Adding User. Please Try Again</div>';
			}
		}
    }

	if(isset($_POST['editUser'])) {
		$usrID = mysqli_real_escape_string($mysqli, $_POST['usrupid']);
        $usrName = mysqli_real_escape_string($mysqli, $_POST['usName']);
        $usrEmail = mysqli_real_escape_string($mysqli, $_POST['usEmail']);
		$usrPassword = mysqli_real_escape_string($mysqli, base64_encode($_POST['usPassword']));
		$usrTitle = mysqli_real_escape_string($mysqli, $_POST['usTitle']);
		$usrType = mysqli_real_escape_string($mysqli, $_POST['usType']);
		
		if($_POST['usPassword'] != '') {
			$edituser = $mysqli->query("UPDATE `tbl_user` SET `fullname`='$usrName', `email`='$usrEmail', `pass_word`='$usrPassword', `title`='$usrTitle', `user_type`='$usrType' WHERE `id`='$usrID'");
		} else { 
			$edituser = $mysqli->query("UPDATE `tbl_user` SET `fullname`='$usrName', `email`='$usrEmail', `title`='$usrTitle', `user_type`='$usrType' WHERE `id`='$usrID'");
		}
		
		if($edituser) {
			$editstatus = '<div class="alert alert-success"><i class="icon-user-md"></i> User Updated Successfully.</div>';
		}
		else {
			$editstatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> Error Updating User. Please Try Again</div>';
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
	
    if(isset($_GET['delid'])) {
        $delusr = mysqli_real_escape_string($mysqli, $_GET['delid']);
        $deleteusr = $mysqli->query("DELETE FROM `tbl_user` WHERE `id`='$delusr'");
        if($deleteusr) {
            $delstatus = '<div class="alert alert-danger"><i class="icon-user-md"></i> User Deleted Successfully.</div>';
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