<?php include("header.php"); ?>
    <style>
        @media only screen and (max-width: 960px) {
            .row-fluid {
                padding-bottom: 0;
                margin-bottom: 0;
            }
        }

    </style>
    <script>
        var PGNFile = "22";

    </script>
    <div class="row-fluid">
        <script src="newlib/pgnvjs.js" type="text/javascript"></script>

        <div class="span12 well infobox">

            <center>

                <?php
                if (isset($_POST['uploadpgn'])) {

                    $pgn = $_REQUEST['pgn'];

                    $getlastgame = $mysqli->query("SELECT * FROM `tbl_games` ORDER by id DESC Limit 1");
                    $lastgamedet = $getlastgame->fetch_object();
                    $timenow = date("Y-m-d H:i:s");
                    $newgame = $lastgamedet->id + 1;
                    $startgame = $mysqli->query("INSERT INTO `tbl_games`(`id`, `user_id`, `event_name`, `wp_name`, `bp_name`, `start_time`, `end_time`, `game_fen`, `game_pgn`, `submit_to`, `coach_rating`, `rating_comment`, `status`) VALUES ('$newgame', '$userDet->id', '', '', '', '$timenow', '', '', '$pgn', '0', '0', '', '1')");

                    echo 'PGN Successfully Imported. <a href="./stdviewlesson.php?lesson=' . $newgame . '" style="font-weight:bold; font-size:14px">Click Here</a> to View and Submit Lesson.';

                } else { ?>

                    <input type="file" name="file" id="files" accept="pgn" required><br/><br/>

                    <span class="readBytesButtons">
               <button>View file</button>
            </span>

                    <div id="byte_content"></div>

                    <script>

                        function readBlob(opt_startByte, opt_stopByte) {

                            var files = document.getElementById('files').files;
                            if (!files.length) {
                                alert('Please select a file!');
                                return;
                            }

                            var file = files[0];
                            var start = parseInt(opt_startByte) || 0;
                            var stop = parseInt(opt_stopByte) || file.size - 1;

                            var reader = new FileReader();

                            // If we use onloadend, we need to check the readyState.
                            reader.onloadend = function (evt) {

                                if (evt.target.readyState == FileReader.DONE) { // DONE == 2

                                    PGNFile = evt.target.result.slice(3);

                                    document.getElementById('byte_content').textContent = PGNFile;
                                    document.getElementById('uploadbutton').disabled = false;
                                    document.getElementById('pgn_id').value = PGNFile;


                                }
                            };

                            var blob = file.slice(start, stop + 1);
                            reader.readAsBinaryString(blob);
                        }

                        document.querySelector('.readBytesButtons').addEventListener('click', function (evt) {
                            if (evt.target.tagName.toLowerCase() == 'button') {
                                var startByte = evt.target.getAttribute('data-startbyte');
                                var endByte = evt.target.getAttribute('data-endbyte');
                                readBlob(startByte, endByte);
                            }
                        }, false);

                    </script>

                    <br/>

                    <form name="importgame" method="post" action="./importpgn.php" enctype="multipart/form-data">
                        <input type="submit" name="uploadpgn" value="Upload PGN" id="uploadbutton" disabled><br/>

                        <input type="text" id='pgn_id' name="pgn" style="min-width:260px; width:40%; height:30px; visibility: hidden" ><br />

                    </form>


                <?php } ?>
            </center>
        </div>
    </div>

<?php include("footer.php"); ?>