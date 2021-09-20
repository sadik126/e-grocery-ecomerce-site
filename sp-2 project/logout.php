<?php
include'config.php'; 
if(isset($_GET['clear'])){
$stmt=$con->prepare("DELETE FROM cart");
$stmt->execute();
header("location:home.php");}
session_start();
session_unset();
session_destroy();

exit;
?>
