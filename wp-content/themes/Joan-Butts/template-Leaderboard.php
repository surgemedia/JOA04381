<?php
/**
 * Template Name: Play Bridge Online
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
 
<?php 
 get_template_part('templates/button', 'upgrade-user');
 ?>
 <?php if((get_user_role() =='administrator' || get_user_role()=='royal') && !empty(get_user_role())): ?>
<a class="btn btn-primary" href="/play/?game=set&amp;val=0">Practice Online</a>
<a class="btn btn-primary" href="/play/?game=set&amp;val=1">Compete Online</a>
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




<h2>Select your bidding preferences and click 'save'.</h2>
<form id="profile-edit-form" class="standard-form about-me" action="http://www.joanbuttsbridge.com/php/sbc_edit_bidding_system.php" method="post">
<div class="editfield field_2 field_opening-1M-shows alt field_type_radio">
<div class="radio"><label for="field_2"><strong>Opening 1<span style="color: red;">♥</span> or 1♠ shows:</strong> </label></div>
</div>
</form>
<div id="field_2"><label><input checked="checked" name="field_2" type="radio" value="5 cards" />5 cards</label>
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
<div class="btn btn-primary"><input id="profile-group-edit-submit" name="profile-group-edit-submit" type="submit" value="Save Changes " /></div>

<?php 


 ?>
<?php endwhile; ?>