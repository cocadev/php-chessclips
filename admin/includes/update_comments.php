<?php
	include("config.php");
	include("functions.php");
	
    if(isset($_REQUEST['comType'])) {
		$type = $_REQUEST['comType'];
		$movenum = $_REQUEST['moveID'];
		$commnow = $_REQUEST['comment'];
		
		if($type == "comment") {
			$updategame = $mysqli->query("UPDATE `tbl_game_history` SET `comment`='$commnow' WHERE `id`='$movenum'");
			if($updategame) {
				echo 'updated';
			}
		}
		else if($type == "question") {
			$updategame = $mysqli->query("UPDATE `tbl_game_history` SET `mv_question`='$commnow' WHERE `id`='$movenum'");
			if($updategame) {
				echo 'updated';
			}
		}
	}
?>