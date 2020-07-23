<?php
	include("config.php");
	include("functions.php");
	
    if(isset($_REQUEST['moveID'])) {
		$moveNum = $_REQUEST['moveID'];
		$getgame = $mysqli->query("SELECT * FROM `tbl_game_history` WHERE `id`='$moveNum'");
		$gmnw = $getgame->fetch_object();
		echo $gmnw->game_fen;
	}
?>