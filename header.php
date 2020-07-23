<?php
	include("top_header.php");
    $page = '';
?>
<!DOCTYPE html>
<html lang="en"><head>

  <meta charset="utf-8">
  <title>Chess Clips - <?=ucwords($userDet->user_type)?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Styles -->
  <link href='assets/css/chosen.css' rel='stylesheet' style="text/css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <meta content="assets/img/favicon.png" itemprop="image">
  <link href="assets/img/favicon.png" rel="shortcut icon">
  <link href="assets/css/prism.css" rel="stylesheet/less" type="text/css">

  <!-- CSS used -->
  <link rel="stylesheet" href="newlib/pgnvjs.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <style type="text/css">
  	body { padding-top: 102px; }
	@media only screen and (max-width: 960px) {
		.mobilehide { display:none; }
	}
  </style>
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- JavaScript/jQuery, Pre-DOM -->

  <script src="assets/js/charts/jquery.flot.js"></script>


  <link rel="stylesheet" href="newlib/pgnvjs.css">

    <!-- HTML5, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body onresize="myFunction()">

	<!-- Top Fixed Bar -->
	<div class="navbar navbar-inverse navbar-fixed-top">

		<!-- Top Fixed Bar: Navbar Inner -->
		<div class="navbar-inner">

			<!-- Top Fixed Bar: Container -->
			<div class="container">

				<!-- Mobile Menu Button -->
				<a href="#">
					<button type="button" class="btn btn-navbar mobile-menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</a>
				<!-- / Mobile Menu Button -->

				<!-- / Logo / Brand Name -->
				<a class="brand" href="#"><i class="icon-user-md"></i> Chess Clips <b><?=ucwords($userDet->user_type)?></b></a>
				<!-- / Logo / Brand Name -->

				<!-- User Navigation -->
				<ul class="nav pull-right">
					<!-- User Navigation: User -->
					<li class="dropdown">

						<!-- User Navigation: User Link -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user icon-white"></i> 
							<span class="hidden-phone">Welcome <b><?=$userDet->fullname?></b></span>
						</a>
						<!-- / User Navigation: User Link -->

						<!-- User Navigation: User Dropdown -->
						<ul class="dropdown-menu">
							<li><a href="#settings" data-toggle="modal"><i class="icon-cog"></i> Account Settings</a></li>
							<li class="divider"></li>
							<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
						</ul>
						<!-- / User Navigation: User Dropdown -->

					</li>
					<!-- / User Navigation: User -->

				</ul>
				<!-- / User Navigation -->

			</div>
			<!-- / Top Fixed Bar: Container -->

		</div>
		<!-- / Top Fixed Bar: Navbar Inner -->

		<!-- Top Fixed Bar: Breadcrumb -->
		<div class="breadcrumb clearfix">

			<!-- Top Fixed Bar: Breadcrumb Container -->
			<div class="container">

				<!-- Top Fixed Bar: Breadcrumb Location -->
				<ul class="pull-left">
					
				</ul>
				<!-- / Top Fixed Bar: Breadcrumb Location -->
				
				<!-- Top Fixed Bar: Breadcrumb Right Navigation -->
				<ul class="pull-right">
					<li><a href="home.php"><i class="icon-home"></i> Home</a></li>
					<?php if($userDet->user_type == 'student') { ?>
					<li><a href="lessons.php"><i class="icon-envelope"></i> Lessons</a></li>
					<?php } ?>
					<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
				</ul>
				<!-- / Top Fixed Bar: Breadcrumb Right Navigation -->

			</div>
			<!-- / Top Fixed Bar: Breadcrumb Container -->

		</div>
		<!-- / Top Fixed Bar: Breadcrumb -->

	</div>
	<!-- / Top Fixed Bar -->

	<!-- Moldule: Settings -->
	<div id="settings" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel"><i class="icon-cog"></i> Account settings</h3>
		</div>

		<div class="modal-body">

			<form class="form-horizontal" method="post" action="">
		        <input type="hidden" name="myuid" value="<?=$admindet->id?>">
				<div class="control-group">
					<label class="control-label" for="inputName"><i class="icon-user"></i> Name</label>
					<div class="controls">
						<input type="text" id="inputName" placeholder="Name" name="myname" value="<?=$admindet->fullname?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputUsername"><i class="icon-user"></i> Username</label>
					<div class="controls">
						<input type="text" id="inputUsername" placeholder="Username" name="myusername" value="<?=$admindet->email?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPassword"><i class="icon-key"></i> Password</label>
					<div class="controls">
						<input type="password" id="inputPassword" placeholder="Password" name="mypass">
						<span><br />Enter New Password if you want to Change</span>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputEmail"><i class="icon-envelope"></i> ELO Points</label>
					<div class="controls">
						<input type="text" id="inputEmail" placeholder="Email" name="myemail" value="<?=$admindet->elo_points?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputMobile"><i class="icon-mobile-phone"></i> Preferred Language</label>
					<div class="controls">
						<input type="text" id="inputMobile" placeholder="Mobile" name="mymobile" value="<?=$admindet->pref_lang?>">
					</div>
				</div>
						 
		</div>

		<div class="modal-footer">

			<button class="btn btn-primary" name="updateprofile">Save changes</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</form>

		</div>

	</div> 
	<!-- / Module: Settings -->

	<!-- Content Container -->
	<div class="container">

		<!-- Main Navigation: Box -->
		<div class="navbar navbar-inverse mobilehide" id="nav">

			<!-- Main Navigation: Inner -->
			<div class="navbar-inner">

				<!-- Main Navigation: Nav -->
				<ul class="nav">

					<!-- Main Navigation: Dashboard -->
					<li <?php if($page == 'Dashboard') { echo 'class="active"'; } ?>><a href="home.php"><i class="icon-align-justify"></i> Dashboard</a></li>
					<!-- / Main Navigation: Dashboard -->
					<?php if($userDet->user_type == 'student') { ?>
                    <li><a href="lessons.php"><i class="icon-envelope"></i> Lessons</a></li>
                    <?php } /*else if($userDet->user_type == 'coach') { ?>
                    <li><a href="coaches.php"><i class="icon-users"></i> Coaches</a></li>
                    <?php } */ ?>
					<!-- Main Navigation: Gallery -->
					<li><a href="logout.php"><i class="icon-user"></i> Logout</a></li>
					<!-- / Main Navigation: Gallery -->

				</ul>
				<!-- / Main Navigation: Nav -->
			

			</div>
			<!-- / Main Navigation: Inner -->

		</div>
		<!-- / Main Navigation: Box -->
		<?php if(isset($updateprofile)) { echo $updateprofile; } ?>