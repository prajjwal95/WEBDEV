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
	<title>Delegate Card Registration</title>
</head>
<body>
	<?php include_once("header.php") ?>

  <div class="container gap">
  	<?php include_once("menu.php") ?>
    <div class="col-sm-6 col-sm-push-2">
          <form id="delegate" class="form-horizontal" action="delcard.php" method="POST" onsubmit="return validateForm()">
              <div class="form-group">
                  <div class="col-sm-3">
                      <label>Name</label>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="text" name="name" id="name" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-3">
                      <label>Registration Number</label>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="tel" name="RegNo" id="RegNo" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-3">
                      <label>College</label>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="text" name="college" id="college" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-3">
                      <label>Email</label>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="email" name="email" id="email" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-3">
                      <label>Phone</label>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="tel" name="phone" id="phone" required>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-3">
                      <label>Gender</label>
                  </div>
                  <div class="col-sm-9">
                      	<input type="radio" class="gap" name="gender" id="gender" value="male">Male
						<input type="radio" class="gap" name="gender" id="gender" value="female">Female
						<input type="radio" class="gap" name="gender" id="gender" value="third">third
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                  </div>
                  <div class="col-sm-10">                    
                      <button class="btn btn-primary" value="Submit">Submit</button>
                  </div>
              </div>
          </form>
      </div>

      



    </div>
  <?php include_once("footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
    
    function validateForm() {
      var name = document.forms["delegate"]["name"].value;
      var RegNo = document.forms["delegate"]["RegNo"].value;
      var college = document.forms["delegate"]["college"].value;
      var phone = document.forms["delegate"]["phone"].value;
      var letters = /^[A-Za-z]+$/;  
      if (isNaN(phone)) {
        alert("Please enter a valid phone number(10 digits)");
        return false;
      }
      if(!name.value.match(letters))  
      {  
        alert("Enter a valid name");
        return false;  
      }  
      if(!colege.value.match(letters))  
      {  
        alert("Enter a valid college name");
        return false;  
      }  
      if (length(phone)!=10) {
        alert("Please enter a valid phone number(10 digits)");
      }
      if (isNaN(RegNo)) {
        alert("Enter valid RegNo");
        return false;
      }
      return true;

    }
  </script>
</body>
</html>