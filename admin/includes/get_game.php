<?php
include("config.php");
include("functions.php");

if (isset($_REQUEST['gameid'])) {
    $gamen = $_REQUEST['gameid'];
    $i = 1;
    $gamenow = "";
    $getgame = $mysqli->query("SELECT * FROM `tbl_game_history` WHERE `game_id`='$gamen'");
    while ($gmn = $getgame->fetch_object()) {
        if ($gmn->last_move != '') {
            $gamenow .= '<a id="p_' . $gmn->id . '" href="#" onclick="change_position(' . $gmn->id . ');return false;this.style.background = \'green\';" style="float:left; border:0px; background:#f0f0f0; width:23%">' . $i . '. ' . $gmn->last_move . '</a> <input type="text" name"comment" onkeypress="update_question(' . $gmn->id . ')" onkeyup="update_question(' . $gmn->id . ')" id="q_' . $gmn->id . '" value="' . $gmn->mv_question . '" style="float:left; width:65%" placeholder="Ask Question?"><br />';
            ++$i;
        }
    }
    echo $gamenow;
}
?>