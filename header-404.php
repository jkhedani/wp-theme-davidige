<?php include(TBI . 'plugins/newsletterForm.php'); ?>
<!DOCTYPE HTML>

<?php
/*
	@package WordPress
	@subpackage Candidate
*/
?>

<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo('charset'); ?>">
<title><?php if (is_home()) { bloginfo('name'); ?><?php } elseif (is_category() || is_page() ||is_single()) { ?> <?php } ?><?php wp_title(''); ?></title>

<?php $favicon = get_option('tb_favicon'); ?>
<?php
	if (!$favicon) {
		$favicon = DEFAULT_FAVICON;
	}
?>

<link rel="icon" type="image/png" href="<?php echo $favicon; ?>">

<?php wp_head(); ?>

<!-- STYLES -->
<?php get_template_part('tbFonts'); ?>
<link rel="stylesheet" href="<?php echo TEMPLATE_DIRECTORY; ?>/styles/grid960.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<!-- include scripts -->
<script type="text/javascript">
<?php tb_include_files('/js/scripts/'); ?>
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55112199-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>

<a id="top"></a>

<!-- HEADER -->
<div id="header" class="<?php tb_write_bckg(); ?> width100 fullHeight">
	<div class="width100">
    <div class="width1000">
