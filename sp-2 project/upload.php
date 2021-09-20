<?php


$con=mysqli_connect("localhost","root","","egrocery");
if(isset($_POST['submit'])){

	
  $name=$_POST["name"];
  $dis=$_POST["dis"];
  $price=$_POST["price"];
  $catid=$_POST["catid"];
  $image=$_FILES["image"];





$filename = $file['name'];
$fileerror = $file['error'];
$filepath = $file['tmp_name'];


if($fileerror == 0){
	$destfile = 'upload/'.$filename;
	echo"$destfile";
}
}
else{
	echo"error";
}

// $fileext = explode('.', $filename);
// $filecheck = strtolower(end($fileext));

// $fileextstored = array('png','jpg','jpeg');

// if(in_array($filecheck, $fileextstored)){
// 	$destinationfile = 'sp-2 project/'.$filename;
// 	move_uploaded_file($filetemp, $destinationfile);


// 	 $sql="insert into products(name,dis,price,catid,image) value ('$name','$dis','$price','$catid','$destinationfile')";
//     $result = mysqli_query($con,$sql);
// }

// }



?>
