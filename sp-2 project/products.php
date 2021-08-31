
<?php

include 'header.php';
include 'config.php';

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
  <div class="container my-4 ">

    <div id="message"></div>

<h2 class="text-center my-3" style="font-family: 'Noto Sans JP', sans-serif;">Products</h2>

<div class="row my-4 " id="cat" >


    <?php
    $con=mysqli_connect("localhost","root","","egrocery");
    $sql= "SELECT * FROM `products` ";
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
    echo '<form action="" class="form-submit">
      <input type="hidden" class="pid" value="'.$id.'">
      <input type="hidden" class="pname" value="'.$cat.'">
      <input type="hidden" class="pprice" value="'.$price.'">
      <input type="hidden" class="pimage" value="'.$img.'">


 
     <a href="" class="btn btn-success" >'.number_format($row['price'],2) .' ৳</a>
     <button class="btn btn-danger addItemBtn" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart </button>
      </form>';
    }
    else
      {
     


     echo'
     <a href="" class="btn btn-success" >'.number_format($row['price'],2) .' ৳</a>
     <button class="btn btn-danger addItemBtn disabled" > <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart </button>
      ';
      }
      
     
 echo '</div>
  
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
<!--   -->
</body>
</html>


<?php

include 'footer.php';

?>