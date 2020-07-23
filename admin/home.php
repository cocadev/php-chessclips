<?php include("header.php"); ?>

		<!-- Alert -->
		<div class="alert alert-light">
			<a class="close" data-dismiss="alert">&times;</a>
			<i class="icon-comment"></i> Welcome back, <b><?=$admindet->fullname?></b>
		</div>
		<!-- / Alert -->

		<!-- Information Boxes -->
		<div class="row-fluid">

			<!-- Information Boxes: Users Registered -->
			<div class="span6 well infobox">
				<i class="icon-6x icon-user"></i>
				<div class="pull-right text-right">
					Registered Members<br>
					<b class="huge"><?=get_rows("`tbl_user` WHERE `user_type`!='admin'")?></b><br>
					<span class="caps muted">to broadcast sms</span>
				</div>
			</div>
			<!-- / Information Boxes: Users Registered -->

			<!-- Information Boxes: Images -->
			<div class="span6 well infobox">
				<i class="icon-6x icon-align-justify"></i>
				<div class="pull-right text-right">
					Lessons<br>
					<b class="huge"><?php echo get_rows("`tbl_games` WHERE `status`='0'"); ?></b><br>
					<span class="caps muted">Total</span>
				</div>
			</div>
			<!-- / Information Boxes: Images -->

		</div>
		<!-- / Information Boxes -->

		<!-- Create Account and Messages -->
		<div class="row-fluid">

			<!-- Create Account: Box -->
			<div class="span8">

				<!-- Create Account: Top Bar -->
				<div class="top-bar">
					<ul class="tab-container">
					  <li class="active"><a href="#user-overview"><i class="icon-user"></i> Users Overview</a></li>
					</ul>
				</div>
				<!-- / Create Account: Top Bar -->

				<!-- Create Account: Content -->
				<div class="well no-padding tab-content">
					
					<!-- Create Account: Content User Overview -->
					<div class="tab-pane active" id="user-overview">

					<!-- Create Account: Content User Overview Table -->
						<table class="data-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Date Added</th>
									<th>Status</th>
									<th class="right">Actions</th>
								</tr>
							</thead>
							<tbody>
							    <?php
							    $getusers = $mysqli->query("SELECT * FROM `tbl_user` WHERE `id`!='1'");
							    while($getusr = $getusers->fetch_object()) { ?>
								<tr>
									<td><?=$getusr->fullname?></td>
									<td><?=$getusr->email?></td>
									<td><?=$getusr->reg_date?></td>
									<td><?php if($getusr->user_status == '1') { ?>
									    <span class="label label-success">active</span>
									    <?php } else { ?>
									    <span class="label label-important">banned</span>
									    <?php } ?>
									</td>
									<td class="right">
										<a href="users.php?action=edit&editid=<?=$getusr->id?>"><button type="button" class="btn btn-info">Edit</button></a>
										<a href="users.php?action=view&delid=<?=$getusr->id?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button></a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<!-- / Create Account: Content User Overview Table -->

					</div>
					<!-- / Create Account: Content User Overview -->

				</div>
				<!-- / Create Account: Content -->

			</div>
			<!-- / Create Account: Box -->

			<!-- Messages: Box -->
			<div class="span4">

				<!-- Messages: Top Bar -->
				<div class="top-bar">
						<h3><i class="icon-envelope"></i> Latest Lessons Requests</h3>
				</div>
				<!-- / Messages: Top Bar -->

				<!-- Messages: Content -->
				<div class="well no-padding" id="pagination-messages">
 
					<!-- Messages: Content Messages -->
					<div class="list-widget messages pagination-content">

						<!-- Messages: Content Message -->
						<?php $getgames = $mysqli->query("SELECT * FROM `tbl_games` WHERE `status`='0' ORDER BY id DESC LIMIT 5"); 
						while($ltstgm = $getgames->fetch_object()) { ?>
						<div class="item">
							<small class="pull-right"><?=$ltstgm->end_time?></small>
							<h3>From&nbsp;&nbsp;<i class="icon-user"></i><span class="label"><?=get_user_by_id($ltstgm->user_id)->fullname?></span></h3>
							<p>Total Moves: <?=get_rows("`tbl_game_history` WHERE `game_id`='$ltstgm->id'")?></p>
						</div>
						<?php } ?>
						<!-- / Messages: Content Message -->

					</div>
					<!-- Messages: Content Messages -->

	
				</div>
				<!-- / Messages: Content -->

			</div>
			<!-- Messages: Box -->

		</div>
		<!-- / Create Account and Messages -->
	</div> 
	<!-- / Content Container -->
<?php include("footer.php"); ?>