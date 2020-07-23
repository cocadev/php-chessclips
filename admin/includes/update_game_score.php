<?php
	include("config.php");
	include("functions.php");
	
    if(isset($_REQUEST['game_id'])) {
		$gameID = $_REQUEST['game_id'];
		$gamePosition = $_REQUEST['game_position'];
		$gamePGN = $_REQUEST['game_pgn'];

		$gameWp = $_REQUEST['wp_name'];
		$gameBp = $_REQUEST['bp_name'];
		$gameScore = $_REQUEST['score'];
        $gameSubmit = $_REQUEST['game_submit'];
        $gameEnd = $_REQUEST['game_end'];

		$totalspaces = substr_count($gamePGN, ' ');
		$lastpoint = explode(' ', $gamePGN);
		$lastmove = $lastpoint[$totalspaces];
		
		if($gamePGN != '') {
			$updategame = $mysqli->query("UPDATE `tbl_games` SET `end_time`='$gameEnd', `submit_to`='$gameSubmit', `status`='$gamePosition', `game_pgn`='$gamePGN', `wp_name`='$gameWp', `bp_name`='$gameBp', `score`='$gameScore' WHERE `id`='$gameID'");
			if($updategame) {
				$datetimenow = date("Y-m-d H:i:s");

			}
		}
	}
	
	//tbl_game_history
?>