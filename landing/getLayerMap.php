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

$tempisitabel=explode("|",$tampil);
$jumtempisitabel=count($tempisitabel);

for ($x = 1; $x <= $jumtempisitabel-1; $x++) {
	$sql1="select tipetabel as tipe from ".$tempisitabel[$x]." limit 1 ";
	$result1=mysqli_query($link,$sql1);
	if ($result1)
	{
		while ($row1=mysqli_fetch_array($result1))
		{
			if ($row1['tipe']=='1')
			{
				$sql="select replace(replace(replace(AsText(ogc_geom),'POINT(',''),')',''),' ',' , ')as geom ,ID_AUTO as ID, simboltabel
				from ".$tempisitabel[$x]."  where ogc_geom<>'' and deleted='0' ";
				$result=mysqli_query($link,$sql);
				if ($result)
				{
					$i=1;
					while ($row=mysqli_fetch_array($result))
					{
						$kode=$row['ID'];
						$geom=$row['geom'];
						$simbol=$row['simboltabel'];
						echo
						"
						var style$i$tempisitabel[$x] = [
							new ol.style.Style({
								image: new ol.style.Icon(({
								  anchor: [0.1, 0.1],
								  size: [100, 100],
								  offset: [0, 0],
								  opacity: 1,
								  scale: 0.75,
								  src: 'img/$simbol'
								})),
								zIndex: 5
							}),
						
						];
						";
						
						
						echo "var i, lat, lon, geom, feature, features = [];";
						echo
						"
						geom = new ol.geom.Point(

                        ol.proj.transform([".$row['geom']."], 'EPSG:4326', 'EPSG:3857')

                    	);
						";
						echo "feature = new ol.Feature(geom);";
						
						echo
						"
						feature.setId('".$row['ID']."|".$tempisitabel[$x]."');
						feature.setStyle(style$i$tempisitabel[$x])	
						features.push(feature);
						".$source.".addFeature(feature);
						";
						
						
						$i++;
					}
				}
			}
			if ($row1['tipe']=='5')
			{
				$sql="select replace(replace(AsText(ogc_geom),'MULTIPOLYGON(((','POLYGON(('),')))','))') as geom, ID_AUTO as ID,kodetabel as tempkode,fillku,tebalfillku,garisku,tebalgarisku,labelku,teballine  from ".$tempisitabel[$x]."  where ogc_geom<>' and deleted='0'  ";

				$result=mysqli_query($link,$sql);
				if ($result)
				{
					$i=1;
					while ($row=mysqli_fetch_array($result))
					{
						$kode=$row['ID'];
						$geom=$row['geom'];
						$warna=$row['fillku'];
						$garis=$row['tebalfillku'];
				
						echo "var wkt = '$geom'

						var format = new ol.format.WKT();

						var feature = format.readFeature(wkt, {

        				dataProjection: 'EPSG:4326',

        				featureProjection: 'EPSG:3857',
						

      					});

						feature.setId('".$row['ID']."|".$tempisitabel[$x]."');
						
						
						";

						echo "
						function styleFunctionnas$i$tempisitabel[$x]() {
						
						
						  var er=hexToRgb('$warna').r;
						  var ge=hexToRgb('$warna').g;
						  var be=hexToRgb('$warna').b;	
						  
							 
						  var zoom = map.getView().getZoom();
						  if (zoom <= 13)
						  {
						  var font_size = 0; // arbitrary value
						  }
						  else
						  {
						  var font_size = zoom * 0.5; // arbitrary value
						  }
						  return [
							new ol.style.Style({
								fill: new ol.style.Fill({
								color: [er, ge, be, 0.4],
								
							  }),
							  stroke: new ol.style.Stroke({
								color: '$garis',
								width: 1
							  }),
							  text: new ol.style.Text({
								font: font_size + 'px Tahoma,sans-serif',
								fill: new ol.style.Fill({ color: '<?php echo $colortextku ; ?>' }),
								stroke: new ol.style.Stroke({
								  color: '#000', width: 1
								}),
								// get the text from the feature - `this` is ol.Feature
								text: this.get('description')
							  })
							})
						  ];
						}
						";


						
						echo "
						feature.setStyle(styleFunctionnas$i$tempisitabel[$x]);
						".$source.".addFeature(feature);
						";
						$i++;
					}
				}			
				
			}
			if ($row1['tipe']=='3')
			{

				$sql="select replace(replace(AsText(ogc_geom),'MULTILINESTRING(((','LINE(('),')))','))') as geom, ID_AUTO as ID,kodetabel as tempkode,garisku,tebalgarisku,teballine from ".$tempisitabel[$x]."  where ogc_geom<>'' and deleted='0' ";

				$result=mysqli_query($link,$sql);
				if ($result)
				{
					$i=1;
					while ($row=mysqli_fetch_array($result))
					{
						$kode=$row['ID'];
						$geom=$row['geom'];
						$warna=$row['garisku'];
						$garis=$row['tebalgarisku'];
						$teballine=$row['teballine'];
						
						
						echo "var wkt = '$geom'

						var format = new ol.format.WKT();

						var feature = format.readFeature(wkt, {

        				dataProjection: 'EPSG:4326',

        				featureProjection: 'EPSG:3857',
						

      					});

						feature.setId('".$row['ID']."|".$tempisitabel[$x]."');
						";

						echo "
						function styleFunction$i$tempisitabel[$x]() {
						
						
						  var er=hexToRgb('$warna').r;
						  var ge=hexToRgb('$warna').g;
						  var be=hexToRgb('$warna').b;
						  
						  var er1=hexToRgb('$garis').r;
						  var ge1=hexToRgb('$garis').g;
						  var be1=hexToRgb('$garis').b;	
						  
							 
						  var zoom = map.getView().getZoom();
						  if (zoom <= 13)
						  {
						  var font_size = 0; // arbitrary value
						  }
						  else
						  {
						  var font_size = zoom * 0.5; // arbitrary value
						  }
						  var width = $teballine;
						  return [
							new ol.style.Style({
							stroke: new ol.style.Stroke({
							  color: [er, ge, be, 0.4],
							  width: width + 1,
							  //lineDash: [.1, 5] //or other combinations
							})
						  }),
							new ol.style.Style({
							stroke: new ol.style.Stroke({
							  color: [er1, ge1, be1, 0.4],
							  width: width,
							  //lineDash: [.1, 5] //or other combinations
							})
						  })
						  ];
						}
						";
						

						
						echo "
						feature.setStyle(styleFunction$i$tempisitabel[$x]);
						".$source.".addFeature(feature);
						";	
						
						$i++;
					}
				}
				
								
							
				
			}
		}
	}
?>



<?php

}



?> 

}    

</script>

