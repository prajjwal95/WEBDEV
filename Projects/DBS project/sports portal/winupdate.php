<?php

$dbc=mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die('cant connect:');

$sport = $_POST['sport'];
$teamid = $_POST['teamid'];
$pos = $_POST['pos'];
$poserr = "";
$iderror = "";

if ($pos>3 || $pos<1) {
	$poserr ="Please enter position 1 ,2 or 3";
}
$query = "";
if ($sport =='Football') {
	$query="SELECT * FROM Football WHERE teamID = '$teamid'";				
}
if ($sport =='Basketball') {
	$query="SELECT * FROM Basketball WHERE teamID = '$teamid'";				
}

$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
if (mysqli_num_rows($result)==0) {
	$iderror="No such team";
}
$done = "";
if (empty($poserr) && empty($iderror)) {
	$query = "INSERT INTO winners VALUES('".$sport."','".$teamid."','$pos')";
	$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	if ($result) {
		$done = "Updated";	
	}
	else {
		$done = "sorry, please try again";
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="css/mystyles.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap-social.css" rel="stylesheet">
	<title>Winners Update</title>
</head>
<body>
	<?php include_once("header.php") ?>
	<div class="container gap"> 
		<?php include_once("menu.php") //occupies 2 col ?>
			<div class="col-sm-10"> 
				<form action="winupdate.php" method="post">
					<div class="col-sm-4">		                 
		                      <label class="label-name">Sport</label>		                 
		                  <br>		                  
		                      <select class="form-control" name="sport">
								<option  value="Football">Football</option>
								<option  value="Basketball">Basketball</option>
							   </select>		                  
	              	</div>  
					<div class="col-sm-4">		                  
		                      <label class="label-name">Team-ID</label>	<br>	                 	                 
		                      <input class="form-control" type="text" name="teamid" required placeholder="TEAM ID">        

	              	</div>  
	              	<div class="col-sm-4">		                  
		                      <label class="label-name">Position</label><br>	                 	                 
		                      <input class="form-control" type="tel" min="1" max="3" name="" required placeholder="TEAM ID">	                 
	              	</div>  
					<div class="col-sm-6">
						<br>
						<button value="submit" class="col-sm-3 btn btn-primary">Update</button>
						<?php
		                      if(!empty($iderror)){
		                      		echo '  <label style="color:red;"><b>'.$iderror.'</b></label><br> ';		                      	
		                      }
		                      if (!empty($poserr)) {
		                      		echo '  <label style="color:red;"><b>'.$poserr.'</b></label> ';
		                      }
		                      echo '  <label style="color:green;"><b>'.$done.'</b></label> ';
		                      ?>
					</div>
				</form>
			</div>
	</div>
	<?php include_once("footer.php") ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
