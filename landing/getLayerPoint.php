<?php
 require_once '../library/config.php';
   
    $table = $_GET['table'];
	$styleku = $_GET['styleku'];
	$checkku = $_GET['checkku'];
	$vecku = $_GET['vecku'];
	
	
	

//echo "hehe".$pola_ruang_prov;

?>

<script type="text/javascript">
            
    function processLayer() {
<?php 	
					echo "
 			var i, lat, lon, geom, feature, features = [];
                    
					//alert($geom);
					//alert($kode);
					geom = new ol.geom.Point(
                        ol.proj.transform([".$checkku." , ".$vecku."], 'EPSG:4326', 'EPSG:3857')
                    );

                    //feature.setId('addressfeature');
					feature = new ol.Feature(geom);
					feature.setStyle($styleku);
                    features.push(feature);
					vectorSourceLokasi.addFeatures(features);
					";
					
					
					echo "
                
					map.getView().setCenter(ol.proj.transform([".$checkku." , ".$vecku."], 'EPSG:4326', 'EPSG:3857'));
					map.getView().setZoom(16);
			    	return features;
					"; ?>
				
			           
        }    
</script>
