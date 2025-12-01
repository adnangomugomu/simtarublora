<?php
include "library/config.php";
$sql="select * from ".$_GET['tabel']." where deleted='0' and id='".$_GET['id']."' limit 1";
$result=mysqli_query($link,$sql);
if ($result)
{
$y=1;
while ($row=mysqli_fetch_array($result))
{
$namaalbum=$row['nama'];
$ikonalbum=$row['ikon'];
$isialbum=$row['isi'];
?>

<?php
$y++; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $judulWeb; ?></title>
	<link rel="shortcut icon" href="<?php echo $ikon; ?>" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700|Anton" rel="stylesheet">
    

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
	

<style>
.modal-full {
min-width: 100%;
margin: 0;
}

.modal-full .modal-content {
	height: 100%;
}
</style>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="site-section bg-light counter" id="discover-section">
      <div class="container">
            <div class="block-heading-1">
              <h3 class="text-black text-uppercase section-title"><?php echo $namaalbum; ?></h3>
            </div>  
        <div class="row mb-5">

          <div class="col-lg-3 mb-5">
		  	<img src="<?php echo $_GET['images'];  ?>/<?php echo $ikonalbum;  ?>" alt="Image" class="img-fluid">
		  </div>
          <div class="col-lg-9 ml-auto align-self-center">
            <div class="row mb-12">
              <div class="col-md-12">
                <div class="block-counter-12 block-counter-1-sm">
                  <span class="number"><?php echo $isialbum; ?></span>
                </div>
              </div>
            </div>

            
          </div>

          
          
        </div>

        
    </div>
  </div>

    


  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script src="js/velocity.min.js"></script>
  <script src="js/velocity.ui.min.js"></script>
  <script  src="js/index.js"></script>

    
  </body>
</html>

