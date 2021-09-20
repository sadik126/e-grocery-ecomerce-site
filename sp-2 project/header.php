<?php
session_start();
//$_SESSION['customer']=true;

?>


<?php

include'config.php'; 

?>





<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<a href=""></a>
  

<?php
echo'
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h3><a class="navbar-brand font-weight-bold" href="home.php" ><i class="fa fa-shopping-basket"></i>&nbsp; E-<span style="color: red; ">Grocery</span></a></h3>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item dropdown">
        <a class=" nav-link dropdown-toggle " style="color: #0c6cb1;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $con= mysqli_connect("localhost","root","","egrocery");
          $sql="SELECT name, id FROM `categories`";
          $result=mysqli_query($con,$sql);

          while($row=mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $name = $row['name'];
          echo'
          <a class="dropdown-item" style="color: #0c6cb1;" href="catagory.php?catagory='.$id.'">'.$name.'</a>
         
          ';}
echo ' </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="products.php" style="color: red;">Top brands</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="myorder.php">Orders</a>
      </li>
     
    </ul>';


      
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

      echo' <form class="form-inline my-2 my-lg-0" action=find.php method=get>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <p class="text-dark my-0 mx-2">welcome <a href="userprofile.php"> '.$_SESSION['username'].'</a></p>
      
      
      <button type="button" class="btn btn-dark my-2 mx-3 active" ><a  href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-danger" id="cart-item"></span></a></button>
     
      <button type="button" class="btn btn-danger my-2 mx-3"><a href="logout.php?clear=all"style="color:#ffcccb;text-decoration:none">LOGOUT</a></button>
      
    </form>
 ';

     }

     else{
      echo'<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <button type="button" class="btn btn-danger my-2 mx-3"><a href="loginpage.php"style="color:#ffcccb;text-decoration:none">LOGIN</a></button>
      <button type="button" class="btn btn-warning my-2"><a href="signup.php"style="color:black;text-decoration:none">SIGN UP</a></button>
    </form>
  ';
     }

  echo'</div>
</nav>';
        



//     <form class="form-inline my-2 my-lg-0">
//       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
//       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
//       <button type="button" class="btn btn-danger my-2 mx-3"><a href="loginpage.php"style="color:#ffcccb;text-decoration:none">LOGIN</a></button>
//       <button type="button" class="btn btn-warning my-2"><a href="signup.php"style="color:black;text-decoration:none">SIGN UP</a></button>
//     </form>
//   </div>
// </nav>
// ';


?>




 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a3c96ebaf8.js" crossorigin="anonymous"></script>
</body>
</html>