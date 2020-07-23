<?php
	include("top_header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Chess Clips - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Styles -->
  <link href='assets/css/chosen.css' rel='stylesheet' tyle="text/css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/theme/avocado.css" rel="stylesheet" type="text/css" id="theme-style">
  <link href="assets/css/prism.css" rel="stylesheet/less" type="text/css">
  <link href='assets/css/fullcalendar.css' rel='stylesheet' tyle="text/css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,600,300' rel='stylesheet' type='text/css'> 
  <style type="text/css">
  	body { padding-top: 102px; }
  </style>
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  
  <!-- JavaScript/jQuery, Pre-DOM -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> 
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script src="assets/js/charts/excanvas.min.js"></script>
  <script src="assets/js/charts/jquery.flot.js"></script>
  <script src="assets/js/jquery.jpanelmenu.min.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <script src="assets/js/avocado-custom-predom.js"></script>

  <!-- HTML5, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

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
				<a class="brand" href="#"><i class="icon-user-md"></i> Chess Clips <b>Admin</b></a>
				<!-- / Logo / Brand Name -->

				<!-- User Navigation -->
				<ul class="nav pull-right">
					
					<!-- User Navigation: Notifications -->
					<li class="dropdown">

						<!-- User Navigation: Notifications Link -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-align-justify icon-white"></i>
							<span class="hidden-phone"> Users </span>
							<span class="badge badge-inverse"><?=get_rows("`tbl_staff_subscribers`")?></span>
						</a>
						<!-- / User Navigation: Notifications Link -->

					</li>
					<!-- / User Navigation: Notifications -->

					<!-- User Navigation: Messages --/>
					<li class="dropdown">

						<!-- User Navigation: Messages Link --/>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-envelope icon-white"></i>
							<span class="hidden-phone"> SMS Received </span>
							<span class="badge badge-inverse"><?php echo get_rows("`tbl_recv_messages`"); ?></span>
						</a>
						<!-- / User Navigation: Messages Link --/>

					</li>
					<!-- / User Navigation: Messages -->

					<!-- User Navigation: User -->
					<li class="dropdown">

						<!-- User Navigation: User Link -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user icon-white"></i> 
							<span class="hidden-phone">Welcome <b><?=$admindet->fullname?></b></span>
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
					
					<?php $current = $_SERVER['REQUEST_URI'];
						  $current = str_replace('/relaytwilio/', '', $current);
						  if($current == 'home.php') { $page = 'Dashboard'; }
						  else { $page = ''; }
					?>
					<li><a href="home.php"><i class="icon-home"></i> Home</a><?php /* <span class="divider">/</span></li>
					<li class="active"><a href="#"><i class="icon-<?=strtolower($page)?>"></i> <?php echo $page; ?></a> */ ?></li> 
				</ul>
				<!-- / Top Fixed Bar: Breadcrumb Location -->

				<!-- Top Fixed Bar: Breadcrumb Right Navigation -->
				<ul class="pull-right">
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
						<input type="text" id="inputUsername" placeholder="Mobile" name="mymobile" value="<?=$admindet->pref_lang?>">
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
		<div class="navbar navbar-inverse" id="nav">

			<!-- Main Navigation: Inner -->
			<div class="navbar-inner">

				<!-- Main Navigation: Nav -->
				<ul class="nav">

					<!-- Main Navigation: Dashboard -->
					<li <?php if($page == 'Dashboard') { echo 'class="active"'; } ?>><a href="home.php"><i class="icon-align-justify"></i> Dashboard</a></li>
					<!-- / Main Navigation: Dashboard -->
					
					<!-- Main Navigation: General -->
					<li class="dropdown">
							<a href="#" class="dropdown-toggle active" data-toggle="dropdown">
								<i class="icon-group"></i> Users <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="users.php?action=add"><i class="icon-user"></i> Add User </a></li>
								<li><a href="users.php?action=view"><i class="icon-edit-sign"></i> Edit / View User</a></li>
							</ul>
					</li>
					<!-- / Main Navigation: General -->

					<!-- Main Navigation: UI Elements -->
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope">
								</i> Lessons <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="lessons.php?type=view"><i class="icon-reply"></i> View Lessons</a></li>
								<!-- <li><a href="messages.php?type=sent"><i class="icon-share-alt"></i> SMS Sent</a></li> -->
							</ul>
					</li>
					<!-- / Main Navigation: UI Elements -->

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