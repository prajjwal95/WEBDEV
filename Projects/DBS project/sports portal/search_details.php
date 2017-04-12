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
	<title>Search</title>
</head>
<body>
<?php include_once("header.php") ?>
	<div class="container gap"> 
		<?php include_once("menu.php") //occupies 2 col ?>
		<div class="col-sm-10 row">
			<?php
				
				$dbc=mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die('cant connect');

				$name = $_POST['name'];
				$RegNo = $_POST['RegNo'];
				$teamID = $_POST['teamID'];
				if(!empty($name))
				{
					$query1 = "SELECT * FROM delegate_card_generation WHERE Name = '$name'";
					$result1 = mysqli_query($dbc,$query1) or die(mysqli_error($dbc));
					?>
					<table class="table table-striped">
					<?php 
					if(mysqli_num_rows($result1)==0){
						echo '<div class="col-sm-3 col-sm-push-2 incorrect""><label>Not Registered!</label></div>';
					}
					else{
					while ($row = mysqli_fetch_array($result1)) {
						$delnumber = $row['delegate_number'];
						$NAME = $row['name'];
						$RegNO = $row['RegNo'];
						$College = $row['College'];
						$Phone = $row['Phone'];
						//echo $delnumber,$NAME,$RegNO,$College,$Phone;
						?>
						<tr>
							<td class="col-sm-2"><?php echo $delnumber; ?></td>
							<td class="col-sm-3"><?php echo $name; ?></td>
							<td><?php echo $row['RegNo']; ?></td>
							<td><?php echo $College; ?></td>
							<td><?php echo $Phone; ?></td>
						</tr>
						<?php
					}
				}
					?>
					</table>
					<?php
				}
				if(!empty($RegNo))
				{
					$query2 = "SELECT * FROM delegate_card_generation WHERE RegNo = '$RegNo'";
					$result2 = mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
					?>
					<table class="table table-striped">
					<?php
					if(mysqli_num_rows($result2)==0){
						echo '<div class="col-sm-3 col-sm-push-2 incorrect""><label>Not Registered!</label></div>';
					}
					else{
					while ($row = mysqli_fetch_array($result2)) {
						$delnumber = $row['delegate_number'];
						$NAME = $row['Name'];
						$RegNo = $row['RegNo'];
						$College = $row['College'];
						$Phone = $row['Phone'];
						//echo $delnumber,$NAME,$RegNo,$College,$Phone;
						?>
						<tr>
							<td class="col-sm-2"><?php echo $delnumber; ?></td>
							<td class="col-sm-3"><?php echo $row['Name']; ?></td>
							<td><?php echo $row['RegNo']; ?></td>
							<td><?php echo $College; ?></td>
							<td><?php echo $Phone; ?></td>
						</tr>
						<?php
					}}
					?>
					</table>
					<?php
				}
				if(!empty($teamID)){
					$con = $dbc=mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die('cant connect');
					if($teamID[0]=='F'){
						$query3 = "SELECT * FROM Football WHERE teamID = '$teamID'";
					}
					elseif ($teamID[0]=='B') {
						$query3 = "SELECT * FROM Football WHERE teamID = '$teamID'";
					}
					$result3 = mysqli_query($con,$query3) or die(mysqli_error($con));
					if(mysqli_num_rows($result3)==0){
						echo '<div class="col-sm-3 col-sm-push-2 incorrect""><label>Not Registered!</label></div>';
					}
					else{
					$row = mysqli_fetch_array($result3);
					display_details($row['delegate_numbers']);}
				}

				if (empty($teamID) && empty($RegNo) && empty($name)) {
					?>
					<div class="col-sm-6 col-sm-push-2">
						<p>Please enter atleast one of the three options</p>
					</div>
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
				function search_details($delegate_number){
					$connection = mysqli_connect("localhost","root","Dattu@3121","RevelsTest") or die('cant connect');
					$query1 = "SELECT * FROM delegate_card_generation WHERE delegate_number = '$delegate_number'";
					$result1 = mysqli_query($connection,$query1) or die(mysqli_error($connection));
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

			?>
		</div>
	</div>
<?php include_once("footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
