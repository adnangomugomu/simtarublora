<?php
set_time_limit(0);
require_once '../library/config.php';
$table=$_GET['table'];
$tampil=$_GET['tampil'];
$source=$_GET['source'];
?>



<script type="text/javascript">
function processLayer() {
function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

<?php

$sql="select replace(replace(AsText(ogc_geom_setuju),'MULTIPOLYGON(((','POLYGON(('),')))','))') as geom
,SUBSTRING_INDEX(replace(replace(AsText(centroid(ogc_geom_setuju)),'POINT(',''),')',''),' ',1) as longi
,SUBSTRING_INDEX(replace(replace(AsText(centroid(ogc_geom_setuju)),'POINT(',''),')',''),' ',-1) as lat
, id as ID from ".$table."  where ogc_geom_setuju<>'' and deleted='0' and id='".$tampil."' ";

$result=mysqli_query($link,$sql);
if ($result)
{
	$i=1;
	while ($row=mysqli_fetch_array($result))
	{
		$kode=$row['ID'];
		$geom=$row['geom'];
		$longi=$row['longi'];
		$lat=$row['lat'];
		$warna='#ff1493';
		$garis='#1E90FF';
		$labelku='Lokasi Survei';
		$teballine='1';
		$garisku='#FFFFFF';
		$tebalgarisku='#FFFFFF';
		
		echo "var wkt = '$geom'

		var format = new ol.format.WKT();

		var feature = format.readFeature(wkt, {

		dataProjection: 'EPSG:4326',

		featureProjection: 'EPSG:3857',
		

		});

		feature.setId('".$row['ID']."|".$table."');
		";
		if (!empty($labelku))
		{
		echo "
		feature.set('description', '".$labelku."');
		
		
		";
		}
		echo "
		function styleFunctionnas$i() {
		
		
		  var er=hexToRgb('$warna').r;
		  var ge=hexToRgb('$warna').g;
		  var be=hexToRgb('$warna').b;	
		  
			 
		  var zoom = map.getView().getZoom();
		  if (zoom <= 8)
		  {
		  var font_size = 0; // arbitrary value
		  }
		  else
		  {
		  var font_size = zoom * 0.75; // arbitrary value
		  }
		  return [
			new ol.style.Style({
				fill: new ol.style.Fill({
				color: [er, ge, be, 0.4],
				
			  }),
			  stroke: new ol.style.Stroke({
				color: '$garis',
				width: $teballine
			  }),
			  text: new ol.style.Text({
				font: font_size + 'px Geneva, Arial, Helvetica, sans-serif',
				fill: new ol.style.Fill({ color: '$garisku' }),
				stroke: new ol.style.Stroke({
				  color: '$tebalgarisku', width: 1
				}),
				// get the text from the feature - `this` is ol.Feature
				";
				if (!empty($labelku))
				{
				echo "
				text: this.get('description')
				";
				}
				echo "
			  })
			})
		  ];
		}
		";


		
		echo "
		feature.setStyle(styleFunctionnas$i);
		".$source.".addFeature(feature);
		";
		$i++;
		
		echo "
                
		map.getView().setCenter(ol.proj.transform([".$longi." , ".$lat."], 'EPSG:4326', 'EPSG:3857'));
		map.getView().setZoom(16);
		return feature;
		";
	}
}			
				
?>


}    

</script>

