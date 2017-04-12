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
	<title>Football Men</title>
</head>
<body>
	<?php include_once("header.php") ?>
	<div class="container gap">
		<?php include_once("menu.php") //occupies 2 col ?>
		<div class="col-sm-10 row">
				<?php
				session_start();
				//getting the array of inpus
				$delegatemen = $_POST['delegatemen'];
				$check;
				$newdelnumber = 0;
				$fault;
				$number = sizeof($delegatemen);
				//checking if the entered delegate numbers are all belonging to female gender
				foreach($delegatemen as $value) {
					$check=validate_delegate($value);
					if($check == 0 || $check== -1)
						{	$fault=$value;
							break;}
				}
				if($check == 0)
				{
					echo "One delegate card has Female category ->".$fault;
				}
				elseif ($check == -1) {
					echo "delegate card does not exist ->".$fault;
				}
				elseif($check == 1){ 
					$newteamID="";
					$alldelegate = "";//get all delegate as one string;
					foreach($delegatemen as $value) {
						$alldelegate = $alldelegate.$value;
						$alldelegate = $alldelegate.',';
					}
					//generating new delegate number
					$dbc=mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die("can't connect");
					$query1 = "SELECT * FROM Football";
					$result1 = mysqli_query($dbc,$query1) or die(mysqli_error($dbc));

					while ($row = mysqli_fetch_array($result1)) {
						if($row['teamID'][0]=='F')
							$newdelnumber++;
					}
					$newdelnumber+=1000;
					$newteamID = "FB".$newdelnumber; //the new delegate number

					$_SESSION['teamID']=$newteamID;
					$_SESSION['alldelegate']=$alldelegate;
					$_SESSION['gender']='male';
					$_SESSION['sport']='football';
					?>
					<div class="col-sm-4 col-sm-push-1">
					<form action="pay.php" method="POST"> 
						<label>Total cost is 800 </label>
						<button value="submit">Pay</button>
					</form>
					</div>
					<?php

				}

				function validate_delegate($delegate)
				{
					$con=mysqli_connect("localhost","root","Dattu@3121","RevelsTest")or die("can't connect");
					$query = "SELECT * FROM delegate_card_generation";
					$result = mysqli_query($con,$query) or die("hello");
					while ($row = mysqli_fetch_array($result)){
						if ($delegate == $row['delegate_number'] && $row['Gender']=="male") {
							return 1;
						}
						elseif ($delegate == $row['delegate_number'] && $row['Gender']=="female") {
							return 0;
						}
					}
					return -1;//not present... if one is false...ask new registration
				}

				?>
		</div>
	</div>
<?php include_once("footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>				
