<?php

$host = 'locahost';
$user = 'root';
$pass = '';
$db = 'RevelsTest'; 

$newdelnumber = 0;

$dbc=mysqli_connect("localhost","root","","RevelsTest") or die('cant connect:');

$name = $_POST['name'];
$RegNo = $_POST['RegNo'];
$college = $_POST['college'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender=$_POST['gender'];

/*$nameErr = "";
$collegeErr = "";
$emailErr = "";
$phoneErr = "";

if (empty($name)) //validtaing  name
      {
      $nameErr = "Name is required";
      } 
    else 
    {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name))
     {
      $nameErr = "Only letters and white space allowed";
     }
    }
if(empty($emailid))
       {
        $emailidErr = "email-id required";
       }
    else
    {
      if(!preg_match(
        '/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email
        ))
      {
        $emailidErr = "Enter valid email-id";
      }
    }
 if (empty($college)) 
      {
      $collegeErr = "workplace is required";
      } 
    else 
    {
    if (!preg_match("/^[a-zA-Z ]*$/",$college))
     {
      $collegeErr = "Only letters and white space allowed";
     }
    } 
   if(empty($phone)) {      //validating phonenumber
    $phoneErr="Please enter a number";
    }
     else if(!is_numeric($phone)) {
    $phoneErr="invalid number";
     }
      else if(strlen($phone) != 10) {
     $phoneErr="invalid number";
     } 
     $result=false;
     $confirm=false;
  if(empty($nameErr) && empty($collegeErr) && empty($emailErr) && empty($phoneErr))
  {*/
       $query1 = "SELECT * FROM delegate_card_generation";
        $result1 = mysqli_query($dbc,$query1) or die(mysqli_error($dbc));

        while ($row = mysqli_fetch_array($result1)) {
                $newdelnumber++;
              }
          $newdelnumber+=1000;

          $query = "INSERT INTO delegate_card_generation (delegate_number,Name,RegNo,College,email,phone,Gender)VALUES (".$newdelnumber.",'".$name."','".$RegNo."','".$college."','".$email."',".$phone.",'".$gender."')";

          $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
         // $confirm = true;
  //}
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
  <title>Delegate Card Registration</title>
</head>
<body>
  <?php include_once("header.php") ?>

  <div class="container gap">
    <?php include_once("menu.php") ?>
    <div class="col-sm-6 col-sm-push-2">
    <?php echo $newdelnumber; ?>
    </div>

  </div>
  <?php include_once("footer.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
