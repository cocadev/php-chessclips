<?php
	include("admin/includes/config.php");
	include("admin/includes/functions.php");
	
if(isset($_GET['game']) && !empty($_GET['game'])) {
	$gameid = mysqli_real_escape_string($mysqli, $_GET['game']);
	$gamedet = get_game_details($gameid);
	$ownerdet = get_user_by_id($gamedet->user_id);
	$today_date = date('Y.m.d');
	$gamedatetime = new DateTime($gamedet->end_time);
	$gamedate = $gamedatetime->format('Y.m.d');

	header("Content-type: text/plain");
	header('Content-Disposition: attachment; filename="'.$gameid.'_ChessClips.pgn"');
	
	echo '[Event "'.$gamedet->event_name.'"]
[Site "ChessClips.com"]
[Date "'.$today_date.'"]
[EventDate "'.$gamedate.'"]
[Result "'.$gamedet->score.'"]
[White "'.$gamedet->wp_name.'"]
[Black "'.$gamedet->bp_name.'"]
'.$gamedet->game_pgn.'  
';

}
else {
   die("Sorry no game Selected");
}