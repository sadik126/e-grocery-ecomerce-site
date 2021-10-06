 



 <?php

require'config.php';

$grand_total = 0;
$allItems = '';
$items = [ ];

$sql = "SELECT CONCAT (name,'(',qty,')') AS ItemQty,total FROM cart";

$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
	$grand_total+=$row['total'];
	$items[]=$row['ItemQty'];
}
$allItems = implode(",",$items);
// echo $allItems;
?>
<?php

include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
    
     
 


</head>
 <style >
  body{
    min-height: 100vh;
  }
</style>
<body>



<?php

  include 'config.php';
  $msql="select * from customers where username='$_SESSION[username]'";
  $result = mysqli_query($con,$msql);
  while($row=mysqli_fetch_assoc($result)){

  $username = $row['username'];

 };
 ?>





<div class="container" style="min-height: 85vh;">
	<div class="row justify-content-center">
		<div class="col-lg-6 px-4 pb-4" id="order">
			<h4 class="text-center text-info p-2">Complete your order</h4>
			<div class="jumbotron p-3 mb-2 text-center">
				<h6 class="lead"><b>product(s): </b> <?=$allItems; ?> </h6>
				<h6 class="lead"><b>Delivery charge: </b> Free </h6>
				<h5><b>Amount payable:</b><?=number_format( $grand_total,2 )?> ৳</h5>
				<form action="" method="post" id="placeorder"   >
					<input type="hidden" name="products" value="<?=$allItems; ?>">
					<input type="hidden" name="grand_total" value="<?=$grand_total; ?>">
					<h6 class="text-center lead">Your name</h6>
					<div class="form-grup">
						<input type="name" name="name" class="form-control" value="<?=$username; ?>"  placeholder="Enter your name" required="1" >
					</div>
           <h6 class="text-center lead">Enter your phone number</h6>
					<div class="form-grup">
						<input type="text" name="phone" class="form-control"  placeholder="Enter your number" required="1">
					</div>
					<h6 class="text-center lead">Enter your address</h6>
					<div class="form-grup">
						<textarea name="address"  class="form-control" rows="3" cols="12" placeholder="Enter your address" required="1" >
					    </textarea>
					  </div>
					    <h6 class="text-center lead">Select payment mode</h6>
					    <div class="form-grup">
					    	<select name="pmode" class="form-control" required="1">
					    		<option value="" selected disabled>
					    			-Select payment mode-
					    		</option>
					    		<option value="cod">
					    			Cash on delivery
					    		</option>
					    		<option value="netbanking">
					    			Online banking
					    		</option>
					    		<option value="cards">
					    			debit/credit
					    		</option>

					    	</select>
					    </div>

					    <div class="form-grup">
					    	<input type="submit" name="submit" value="place Order" class="btn btn-danger btn-block">
					    	
					    </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

  	$("#placeorder").submit(function(e){
     e.preventDefault();
     $.ajax({
       url:'action.php',
       method:'post',
       data: $('form').serialize()+"&action=order",

        success:function(response){
              $("#order").html(response);
          }
     });
     	
  	});



  		
    
    load_number();
        
function load_number(){
        $.ajax({
          url:'action.php',
          method:'get',
          data:{cartItem:"cart_item"},
          success:function(response){
              $("#cart-item").html(response);
          }
        });




          
       }

  });


        </script>


               

  <?php include 'footer.php' ?>