<!DOCTYPE html>
<?php 
require_once './library/config.php';

?>
<html>
<head>
	<title><?php echo $judul;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo $webRoot?>/css/normalize.css">
	<link rel="stylesheet" href="<?php echo $webRoot?>/css/stylebaru.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $webRoot?>/css/colorbox.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $webRoot?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $webRoot?>/css/bootstrap-theme.css">
	
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo $webRoot?>/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $webRoot?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo $webRoot?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo $webRoot?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo $webRoot?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo $webRoot?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo $webRoot?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.cycle2.tile.js"></script>
    <script type="text/javascript" src="js/jquery.cycle2.js"></script>

</head>