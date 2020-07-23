<?php include("header.php"); ?>
<style>
.wrapper {
  display: inline-block;
}
.wrapper * {
  float: right;
}
input[type=radio] {
  display: none;
}
label {
  font-size: 40px;
}

input:checked ~ label {
  color: red;
}
</style>
		<!-- Information Boxes -->
		<div class="row-fluid">
					
			<!-- Information Boxes: Images -->
			<div class="span12 well infobox" style="text-align:center">
				<?php 
				if(empty($_GET['coach']) || empty($_GET['game'])) {
					echo '<div class="alert alert-danger">You must select a coach and game to rate</div>';
					exit();
				} else {
					$gamedet = get_game_details($_GET['game']);
					if($gamedet->coach_rating != 0) {
						echo "<div class='alert alert-danger'>Sorry! you already rated coach. you can't rate again</div>";
					}
					else {
				?>
				
				<form method="post" action="home.php">
					<h2>Rate <?=get_user_by_id($_GET['coach'])->fullname?></h2><br />
					<input type="hidden" name="game" value="<?=$_GET['game']?>">
					<input type="hidden" name="coach" value="<?=$_GET['coach']?>">
					<div class="wrapper">
					  <input type="radio" id="1" value="5" name="crat">
					  <label for="1">&#10038;</label>
					  <input type="radio" id="2" value="4" name="crat">
					  <label for="2">&#10038;</label>
					  <input type="radio" id="3" value="3" name="crat">
					  <label for="3">&#10038;</label>
					  <input type="radio" id="4" value="2" name="crat">
					  <label for="4">&#10038;</label>
					  <input type="radio" id="5" value="1" name="crat">
					  <label for="5">&#10038;</label>
					</div>
					<br /><br />
					<textarea name="comments" style="height:100px" placeholder="Write some comments"></textarea>
					<br />
					<input type="submit" name="ratecoach" value="Submit" style="background:#090; color:#FFF; border:0px; padding:5px 15px; width:60%; margin-top:10px">
				</form>
				<?php } } ?>
				
            
			</div>
			<!-- / Information Boxes: Images -->

		</div>
		<!-- / Information Boxes -->


	</div> 
<?php include("footer.php"); ?>