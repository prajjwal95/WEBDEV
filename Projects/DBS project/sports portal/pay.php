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
	<title>Team Registration</title>
</head>
<body>
	<?php include_once("header.php") ?>
	<div class="container gap"> 
		<?php include_once("menu.php") //occupies 2 col ?>
			<div class="col-sm-10"> 
				<?php
				session_start();
					$newteamID = $_SESSION['teamID'];
					$alldelegate = $_SESSION["alldelegate"];
					$gender = $_SESSION["gender"];
					$sport = $_SESSION["sport"];
					$dbc = $dbc=mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die("can't connect");
					if ($sport == "football") {
						$query = "INSERT INTO Football (teamID,gender,delegate_numbers) VALUES ('".$newteamID."','".$gender."' ,'".$alldelegate."')";
					}
					elseif ($sport == "basketball") {
						$query = "INSERT INTO Basketball (teamID,gender,delegate_numbers) VALUES ('".$newteamID."','".$gender."' ,'".$alldelegate."')";
					}

					$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
					if($result)
					{
						?>
						<div class="col-sm-4 col-sm-push-2">
						Team ID is 
						<?php
						echo $newteamID;?>
						</div>
						<?php
					}
					else{
						?>
						<div class="col-sm-4 col-sm-push-2">
						<?php
						echo "failed";
						?>
						</div>
						<?php
					}
					session_unset();
					session_destroy();
				?>
			</div>
		</div>
	<?php include_once("footer.php") ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>