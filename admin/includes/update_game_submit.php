<?php
	include("config.php");
	include("functions.php");
	
    if(isset($_REQUEST['game_id'])) {
		$gameID = $_REQUEST['game_id'];
		$gamePosition = $_REQUEST['game_position'];
        $gameSubmit = $_REQUEST['game_submit'];
		$gamePGN = $_REQUEST['game_pgn'];

        $gameBp = $_REQUEST['bp_name'];
        $gameWp = $_REQUEST['wp_name'];
        $gameScore = $_REQUEST['game_score'];

		$totalspaces = substr_count($gamePGN, ' ');
		$lastpoint = explode(' ', $gamePGN);
		$lastmove = $lastpoint[$totalspaces];
		
		if($gamePGN != '') {
			$updategame = $mysqli->query("UPDATE `tbl_games` SET `bp_name`='$gameBp',`wp_name`='$gameWp',`score`='$gameScore', `submit_to`='$gameSubmit', `status`='$gamePosition', `game_pgn`='$gamePGN' WHERE `id`='$gameID'");
			if($updategame) {
				$datetimenow = date("Y-m-d H:i:s");

			}
		}
	}
	
	//tbl_game_history
?>