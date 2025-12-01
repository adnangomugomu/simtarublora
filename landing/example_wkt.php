<?php
session_start(); 

include '../library/config.php';

$sq4="select tabel from one_peta where id='".($_POST['kodeid'])."'";
$res4=mysqli_query($link,$sq4);
if ($res4)
{
	while ($row4=mysqli_fetch_array($res4))
	{
		$isitabel=$row4['tabel'];
	}
}

copy ($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
copy ($_FILES['attachment1']['tmp_name'], $_FILES['attachment1']['name']);
copy ($_FILES['attachment2']['tmp_name'], $_FILES['attachment2']['name']);
$file1=$_FILES['attachment']['name'];
$file2=$_FILES['attachment2']['name'];

include("ShapeFile.inc.php");
$shp = new ShapeFile($file1); // along this file the class will use file.shx and file.dbf

$tabeltmp=str_replace(" ","_",$file1);
$tabel=str_replace(".shp","",$tabeltmp);

/*
      00 : FShapeTypeName :=          'Null Shape';
      01 : FShapeTypeName :=          'Point';
      03 : FShapeTypeName :=          'PolyLine';
      05 : FShapeTypeName :=          'Polygon';
      08 : FShapeTypeName :=          'MultiPoint';
      11 : FShapeTypeName :=          'PointZ';
      13 : FShapeTypeName :=          'PolyLineZ';
      15 : FShapeTypeName :=          'PolygonZ';
      18 : FShapeTypeName :=          'MultiPointZ';
      21 : FShapeTypeName :=          'PointM';
      23 : FShapeTypeName :=          'PolyLineM';
      25 : FShapeTypeName :=          'PolygonM';
      28 : FShapeTypeName :=          'MultiPointM';
      31 : FShapeTypeName :=          'MultiPatch';
*/
//echo "loaded : ".$shp->dbf->dbf_num_rec." records available<br>";
// Let's see all the records:
    set_time_limit(-1);
	
    $field_num = $shp->dbf->dbf_num_field;
    $tn = $tabel;
    $sql = "DROP TABLE IF EXISTS $tn; " ;
	//echo $sql."<br>";
        $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
    $crtb = "CREATE TABLE $tn ( ID_AUTO bigint(20) NOT NULL auto_increment, ";
    for($j=0; $j<$field_num; $j++){
	    $crtb .= $shp->dbf->dbf_names[$j]['name'];
	    $tp="TEXT";
	    if($shp->dbf->dbf_names[$j]['type']=='C') $tp="VARCHAR(255)";
	    if($shp->dbf->dbf_names[$j]['type']=='N') $tp="DOUBLE";
	    $crtb .= "  ".$tp."  NULL , ";
    }
    
	    $crtb .= "  FEATURE geometry , TRICK LONGTEXT  NULL , PRIMARY KEY  (ID_AUTO) ) ENGINE = MYISAM ";
    
    //echo"<br>$crtb<br>";
    $sql=$crtb;
        $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error($link)."<br>".$sql );


//foreach($shp->records as $record){
for($RECID=0;$RECID < $shp->dbf->dbf_num_rec;$RECID++){
     //echo "<br>processing $RECID <br>"; // just to format
     $record = $shp->records[$RECID];
     $cshp = $record->shp_data;
    
	///polygon
	
	if($shp->shp_type==5){
     $wkt='POLYGON(';
     for ($r = 0; $r < $cshp["numparts"];$r++){//r comes from ring
       $wkt.='('; //start ring
       $kp = count($cshp["parts"][$r]["points"]);
           set_time_limit(-1);
     //echo "<br> ring $r has $kp points";
       for($p = 0; $p < $kp; $p++){
          $x = $cshp["parts"][$r]["points"][$p]["x"];
          $y = $cshp["parts"][$r]["points"][$p]["y"];
          $wkt.=$x.' '.$y;
          if($p<$kp-1)$wkt.=','; //enum vertices
          if($p%100==0)    set_time_limit(-1);
       }
       $wkt.=')'; //close ring
       if($r < $cshp["numparts"]-1)$wkt.=','; //enum rings
     }
     $wkt.=')';
    $sql="INSERT INTO $tn VALUES(NULL,";
    for($j=0; $j<$field_num; $j++){
      $sql.="'".$record->dbf_data[$j]."',";
    }
    $sql.="NULL,NULL)";
    //echo $sql."...<br><br>";
    $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
    $idauto = @mysqli_insert_id($link);
    $baud=25000000;//bytes
    for($z = 0; $z < strlen($wkt)/$baud;$z++){
      $akt = substr($wkt,$z*$baud,$baud);
      $sql = "UPDATE $tn SET TRICK = '$akt' WHERE ID_AUTO = $idauto";
      //echo $sql."...<br><br>";
	  //echo substr($akt,0,9)."...<br><br>";
      $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
    }
	
	
	}
	
	/// end polygon
	
	/// point
	if($shp->shp_type==1){
     $wkt='POINT(';
	 //echo $cshp[x]."asdasdas".$cshp[y]."<br>";
     $x = $cshp["x"];
	 $y = $cshp["y"];
	 $wkt.=$x.' '.$y;
	 $wkt.=')';
	 //echo $wkt."<br><br>";
	$a=array(); 
	$sql="INSERT INTO $tn VALUES(NULL,";
    for($j=0; $j<$field_num; $j++){
      
	  $sql.="'".addslashes($record->dbf_data[$j])."',";
	  
	  
    }
    $sql.="NULL,NULL)";
    //echo $sql."...<br><br>";
    $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
    $idauto = @mysqli_insert_id($link);
    $baud=25000000;//bytes
      $sql = "UPDATE $tn SET TRICK = '$wkt' WHERE ID_AUTO = $idauto";
    //echo $sql."...<br><br>";
	  //echo substr($akt,0,9)."...<br><br>";
      $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
      $akt='POINT(';	
	 
    }
	//// end point
	
	///// linestring
	if($shp->shp_type==3){
	 $wkt='LineString';
     for ($r = 0; $r < $cshp["numparts"];$r++){//r comes from ring
       $wkt.='('; //start ring
       $kp = count($cshp["parts"][$r]["points"]);
           set_time_limit(-1);
     //echo "<br> ring $r has $kp points";
       for($p = 0; $p < $kp; $p++){
          $x = $cshp["parts"][$r]["points"][$p]["x"];
          $y = $cshp["parts"][$r]["points"][$p]["y"];
          $wkt.=$x.' '.$y;
          if($p<$kp-1)$wkt.=','; //enum vertices
          if($p%100==0)    set_time_limit(-1);
       }
       $wkt.=')'; //close ring
       if($r < $cshp["numparts"]-1)$wkt.=','; //enum rings
     }
     $wkt.='';
	 
	 
	 $sql="INSERT INTO $tn VALUES(NULL,";
    for($j=0; $j<=$field_num; $j++){
      $sql.="'".$record->dbf_data[$j]."',";
    }
    $sql.="NULL)";
    //echo $sql."...<br><br>";
    $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
    $idauto = @mysqli_insert_id($link);
    $baud=25000000;//bytes
    for($z = 0; $z < strlen($wkt)/$baud;$z++){
      $akt = substr($wkt,$z*$baud,$baud);
      $sql = "UPDATE $tn SET TRICK = '$akt' WHERE ID_AUTO = $idauto";
      //echo $sql."...<br><br>";
	  //echo substr($akt,0,9)."...<br><br>";
      $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
    }
	
	 
    }
	///// linestring end
    
	if ( (substr($akt,0,9)=='POLYGON((') || (substr($akt,0,6)=='POINT(') || (substr($akt,0,11)=='LineString(') )
	{
    $sql = "UPDATE $tn SET FEATURE = GeomFromText(TRICK) WHERE ID_AUTO = $idauto";
    }
	
	//echo substr($sql,0,100)."...<br><br>";
    $rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

    //$sql = "UPDATE $tn SET TRICK = NULL WHERE ID_AUTO = $idauto";
    //echo substr($sql,0,100)."...<br><br>";
    //$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error($link)."<br>".$sql );

    $shp->fetchNextRecord();

}
//GeomFromText('$wkt')
$sql="delete from $tn where FEATURE is null";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn DROP TRICK";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD kodetabel VARCHAR(255)  AFTER FEATURE";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD tipetabel varchar(255)  AFTER kodetabel";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD simboltabel varchar(255)  AFTER tipetabel";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );


$sql="ALTER TABLE $tn ADD fillku varchar(255)  AFTER simboltabel";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD tebalfillku varchar(255)  AFTER fillku";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD garisku varchar(255)  AFTER tebalfillku";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD tebalgarisku varchar(255)  AFTER garisku";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD labelku varchar(255)  AFTER tebalgarisku";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD teballine varchar(255)  AFTER labelku";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD tematikku VARCHAR(255)  AFTER teballine";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn ADD deleted INT(1)  DEFAULT '0' AFTER tematikku";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="ALTER TABLE $tn CHANGE FEATURE ogc_geom geometry";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );






$tempkode=$_POST['kodeid'];


$sql="update  $tn set kodetabel='".$tempkode."' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="update  $tn set simboltabel='defaultgam.png' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="update  $tn set fillku='#fd2a1a' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="update  $tn set tebalfillku='#000000' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="update  $tn set garisku='#000000' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="update  $tn set tebalgarisku='#000000' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql="update  $tn set teballine='2.5' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );


//if($shp->shp_type==1){

//echo $idauto."<br>";

//}

$sql="create table  ".$tn."_tmp_tabel (select * from $tn) ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$query="SHOW COLUMNS FROM $tn  where Field <> 'ID_AUTO' and Field <> 'ogc_geom' and Field <> 'kodetabel' and Field <> 'simboltabel' and Field <> 'fillku' and Field <> 'tebalfillku' and Field <> 'garisku' and Field <> 'tebalgarisku' and Field <> 'labelku' and Field <> 'teballine' and Field <>'tematikku' and Field <>'deleted' ";
$hasil=mysqli_query($link,$query);
if ($hasil)
{
$fiellf="";

	while ($data=mysqli_fetch_array($hasil))
	{
		$fiellf=$fiellf.$data['Field']."|";
		
	}
	//echo $fiellf."<br>";
}

for($x=0; $x<$idauto; $x++){
	
	$temo=explode("|",$fiellf);
	$counttemo=count($temo);
	for($b=0; $b<$counttemo-1; $b++){
		
	
	
			$ccccc=$idauto-$x;
			$dddddd=$ccccc-1;
			
			if ($ccccc==1)
			{
				//echo $ccccc." ";
				//echo " asas <br>";
				//echo "update $tn set ".$temo[$b]."= '' where ID='".$ccccc."' <br>";
				$sql="update $tn set ".$temo[$b]."= '' where ID_AUTO='".$ccccc."' ";
				$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
			}
			else
			{
				//echo $ccccc." ";
				//echo $dddddd."<br>";
				//echo "update $tn set ".$temo[$b]."= (select ".$temo[$b]." from tmp_tabel where ID='".$dddddd."') where ID='".$ccccc."' <br>";
				$sql="update $tn set ".$temo[$b]."= (select ".$temo[$b]." from ".$tn."_tmp_tabel where ID_AUTO='".$dddddd."') where ID_AUTO='".$ccccc."' ";
				$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );
			}
			
	}
}


$aditabel=array();
$sq="SHOW COLUMNS FROM $tn where Field <> 'ogc_geom' and Field <> 'kodetabel' and Field <> 'tipetabel' and Field <> 'simboltabel' 
and Field <> 'fillku' and Field <> 'tebalfillku' and Field <> 'garisku' and Field <> 'tebalgarisku' and Field <> 'labelku'
and Field <> 'teballine' and Field <> 'ID_AUTO'";
$res=mysqli_query($link,$sq);
if ($res)
{
	while ($row=mysqli_fetch_array($res))
	{
		array_push($aditabel,$row['Field']);
	}
}

$sq1="select min(ID_AUTO) as ID_AUTO from $tn";
$res1=mysqli_query($link,$sq1);
if ($res1)
{
	while ($row1=mysqli_fetch_array($res1))
	{
		$kodeaditabel=$row1['ID_AUTO'];
	}
}

/* load the required classes */
require_once "phpxbase/Column.class.php";
require_once "phpxbase/Record.class.php";
require_once "phpxbase/Table.class.php";

/* buat object table dan buka */
$table = new XBaseTable($file2);
$table->open();

$row = 1;
echo "<table>";
while ($record=$table->nextRecord()) {
	echo "<tr>";
	foreach ($table->getColumns() as $i=>$c) {
	    if ($row==1)
		{
		//echo "<td>".$record->getObject($c)."<br>".$aditabel[$i]."</td>";
		$sq2="update $tn set ".$aditabel[$i]."='".$record->getObject($c)."' where ID_AUTO='".$kodeaditabel."' ";
		$res2=mysqli_query($link,$sq2);
		}
	}
	$row++;
	echo "</tr>";
} //end while
echo "</table>";
$table->close();

$sql="update  $tn set tipetabel='".$shp->shp_type."' ";
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$sql = "DROP TABLE IF EXISTS ".$tn."_tmp_tabel; " ;
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

$tempisitabel=explode("|",$isitabel);
$jumtempisitabel=count($tempisitabel);
//echo "Jumlah= ".$jumtempisitabel."<br>";
if ($jumtempisitabel==0)
{
	$fixisitabel=$isitabel."|".$tn;
}

else if ($jumtempisitabel==1)
{

		$fixisitabel=$isitabel."|".$tn;

}


else
{

	for ($x = 1; $x <= $jumtempisitabel-1; $x++) {
	
		//echo $isitabel."<br>";
		//echo $tempisitabel[$x]."=".$tn."<br>";
		//echo $isitabel."<br>";
		
		if ($tempisitabel[$x]<>$tn)
		{
			$fixisitabel=$isitabel."|".$tn;
		}
		else
		{
			$fixisitabel=$isitabel;
		}
	
	}

}

$sql = "update one_peta set tabel='".$fixisitabel."' where id='".$_POST['kodeid']."'; " ;
$rz = @mysqli_query($link,$sql)    or die("EMPTY RESULT. Process may have finished ".mysqli_error()."<br>".$sql );

if (!file_exists('foto/'.$tn)) {
    mkdir('foto/'.$tn, 0777, true);
}

?>
<script>

	alert(" Data Telah Terupload..");
	document.location.href="<?php echo "m_map.php" ; ?>";
</script>