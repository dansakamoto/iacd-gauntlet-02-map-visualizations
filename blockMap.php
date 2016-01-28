<html>

<head>

<title>block map</title>

<style>

body {
	font-family:Helvetica, sans-serif;
	font-size:5px;
	font-weight:bold;
}

</style>


</head>

<body>

<span style="font-size:24px">meteorite strikes by location</span>

<?php

$emojimode = false;

if($_GET['emojimode'] === 'true'){
	$emojimode = true;
}

include 'pointData.php';

$mapArray = array();

foreach($points as $x){
	$latPos = floor($x[0]+90);
	$lonPos = floor($x[1]+180);
	
	if($mapArray[$latPos][$lonPos]){
		$mapArray[$latPos][$lonPos]++;
	} else {
		$mapArray[$latPos][$lonPos] = 1;
	}

}

for($r = 180; $r >= 0; $r--){
	if($mapArray[$r]){
		for($c = 0; $c <= 360; $c++){
			if($mapArray[$r][$c]){
				$j = $mapArray[$r][$c] * 30;
				//$j /= 10;	// exposure setting
				//$j = max($j, 255);
				$j = 255 - $j;
				$j = max($j, 0);
				
				if($emojimode){
				
					$d = floor($j/32);
					switch($d){
						case 0:
							print "😀";
							break;
						case 1:
							print "🙂";
							break;
						case 2:
							print "😐";
							break;
						case 3:
							print "😕";
							break;
						case 4:
							print "☹️";
							break;
						case 5:
							print "😨";
							break;
						case 6:
							print "😱";
							break;
						case 7:
							print "😵";
							break;
					}
				} else {
					print "<span style='color:rgb($j,$j,$j);'>█</span>";
				}
				
			} else {
			
				if($emojimode){
				print " &nbsp;";
				} else {
					print '<span style="color:rgb(255,255,255);">█</span>';
				}
				//print '⬜️';
			}
		}
	} //else {
		//print '<span style="color:rgb(0,0,0);">X</span>';
	//}
	
	print '<br>';
}


?>


</body>

</html>