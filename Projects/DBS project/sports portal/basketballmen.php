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
	<title>Basketball Men</title>
</head>
<body>
	<?php include_once("header.php") ?>
	<div class="container gap">
		<?php include_once("menu.php") //occupies 2 col ?>
		<div class="col-sm-10 row">
			<ol class="breadcrumb">
			    <li><a href="#">Team Registration</a></li>			         
			    <li class="active">Basketball-Men</li>
			</ol>
			<div class="col-sm-4 col-sm-push-1"><!-- for number of people -->
				<div class="row row-content">
					<div>
						<label class="heading">Enter number of people</label>
					</div>
					<form action="basketballmen.php" method="POST">
						<input class="form-group" type="tel" name="players" >
						<br>
						<button class="btn btn-primary" value="submit">Next</button>
					</form>
				</div>
				<div class="gap"> 
					<form action="BBRegMen.php" method="POST">
							<?php
								$players = $_POST['players'];
								$delegatemen = array();
								if($players>5)
									echo "Maximum 5 players!";
								else{
								?>

								<?php
								for ($i=0; $i <$players ; $i++) { 
									if ($i==0) {
										?>
										<label>Enter delegate numbers:</label><br>
										<?php 
									}
							
									?>
									<label><?php echo ($i+1).'.'; ?></label><input class="form-group left-pad" type="text" name="delegatemen[]"><br>
									<?php
									if ($i==($players-1)) {
										?>
									<button class="btn btn-primary" value="submit">Next</button>
									<?php
									}
								}
							}
							?>
					</form>
				</div>
			</div>
			<div class="col-sm-3 col-sm-push-4">
				<form action="usingIDBBallMen.php" method="POST">
					<label class="heading">Enter Team-ID</label><br>
						<input class="form-group" type="text" name="teamID">
						<br>
						<button class="btn btn-primary" value="submit">Next</button>
				</form>
			</div>
		</div>
	</div>
<?php include_once("footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>


