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
			<div class="col-sm-9">
				<form class="form-horizontal" role="form" method="POST" action="search_details.php">
					<div class="form-group">
                        <label class="col-sm-4 control-label">Enter Name:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"  type="text" name="name" id="name">
                        </div>
                    </div>
                    <label class="set-or">or</label>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Enter Registration Number:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" type="tel" name="RegNo" id="RegNo">
                        </div>
                    </div>
                    <label class="set-or">or</label>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Enter Team ID:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" type="text" name="teamID" id="teamID">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-4 control-label"></label>
                        <div class="col-sm-5">
                            <button class="btn btn-primary" value="submit">Search</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
<?php include_once("footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>



						