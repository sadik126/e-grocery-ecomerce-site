<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>profile</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body{
    min-height: 100vh;
  }
  </style>
 <?php 
   include 'header.php';
   
 ?>

 <div class="col-lg-8 m-auto" style="min-height: 85vh;">
 	<div class="card">
 		<div class="card-header bg-light">

 			<h1 class="text-light text-center  bg-dark"><b> Profile</b></h1>

 			<br>
 			<div class="container">
 				<div class="col-lg-12">

 					<?php

                     include"config.php";
                      $sql="select * from customers where username='$_SESSION[username]'";
                      $result = mysqli_query($con,$sql);
                      while($row=mysqli_fetch_assoc($result)){

                      	echo'
                         
                           <tr class="bg-dark text-light text-center">
				      		 <td><b> Name:</b>&nbsp;&nbsp;&nbsp;  '.$row["name"].'</td>
				      		 <br>
				      		 <td><b> Email:</b>&nbsp;&nbsp;&nbsp; '.$row["email"].'</td>
				      		 <br>
				      		 <td><b> Username:</b>&nbsp;&nbsp;&nbsp; '.$row["username"].'</td>
				      		 <br>
				      		 <td><b> Birthdate:</b>&nbsp;&nbsp;&nbsp; '.$row["dateofbirth"].'</td>
				      		 <br>
				      		 <td><b> Gender:</b>&nbsp;&nbsp;&nbsp; '.$row["gender"].'</td>
				      		 <br>
				      		 <br>
				      		 <br>
				      		
				      		<td><button class="btn btn-success"><a href="useredit.php" style="color: white;" >Edit profile</a></button></td>
				      	</tr>
                        

                      	';

                      }

 					?>

 					
 				</div>
 				
 			</div>
 			
 		</div>
 		
 	</div>
 	
 </div>

<body>

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

	include'footer.php';

	?>