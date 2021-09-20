

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	
</head>
 <style >
    .container{
      min-height: 70vh;
    }
  </style>

<body>

   <?php
   include'config.php';
 ?>
 <?php
   include'header.php';
 ?>


  <div class="container my-3">

    <h1 class="text-center">Search results for "<?php echo $_GET['search']?>"</h1>

   <?php
     $noResult= true;
    $con=mysqli_connect("localhost","root","","egrocery");
    $query= $_GET["search"];
    $sql= "SELECT * FROM `products` WHERE name LIKE '%$query%'";
    $result=mysqli_query($con,$sql);
    
    while($row=mysqli_fetch_assoc($result))
    {
     
      $name = $row['name'];
      $dis = $row['dis'];
      $id = $row['id'];
      $noResult=false;
     
      echo '<div class="result">

         <h3 class="py-2"><a href="product.php?product='.$id.'" class="text-dark">'.$name.'</a></h3>
         <p>'.$dis.'</p>
         </div>';
    }


   if($noResult){
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-6">No result found</h1>
    <p class="lead"><b>type the valid keywords</b>.</p>
  </div>
</div>';
 }




   ?>


  <!--   <div class="result">

      <h3 class="py-2"><a href="/catagories/jjps" class="text-dark">other problem</a></h3>

  </div> -->


  </div>





   <?php

   include'footer.php';

   ?>

   

  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>