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

        .radio-position{
           position: absolute;left:45%;
        }

        .clickable {
            cursor: pointer;
        }

        .modal-custom {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content-custom {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 90%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }


        @media (min-width: 1468px) and (max-width: 3000px) {

            .modal-content-custom {
                width: 30%;
            }

            .radio-position{
                position: absolute;left:45%;
            }
        }

        @media (min-width: 800px) and (max-width: 1467px) {

            .modal-content-custom {
                width: 30%;

            }

            .radio-position{
                position: absolute;left:42%;
            }
        }

        @media (min-width: 515px) and (max-width: 800px) {

            .modal-content-custom {
                width: 90%;
                margin-top: -90px;
            }

            .radio-position{
                position: absolute;left:45%;
            }
        }

        @media (min-width: 100px) and (max-width: 514px) {

            .modal-content-custom {
                width: 90%;
                margin-top: -90px;
            }

            .radio-position{
                position: absolute;left:42%;
            }
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        /* The Close Button */
        .close-custom {
            color: white;
            position:absolute;
            right:10px;
            font-size: 28px;
            margin: 10px    ;
            font-weight: bold;
        }

        .close-custom:hover,
        .close-custom:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header-custom {
            padding: 2px 16px;
            background-color: #b58863;
            color: white;
        }

        .modal-body-custom {padding: 2px 16px;}

        .modal-footer-custom {
            padding: 2px 16px;
            background-color: #b58863;
            color: white;
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
                <form method="post" action="home.php" id="chessForm" name="submitlesson" >

                    <center>
                        <br/><br/>

                        <div id="board" class='merida zeit img-responsive'></div>

                        <input type="hidden" name="gameidnow" value="<?= $_REQUEST['game'] ?>">
                        <input type="hidden" id="gamefentext" name="gamefentext">

                        <button id="myBtn" style="background:#090; color:#FFF; border:0; padding:3px 10px; min-width:120px">Game Submit</button>

                        <!-- The Modal -->
                        <div id="myModal" class="modal-custom container" style="z-index: 10000">

                            <!-- Modal content -->
                            <div class="modal-content-custom">
                                <div class="modal-header-custom">
                                    <span class="close-custom">&times;</span>
                                    <p style="margin-top:20px;font-size: 22px;color:#fff">Game Setting</p>
                                </div>
                                <br/>
                                <div class="modal-body-custom">
                                    <div class="form-group ">
                                        <label for="white_name">
                                            White Player</label>
                                        <input type="text" class="form-control" name="white_name" required>
                                    </div>

                                    <div class="form-group ">
                                        <label for="black_name">
                                            Black Player</label>
                                        <input type="text" class="form-control" name="black_name" required>
                                    </div>

                                    <div class="form-group">

                                        <label for="Game" >Game Result</label>

                                        <label><input type="radio" name="result_game" value="1-0" class="radio-position" checked/> 1-0 </label>
                                        <label><input type="radio" name="result_game" value="1/2-1/2" class="radio-position" /><span style="margin-left: 22px">1/2-1/2</span></label>
                                        <label><input type="radio" name="result_game" value="0-1" class="radio-position" /> 0-1</label>

                                    </div>

                                    <label for="mySelect" style="margin-top: 5px">Coach Setting</label>
                                    <select id="mySelect" name="coacheselect" style="color: #000" required>
                                        <option value="">Select Coach</option>
                                        <?php
                                        $getcoaches = $mysqli->query("SELECT * FROM `tbl_user` WHERE `user_type`='coach' ORDER BY id ASC");
                                        while ($coach = $getcoaches->fetch_object()) { ?>
                                            <option value="<?= $coach->id ?>"><?= $coach->title . ' ' . $coach->fullname ?></option>
                                        <?php } ?>
                                    </select>

                                    <input type="hidden" id="someInput" name="pgn" />

                                    <br/><br/>
                                    <input type="submit" name="submitlesson" value="Submit Lesson" style="background:#090; color:#FFF; border:0; padding:3px 10px; min-width:120px">
                                    <br/><br/>
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


        var game = new Chess();

        var window_width = window.innerWidth;
        var gameBoard = '500px';
        var cfg='';

        // alert(window_width);


        function myFunction() {

            var w = window.outerWidth;

            var width_board;

            if(w < 700){
                width_board = w/2+60;

            }else {
                width_board = 500;
            }

            // cfg = {
            //     position: Really_fen,
            //     pgn: E_Config,width:width_board + 'px',
            //     locale: 'en', pieceStyle: 'merida'
            // };

            cfg = {
                position: 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
                pgn: sample_pgn, width:width_board + 'px',
                locale: 'en', pieceStyle: 'merida'
            };

            //pgnEdit('board', cfg);
        }

        if(window_width < 700){
            gameBoard = window_width/2+60 + 'px';
        }

        student_name = '<?= $playdet->fullname ?>';

        var sample_pgn = '';

        cfg = {
            position: 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
            pgn: sample_pgn,width:gameBoard,
            locale: 'en', pieceStyle: 'merida'
        };

        pgnEdit('board', cfg);

        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close-custom")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
            document.getElementById("someInput").value = E_Config;

        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        init();

</script>
