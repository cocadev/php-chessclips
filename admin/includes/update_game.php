<?php
	include("config.php");
	include("functions.php");
	
    if(isset($_REQUEST['game_id'])) {
		$gameID = $_REQUEST['game_id'];
		$gamePosition = $_REQUEST['game_position'];
		$gamePGN = $_REQUEST['game_pgn'];
		$totalspaces = substr_count($gamePGN, ' ');
		$lastpoint = explode(' ', $gamePGN);
		$lastmove = $lastpoint[$totalspaces];
		
		if($gamePGN != '') {
			$updategame = $mysqli->query("UPDATE `tbl_games` SET `status`='$gamePosition', `game_pgn`='$gamePGN' WHERE `id`='$gameID'");
			if($updategame) {
				$datetimenow = date("Y-m-d H:i:s");

			}
		}
	}
	
	//tbl_game_history
?>