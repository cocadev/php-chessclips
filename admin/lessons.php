<?php include("header.php"); ?>

		<!-- Alert -->
		<div class="alert alert-light">
			<a class="close" data-dismiss="alert">&times;</a>
			<i class="icon-comment"></i> Welcome back, <b><?=$admindet->fullname?></b>
		</div>
		<!-- / Alert -->

        <?php if(isset($_GET['type'])) {
        $msgtype = $_GET['type'];
        if($msgtype == "view") { ?>
		<div class="row-fluid">

			<!-- Create Account: Box -->
			<div class="span12">
				<!-- Create Account: Top Bar -->
                <?php if(isset($gamestatus)) { echo $gamestatus; } ?>
				<div class="top-bar">
					<ul class="tab-container">
					  <li class="active"><a href="#user-overview"><i class="icon-user"></i> Submitted Lessons</a></li>
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
									<th>ID</th>
									<th>Start Time</th>
									<th>End Time</th>
                                    <th>Last Move</th>
									<th>Total Comments</th>
									<th class="right" style="text-align:center">Actions</th>
								</tr>
							</thead>
							<tbody>
							    <?php
									 $getgames = $mysqli->query("SELECT * FROM `tbl_games` WHERE `status`='0'");
									 while($getgm = $getgames->fetch_object()) { ?>
								<tr>
									<td><?=$getgm->id?></td>
									<td><?=$getgm->start_time?></td>
									<td><?=$getgm->end_time?></td>
                                    <td><?=$getgm->game_fen?></td>
									<td><?=get_rows("`tbl_game_history` WHERE `game_id`='$getgm->id' AND `comment`!=''")?></td>
									<td class="right">
                                       <?php /* <a href="viewlesson.php?lesson=<?=$getgm->id?>&move=1"><button type="button" class="btn btn-success">View and Comment</button></a> */ ?>
                                    	<a href="lessons.php?type=view&delles=<?=$getgm->id?>"><button type="button" class="btn btn-danger">Delete Lesson</button></a>
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
				
	    <?php } else { ?>
	
	    <div class="row-fluid">

			<!-- Create Account: Box -->
			<div class="span12">
				<!-- Create Account: Top Bar -->
				<div class="top-bar">
					<ul class="tab-container">
					  <li class="active"><a href="#user-overview"><i class="icon-envelope"></i> Sent SMS Messages</a></li>
					</ul>
				</div>
				<!-- / Create Account: Top Bar -->
				<?php if(isset($delsntstatus)) { echo $delsntstatus; } ?>
				<!-- Create Account: Content -->
				<div class="well no-padding tab-content">
					
					<!-- Create Account: Content User Overview -->
					<div class="tab-pane active" id="user-overview">

					<!-- Create Account: Content User Overview Table -->
						<table class="data-table">
							<thead>
								<tr>
									<th>To</th>
									<th>Message</th>
									<th>Received From</th>
									<th>Sent From</th>
									<th>Date Time</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							    <?php $getsntmsg = $mysqli->query("SELECT * FROM `tbl_sent_messages` ORDER BY id DESC"); 
						        while($msgsnt = $getsntmsg->fetch_object()) { ?>
								<tr>
									<td><?=get_sub_details($msgsnt->subscriber_id)->number?></td>
									<td><?=get_msg_by_id($msgsnt->recv_msg_id)->msg_content?></td>
									<td><?=get_msg_by_id($msgsnt->recv_msg_id)->from_num?></td>
									<td><?=$msgsnt->from_num?></td>
									<td><?=$msgsnt->date_time_msg?></td>
									<td class="right">
										<a href="messages.php?type=sent&sendel=<?=$msgsnt->id?>"><button type="button" class="btn btn-danger">Delete</button>
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
		
	<?php } } ?>	
		
		

	</div> 
	<!-- / Content Container -->
<?php include("footer.php"); ?>