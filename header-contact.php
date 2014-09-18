<?php include(TBI . 'plugins/contactForm.php'); ?>
<!DOCTYPE HTML>

<?php
/*
	@package WordPress
	@subpackage The Cause
*/

?>

<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo('charset'); ?>">
<title><?php if (is_home() || is_front_page()) { bloginfo('name'); ?><?php } elseif (is_category() || is_page() ||is_single()) { ?> <?php } ?><?php wp_title(''); ?></title>

<?php $favicon = get_option('tb_favicon', DEFAULT_FAVICON); ?>

<link rel="icon" type="image/png" href="<?php echo $favicon; ?>">

<!-- STYLES -->
<?php get_template_part('tbFonts'); ?>
<link rel="stylesheet" href="<?php echo TEMPLATE_DIRECTORY; ?>/styles/grid960.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php
$latitude = get_option('tb_gmap_latitude');
$longitude = get_option('tb_gmap_longitude');
$zoom = get_option('tb_gmap_zoom', DEFAULT_GM_ZOOM);

if ($latitude || $longitude) { ?>
<!-- GOOGLE MAPS -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  function initialize() {
  	var tbLatlng = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);

    var mapOptions = {
      center: tbLatlng,
      zoom: <?php echo $zoom; ?>,
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    };

    var map = new google.maps.Map(document.getElementById("event_map"), mapOptions);

    var marker = new google.maps.Marker({
        position: tbLatlng,
        map: map,
        title: '<?php echo $post->post_title; ?>'
    });
  }
</script>


<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> onload="initialize()">
<?php }  else { ?>
</head>
<body <?php body_class(); ?> >
<?php } ?>

<a id="top"></a>

<!-- HEADER -->
<div id="header" class="width100" <?php tb_write_bckg(); ?>>
    <div class="width1000">
        
        <div id="logo"><h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo tb_get_logo(); ?>" alt="<?php bloginfo('name'); ?>"></a></h1></div>
		
    </div>
</div>
<!-- .HEADER -->

<div class="clear"></div>

<!-- CONTENT -->
<div id="contentHolder" class="width100">
    
	<!-- Navigation -->
    <div id="navigationBckg" class="<?php tb_write_bckg('navigation'); ?> width100">
		
        <div id="navigation">
		
		<div class="width1000">
		<?php
			if (has_nav_menu('Navigation')) {
		        wp_nav_menu(
		            array(
		                'theme_location' => 'Navigation', 
		                'container' => false, 
		                'menu_class' => 'navigation',
		                'fallback_cb' => 'tb_default_navigation'
		            )
		        );
			} else {
				tb_default_navigation();
			}
	    ?>
        </div>
		
        </div>
		
    </div>
	<!-- .Navigation -->
        
    <!-- MAIN -->
    <div id="main" class="width100">
	
		<?php
		global $post;
		$postID = $post->ID;
		$mainImageA = get_post_meta($postID, '_main_image', false);
		$mainImage = false;
		foreach ($mainImageA as $tempImg) {
			if (wp_get_attachment_image_src($tempImg)) {
				$mainImage = $tempImg;
				break;
			}
		}
		
		$mainShadow = get_post_meta($postID, '_main_shadow', true);		
		$sidebarPosition = get_post_meta($postID, '_sidebar_position', true);
		$mainImageArray = tb_get_main_image($mainImage, $mainShadow);
		?>
	
		<!-- Promo Image -->
		<div id="promoImage" class="width100">
			<?php if ($mainImageArray['mainImage']) { ?>
			<div style="background-image: url('<?php echo $mainImageArray['mainImage']; ?>');">
				<img src="<?php echo $mainImageArray['mainImage']; ?>">
				<?php if ($mainImageArray['mainShadow'] == 'yes') echo '<div class="mainShadow"></div>'; ?>
			</div>
			<?php } ?>
		</div>
		<!-- .Promo Image -->

    
        <!-- Content -->
        <div id="content" class="<?php tb_write_bckg('buttons'); ?> <?php tb_write_bckg('buttonsExtra'); ?>  <?php tb_write_bckg('sidebar'); ?> <?php echo tb_get_sidebar_position($sidebarPosition); ?> width1000" <?php if (!$mainImageArray['mainImage']) echo ' style="margin-top: 0 !important;"'; ?>>
		<div class="sidebarHolder">
