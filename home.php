<?php include("header.php"); ?>
        <?php if(isset($gamestatus)) { echo $gamestatus; } ?>
		

		<!-- Information Boxes -->
		<div class="row-fluid">
			<div class="span12 well infobox">
				Welcome back, <b><?=$userDet->fullname?></b>
			</div>
		</div>
		<!-- / Information Boxes -->

		<!-- Create Account and Messages -->
		<div class="row-fluid">

			<!-- Create Account: Box -->
			<div class="span12">

				<!-- Create Account: Top Bar -->
				<div class="top-bar">
					<ul class="tab-container">
					  <li class="active"><a href="#user-overview"><i class="icon-user"></i> Lessons Overview</a></li>
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
									<th style="min-width:70px">Name</th>
									<th>Date</th>
									<th>Status</th>
									<th class="right" style="text-align:center">Actions</th>
								</tr>
							</thead>
							<tbody>
							    <?php
								if($userDet->user_type=='student') {
							    	$getgames = $mysqli->query("SELECT * FROM `tbl_games` WHERE `user_id`='$userDet->id'");
								} else if($userDet->user_type=='coach') {
									 $getgames = $mysqli->query("SELECT * FROM `tbl_games` WHERE `status`='0' AND (`submit_to`='$userDet->id' OR `submit_to`='') ORDER BY id DESC");
								}
								
							    while($getgm = $getgames->fetch_object()) {
									$getlasthis = $mysqli->query("SELECT * FROM `tbl_game_history` WHERE `game_id`='$getgm->id' ORDER BY id DESC LIMIT 1");
									$lastmove = $getlasthis->fetch_object();
								?>
								<tr>
									<td><?=get_user_by_id($getgm->user_id)->fullname?></td>
									<td><?php if($getgm->end_time != '') { echo date("jS M Y", strtotime($getgm->end_time)); } else { echo 'Not Submitted'; } ?></td>
									<?php if($getgm->status > 1) { ?>
									<td><img src="./images/icons/porcessed-icon.png"></td>
									<?php } else { ?>
									<td><img src="./images/icons/processing-icon.png"></td>
									<?php } ?>
									<td class="right">
                                    <?php if($userDet->user_type=='coach') { ?>
                                        <a href="viewlesson.php?lesson=<?=$getgm->id?>"><button type="button" class="btn btn-success">View and Comment</button></a>
                                    <?php } else if($userDet->user_type=='student') { ?>
                                    	<a href="home.php?delles=<?=$getgm->id?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete Lesson</button></a>
										<?php if($getgm->status == "1") { ?>
                                        	<a href="lessons.php?game=<?=$getgm->id?>"><button type="button" class="btn btn-success">Continue Lesson</button></a>
										<?php } else { ?>
											<a href="viewlesson.php?lesson=<?=$getgm->id?>"><button type="button" class="btn btn-success">View All Comments</button></a>
										<?php } ?>
                                    <?php } ?>
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


		</div>
		<!-- / Create Account and Messages -->
	</div> 
	<!-- / Content Container -->
        
<?php include("footer.php"); ?>