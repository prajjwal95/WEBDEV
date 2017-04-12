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
	//women registration
	session_start();
	$teamID = $_POST['teamID'];
	$query;
	$dbc=mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die('cant connect');
	if($teamID[0]=='F')
		{$query = "SELECT * FROM Football HAVING teamID = '$teamID'";}
	elseif($teamID[0]=='B')
		{$query = "SELECT * FROM Basketball HAVING teamID = '$teamID'";}
	$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));


		if (mysqli_num_rows($result) <= 0) {?>
			<div class="row col-sm-6 col-sm-push-2">
			<label>Tema-ID does not exist</label>
			<a href="teamreg1.php" type="button" class="btn btn-primary">New team?</a>
			<a href="footballmen.php" type="button" class="btn btn-warning">Check Again?</a>
			</div>
			<?php

		}
		elseif($teamID[0]=='F' && $result)
		{
		?>
			<div class="row col-sm-6 col-sm-push-2">
			<label>You've already registerd</label>
			</div>
		<?php
		}
		else
		{	
			$query2 = "SELECT * FROM Football HAVING teamID = '$teamID'";
			$result2 = mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

			$row = mysqli_fetch_array($result);
			$number = substr_count($row['delegate_numbers'], ",");//player count
			?>
			<br>
			<?php
			display_details($row['delegate_numbers']);
			if($number>11){?>
				<div class="row col-sm-6 col-sm-push-2">
				<label>Go back and register new team...memebers more than max size</label>	
				<a href="teamreg1.php" type="button" class="btn btn-warning">New Team</a>
				</div>
				<?php
			}
			elseif(mysqli_num_rows($result2)==1){
				?>
				<div class="row col-sm-6 col-sm-push-2">
				<label>You've already registered!</label>	
				<a href="teamreg1.php" type="button" class="btn btn-primary">New Team</a>
				</div>
				<?php
			}
			else{
				$_SESSION['sport']='Football';
				$_SESSION['gender']='male';
				$_SESSION['teamID'] = $teamID;
				$_SESSION['alldelegate'] = $row['delegate_numbers'];
				?>
				<form action="payteamID.php" method="POST"> 
				<label>Rs </label>
				<button class="btn btn-primary" value="submit">Pay</button>
				</form>
				<?php
			}
	}
	function search_details($delegate_number){
		$con = mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die('cant connect');
		$query1 = "SELECT * FROM delegate_card_generation WHERE delegate_number = '$delegate_number'";
		$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
		$row1 = mysqli_fetch_array($result1);
		//echo $delegate_number." ".$row1['Name']." ".$row1['RegNo'];
		?>
					<tr>
						<td class="col-sm-2"><?php echo $delegate_number; ?></td>
						<td class="col-sm-3"><?php echo $row1['Name']; ?></td>
						<td><?php echo $row1['RegNo']; ?></td>
					</tr>

					<?php
	}
	function display_details($delegate){
					$detail = array();
					$j=0;
				for ($i=0; $i <strlen($delegate); $i++) { 
					if($delegate[$i] == ","){
						$j++;
					}
					else
						$detail[$j] = $detail[$j].$delegate[$i];
				}
				foreach ($detail as $key ) {
						?> 
						<table class="table table-striped">
						<?php
						search_details($key);
					?>
					</table>
					<?php
				}
			}
?>
		</div>
	</div>
<?php include_once("footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

