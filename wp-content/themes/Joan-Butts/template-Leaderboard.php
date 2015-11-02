<?php
/**
 * Template Name: Play Bridge Online
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php the_content(); ?>
<?php 
 get_template_part('templates/button', 'upgrade-user');
 ?>
 <?php if((get_user_role() =='administrator' || get_user_role()=='royal') && strlen(get_user_role())>0): ?>
<a class="theme-button play-online" href="/play/?game=set&amp;val=0">Practice Online</a>
<a class="theme-button play-online" href="/play/?game=set&amp;val=1">Compete Online</a>
<?php endif; ?>
<?php 
global $bp;
$the_user_id = $bp->loggedin_user->userdata->ID;
$the_user_name = $bp->loggedin_user->userdata->user_login;
$op1M = xprofile_get_field_data( 2, $the_user_id );
$op1nt = xprofile_get_field_data( 15, $the_user_id );
$op2x = xprofile_get_field_data( 18, $the_user_id );
$xfers = xprofile_get_field_data( 6, $the_user_id );
if ($op1M != "4 cards") { $op1M = "5 cards"; }
if ($op1nt != "12-14 hcp") { $op1nt = "15-17 hcp"; }
if ($op2x != "Strong") { $op2x = "Weak"; }
if ($xfers != "Yes") { $xfers = "No"; }
print "<script>var mydomain='joanbuttsbridge.com'; var username='" . $the_user_name . "'; var userid = '" . $the_user_id . "'; </script>";
$subscription_ref = bp_get_profile_field_data('field=fsid&amp;user_id='.$the_user_id);
 ?>

<?php
	if(strlen(get_user_role())>0) {
?>


		<h2>Select your bidding preferences and click 'save'.</h2>
		<form id="profile-edit-form" class="standard-form about-me" action="http://www.joanbuttsbridge.com/php/sbc_edit_bidding_system.php" method="post">
		<div class="editfield field_2 field_opening-1M-shows alt field_type_radio">
		<div class="radio"><label for="field_2"><strong>Opening 1<span style="color: red;">♥</span> or 1♠ shows:</strong> </label></div>
		</div>
		</form>
		<div class="radio" id="field_2"><label><input checked="checked" name="field_2" type="radio" value="5 cards" />5 cards</label>
		<label><input checked="checked" name="field_2" type="radio" value="4 cards" />4 cards</label></div>
		<div class="editfield field_15 field_opening-1nt-shows alt field_type_radio">
		<div class="radio"><label for="field_15"><strong>Opening 1NT shows:</strong> </label>
		<div id="field_15"><label><input checked="checked" name="field_15" type="radio" value="15-17 hcp" />15-17 hcp</label>
		<label><input checked="checked" name="field_15" type="radio" value="12-14 hcp" />12-14 hcp</label></div>
		</div>
		</div>
		<div class="editfield field_18 field_opening-2x-shows alt field_type_radio">
		<div class="radio"><label for="field_18"><strong>Opening 2<span style="color: red;">♦</span>, 2<span style="color: red;">♥</span>, or 2♠ shows:</strong> </label>
		<div id="field_18"><label><input checked="checked" name="field_18" type="radio" value="Weak" />weak</label>
		<label><input checked="checked" name="field_18" type="radio" value="Strong" />strong</label></div>
		</div>
		</div>
		<div class="editfield field_6 field_xfers-shows alt field_type_radio">
		<div class="radio"><label for="field_6"><strong>Do you play transfers?</strong> </label>
		<div id="field_6"><label><input checked="checked" name="field_6" type="radio" value="Yes" />yes</label>
		<label><input checked="checked" name="field_6" type="radio" value="No" />no</label></div>
		</div>
		</div>
		<div class="theme-button"><input id="profile-group-edit-submit" name="profile-group-edit-submit" type="submit" value="Save Changes " /></div>

<?php 
	}
?>
<?php endwhile; ?>

<?php
/* Content in wordpress page content */

/*
Play bridge against the computer anytime. There are unlimited hands too! Compare results with other players in the competition and play hands specifically created to practise lesson topics. A subscription costs $US10 per month and you can cancel any time without obligation. Or play the free <a href='/'>hand&nbsp;of&nbsp;the&nbsp;day</a>.
[eyesonly logged="out"]
<a class="button  button_red" href="/wp-login.php?action=register">Register</a>
[/eyesonly][insert_php]global $bp;
$the_user_id = $bp->loggedin_user->userdata->ID;
$the_user_name = $bp->loggedin_user->userdata->user_login;
$op1M = xprofile_get_field_data( 2, $the_user_id );
$op1nt = xprofile_get_field_data( 15, $the_user_id );
$op2x = xprofile_get_field_data( 18, $the_user_id );
$xfers = xprofile_get_field_data( 6, $the_user_id );
if ($op1M != "4 cards") { $op1M = "5 cards"; }
if ($op1nt != "12-14 hcp") { $op1nt = "15-17 hcp"; }
if ($op2x != "Strong") { $op2x = "Weak"; }
if ($xfers != "Yes") { $xfers = "No"; }
print "<script>var mydomain='joanbuttsbridge.com'; var username='" . $the_user_name . "'; var userid = '" . $the_user_id . "'; </script>";
$subscription_ref = bp_get_profile_field_data('field=fsid&amp;user_id='.$the_user_id);
[/insert_php][eyesonlier logged="in"][eyesonly level="royal" hide="yes"]
<a class="button  button_red" href="/php/fastspring-billing-client.php?customer_ref=[insert_php] print  $the_user_id; [/insert_php]&subscription_ref=[insert_php] print  $subscription_ref; [/insert_php]">upgrade</a>
[/eyesonly][eyesonly level="royal"]
<a class="button  button_red" href="/play/?game=set&amp;val=0">practice</a>
<a class="button  button_red" href="/play/?game=set&amp;val=1">compete</a>
<a href="/php/fastspring-billing-client.php?customer_ref=[insert_php] print $the_user_id; [/insert_php]&subscription_ref=[insert_php] print  $subscription_ref; [/insert_php]">account information</a>
[/eyesonly][/eyesonlier][eyesonly logged="in"]<h2>Select your bidding preferences and click 'save'.</h2>
<form action="http://www.joanbuttsbridge.com/php/sbc_edit_bidding_system.php" method="post" id="profile-edit-form" class="standard-form about-me">
<div class="editfield field_2 field_opening-1M-shows alt field_type_radio">
    <div class="radio">
        <label for="field_2"><strong>Opening 1<span style='color:red'>&hearts;</span> or 1&spades; shows:</strong> </label>
           <div id="field_2">
              <label><input [insert_php] if ($op1M == "5 cards") { print 'checked="checked"';} [/insert_php] type="radio" name="field_2" value="5 cards">5 cards</label>
              <label><input [insert_php] if ($op1M == "4 cards") { print 'checked="checked"';} [/insert_php] type="radio" name="field_2" value="4 cards">4 cards</label>
           </div>				
     </div>		
</div>
<div class="editfield field_15 field_opening-1nt-shows alt field_type_radio">
    <div class="radio">
        <label for="field_15"><strong>Opening 1NT shows:</strong> </label>
           <div id="field_15">
              <label><input [insert_php] if ($op1nt == "15-17 hcp") { print 'checked="checked"';} [/insert_php] type="radio" name="field_15" value="15-17 hcp">15-17 hcp</label>
              <label><input [insert_php] if ($op1nt == "12-14 hcp") { print 'checked="checked"';} [/insert_php] type="radio" name="field_15" value="12-14 hcp">12-14 hcp</label>
           </div>				
     </div>		
</div>
<div class="editfield field_18 field_opening-2x-shows alt field_type_radio">
    <div class="radio">
        <label for="field_18"><strong>Opening 2<span style='color:red'>&diams;</span>, 2<span style='color:red'>&hearts;</span>, or 2&spades; shows:</strong> </label>
           <div id="field_18">
              <label><input [insert_php] if ($op2x == "Weak") { print 'checked="checked"';} [/insert_php] type="radio" name="field_18" value="Weak">weak</label>
              <label><input [insert_php] if ($op2x == "Strong") { print 'checked="checked"';} [/insert_php] type="radio" name="field_18" value="Strong">strong</label>
           </div>				
     </div>		
</div>
<div class="editfield field_6 field_xfers-shows alt field_type_radio">
    <div class="radio">
        <label for="field_6"><strong>Do you play transfers?</strong> </label>
           <div id="field_6">
              <label><input [insert_php] if ($xfers == "Yes") { print 'checked="checked"';} [/insert_php] type="radio" name="field_6" value="Yes">yes</label>
              <label><input [insert_php] if ($xfers == "No") { print 'checked="checked"';} [/insert_php] type="radio" name="field_6" value="No">no</label>
           </div>				
     </div>		
</div>
	<div class="submit">
		<input type="submit" name="profile-group-edit-submit" id="profile-group-edit-submit" value="Save Changes ">
	</div>
</form>
<h2>Competition Results</h2>
<strong>Hands played today</strong>
<div id="resultsdisplay1">loading</div>
<strong>Today's ladder</strong>
<div id="resultsdisplay2">loading</div>
<strong>Yesterday's ladder</strong>
<div id="resultsdisplay3">loading</div>
<strong>This week's ladder</strong>
<div id="resultsdisplay4">loading</div>
<strong>Overall</strong>
<div id="resultsdisplay5">loading</div>
<script src="http://bridge2go.com/Live/JavaScripts/Game/results.js"></script>
[/eyesonly]
*/

?>