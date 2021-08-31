<?php

include 'header.php';

include 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>category</title>
</head>
<body>
<div id="message"></div>
	  <?php

    $id=$_GET['catagory'];
    
    $con=mysqli_connect("localhost","root","","egrocery");
    $sql= "SELECT * FROM `categories` WHERE id = '$id' ";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {

      $name = $row['name'];
      $dis = $row['dis'];

     echo'<h1 class="text-center my-3" id="products">'.$name.'</h1>';
    }
   ?>





  <div class="container my-4">

        

      <h1 class="text-center my-3" id="products">products</h1>

      <div class="row my-4 mx-1">

    <?php

    $id=$_GET['catagory'];
    
    $con=mysqli_connect("localhost","root","","egrocery");
    $sql= "SELECT * FROM `products` WHERE cat_id = '$id'";
    $result=mysqli_query($con,$sql);
    $noResult = true;
    while($row=mysqli_fetch_assoc($result))
    {
      $noResult = false;
      $title = $row['name'];
      $dis = $row['dis'];
      $id = $row['id'];
      $img =$row['image'];
      $price=$row['price'];
      //$time = $row['timestamp'];

   

     echo '
      
     <div class="col-md-4 my-2">
          
      <div class="card " style="width: 18rem;">
  <img src = "'.$img.'" class="card-img-top" alt="..." style="height:150px;weight:200px;">
  <div class="card-body">
    <h4 class="card-title"><a href="product.php?product='.$id.'" style="text-decoration:none;color:red;">'.$title.'</a></h4>
    <p class="card-text">'.substr($dis,0,90).'...</p>';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)

    {
      echo'<form action="" class="form-submit">
      <input type="hidden" class="pid" value="'.$id.'">
      <input type="hidden" class="pname" value="'.$title.'">
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

    echo'
  </div>
</div>
      
    </div>';

 }


 //echo var_dump($noResult);
 if($noResult){
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-6">No result found</h1>
    <p class="lead"><b>No products available..sorry</b>.</p>
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
</body>
</html>

<?php

include 'footer.php';

?>