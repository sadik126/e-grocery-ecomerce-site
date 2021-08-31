<?php

include 'header.php';

?>



<!DOCTYPE html>
<html>
<head>
	<title>homepage</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Odibee+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>



<body>


  <div id="message"></div>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img src="img/3.jpg" style="height: 540px;weight:240px;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://image.freepik.com/free-vector/gift-voucher-template-with-discount_23-2148774852.jpg"style="height: 540px;weight:240px;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i.pinimg.com/originals/60/59/38/605938426de3675bc6fde46982b9d91e.png"style="height: 540px;weight:240px;" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class="container-fluid bg-dark text-light" style="border-radius: 24px ;">
<h1 class="text-center my-3 py-3" style="font-family: 'Noto Sans JP', sans-serif;"><i class="fa fa-list-alt" aria-hidden="true"></i>Categories</h1>
</div>
<div class=" container my-4 ">
  
<div class="row my-4  " id="cat" >

	   <!-- fetch all categories -->
    <?php
    $con=mysqli_connect("localhost","root","","egrocery");
    $sql= "SELECT * FROM `categories`";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {

    $cat=$row['name'];
    $dis=$row['dis'];
    $img=$row['image'];
    $id=$row['id'];

    echo '<div class="col-md-4 my-2  ">

      <div class="card bg-success " style="width: 18rem;">
  <img src = "'.$img.'" class="card-img-top" alt="..." style="height:150px;weight:150px;">
  <div class="card-body">
    <h4 class="card-title"><a href="catagory.php?catagory='.$id.'" style="text-decoration:none;color:white;">'.$cat.'</a></h4>
    <p class="card-text">'.substr($dis,0,90).'...</p>
    <a href="catagory.php?catagory='.$id.'" class="btn btn-dark text-light" ><b>visit this</b></a>
  </div>
</div>
      
    </div>';

}


?>


</div>
	
</div>



 <div class="container-fluid bg-primary text-light">
<h2 class="text-center my-3 py-3" style="font-family: 'Noto Sans JP', sans-serif;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Products</h2>
</div>
<div class="container my-4 ">
  
<div class="row my-4 " id="cat" >

     
    <?php
    $con=mysqli_connect("localhost","root","","egrocery");
    $sql= "SELECT * FROM `products` LIMIT 6";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {

    $cat=$row['name'];
    $dis=$row['dis'];
    $img=$row['image'];
    $id=$row['id'];
    $price=$row['price'];

    echo '<div class="col-md-4 my-2 ">

      <div class="card " style="width: 18rem;">
  <img src = "'.$img.'" class="card-img-top" alt="..." style="height:150px;weight:150px;">
  <div class="card-body">
    <h4 class="card-title"><a href="product.php?product='.$id.'" style="text-decoration:none;color:red;">'.$cat.'</a></h4>
    <p class="card-text">'.substr($dis,0,90).'...</p>';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
      { 
        echo'
      <form action="" class="form-submit">
      <input type="hidden" class="pid" value="'.$id.'">
      <input type="hidden" class="pname" value="'.$cat.'">
      <input type="hidden" class="pprice" value="'.$price.'">
      <input type="hidden" class="pimage" value="'.$img.'">

    <a href="product.php?product='.$id.'" class="btn btn-primary" >view details</a> 
    <button class="btn btn-danger addItemBtn" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart </button>
    </form>';
  }
  else
  {
     echo'
     <a href="" class="btn btn-success" >'.number_format($row['price'],2) .' ৳</a>
     <button class="btn btn-danger addItemBtn disabled" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart </button>
      ';
  }
  echo'</div>
 </div>
      
     </div>';

 }
 ?>
</div>
</div>

 <script type="text/javascript">
  $(document).ready(function(){
    $(".addItemBtn ").click(function(e){
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();


     


      $.ajax({
        url:'action.php',
        method:'post',
        data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage},
        success:function(response){
                  $("#message").html(response);
                  load_cart_item_number(); 
                  window.scrollTo(0,0);
                  // load_number();

                }
        });
                
         
       
      
      });
     load_cart_item_number(); 
   function load_cart_item_number(){
    $.ajax({
     url:'action.php',
     method:'get',
     data:{cartItem:"cart-item"},
     success:function(response){
      $("#cart-item").html(response);
     }
    });
   }

    });
</script>
         

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

</body>
</html>

<?php

include 'footer.php';

?>