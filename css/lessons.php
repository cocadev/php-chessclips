<?php include("header.php"); ?>

    <style>
        .row-fluid {
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .radio-container input {
            box-sizing: border-box;
            margin: 0;
            outline: 0;
            padding: 0;
            position: relative;
            top: 9px;
            vertical-align: top;
        }
    </style>

    <script src="newlib/pgnvjs.js" type="text/javascript"></script>

    <div class="row-fluid">
        <div class="span12 well infobox">

            <?php
            if(isset($_GET['action']) == "" && isset($_GET['game']) == "") {

                $getlastgame = $mysqli->query("SELECT * FROM `tbl_games` ORDER by id DESC Limit 1");
                $lastgamedet = $getlastgame->fetch_object();
                $timenow = date("Y-m-d H:i:s");
                $newgame = $lastgamedet->id + 1;

                $startgame = $mysqli->query("INSERT INTO `tbl_games`(`id`, `user_id`, `event_name`, `wp_name`, `bp_name`, `start_time`, `end_time`, `game_fen`, `game_pgn`, `submit_to`, `coach_rating`, `rating_comment`, `status`) VALUES ('$newgame', '$userDet->id', 'ChessClips Game', '$whiteplay', '$blackplay', '$timenow', '', '', '', '0', '0', '', '1')");
                if($startgame) {
                    echo '<script type="text/javascript">window.location = "./lessons.php?game='.$newgame.'"</script>';
                }

            }?>


            <?php
            if (isset($_GET['game'])) {
                $gameid = $_GET['game'];
                $gamedetp = get_game_details($gameid);
                $playdet = get_user_by_id($gamedetp->user_id);
                ?>
                <form name="submitgame" method="post" id="chessForm" action="home.php">

                    <center>
                        <br/><br/>

                        <div id="board" style="width: 500px" class='merida zeit'></div>
                        <p id="demo"></p>

                        <input type="hidden" name="gameidnow" value="<?= $_REQUEST['game'] ?>">
                        <input type="hidden" id="gamefentext" name="gamefentext">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Game
                            Submit
                        </button>

                        <div id="myModal" class="modal fade modal-dialog modal-sm" role="dialog">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Game Submit</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group ">
                                            <label for="white_name">
                                                White Player</label>
                                            <input type="text" class="form-control" id="white_name" required>
                                        </div>

                                        <div class="form-group ">
                                            <label for="black_name">
                                                Black Player</label>
                                            <input type="text" class="form-control" id="black_name" required>
                                        </div>

                                        <div class="form-group">

                                            <label for="Game">Game Result</label>

                                            <label><input type="checkbox" name="cb1" id="game1" class="chb" /> 1-0 </label>
                                            <label style="margin-left: 20px"><input id="game2" type="checkbox" name="cb2" class="chb" /><span style="margin-left: 2px">1/2-1/2</span></label>
                                            <label><input type="checkbox" name="cb3" id="game3" class="chb" /> 0-1</label>

                                        </div>

                                        <br/>

                                        <label for="mySelect">
                                            Coach Setting</label>
                                        <select id="mySelect" name="coacheselect" required>
                                            <option value="">Select Coach</option>
                                            <?php
                                            $getcoaches = $mysqli->query("SELECT * FROM `tbl_user` WHERE `user_type`='coach' ORDER BY id ASC");
                                            while ($coach = $getcoaches->fetch_object()) { ?>
                                                <option value="<?= $coach->id ?>"><?= $coach->title . ' ' . $coach->fullname ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>

                                        <input type="submit" onclick="Test()" name="submitlesson" value="Submit Lesson"
                                               style="background:#090; color:#FFF; border:0; padding:5px 15px; min-width:150px">

                                    </div>
                                </div>

                            </div>
                        </div>

                    </center>

                </form>

                <?php
            }
            ?>

        </div>
    </div>

    <script>


        student_name = '<?= $playdet->fullname ?>';

        var sample_pgn = '';
        var cfg = {
            position: 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
            pgn: sample_pgn,
            locale: 'en', pieceStyle: 'merida', width: '500px'
        };
        pgnEdit('board', cfg);

        var Test = function () {
            document.getElementById("demo").innerHTML = E_Config;
            fetch_game(<?=$_GET['game']?>, E_Config);

        };

        $(".chb").change(function() {
            var checked = $(this).is(':checked');
            console.log(checked);
            $(".chb").prop('checked',false);
            if(checked) {
                $(this).prop('checked',true);
            }
        });

        function fetch_game(val,gamepgn) {

            var wp = document.getElementById("white_name").value;
            var bp = document.getElementById("black_name").value;

            var x = document.getElementById("mySelect").selectedIndex;
            var y = document.getElementById("mySelect").options;
            var submit_user = y[x].value;

            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1;
            var year = currentDate.getFullYear();
            var hour = currentDate.getHours();
            var minute = currentDate.getMinutes();
            var second = currentDate.getSeconds();

            var EndTime = year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;

            var score_result = '1/2-1/2';
            var success_result = false;
            var fail_result = false;

            success_result = document.getElementById("game1").checked;
            fail_result = document.getElementById("game3").checked;

            if(success_result === true){
                score_result = '1-0'
            }

            if(fail_result === true){
                score_result = '0-1'
            }

            $.ajax({
                type: "POST",
                url: "admin/includes/update_game_score.php",
                data: {
                    game_id: val,
                    game_end: EndTime,
                    game_submit: submit_user,
                    game_position: 0,
                    game_pgn: gamepgn + " " + score_result,
                    wp_name: wp,
                    bp_name: bp,
                    score: score_result
                },
                success: function (response) {

                }
            });
        }

    </script>
<?php include("footer.php"); ?>