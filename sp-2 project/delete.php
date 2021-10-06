<?php

session_start();

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php 
   include 'navber.php';
   include 'sidebar.html'; 
?>

<div class="col-lg-9 m-auto">

	<form method="post">
		<div class="card">
			<div class="card-header bg-light">

				<h1 class="text-danger text-center bg-dark"> Products</h1>
				<br>
				<div class="container">
				    <div class="col-lg-12 ">

				      <table class="table table-striped table-hover table-bordered ">
				      	<tr class="bg-dark text-light text-center">
				      		<th>Name</th>
				      		<th>Description</th>
				      		<th>price</th>
				      		<th>category id</th>
				      		<th>image</th>
				      		<th >Delete</th >
				      	</tr>
                        <?php
                         include 'config.php';
                         $query= "select * from products";
                         $result =mysqli_query($con,$query);
                         while($row=mysqli_fetch_assoc($result)){
                        echo '
                         
                         




                        
				          <tr class="text-center">
				      		 <th>'.$row["name"].'</th>
				      		<th>'.substr($row["dis"],0,60).'</th>
				      		<th>'.$row["price"].'</th>
				      		<th>'.$row["cat_id"].'</th>
				      		<th><img src="'.$row["image"].'" width="50"></th>
				      		<th><button class="btn btn-danger"><a href="action.php?delete='.$row["name"].'" style="color: white;" >Delete</a></button></th>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>