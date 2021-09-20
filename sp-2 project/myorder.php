




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>orders</title>
</head>
<body>

	<?php

	include"header.php";



	?>

	<div class="col-lg-8 m-auto"  style="min-height: 85vh;">
 	<div class="card">
 		<div class="card-header bg-light">

 			<h1 class="text-dark text-center  bg-danger"><b> MY ORDERS</b></h1>

 			<br>
 			<div class="container">
 				<div class="col-lg-12">

 					<?php

                     include"config.php";

                      $sql="select * from orders where name='$_SESSION[username]'";
                      $result = mysqli_query($con,$sql);
                       $num = mysqli_num_rows($result);
                      if($num>0){
                      
                      while($row=mysqli_fetch_assoc($result)){

                      	echo'
                         
                           <tr class="bg-dark text-light text-center">
				      		 <td><b> Name:</b>&nbsp;&nbsp;&nbsp;  '.$row["name"].'</td>
				      		 <br>
				      		 <td><b> Phone:</b>&nbsp;&nbsp;&nbsp; '.$row["phone"].'</td>
				      		 <br>
				      		 <td><b> Address:</b>&nbsp;&nbsp;&nbsp; '.$row["address"].'</td>
				      		 <br>
				      		 <td><b> Payment mode:</b>&nbsp;&nbsp;&nbsp; '.$row["pmode"].'</td>
				      		 <br>
				      		 <td><b> Products and amount:</b>&nbsp;&nbsp;&nbsp; '.$row["products"].'</td>
				      		 <br>
				      		 <td><b> Payment:</b>&nbsp;&nbsp;&nbsp; '.$row["amount_paid"].'</td>
				      		 <br>
				      		 <br>
				      		 <br>
				      		
				      		<td><button class="btn btn-success"><a href="action.php?dil='.$row["products"].'" style="color: white;" >Delete orders</a></button></td>
				      		<br>
				      	</tr>
                        

                      	';

                      }
                  }

                  else
                  	 echo"<h1> No orders</h1>";

 					?>

 					
 				</div>
 				
 			</div>
 			
 		</div>
 		
 	</div>
 	
 </div>


</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
     $(".itemQty").on('change',function(){
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      // console.log(qty);
      $.ajax({
        url:'action.php',
        method:'post',
        cache: false,
        data :{qty:qty,
          pid:pid,
          pprice:pprice},

        success:function(response){
           
          console.log(response);
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


<?php
include"footer.php";

?>
