<!DOCTYPE html>
<html>
<head>
	<title>Covid Tracker</title>
</head>
<body>
<?php
$data=file_get_contents('https://api.covid19india.org/data.json');
$res= json_decode($data,true);
?>
	<div style="text-align: center; font-size: 35px;">
		<p>Corona Patient State Wise Result</p>
	</div>
		<?php $i=0; 
		echo "<div style='font-size:30px;'>Total Cases In India</div><br>Confirmed: ".$res['statewise'][$i]['confirmed']."<br>Active Cases: ".$res['statewise'][$i]['active']."<br>Total Deaths: ".$res['statewise'][$i]['deaths']."<br>Recovered Patients: ".$res['statewise'][$i]['recovered']."<br>Last Updated Time: ".$res['statewise'][$i]['lastupdatedtime']."<br><br>";
	?>	
<?php

$i=1;
while($i<38){
	echo "<div style='font-size:30px;'>".$res['statewise'][$i]['state']."</div><br>Confirmed: ".$res['statewise'][$i]['confirmed']."<br>Active Cases: ".$res['statewise'][$i]['active']."<br>Total Deaths: ".$res['statewise'][$i]['deaths']."<br>Recovered Patients: ".$res['statewise'][$i]['recovered']."<br>Last Updated Time: ".$res['statewise'][$i]['lastupdatedtime']."<br><br>";
	$i++;
}
?>
</body>
</html>

