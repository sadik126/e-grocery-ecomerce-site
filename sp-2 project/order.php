<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- 	<style type="text/css">
		table{
			
			width: 80%;
			color: black;
			font-size: 20px;
			text-align: right;
			
		}
	</style> -->
</head>
<body>

	<?php 
   include 'navber.php';
    include 'sidebar.html'; 
    ?>

	<!-- <table border="10" cellpadding="10"  style="padding: 16px 503px;">
		<tr>
			
			<th>Name</th>
			<th>phone</th>
			<th>Address</th>
			<th>Payment mode</th>
			<th>Products</th>
			<th>Amount paid</th>
			<!- <th>Delete</th> -->
		<!-- </tr> -->
		<?php
		// $con= mysqli_connect("localhost","root","","egrocery");
  //         $sql="SELECT * FROM `orders`";
  //         $result=mysqli_query($con,$sql);

  //         while($row=mysqli_fetch_assoc($result)){
  //         echo"<tr><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td><td>".$row["pmode"]."</td><td>".$row["products"]."</td><td>".$row["amount_paid"]."৳</td></tr>";
  //      }
  //      echo"</table>";
		?>
		
	<!-- </table -->> -->
	<div class="col-lg-8 m-auto">

	<form method="post">
		<div class="card">
			<div class="card-header bg-light">

				<h1 class="text-dark text-center "> Orders</h1>
				<br>
				<div class="container">
				    <div class="col-lg-12 ">

				      <table class="table table-striped table-hover table-bordered ">
				      	<tr class="bg-primary text-light text-center">
				      		<th>Name</th>
			               <th>phone</th>
			               <th>Address</th>
			               <th>Payment mode</th>
			               <th>Products</th>
			               <th>Amount paid</th>
				      		<th >Delete</th >
				      	</tr>
                        <?php
                         include 'config.php';
                         $query= "select * from orders";
                         $result =mysqli_query($con,$query);
                         while($row=mysqli_fetch_assoc($result)){
                        echo '
                         
                         




                        
				          <tr class="text-center">
				      		 <th>'.$row["name"].'</th>
				      		<th>'.$row["phone"].'</th>
				      		<th>'.$row["address"].'</th>
				      		<th>'.$row["pmode"].'</th>
				      		<th>'.$row["products"].'</th>
				      		<th>'.$row["amount_paid"].'</th>
				      		
				      		<th><button class="btn btn-danger"><a href="action.php?cut='.$row["name"].'" style="color: white;" >Delete</a></button></th>
				      	</tr>';
				         };
				      	?>
				      </table>
						
					</div>
				</div>
				
			</div>
		</div>
	</form>
	
</div>

</body>
</html>