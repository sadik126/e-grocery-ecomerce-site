<?php
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
	header("location:adminlogin.php");
	exit();
}
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	   <?php 
   include 'navber.php';
   //include 'sidebar.html'; 
   include 'config.php';
?>



<?php
include 'config.php';
$name = $_GET['name'];
  $msql="select * from orders where name='$name' ";
  $result = mysqli_query($con,$msql);
  while($row=mysqli_fetch_assoc($result)){

echo'
 <form method="POST" action="" name="myform" onsubmit="return validateForm()">
     <h1 align="center">Check this information</h1>
    
    <legend align="center" style="font-size: 2.0em">For delivery</legend>

   
    <div align="center">

<table cellpadding="3" width="50%" bgcolor="white" align="center"cellspacing="15">
    <tr id="name">
      <td>NAME</td>
      <td>
        <input type="text" maxlength="15" name="name" size="30" value="'.$row['name'].'"  style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="email">
      <td>Phone</td>
      <td>
        <input type="text" name="phone" size="30" value="'.$row['phone'].'" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="username">
      <td>Address</td>
      <td>
        <input type="text" maxlength="20" name="address" value="'.$row['address'].'" size="30"style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

     <tr id="date">
      <td>DATE OF BIRTH</td>
      <td>
        <input type="Datetime" name="date" size="30"  value="'.$row['time'].'" style="border-radius: 7px;padding: 2px 60px;"><b><span style="color: red;" class="formerror"></span></b>
       </td>
      </tr>


    <tr id="password">
      <td>Payment mode</td>
      <td>
        <input type="text" name="pmode" size="30" value="'.$row['pmode'].'" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>


      <tr id="password">
      <td>Products</td>
      <td>
        <input type="text" name="products" size="30" value="'.$row['products'].'" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>  


      <tr id="password">
      <td>Amount paid</td>
      <td>
        <input type="text" name="amount" size="30" value="'.$row['amount_paid'].'" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr> 

      <tr id="password">
      <td>Delivery id</td>
      <td>
        <input type="text" name="id" size="30" value="'.$row['id'].'" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr> 


 
  

    
  

    
        <tr>
          <td></td>
          <td><input style="background-color: #277b8e;color: white;padding: 10px 28px; font-size: 16px; border-radius:15px;" type="Submit" name="updatedata" value="Delivered">

           
          </td>
        </tr>
      
  </table>
</form>
</div>';}

 ?>


  <?php
  if(isset($_POST['updatedata']))
  {
    $name=$_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $datetime = $_POST['date'];
    $pmode = $_POST['pmode'];
    $products = $_POST['products'];
    $amount = $_POST['amount'];
    $id = $_POST['id'];

      $showerror1= false;


    $sql1="select * from delivery where  product_id='$id'";
    $result = mysqli_query($con,$sql1);
    $num = mysqli_num_rows($result);

     if($num > 0){

      $showerror1= true;
    }
    else{
    $sql="insert into delivery(name,phone,address,pmode,products,amount_paid,product_id,datetime) value ('$name','$phone','$address','$pmode','$products','$amount','$id','$datetime')";
    $run=mysqli_query($con,$sql);
    if($run)
    {
       echo'<script>alert("data updated")</script>';
      //echo "data updated";
    }
    else
    {
      // echo'<script>alert("data not updated")</script>';
      echo "sorry.try again";
    }

  }
}


  ?>

  <?php

 if(!empty($showerror1))
{
echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Sorry!</h4>
  <p> this order  already exists</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}

  ?>


    


<br>


</body>

<script>
  // function clearErrors(){
  //   errors=document.getElementsByClassName('formerror');
  //   for(let item of errors)
  //   {
  //     item.innerHTML="";
  //   }
  // }
  // function seterror(id,error) {
  //   element = document.getElementById(id);
  //   element.getElementsByClassName('formerror')[0].innerHTML = error;
    
  // }

  // function validateForm(){
  //   var returnval = true;
  //   clearErrors();
  //   var name = document.forms['myform']['name'].value;
  //   if(name.length<5){
  //     seterror("name","*Length of name is too short");
  //     returnval= false;
  //   }
  //   if(name.length==0){
  //     seterror("name","*Please fill up the name");
  //     returnval= false;
  //   }
  //   var email = document.forms['myform']['email'].value;
    
  //   var pattern =   /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    
  //     if(email.match(pattern))
  //     {
  //     // seterror("email","*valid email");
  //     returnval= true;
  //     }
  //     else
  //     {
  //     seterror("email","*invalid email");
  //     returnval= false;
  //     }
  //   if(email.length<3){
  //     seterror("email","*Length of email is too short");
  //     returnval= false;
  //   }
  //   if(email.length==0){
  //     seterror("email","*Please fill up the email");
  //     returnval= false;
  //   }
  //   var username = document.forms['myform']['username'].value;
  //   if(username.length>10){
  //     seterror("username","*Length of name is too long");
  //     returnval= false;
  //   }
  //   if(username.length==0){
  //     seterror("username","*Please fill up the username");
  //     returnval= false;
  //   }
  //   var date = document.forms['myform']['date'].value;
    
    
  //   if(date.length==0){
  //     seterror("date","*Please fill up the date");
  //     returnval= false;
  //   }
    
  //   var password = document.forms['myform']['password'].value;
    
    
        
  //       if (password.length < 3)
  //       {

        
  //       seterror("password", "*Password should be atleast 3 characters long!");
  //       returnval = false;
  //       }
  //   if(password.length==0)
  //   {
  //     seterror("password","*Please fill up the password");
  //     returnval= false;
  //   }

  


  //   return returnval;

  // }
</script>
</body>
</html>