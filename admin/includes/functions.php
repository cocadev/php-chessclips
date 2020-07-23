<?php
	function get_rows($table_and_query) {
		global $mysqli;
		$total = $mysqli->query("SELECT * FROM $table_and_query");
		$total = $total->num_rows;
		return $total;
	}
	
	function get_user_by_email($user_email) {
		global $mysqli;
		$admn_user = $mysqli->query("SELECT * FROM `tbl_user` WHERE `email`='$user_email'");
		$detail = $admn_user->fetch_object();
		return $detail;
	}
	
	function get_user_by_id($user_id) {
		global $mysqli;
		$admn_user = $mysqli->query("SELECT * FROM `tbl_user` WHERE `id`='$user_id'");
		$detail = $admn_user->fetch_object();
		return $detail;
	}
	
	function get_last_user_id($lastid = 1)
	{
		global $mysqli;
		$get_last_user = $mysqli->query("SELECT * FROM `tbl_user` ORDER by `id` DESC LIMIT 1");
		$lastuser = $get_last_user->fetch_object();
		return $lastuser->id;
	}
	
	function get_game_details($game_id) {
		global $mysqli;
		$get_game = $mysqli->query("SELECT * FROM `tbl_games` WHERE `id`='$game_id' LIMIT 1");
		$gamedet = $get_game->fetch_object();
		return $gamedet;
	}
	
?>