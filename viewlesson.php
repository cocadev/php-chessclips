<?php include("header.php"); ?>

    <div class="row-fluid">
        <?php
           if ($userDet->user_type == 'student') {
               echo '<script src="newlib/pgnvjs_student.js" type="text/javascript"></script>';
           } else {
              echo '<script src="newlib/pgnvjs_coach.js" type="text/javascript"></script>';
           }
           ?>

        <form name="comment_game" method="post" id="chessForm" action="home.php">
            <div class="span12 well infobox">

                    <?php
                    if(isset($_GET['lesson'])) {
                    $lessonnum = $_GET['lesson'];
                    $gamedetas = get_game_details($lessonnum);

                    $playdet = get_user_by_id($gamedetas->user_id);
                    $playcoach = get_user_by_id($gamedetas->submit_to);
//
//                  echo 'student ID <b>'.$gamedetas->user_id.'</b><br/>';
//                  echo 'student Name <b>'.$playdet->fullname.'</b><br/>';
//                  echo 'Coach Name <b>'.$playcoach->fullname.'</b><br/>';
//
//                  echo 'Who are you ? <b>'.$userDet->user_type.'</b><br/>';
                    ?>

                        <center style="margin-top: 50px">

                            <h3><?= $gamedetas->wp_name ?> VS <?= $gamedetas->bp_name ?></h3>
                            <div id="board" class='merida zeit img-responsive'></div>
                            <input type="hidden" name="gameidnow" value="<?= $_REQUEST['lesson'] ?>">
                            <input type="hidden" name="Update_pgn" id="pgnFile"/>

                            <p id="demo"></p>

                            <?php if($userDet->user_type =='student' && $gamedetas->status != 1) { ?>

                            <?php }else {?>
                                <input type="submit" onclick="ViewPGN()" name="comment_game" value="Submit Lesson" style="background:#090; color:#FFF; border:0px; padding:5px 15px; min-width:150px">
                            <?php }?>

                        </center>

                <?php  } ?>

                <center>
                    <?php
                    if($userDet->user_type == 'student') {

                        if($gamedetas->status == 0) {
                            echo '<h5 style="margin-bottom:-10px">Game Submitted</h5><br />';
                            for($i=0; $i<$gamedetas->coach_rating; ++$i)
                            {
                                echo '<span style="font-size:40px; color:#F90">&#10038;</span> ';
                            }
                        } else {
                            echo '<br />';
                            if($gamedetas->status == 2) {
                                echo '<a href="ratecoach.php?coach='.$gamedetas->submit_to.'&game='.$gamedetas->id.'" style="color:#0C0; font-size:16px; margin-top:7px">Rate Coach</a> | ';
                            }

                        }
                    }else{?>

                    <?php
                    } ?>
                    <a href="downloadpgn.php?game=<?=$gamedetas->id?>&type=<?=$userDet->user_type?>" style="color:#0C0; font-size:16px; margin-top:7px" download>Download Lesson PGN</a>
                </center>

            </div>

            <script>

                var game = new Chess();

                var window_width = window.innerWidth;
                var gameBoard = '500px';

                // alert(window_width);

                function myFunction() {

                    var w = window.outerWidth;

                    var width_board=300;

                    if(w < 700){
                        width_board = w/2+60;

                    }else {
                        width_board = 500;
                    }

                    cfg = {
                        position: 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
                        pgn: '', width:width_board + 'px',
                        locale: 'en', pieceStyle: 'merida'
                    };

                   // pgnEdit('board', cfg);
                }

                if(window_width < 700){
                    gameBoard = window_width/2+60 + 'px';
                }

                var cfg = { position: 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
                    pgn: '<?= $gamedetas->game_pgn ?>',
                    locale: 'en', pieceStyle: 'merida' , width:gameBoard};
                pgnEdit('board', cfg);


                coach_name = '<?= $playcoach->fullname ?>';
                student_name = '<?= $playdet->fullname ?>';

                var ViewPGN = function() {

                   // fetch_game(<?=$_GET['lesson']?>, E_Config);
                    document.getElementById("pgnFile").value = E_Config;

                };


                function fetch_game(val, gamepgn){

                        $.ajax({
                        type: "POST",
                        url: "admin/includes/update_game.php",
                        data: {
                            game_id:val, game_position: Game_status, game_pgn: gamepgn
                        },
                        cache: false,
                        timeout: 15000,
                        headers: {
                            "cache-control": "no-cache"
                        }
                        
                    });
                }

            </script>
        </form>
    </div>

<?php include("footer.php"); ?>
