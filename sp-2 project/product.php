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
<div class="container my-4">


<div id="message"></div>
  <?php
   $id=$_GET['product'];

   $showAlert=false;

   $method=$_SERVER['REQUEST_METHOD'];
   if($method=='POST'){
    //INSERT INTO DATABASE

    $th_title=$_POST['comment'];
    //$th_desc=$_POST['desc'];

    $comment = str_replace("<", "&lt;", $th_title);
    $comment = str_replace(">", "&gt;", $th_title);

    //$th_desc = str_replace("<", "&lt;", $th_desc);
    //$th_desc = str_replace(">", "&gt;", $th_desc);

    $sno=$_POST['id'];
    $sql= "INSERT INTO `comments`( `content`, `comment_by`, `thread_id`, `comment_time`) VALUES ( '$comment','$sno','$id',current_timestamp());";
    $result=mysqli_query($con,$sql);
    $showAlert=true;
    if($showAlert)
    {
      echo '<div class="alert alert-success" role="alert">
  Successfully added your question. please wait for other response.
</div>';
    }
   }

   ?>

      
  <?php

    $id=$_GET['product'];
    
    $con=mysqli_connect("localhost","root","","egrocery");
    $sql= "SELECT * FROM `products` WHERE id = '$id' ";
    $result=mysqli_query($con,$sql);
   
    while($row=mysqli_fetch_assoc($result))
    {
      $noResult = false;
      $name = $row['name'];
      $dis = $row['dis'];
      $img = $row['image'];
      $price= $row['price'];
      $id=$row['id'];
     

    }

 
   
?>







<?php
echo'
<div class="container my-4">

   <div class="jumbotron">
          
          <img src = "'. $img .'" class="card-img-top" alt="..." style="height:520px;weight:250px;">
          <!-- <p class="lead"></p> -->
          <h1 class="display-4" style="color: red;">  '.$name.' </h1>
          <hr class="my-4">
          <p> '.$dis.' 
           </p>';
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
          {echo'<p class="lead">
           
             <form action="" class="form-submit">
               <input type="hidden" class="pid" value="'. $id.'">
               <input type="hidden" class="pname" value="'. $name.'">
               <input type="hidden" class="pprice" value="'. $price.'">
               <input type="hidden" class="pimage" value="'. $img.'">
            <a class="btn btn-danger btn-lg" href="#" role="button">Price: '. $price.'৳ </a>
            <a class="btn btn-info btn-lg addItemBtn" href=" action.php?id='. $id.'" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to CART </a>
          </form>';
        }
          else
          {
            echo'<a class="btn btn-danger btn-lg" href="#" role="button">Price: '. $price.'৳ </a>
            <a class="btn btn-info btn-lg addItemBtn disabled" href=" action.php?id='. $id.'" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to CART </a>';
          }

         echo' </p>
        </div>
     </div>'; 
    
?>



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
         


          <?php 
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true ){

  echo' <div class="container">
      
      <h1 class="py-2" id="comment">Post a comment</h1>

<form action="'. $_SERVER['REQUEST_URI'].'" method="post">
  
  
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Type your comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" required="1" ></textarea>
    <input type="hidden" name="id" id="id"  value="'. $_SESSION['username'] .'">
  </div>
  <button type="submit" class="btn btn-warning">Post comment</button>
</form>
    
</div>';
}

else

 {
       echo '<div class="container">
        <h1 class="py-2" id="ques">Post e comment</h1>
        <p class="lead"> You are not logged in.please login to start your comment</p>
        </div>';
      }


  ?>
     

   <div class="container">

      <h1 class="py-2" id="comment">Comments</h1>
    </div>

    <?php

    $id=$_GET['product'];
    
    $con=mysqli_connect("localhost","root","","egrocery");
    $sql= "SELECT * FROM `comments` WHERE thread_id = '$id' ";
    $result=mysqli_query($con,$sql);
    $noResult = true;
    while($row=mysqli_fetch_assoc($result))
    {
      $noResult = false;
      $thread = $row['thread_id'];
      $content = $row['content'];
      $id = $row['id'];
      $time = $row['comment_time'];
      $comment = $row['comment_by'];
      //$user = $row['user'];
      $sql2 = "SELECT username FROM `customers` WHERE id='$comment'";
      $result2=mysqli_query($con,$sql2);
      $row2 =mysqli_fetch_assoc($result2);

   

     echo '<div class="media my-3">
      <img class="mr-3" src="https://www.pngfind.com/pngs/m/93-938050_png-file-transparent-white-user-icon-png-download.png" width="54px;" alt="Generic placeholder image">
      <div class="media-body">
      <p class="font-weight-bold my-0">'.$row['comment_by'].' at '.$time.'</p>
       '.$content.'
     </div>
     </div>';

 }
 ?>


</body>
</html>

<?php

include 'footer.php';

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>