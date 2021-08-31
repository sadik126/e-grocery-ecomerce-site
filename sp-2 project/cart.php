<?php

include 'header.php';

include 'config.php';

// session_start();

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
	<div class="container">
		<div class="row justify-content-center">
    <div class="col-lg-10" >
       <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else {echo'none';}unset($_SESSION['showAlert']);?>" class="alert alert-success alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];}unset($_SESSION['message']);?></strong> 
      </div>
      <div class="table-responsive mt-2" >
        <table class="table table-bordered table-striped text-center  " >
         <thead>
            <tr>
            <td colspan="7">
              <h4 class="text-center text-success m-0" >
                Products in your cart
              </h4>
            </td>
          </tr>
          <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity(Per KG)</th>
            <th>Total price</th>
            <th>
              <a href="action.php?clear=all" class="badge-danger badge p-2" onclick="return confirm('Are you sure to clear all cart items?');"><i class="fa fa-trash"></i> &nbsp;Clear cart</a>
            </th>
          </tr>
         </thead>
         <tbody>
           <?php
           require 'config.php';
           $stmt = $con->prepare("SELECT * FROM cart");
           $stmt->execute();
           $result= $stmt->get_result();
           $grand_total=0;
           while($row = $result->fetch_assoc()):
           ?>
           <tr>
             <td><?=$row['name']?></td>
             <input type="hidden" class="pid" value="<?=$row['id']?>">
             <td><img src="<?=$row['image']?>" width="50"></td>
             <td><?=$row['price']?> BDT</td>
             <td><input type="number"class="form-control itemQty" value="<?=$row['qty'] ?>" style="width:80px; height:40px;"></td>
             <td><?=$row['total']?> BDT</td>
             <input type="hidden" class="pprice" value="<?=$row['price']?>">
             <td><a href="action.php?remove=<?=$row['name'] ?>" class="text-danger lead p-2" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="width:80px;"></i></a></td>
           </tr>
           <?php $grand_total += $row['total']; ?>
         <?php endwhile; ?>
         <tr>
           <td colspan="2">
             <a href="products.php" class="btn btn-success"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp; Continue shopping</a>
           </td>
           <td colspan="2"><b>Grand total</b></td>
           <td><?=$grand_total?> BDT</td>
           <td><a href="checkout.php" class="btn btn-warning <?=($grand_total>1)?"":"disabled"?>"><i class="fa fa-credit-card"></i>Check out</a></td>
         </tr>
         </tbody>
        </table>
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

<?php

include 'footer.php';

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>