<?php 
if(empty($_POST['dsid'])) :
	return_to_hp();
else :
	$result = DB::query("SELECT * FROM flavors_games_registered_users WHERE safety_string=%s", $_POST['dsid']);	
	if(empty($result)) return_to_hp();
?>
<style type="text/css">
	.small_logo {
		display: none;
	}
</style>
<div class="spin_holder registered">
	<div class="intro">
		<img class="logo" src="img/jj-flavor-logo.png">
		<div class="desktop">
			<h2 class="heading">Take a Spin with Your Kids</h2>
			<div class="intro_lead">Enjoy flavor-filled fun with games, puzzles and activities your kids will love.</div>
			<div class="intro_lead">Plus, you could win a juicy prize!</div>
			<button  id="spin_btn_1" class="spin">SPIN</button>
			<div class="intro_lead_small">Explore more about our 16 fun flavors here <span style="font-size: 12px;" class="glyphicon glyphicon-play" aria-hidden="true"></span></div>
		</div>
	</div>
	<?php include('wheel.php'); ?>
	<div class="mobile">
		<h2 class="heading">Take a Spin with Your Kids</h2>
		<div class="intro_lead">Swipe the wheel and enjoy flavor-filled fun with games and activities your kids will love. Plus, you could win a juicy prize!</div>	
		<div class="intro_lead_small">Explore more about our 16 fun flavors here <span style="font-size: 12px;" class="glyphicon glyphicon-play" aria-hidden="true"></span></div>
	</div>
</div>
<?php 
endif; ?>