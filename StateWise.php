<?php
$data=file_get_contents('https://api.covid19india.org/data.json');
$res= json_decode($data,true);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Covid Tracker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style type="text/css">
	.tableFixHead{ 
		overflow-y: auto; 
		height: 100px; 
	}
.tableFixHead thead th { 
	position: sticky; 
	top: 0; 
}
table  { 
	border-collapse: collapse; 
	width: 100%; 
}
th{ 
	background:#fff; 
}
</style>
</head>
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="index.php" style="font-family: 'Noto Sans JP',sans-serif; height: 40px;"><img src="https://image.flaticon.com/icons/svg/2760/2760147.svg" alt="Coronavirus free icon" title="Coronavirus free icon" style="width: 30px; height: 30px;"> Corona Tracker</a>
</nav>
	<div class="container" style="text-align: center;padding-top: 20px; padding-left: -50px; margin-top: 10px; padding-right: 60px">
		<div class="page-header" style="font-family: 'Heebo', sans-serif;"><h1>Overview</h1></div><br><br>
	<div class="row">
		<div class="card text-white bg-primary mb-3 ml-auto" style="width:250px; height: 150px; max-width: 28rem; font-size: 40px; background-color: #21D4FD;
background-image: linear-gradient(19deg, #21D4FD 17%, #B721FF 96%); border:none; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 10px 20px #21D4FD; border: none;
"><p>Confirmed</p><p style="margin-top: -20px; "><?php echo $res['statewise'][0]['confirmed']; echo "<br><p style=' margin-top:-15px; font-size:15px;'><i class='fa fa-arrow-up' aria-hidden='true' style='color:red'></i>"." ".$res['statewise'][0]['deltaconfirmed']."</p>"?></p></div>
		<div class="card text-white bg-primary mb-3 ml-auto" style="max-width: 18rem; width:250px; height: 150px; font-size: 40px; border:none; background-color: #f7c4d8;
background-image: linear-gradient(0deg, #f7c4d8 17%, #e0f17f 96%); box-shadow: 0 10px 20px rgba(0,100,0,0.19), 0 10px 20px #e0f17f;
"><p>Active</p><p style="margin-top: -20px;"><?php echo $res['statewise'][0]['active']; ?></p></div>
		<div class="card text-white bg-primary mb-3 ml-auto" style="max-width: 18rem; width:250px; height: 150px; font-size: 40px; border:none;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 10px 20px #ff2525; background-image: linear-gradient(180deg, #FF2525 17%, #ffa6af 96%);
"><p>Deaths</p><p style="margin-top: -20px;"><?php echo $res['statewise'][0]['deaths'];  echo "<br><p style=' margin-top:-15px; font-size:15px;'><i class='fa fa-arrow-up' aria-hidden='true' style='color:red'></i>"." ".$res['statewise'][0]['deltadeaths']."</p>" ?></p></div>
		<div class="card text-white bg-primary mb-3 ml-auto" style="max-width: 18rem; width:250px; height: 150px; font-size: 40px; background-color: #94c1af;
background-image: linear-gradient(0deg, #94c1af 17%, #2AF598 90%); border:none; box-shadow: 0 10px 20px rgba(16,14,18,.2), 0 6px 20px #2AF598;
"><p>Recovered</p><p style="margin-top: -20px;"><?php echo $res['statewise'][0]['recovered']; echo "<br><p style=' margin-top:-15px; font-size:15px;'><i class='fa fa-arrow-up' aria-hidden='true' style='color:green'></i>"." ".$res['statewise'][0]['deltarecovered']."</p>"?></p></div>
	</div>
	<div style="float: right;" >Last Updated at <?php echo $res['statewise'][0]['lastupdatedtime']; ?></div><br>
	</div><br><br>	
<?php

$i=1;
?>
<div>
		<div class="card col-md-8 mx-auto" style="width: 500px; margin: 20px; background-image: linear-gradient(18deg, #52ACFF 25%, #FFaC 100%); border-radius: 10px;
">
    <div class="card-body text-center">
      <p class="card-text" style="font-size: 40px; font-family: 'Roboto Mono', monospace; color: #424343">State Wise</p>
  </div>
</div>
<table class="table table-hover table-bordered text-center tableFixHead " style="width: 800px; margin: auto; width: 75%;">
	<thead>
    <tr>
      <th scope="col">Rank</th>
      <th scope="col">State Name</th>
      <th scope="col">Confirmed</th>
      <th scope="col">Active</th>
      <th scope="col">Deaths</th>
      <th scope="col">Recovered</th>
      <th scope="col">Last Update</th>
    </tr>
  </thead>
  <tbody>
<?php 
while($i<38){
	echo "<tr><th scope='row'>".$i."</th><td>".$res['statewise'][$i]['state']."<td>".$res['statewise'][$i]['confirmed']."</td><td>".$res['statewise'][$i]['active']."</td><td>".$res['statewise'][$i]['deaths']."</td><td>".$res['statewise'][$i]['recovered']."</td><td>".$res['statewise'][$i]['lastupdatedtime']."</td></tr>";
	$i++;
}
?>
</tbody>
</table>


</body>

</html>

