<?php
session_start();
include 'library/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="<?php echo $ikon; ?>" rel="icon">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $judulWeb; ?></title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		
		

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    <link rel="stylesheet" href="adi/ol.css" type="text/css">
	<link rel="stylesheet" href="adi/ol3gm.css" type="text/css" />


	<script src="adi/ol3gm.js"></script>
	<script src="adi/FileSaver.min.js"></script>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:11px;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 3px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
	border-color: #4CAF50;
}
</style> 		
    <style>
html, body {
    margin: 0;
    height: 100%;
}	
	
 #divLoading {
	display:none;

    /*set the div in the top-left corner of the screen*/
    position:absolute;
    top:0;
    left:0;
    background: white url(loading.gif) no-repeat;
    /*set the width and height to 100% of the screen*/
    width:100%;
    height:100%;
    z-index:999;
    opacity: 0.9; 
	filter: progid:DXImageTransform.Microsoft.Alpha(opacity=50);
	background-position: center center;
}

#map{
    position:absolute;
    z-index:1;
    width:100%; height:100%;
    top:-32px; bottom:0;
}
.ol-popup {
    position: absolute;
    background-color: white;
    -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
    filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #cccccc;
    bottom: -45px;
    left: -50px;
}
.ol-popup:after, .ol-popup:before {
    top: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
.ol-popup:after {
    border-top-color: white;
    border-width: 10px;
    left: 48px;
    margin-left: -10px;
}
.ol-popup:before {
    border-top-color: #cccccc;
    border-width: 11px;
    left: 48px;
    margin-left: -11px;
}
.ol-popup-content {
    position: relative;
    min-width: 400px;
    min-height: 300px;
    height: 100%;
    max-height: 350px;
    padding:2px;
    white-space: normal;        
    background-color: #f7f7f9;
    border: 1px solid #e1e1e8;
    overflow-y: auto;
    overflow-x: hidden;
}
.ol-popup-content p{
    font-size: 14px;
    padding: 2px 4px;
    color: #222;
    margin-bottom: 15px;
}
.ol-popup-closer {
    position: absolute;
    top: -4px;
    right: 2px;
    font-size: 100%;
    color: #0088cc;
    text-decoration: none;
}
a.ol-popup-closer:hover{
    color: #005580;
    text-decoration: underline;
}
.ol-popup-closer:after {
    content: "✖";
}
	</style>
	
<style>
.modal-full {
min-width: 100%;
margin: 0;
}

.modal-full .modal-content {
	height: 100%;
}
</style>

<style>
/*Eliminates padding, centers the thumbnail */


/* Styles the thumbnail */

a.lightbox img {
height: 250px;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);


}
/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target {
position: absolute;
top: -100%;
width: 100%;
left:0;
background: rgba(0,0,0,.9);
z-index:1000;
width: 100%;
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */

.lightbox-target img {
margin: auto;
position: absolute;
top: 0;
left:0;
right:0;
bottom: 0;
max-height: 0%;
max-width: 0%;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
box-sizing: border-box;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Styles the close link, adds the slide down transition */

a.lightbox-close {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target:target {
opacity: 1;
top: 0;
bottom: 0;
}

.lightbox-target:target img {
max-height: 100%;
max-width: 100%;
}

.lightbox-target:target a.lightbox-close {
top: 0px;
}


</style>
    
  </head>

  <body>

  
<div id="accordion" style="width:100%;">
<?php
$sql="select * from ".$_GET['tabel']." where deleted='0' group by grup";
$result=mysqli_query($link,$sql);
if ($result)
{
$i=1;
while ($row=mysqli_fetch_array($result))
{
?>	
<div class="card">
<a href="#" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>"><div class="card-header" style="background-color:#fd5f00;" id="headingOne">
  <h5 class="mb-0">
	<button class="btn btn-primary" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" style="cursor:pointer;" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
	  <?php echo $i.". "; ?><?php echo $row['grup']; ?>
	</button>
  </h5>
</div></a>

<div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
  <div class="card-body" style="background-color:#eaeaea;">
	
	<?php
	$sql1=" select * from ".$_GET['tabel']." where grup='".$row['grup']."' and deleted='0' ";
	//echo $sql1;
	$result1=mysqli_query($link,$sql1);
	if ($result1)
	{
	$x=1;
	while ($row1=mysqli_fetch_array($result1))
	{
	?>
	<div class="col-12">
	<a class="lightbox" href="#dog<?php echo $_GET['tabel'].$row1['id']; ?>"> <img height="100px;" src="<?php echo $_GET['images']."/".$row1['ikon']; ?>" alt="<?php echo $row1['ikon']; ?>" id="myImg" height="100px"> </a>
	<h6 style="color:#000000;"> <?php echo $row1['nama']; ?></h6>
	</div>
	<div class="lightbox-target" id="dog<?php echo $_GET['tabel'].$row1['id']; ?>">
	   <img id="aaddii" src="<?php echo $_GET['images']."/".$row1['ikon']; ?>"/>
	   <a class="lightbox-close" href="#"></a>
	</div>
	
	<?php 
	$x++;

	
	}
	}
	?>
	
	
  </div>
</div>
</div>
<?php
$i++;
}
}
?>
</div>						
	
		

  </body>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script> 
        <script src="vendors/counterup/apear.js"></script>
        <script src="vendors/counterup/countto.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        
        <script src="js/theme.js"></script>
		
		
		<script src="js/velocity.min.js"></script>
		<script src="js/velocity.ui.min.js"></script>
		<script  src="js/index.js"></script>
</html>
<div id="loadingstat" style="position: absolute; top: 200px; left: 940px; width: 64px; height: 16px; z-index: 3">