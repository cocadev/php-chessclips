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
			<div class="span4 well infobox">
				<i class="icon-6x icon-user"></i>
				<div class="pull-right text-right">
					Admin Users<br>
					<b class="huge"><?=get_rows("`tbl_user` WHERE `user_type`='admin'")?></b><br>
					<span class="caps muted">Total</span>
				</div>
			</div>
			<!-- / Information Boxes: Users Registered -->

			<!-- Information Boxes: Active Users -->
			<div class="span4 well infobox">
				<i class="icon-6x icon-user-md"></i>
				<div class="pull-right text-right">
					Registered Coaches<br>
					<b class="huge"><?php echo get_rows("`tbl_user` WHERE `user_type`='coach'"); ?></b><br>
					<span class="caps muted">Total</span>
				</div>
			</div>
			<!-- / Information Boxes: Active Users -->

			<!-- Information Boxes: Images -->
			<div class="span4 well infobox">
				<i class="icon-6x icon-user"></i>
				<div class="pull-right text-right">
					Student Users<br>
					<b class="huge"><?php echo get_rows("`tbl_user` WHERE `user_type`='student'"); ?></b><br>
					<span class="caps muted">Total</span>
				</div>
			</div>
			<!-- / Information Boxes: Images -->

		</div>
		<!-- / Information Boxes -->

        <?php 
		if(isset($_GET['action'])) {
		$actionis = $_GET['action'];
		if($actionis == 'edit') { ?>
        <!-- Create Account and Messages -->
		<div class="row-fluid">

			<!-- Create Account: Box -->
			<div class="span12">

				<!-- Create Account: Top Bar -->
				<div class="top-bar">
					<ul class="tab-container">
					  <li><a href="#user-create"><i class="icon-user"></i> Edit Member</a></li>
					</ul>
				</div>
				<!-- / Create Account: Top Bar -->

				<!-- Create Account: Content -->
				<div class="well no-padding tab-content">

					<!-- / Create Account: Tab -->   
					<div class="tab-pane" id="user-create" style="display:block">
                            
                        <!-- Create Account: Form -->
						<form class="form-horizontal" method="post" action="users.php?action=edit&editid=<?=$_GET['editid']?>">

							<!-- Create Account: Top Information -->
							<div class="top-info">
                                
								<!-- Alert -->
								<?php if(isset($mstatus)) { echo $mstatus; } ?>
								<?php if(isset($editstatus)) { echo $editstatus; } ?>
								<!-- / Alert -->

							</div>
							<!-- / Create Account: Top Information -->
							<?php
							$usrtoed = $_GET['editid'];
							$getusr = $mysqli->query("SELECT * FROM `tbl_user` WHERE `id`='$usrtoed'");
							$usris = $getusr->fetch_object();
							?>
                            <input type="hidden" name="usrupid" value="<?=$_GET['editid']?>">
							<!-- Edit Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-user"></i> Name</label>
								<div class="controls">
									<input type="text" id="inputName" placeholder="Full Name" name="usName" value="<?=$usris->fullname?>">
								</div>
							</div>
							<!-- / Create Account: Form Name -->
                            
                            <!-- Create Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-envelope"></i> Email</label>
								<div class="controls">
									<input type="text" id="inputName" placeholder="Email Address" name="usEmail" value="<?=$usris->email?>" required>
								</div>
							</div>
							<!-- / Create Account: Form Name -->

							<!-- Create Account: Form Username -->
							<div class="control-group">
								<label class="control-label" for="inputUsername"><i class="icon-key"></i> Password</label>
								<div class="controls">
									<input type="password" placeholder="Password" name="usPassword">
								</div>
							</div>
							<!-- / Create Account: Form Username -->
                            
                            
                            <!-- Create Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-user"></i> Title</label>
								<div class="controls">
                                	<select name="usTitle">
										<option value="None" <?php if($usris->title == "None") { echo 'selected="selected"'; } ?>>None</option>
                                        <option value="FM" <?php if($usris->title == "None") { echo 'selected="selected"'; } ?>>FM</option>
                                        <option value="WFM" <?php if($usris->title == "None") { echo 'selected="selected"'; } ?>>WFM</option>
                                        <option value="IM" <?php if($usris->title == "None") { echo 'selected="selected"'; } ?>>IM</option>
                                        <option value="WIM" <?php if($usris->title == "None") { echo 'selected="selected"'; } ?>>WIM</option>
                                        <option value="GM" <?php if($usris->title == "None") { echo 'selected="selected"'; } ?>>GM</option>
                                        <option value="WGM" <?php if($usris->title == "None") { echo 'selected="selected"'; } ?>>WGM</option>
                                    </select>
								</div>
							</div>
							<!-- / Create Account: Form Name -->
                            
                             <!-- Create Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-user"></i> User Type</label>
								<div class="controls">
									<select name="usType">
                                    	<option value="student" <?php if($usris->user_type == "student") { echo 'selected="selected"'; } ?>>Student</option>
                                        <option value="coach" <?php if($usris->user_type == "coach") { echo 'selected="selected"'; } ?>>Coach</option>
                                    </select>
								</div>
							</div>
							<!-- / Create Account: Form Name -->

							<!-- Create Account: Form Actions -->
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="editUser">Edit User</button>
								<button type="button" class="btn">Cancel</button>
							</div>
							<!-- / Create Account: Form Actions -->
		 
						</form> 
						<!-- / Edit Account: Form -->  

					</div>
					<!-- / Create Account: Tab -->   

				</div>
				<!-- / Create Account: Content -->

			</div>
			<!-- / Create Account: Box -->

		</div>
		<!-- / Create Account and Messages -->
		
		<?php } else if($actionis == 'add') { ?>
		
		<!-- Create Account and Messages -->
		<div class="row-fluid">

			<!-- Create Account: Box -->
			<div class="span12">

				<!-- Create Account: Top Bar -->
				<div class="top-bar">
					<ul class="tab-container">
					  <li><a href="#user-create"><i class="icon-user"></i> Add Member</a></li>
					</ul>
				</div>
				<!-- / Create Account: Top Bar -->

				<!-- Create Account: Content -->
				<div class="well no-padding tab-content">

					<!-- / Create Account: Tab -->   
					<div class="tab-pane" id="user-create" style="display:block">

						<!-- Create Account: Form -->
						<form class="form-horizontal" method="post" action="">

							<!-- Create Account: Top Information -->
							<div class="top-info">
                                
								<!-- Alert -->
								<?php if(isset($mstatus)) { echo $mstatus; } ?>
								<!-- / Alert -->

							</div>
							<!-- / Create Account: Top Information -->

							<!-- Create Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-user"></i> Name</label>
								<div class="controls">
									<input type="text" id="inputName" placeholder="Full Name" name="usName">
								</div>
							</div>
							<!-- / Create Account: Form Name -->
                            
                            <!-- Create Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-envelope"></i> Email</label>
								<div class="controls">
									<input type="text" id="inputName" placeholder="Email Address" name="usEmail" required>
								</div>
							</div>
							<!-- / Create Account: Form Name -->

							<!-- Create Account: Form Username -->
							<div class="control-group">
								<label class="control-label" for="inputUsername"><i class="icon-key"></i> Password</label>
								<div class="controls">
									<input type="password" placeholder="Password" name="usPassword" required>
								</div>
							</div>
							<!-- / Create Account: Form Username -->
                            
                            
                            <!-- Create Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-user"></i> Title</label>
								<div class="controls">
                                	<select name="usTitle">
                                    	<option value="None">None</option>
                                        <option value="FM">FM</option>
                                        <option value="WFM">WFM</option>
                                        <option value="IM">IM</option>
                                        <option value="WIM">WIM</option>
                                        <option value="GM">GM</option>
                                        <option value="WGM">WGM</option>
                                    </select>
								</div>
							</div>
							<!-- / Create Account: Form Name -->
                            
                             <!-- Create Account: Form Name -->
							<div class="control-group">
								<label class="control-label" for="inputName"><i class="icon-user"></i> User Type</label>
								<div class="controls">
									<select name="usType">
                                    	<option value="student">Student</option>
                                        <option value="coach">Coach</option>
                                    </select>
								</div>
							</div>
							<!-- / Create Account: Form Name -->

							<!-- Create Account: Form Actions -->
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="addmember">Add User</button>
								<button type="button" class="btn">Cancel</button>
							</div>
							<!-- / Create Account: Form Actions -->
		 
						</form> 
						<!-- / Create Account: Form -->   

					</div>
					<!-- / Create Account: Tab -->   

				</div>
				<!-- / Create Account: Content -->

			</div>
			<!-- / Create Account: Box -->

		</div>
		<!-- / Create Account and Messages -->
		<?php } else if($actionis == 'view') { ?>
		
		
		
		<div class="row-fluid">

			<!-- Create Account: Box -->
			<div class="span12">

				<!-- Create Account: Top Bar -->
				<div class="top-bar">
					<ul class="tab-container">
					  <li class="active"><a href="#user-overview"><i class="icon-user"></i> Members Overview</a></li>
					</ul>
				</div>
				<!-- / Create Account: Top Bar -->

				<!-- Create Account: Content -->
				<div class="well no-padding tab-content">
					<?php if(isset($delstatus)) { echo $delstatus; } ?>
					<?php if(isset($updstatus)) { echo $updstatus; } ?>
					<!-- Create Account: Content User Overview -->
					<div class="tab-pane active" id="user-overview">

					<!-- Create Account: Content User Overview Table -->
						<table class="data-table">
							<thead>
								<tr>
									<th>Name</th>
                                    <th>Title</th>
									<th>Email</th>
									<th>Elo Points</th>
                                    <th>User Type</th>
                                    <th>Language</th>
									<th>Status</th>
									<th class="right">Actions</th>
								</tr>
							</thead>
							<tbody>
							    <?php
							    $getusr = $mysqli->query("SELECT * FROM `tbl_user` WHERE `id`!='1'");
							    while($gusr = $getusr->fetch_object()) { ?>
								<tr>
									<td><?=$gusr->fullname?></td>
                                    <td><?=$gusr->title?></td>
									<td><?=$gusr->email?></td>
									<td><?=$gusr->elo_points?></td>
                                    <td><?=ucwords($gusr->user_type)?></td>
                                    <td><?=$gusr->pref_lang?></td>
									<td><?php if($gusr->user_status == '1') { ?>
									    <span class="label label-success">active</span>
									    <?php } else { ?>
									    <span class="label label-important">banned</span>
									    <?php } ?>
									</td>
									<td class="right">
									    <a href="users.php?action=view&delid=<?=$gusr->id?>" onClick="return confirm('Are you sure?');"><button type="button" class="btn btn-danger">Delete</button></a>
									    <?php if($gusr->user_status == '1') { ?>
									    <a href="users.php?action=view&do=ban&usr=<?=$gusr->id?>"><button type="button" class="btn btn-warning" onclick="return confirm('Are you sure that you want to Ban User?');">Ban</button></a>
									    <?php } else { ?>
									    <a href="users.php?action=view&do=unban&usr=<?=$gusr->id?>"><button type="button" class="btn btn-success" onclick="return confirm('Are you sure you want to Unban User?');">Unban</button></a>
									    <?php } ?>
										<a href="users.php?action=edit&editid=<?=$gusr->id?>"><button type="button" class="btn btn-info">Edit</button></a>
										
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