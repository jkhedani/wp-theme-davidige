<?php

/*
	@package WordPress
	@subpackage The Cause
	
	Template Name: Contact Page
*/

get_header('contact');

$msgSubject = $_GET['msgSubject'];
if (empty($msgSubject)) {
	$subject = '';
	$message = '';
} else {
	$subject = 'I want to attend an event...';
	$message = 'Event: ' . get_the_title($msgSubject);
}

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><?php the_title(); ?></h2>

<div id="contact"><div>

<div id="contactFormResult"></div>
<form action="<?php the_permalink(); ?>" method="post" id="contactForm">
 	<p>
	<label for="subject">Subject...</label>
	<input name="subject" id="subject" type="text" value="<?php echo $subject; ?>Sign me up to support David Ige and volunteer!">
	</p>
	
	<p>
	<label for="email">Your Email Address...</label>
	<input name="email" id="email" type="text">
    <span class="sendingError">Valid Email Required!</span>
    </p>
	
 	<p>
	<label for="fname">Your First Name...</label>
	<input name="fname" type="text">
	</p>
	
 	<p>
	<label for="lname">Your Last Name...</label>
	<input name="lname" type="text">
	</p>
	
 	<p>
	<label for="phone">Phone Number...</label>
	<input name="phone" type="text">
	</p>
		
    <p>
	<label for="message">Your Message...</label>
	<textarea name="message" id="message"><?php echo $message; ?>Please indicate here which area you would like to volunteer in as well as check the corresponding box below.</textarea>
    <span class="sendingError textarea">Required field!</span>
    </p>
    
    <p>
	<label for="area">Volunteer Interest...</label><br /><br />
	<input type="checkbox" name="area" value="Host a Coffee Hour" /> <strong>Host a Coffee Hour</strong> - Organize a gathering of family and friends for a small group discussion about the ideas and issues that are important to those in attendance.<br />
	<input type="checkbox" name="area" value="Canvassing" /> <strong>Canvassing</strong> - Walk door to door, passing out information to voters in various communities throughout the state.<br />
	<input type="checkbox" name="area" value="Sign Waving" /> <strong>Sign Waving</strong> - Hold signs and greet drivers in neighborhoods throughout the state.<br />
	<input type="checkbox" name="area" value="Headquarters Help" /> <strong>Headquarters Help</strong> - Assist our headquarters office staff by answering phones, helping with mail outs, and other logistical matters. <br />
	<input type="checkbox" name="area" value="Event Team" /> <strong>Event Team</strong> - Assist with set up, execution, and break down at the various events we will be hosting during the campaign.<br />
	<input type="checkbox" name="area" value="Phone Bank" /> <strong>Phone Bank</strong> - Call voters and ask for their support and vote. <br />
	<input type="checkbox" name="area" value="Friend to Freiend Postcard Campaign" /> <strong>Friend to Friend Postcard Campaign</strong> - Mail postcards to friends and family requesting support for David Ige for Governor.<br />
	<input type="checkbox" name="area" value="Newsletter List" /> <strong>Newsletter List</strong> - I strongly support Senator Ige for Governor and would like to be included on your mailing list to keep me informed of the events being planned in our community.<br />
    </p>
    
    <input type="hidden" value="1" name="tbSendEmailYes">
    
    <div class="buttons">
    <input type="submit" class="bigButton right" value="Submit">
    <input type="reset" class="bigButton right" value="Reset">
    <div class="ajaxLoader"></div>
    </div>
    
</form>

<div id="contactExtra">

<h3 class="first">We appreciate your support and interest in helping our campaign for Governor.</h3>


<?php the_content(); ?>


<?php if (get_option('tb_gmap_latitude') || get_option('tb_gmap_longitude')) { ?>
<div id="mapFrameContact">
	<div id="event_map"></div>
</div>
<?php } ?>

</div>

<?php endwhile; endif; ?>

</div></div>

<?php
get_footer();
?>