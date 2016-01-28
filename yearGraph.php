<?php

$start = -600;
$end = 2012;
$wScale = 5;
$vScale = 1;

if($_GET['start'] || $_['start'] === 0)
	$start = $_GET['start'];
	
if($_GET['end'] || $_['end'] === 0)
	$end = $_GET['end'];
	
if($_GET['hScale'])
	$wScale = $_GET['hScale'];
	
if($_GET['vScale'])
	$vScale = $_GET['vScale']/100;

$max = 2150; // most recorded strikes in a year: 2108

$range = $end-$start;
$width = $range*$wScale;
$height = $max *$vScale;


?>

<html>

<head>

<title>Meteorite Years</title>

<style>
	html, body{
		background: #444;
		margin:0;
		padding:0;
		border:0;
		font-family:Helvetica, sans-serif;
		font-weight:bold;
	}
	div{
		margin:0;
		padding:0;
		border:0;
	}
	.bar{
		background: #eef5ff;
		width: <?php echo $wScale ?>px;
		margin: 0;
		padding: 0;
		border: 0;
		float:left;
	}
	
	.barcontainer{
		width: <?php echo $wScale ?>px;
		height: <?php echo $height ?>px;
		margin: 0;
		padding: 0;
		border: 0;
		float:left;
	}
	.formdiv{
		float:left;
		color:white;
		font-size:medium;
		clear:both;
		margin-top:20px;
		margin-left:20px;
	}
</style>

</head>

<body>

<div class="formdiv">

<span style="font-size:24px;">meteorite strikes by year </span><br>
<br>

<form>
	<div style="float:left;margin-right:25px;">
  		Start Year:<br>
  		<input type="text" name="start" value="<?php echo $start ?>">
  	</div>
  	<div style="float:left;margin-right:25px;">
  		End Year:<br>
  		<input type="text" name="end" value="<?php echo $end ?>">
  	</div>
  	<div style="float:left;margin-right:25px;">
 		 Vertical Scale (percent):<br>
  		<input type="text" name="vScale" value="<?php echo ($vScale*100) ?>">
  	</div>
  	<div style="float:left;">
  		Horizontal Scale (pixels per year):<br>
  		<input type="text" name="hScale" value="<?php echo $wScale ?>">
  	</div><br>
  <input type="submit" value="Submit">
</form>
</div>

<div style="width:<?php echo $width ?>; height: <?php echo $height ?>px; background:#99b1cc;float:left;margin:20;padding:0;border:4px solid #fff;clear:both;">

<?php

include 'yearData.php';


// max hits = 2108;
// earliest -600
// latest 2012

$yearsOrganized = array();

foreach($years as $x){	
	if($yearsOrganized[$x]){
		$yearsOrganized[$x]++;
	} else {
		$yearsOrganized[$x] = 1;
	}
}

for($i = $start; $i <$end; $i++){
	if($yearsOrganized[$i]){
		print "<div class='barcontainer'><div class='bar' style='height:" . ($height-($yearsOrganized[$i]*$vScale)) . "px;'></div></div>";

	} else {
		print "<div class='barcontainer'><div class='bar' style='height:{$height}px;'></div></div>";
	}
}

?>

</div>

</body>
</html>