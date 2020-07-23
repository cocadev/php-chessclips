<?php include("header.php"); ?>

    <!-- Information Boxes -->
    <div class="row-fluid">
       <script src="newlib/pgnvjs_import.js" type="text/javascript"></script>

        <form name="submitcomment" method="post" id="chessForm" action="home.php">
            <div class="span12 well infobox">

                <?php
                if(isset($_GET['lesson'])) {
                    $lessonnum = $_GET['lesson'];
                    $gamedetas = get_game_details($lessonnum);
                    $playdet = get_user_by_id($gamedetas->user_id);

                    $coach_name = 'Nothing';

                    ?>

                    <script>

                        var cfg = { position: 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
                            pgn: '<?= $gamedetas->game_pgn ?>',
                            locale: 'en', pieceStyle: 'merida' , width:'500px'};
                        pgnEdit('board', cfg);

                        var Test = function() {
                            document.getElementById("demo").innerHTML = E_Config;

                            fetch_game_submit(<?=$lessonnum?>,<?=$lessonnum?> ,E_Config, E_Config);

                        };

                    </script>

                    <center style="margin-top: 50px">

                        <div id="board" style="width: 500px" class='merida zeit'></div>
                        <p id="demo"></p>

                        <br/>

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Game Submit</button>

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Game Submit</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group ">
                                            <label  for="inputSuccess">
                                                White Player</label>
                                            <input type="text" class="form-control" id="white_name" required>
                                        </div>

                                        <div class="form-group ">
                                            <label  for="inputSuccess">
                                                Black Player</label>
                                            <input type="text" class="form-control" id="black_name" required>
                                        </div>

                                        <div class="form-group ">
                                            <label  for="inputSuccess">
                                                Game Result</label>
                                            <input type="text" class="form-control" id="result_score" required>
                                        </div>

                                        <label  for="inputSuccess">
                                            Coach Setting</label>
                                        <select id="mySelect" name="coacheselect" required>
                                            <option value="" required>Select Coach</option>
                                            <?php
                                            $getcoaches = $mysqli->query("SELECT * FROM `tbl_user` WHERE `user_type`='coach' ORDER BY id ASC");
                                            while($coach = $getcoaches->fetch_object()) { ?>
                                                <option value="<?=$coach->id?>"><?=$coach->title. ' ' . $coach->fullname?></option>
                                            <?php }
                                            $coach_name = $coach->id;
                                            echo $coach->id;
                                            ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" onclick="Test()" name="submitlesson" value="Submit Lesson" style="background:#090; color:#FFF; border:0px; padding:5px 15px; min-width:150px">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </center>
                    <script>


                        function Save() {
                           // save_game(<?=$_GET['lesson']?>, game.fen(), E_Config);
                        }

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

                        function fetch_game_submit(val,submit, gamefen, gamepgn){

                            var x = document.getElementById("mySelect").selectedIndex;
                            var y = document.getElementById("mySelect").options;
                            var submit_user = y[x].value;

                            var wp = document.getElementById("white_name").value;
                            var bp = document.getElementById("black_name").value;
                            var score_result = document.getElementById("result_score").value;


                            $.ajax({
                                type: "POST",
                                url: "admin/includes/update_game_submit.php",
                                data: {
                                    game_id:val,game_submit:submit_user , game_position: 0, game_pgn: gamepgn, wp_name:wp,bp_name:bp,game_score:score_result
                                },
                                success: function (response) {
                                    game_moves(val);
                                    document.getElementById("gamefentext").value = gamefen;
                                }
                            });
                        }

                        function save_game(val, gamefen, gamepgn){

                            $.ajax({
                                type: "POST",
                                url: "admin/includes/update_game.php",
                                data: {
                                    game_id:val, game_position: 0, game_pgn: gamepgn
                                },
                                success: function (response) {
                                    game_moves(val);
                                    document.getElementById("gamefentext").value = gamefen;
                                }
                            });
                        }

                        var board,
                            game = new Chess(),
                            statusEl = $('#status'),
                            fenEl = $('#fen'),
                            pgnEl = $('#pgn');


                        var updateStatus = function() {

                        };

                        updateStatus();

                    </script>
                <?php  } ?>

                <center>
                    <a href="downloadpgn.php?game=<?=$gamedetas->id?>&type=<?=$userDet->user_type?>" style="color:#0C0; font-size:16px; margin-top:7px" download>Download Lesson PGN</a>
                </center>

            </div>


        </form>
    </div>




<?php include("footer.php"); ?>