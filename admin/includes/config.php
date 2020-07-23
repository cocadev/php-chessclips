<?php
	set_time_limit(0);
	ini_set('max_execution_time', 0);
	 ini_set('memory_limit', '512M');
	ini_set("auto_detect_line_endings", true);
	
//	$db_host = '50.62.209.14';
//	$db_user = 'clips_user';
//	$db_pass = 'Smtj33@5';

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';

	$db_name = 'ph17726826401_chessclips';
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, 3306);