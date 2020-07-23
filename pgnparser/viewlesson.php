<?php include("header.php"); ?>

    <div class="row-fluid">
        <?php
           if ($userDet->user_type == 'student') {
               echo '<script src="newlib/pgnvjs_student.js" type="text/javascript"></script>';
           } else {
              echo '<script src="newlib/pgnvjs_coach.js" type="text/javascript"></script>';
           }
           ?>

        <form name="submitcomment" method="post" id="chessForm" action="home.php">
            <div class="span12 well infobox">

                    <?php
                    if(isset($_GET['lesson'])) {
                    $lessonnum = $_GET['lesson'];
                    $gamedetas = get_game_details($lessonnum);

                    $playdet = get_user_by_id($gamedetas->user_id);
                    $playcoach = get_user_by_id($gamedetas->submit_to);
//
//                    echo 'student ID <b>'.$gamedetas->user_id.'</b><br/>';
//                    echo 'student Name <b>'.$playdet->fullname.'</b><br/>';
//                    echo 'Coach Name <b>'.$playcoach->fullname.'</b><br/>';
//
//                    echo 'Who are you ? <b>'.$userDet->user_type.'</b><br/>';
                    ?>

                        <script>

                            var cfg = { position: 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1',
                                pgn: '<?= $gamedetas->game_pgn ?>',
                                locale: 'en', pieceStyle: 'merida' , width:'500px'};
                            pgnEdit('board', cfg);


                            coach_name = '<?= $playcoach->fullname ?>';
                            student_name = '<?= $playdet->fullname ?>';

                            var Test = function() {
                                //document.getElementById("demo").innerHTML = E_Config;
                                fetch_game(<?=$_GET['lesson']?>, game.fen(), E_Config);
                            };

                            var View = function() {
                                document.getElementById("demo").innerHTML = E_Config;
                            };

                        </script>

                        <center style="margin-top: 50px">

                            <h3><?= $gamedetas->wp_name ?> VS <?= $gamedetas->bp_name ?></h3>
                            <div id="board" style="width: 500px" class='merida zeit'></div>
                            <p id="demo"></p>


                            <?php if($userDet->user_type =='student' && $gamedetas->status != 1) { ?>


                            <?php }else {?>
                                <input type="submit" onclick="Test()" name="submitlesson" value="Submit Lesson" style="background:#090; color:#FFF; border:0px; padding:5px 15px; min-width:150px">
<!--                                <input type="button" onclick="View()" style="background:#090; color:#FFF; border:0px; padding:5px 15px; min-width:150px">-->
                            <?php }?>

                        </center>

                <?php  } ?>

                <center>
                    <?php
                    if($userDet->user_type == 'student') {

                        if($gamedetas->status == 0) {
                            echo '<h5 style="margin-bottom:-10px">You Submited Coach AS</h5><br />';
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


                function fetch_game(val, gamefen, gamepgn){

                        $.ajax({
                        type: "POST",
                        url: "admin/includes/update_game.php",
                        data: {
                            game_id:val, game_position: Game_status, game_pgn: gamepgn
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

                    // localStorage.setItem("gamepgn_LocalStorage", game.pgn());
                    //
                    // if (typeof(Storage) !== "undefined") {
                    //     game.pgn() = localStorage.getItem("gamepgn_LocalStorage");
                    //     //  console.log(localStorage.getItem("gamepgn_LocalStorage"));
                    //
                    // } else {
                    //     document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
                    // }

                    if(E_Config !== ''){

                    }
                };



                updateStatus();

            </script>
        </form>
    </div>




<?php include("footer.php"); ?>