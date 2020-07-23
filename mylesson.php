<?php include("header.php"); ?>
<style>
@media only screen and (max-width: 960px) {
		.gameboard { width:98% !important; margin-top:0px; margin-bottom:0px; }
		.mobilehide { display:none !important; }
		.mobileshow { display:block !important; }
		.row-fluid { padding-bottom:0px; margin-bottom:0px; }
}
	.deskhide { display:none; }
</style>


		<!-- Information Boxes -->
	<div class="row-fluid">
			
			<!-- Information Boxes: Images -->
			<div class="span12 well infobox">
            <?php
			if(isset($_GET['action']) == "" && isset($_GET['game']) == "") {
				$gamecount = get_rows("`tbl_games` WHERE `user_id`='$userDet->id' AND `status`='1'");
				if($gamecount > 0) {
					$getgames = $mysqli->query("SELECT * FROM `tbl_games` WHERE `user_id`='$userDet->id' AND `status`='1'");
					while($ggm = $getgames->fetch_object()) {
						$delhist = $mysqli->query("DELETE FROM `tbl_game_history` WHERE `game_id`='$ggm->id'");
						$delgames = $mysqli->query("DELETE FROM `tbl_games` WHERE `user_id`='$userDet->id' AND `status`='1'");
					}
				}
			?>
				<center>
					<span style="font-size:14px">you don't have any lesson <a href="lessons.php?action=new" style="font-weight:bold; font-size:14px">Click Here</a> to start</span>
					<br />
					or
					<br />
					<a href="importpgn.php" style="font-weight:bold; font-size:14px">Import PGN</a>
					<br />
				</center>
			<?php
			}

			if(isset($_GET['action'])) {
				$actionis = $_GET['action'];
				if($actionis == 'new' && empty($_GET['wplay']) && empty($_GET['bplay'])) {
				?>
				<center>
				<form name="startgam" method="get" id="startgam" action="lessons.php?action=new">
					<input type="text" name="wplay" placeholder="White Player Name" style="min-width:260px; width:40%; height:30px" required><br />
					<input type="text" name="bplay" placeholder="Black Player Name" style="min-width:260px; width:40%; height:30px" required><br />
					<button name="action" value="new" style="min-width:100px; width:40%; height:35px">Start Lesson</button>
				</form>
				</center>
				<?php
				}
				else if($actionis == 'new' && !empty($_GET['wplay']) && !empty($_GET['bplay'])) {
					$getlastgame = $mysqli->query("SELECT * FROM `tbl_games` ORDER by id DESC Limit 1");
					$lastgamedet = $getlastgame->fetch_object();
					$timenow = date("Y-m-d H:i:s");
					$newgame = $lastgamedet->id + 1;
					$blackplay = mysqli_real_escape_string($mysqli, $_GET['bplay']);
					$whiteplay = mysqli_real_escape_string($mysqli, $_GET['wplay']);
					
					if(get_rows("`tbl_games` WHERE `user_id`='$userDet->id' AND `status`='1'") > 0)
					{
						$getusergame = $mysqli->query("SELECT * FROM `tbl_games` WHERE `user_id`='$userDet->id' AND `status`='1' ORDER by id DESC LIMIT 1");
						$gamedet = $getusergame->fetch_object();
						echo '<script type="text/javascript">window.location = "./lessons.php?game='.$gamedet->id.'"</script>';
					}
					else {
						$startgame = $mysqli->query("INSERT INTO `tbl_games`(`id`, `user_id`, `event_name`, `wp_name`, `bp_name`, `start_time`, `end_time`, `game_fen`, `game_pgn`, `submit_to`, `coach_rating`, `rating_comment`, `status`) VALUES ('$newgame', '$userDet->id', 'ChessClips Game', '$whiteplay', '$blackplay', '$timenow', '', '', '', '0', '0', '', '1')");
						if($startgame) {
							echo '<script type="text/javascript">window.location = "./lessons.php?game='.$newgame.'"</script>';
						}
					}
				}
			}
			
			if(isset($_GET['lesson'])) {
				$gameid = $_GET['lesson'];
				$gamedetp = get_game_details($gameid);
			?>
				<form name="submitgame" method="post" id="chessForm" action="home.php">
                <center>
				<div class="mobilehide"><?=$gamedetp->wp_name?> vs <?=$gamedetp->bp_name?> at <?=$gamedetp->event_name?><br /><br /></div>
				<script src="chess/js/chess.min.js"></script>
					
					<div style="float:left; width:25%" class="mobilehide">&nbsp;</div>
					
					<div id="board" class="gameboard" style="width:50%; float:left"></div>
					
					<?php
					// Any mobile device (phones or tablets).
					if ( $detect->isMobile() ) { ?>
					<div style="float:right width:25%; min-height:50px">
					<?php } else { ?>
					<div style="float:right width:25%; height:580px; overflow-y: scroll;">
					<?php } ?>
						
						<h4>Game Moves</h4>
						<div id="movesnow"></div>
					</div>
					
				<br />
                </center>
                <div style="float:left; width:100%" class="mobilehide">
                	<p><span id="fen" style="display:none"></span><span id="pgn"></span></p>
                </div>
				
				<center>		
                	<input type="hidden" name="gameidnow" value="<?=$_REQUEST['game']?>">
                	<input type="hidden" id="gamefentext" name="gamefentext">
                    <select name="coacheselect" required>
                    	<option value="" required>Select Coach</option>
                        <?php
						$getcoaches = $mysqli->query("SELECT * FROM `tbl_user` WHERE `user_type`='coach' ORDER BY id ASC");
						while($coach = $getcoaches->fetch_object()) { ?>
                        <option value="<?=$coach->id?>"><?=$coach->title. ' ' . $coach->fullname?></option>
                        <?php } ?>
                    </select>
					<br />
					<input type="submit" name="submitlesson" value="Submit Lesson" style="background:#090; color:#FFF; border:0px; padding:5px 15px; min-width:150px">
				</center>
                
                <script src="chess/js/json3.min.js"></script>
	<script src="chess/js/jquery-1.10.1.min.js"></script>
	<script src="chess/js/chessboard-0.3.0.min.js"></script>
    
	<script>
	function update_question(movenum)
	{	
		var cval = $("#q_"+movenum).val();
		var comtype = "question";
		
		$.ajax({
			type: "POST",
			url: "admin/includes/update_comments.php",
			data: {
				comType:comtype, moveID:movenum, comment:cval
			},
			success: function (response) {
				response;
			}
		});
	}
		
	function game_moves(gameid)
	{		
		$.ajax({
		type: "POST",
		url: "admin/includes/get_game.php",
		data: {
			gameid: gameid
		},
		success: function (response) {
			$("#movesnow").html(response);
		}
		});
	}
		
	function fetch_game(val, gamefen, gamepgn)
	{
		$.ajax({
		type: "POST",
		url: "admin/includes/update_game.php",
		data: {
			game_id:val, game_position: gamefen, game_pgn: gamepgn
		},
		success: function (response) {
			game_moves(val);
			document.getElementById("gamefentext").value = gamefen;
		}
		});
	}
		
	function change_position(movenum)
	{	
		$.ajax({
		type: "POST",
		url: "admin/includes/get_position.php",
		data: {
			moveID:movenum
		},
		success: function (response) {
			board.position(response, false);
		}
		});		
	}
		
	$('#setRuyLopezBtn').on('click', function() {
	  var ruyLopez = 'r1bqkbnr/pppp1ppp/2n5/1B2p3/4P3/5N2/PPPP1PPP/RNBQK2R';
	  board.position(ruyLopez, false);
	});
	
	
	var board,
	  game = new Chess(),
	  statusEl = $('#status'),
	  fenEl = $('#fen'),
	  pgnEl = $('#pgn');
	
	// do not pick up pieces if the game is over
	// only pick up pieces for the side to move
	var onDragStart = function(source, piece, position, orientation) {
	  if (game.game_over() === true ||
		  (game.turn() === 'w' && piece.search(/^b/) !== -1) ||
		  (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
		return false;
	  }
	};
	
	var onDrop = function(source, target) {
	  // see if the move is legal
	  var move = game.move({
		from: source,
		to: target,
		promotion: 'q' // NOTE: always promote to a queen for example simplicity
	  });
	
	  // illegal move
	  if (move === null) return 'snapback';
	
	  updateStatus();
	};
	
	// update the board position after the piece snap 
	// for castling, en passant, pawn promotion
	var onSnapEnd = function() {
	  board.position(game.fen());
	};
	
	var updateStatus = function() {
	  var status = '';
	
	  var moveColor = 'White';
	  if (game.turn() === 'b') {
		moveColor = 'Black';
	  }
	
	  // checkmate?
	  if (game.in_checkmate() === true) {
		status = 'Game over, ' + moveColor + ' is in checkmate.';
	  }
	
	  // draw?
	  else if (game.in_draw() === true) {
		status = 'Game over, drawn position';
	  }
	
	  // game still on
	  else {
		status = moveColor + ' to move';
	
		// check?
		if (game.in_check() === true) {
		  status += ', ' + moveColor + ' is in check';
		}
	  }
	
	  statusEl.html(status);
	  fenEl.html(game.fen());
	  pgnEl.html(game.pgn());
	  fetch_game(<?=$_GET['game']?>, game.fen(), game.pgn());
	};
	
	var cfg = {
	  draggable: true,
	  position: 'start',
	  onDragStart: onDragStart,
	  onDrop: onDrop,
	  onSnapEnd: onSnapEnd
	};
	board = ChessBoard('board', cfg);
	
	updateStatus();
	
    </script>
			<?php }
			?>
            
			</div>
			<!-- / Information Boxes: Images -->

		</div>
		<!-- / Information Boxes -->


	</div> 
	<!-- / Content Container -->
<?php include("footer.php"); ?>