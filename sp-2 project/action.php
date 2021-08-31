<?php
 require 'config.php';  
 session_start();

 if(isset($_POST['pid'])){
 	$pid = $_POST['pid'];
 	$pname = $_POST['pname'];
 	$pprice = $_POST['pprice'];
 	$pimage = $_POST['pimage'];
 	$pqty = 1;

  




 	$stmt = $con->prepare('SELECT `name` FROM `cart` WHERE name = ? ');
	$stmt->bind_param("s",$pname);
	$stmt->execute();
	$res=$stmt->get_result();
	$r=$res->fetch_assoc();
	$name=$r['name'];

	if(!$name){
		$query=$con->prepare('INSERT INTO cart (name,price,image,qty,total)VALUES(?,?,?,?,?)');
		$query->bind_param("sssss",$pname,$pprice,$pimage,$pqty,$pprice);
		$query->execute(); 

		echo '<div class="alert alert-success alert-dismissible mt-4 justify-content-center mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> You have added your product.
</div>';

	}
	else
	{
      	echo '<div class="alert alert-danger alert-dismissible mt-4 right mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> you already added this product in your cart.
</div>';
	}
  }

  if(isset($_GET['cartItem']) && isset ($_GET['cartItem']) == 'cart-item'){
  	$stmt = $con->prepare("SELECT * FROM cart");
  	$stmt->execute();
  	$stmt->store_result();
  	$rows = $stmt->num_rows;
  	echo $rows;
  }


  if(isset($_GET['remove'])){
	$name = $_GET['remove'];

	$stmt=$con->prepare("Delete From cart WHERE name=?");
	$stmt->bind_param("s",$name);
	$stmt->execute();

	$_SESSION['showAlert']='block';
	$_SESSION['message']='Item has been removed from cart!';
	header('location:cart.php');
}



	if(isset($_GET['clear'])){
	$stmt=$con->prepare("DELETE FROM cart");
	$stmt->execute();
	$_SESSION['showAlert']='block';
	$_SESSION['message']='ALL Item has been removed from cart!';
	header('location:cart.php');

}
if(isset($_POST['qty'])){
	$qty=$_POST['qty'];
	$pid=$_POST['pid'];
	$pprice=$_POST['pprice'];
	$tprice=$qty*$pprice;

	$stmt=$con->prepare("UPDATE cart SET qty=?,total=? Where id=?");
	$stmt->bind_param("isi",$qty,$tprice,$pid);
	$stmt->execute();
}
?>
