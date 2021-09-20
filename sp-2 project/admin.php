<?php
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
	header("location:admin.php");
	exit();
}
?>


<?php

include 'navber.php';
 include 'sidebar.html';
?>



<!DOCTYPE html>
<html>
<head>
	<title>welcome  - <?php echo $_SESSION['usernameadmin']?></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<body>

	<legend align="center" style="font-size: 2.0em; padding: 50px 5px;" >Hello - <?php echo $_SESSION['usernameadmin']?></legend>
   <legend align="center" style="font-size: 4.0em; padding: 50px 5px;" >welcome to E-GROCERY</legend>

 

</body>
</html>

<?php 
// include 'footer.php' 
?>