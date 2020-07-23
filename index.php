<?php
include('admin/includes/config.php');
include('admin/includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chess Clips</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="assets/img/favicon.png" itemprop="image">
    <link href="assets/img/favicon.png" rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        h3{
            color: #ffdf84;
            font-size: 130%;
        }
        .link{
            cursor: pointer;
            color: #c58141;
        }
        .link:hover{
            color: #dfa35a;
        }

    </style>
</head>
<body style="background-color: #000">

<nav class="navbar navbar-inverse" style="background-color:#000">
    <div class="container-fluid">
        <div class="navbar-header" >
            <a class="navbar-brand" href="#" >
                <img src="./assets/img/company_logo_symbol.png" alt="Smiley face" height="50" width="55" style="margin-top: -15px;float: left">
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="sign.php"><span style="color:#ffdf84" class="glyphicon glyphicon-log-in"></span><span style="margin-left: 10px;color:#ffdf84">Login</span></a></li>
        </ul>
    </div>
</nav>

<div class="container" style="text-align: center">
    <img src="./assets/img/cover_photo.png" alt="Smiley face"  style="margin-top:100px;text-align: center" class="img-responsive"/>

    <h3>Connecting students and teachers of chess.</h3>

    <h3>Students: Enter your games with questions and annotations, ask questions and get instant feedback. Students register <a class="link" href="StudentSignup.php"> here.</a>
    </h3>

    <h3>Teachers: Receive students games, answer questions and add annotations for your fee per game on your time.
            Coaches register <a class="link" href="CoachSignup.php">here.</a></h3>
</div>

</body>
</html>
