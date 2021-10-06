
<?php 

session_start();


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add product</title>
</head>
<body>

<style >
 table{
  padding: 10px 10px;
  align-items: center;
  
  float: center;
 }
</style>
   <?php 
   include 'navber.php';
    include 'sidebar.html'; 
    ?>

  <?php 



  $con=mysqli_connect("localhost","root","","egrocery");
if(isset($_POST['submit'])){
  
  $img_loc = $_FILES['image']['tmp_name'];
  $img_name = $_FILES['image']['name'];
  $name = $_POST['name'];
  $dis=$_POST["dis"];
  
  $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);
  $img_des = "category/".$name.".".$img_ext;
  
  move_uploaded_file($img_loc,"category/".$name.".".$img_ext);


  $showAlert =false;
  $showerror = false;
   $showerror1 = false;
   
   $existSql = "select * from categories where name = '$name'";

  $result = mysqli_query($con,$existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    $showerror1= true;
  }

  else{

  $query = "INSERT INTO `categories`( `name`, `dis`, `image`) VALUES ('$name','$dis','$img_des')"; 
  $result = mysqli_query($con,$query);
}
}

  
?>
  <?php


?>

  <?php
  if(!empty($showAlert))
{
echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Your account has been created</p>
  <hr>
  <p class="mb-0">You can log in now.</p>
</div>';
}
if(!empty($showerror))
{
echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Sorry!</h4>
  <p>Password did not matched  or fill the all items</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}

if(!empty($showerror1))
{
echo'<div class="alert alert-danger" role="alert" align="center">
  <h4 class="alert-heading">Sorry!</h4>
  <p> category already exists</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}





?>










	

    <h1 align="center" style="font-family: 'Zen Dots', cursive;">Add category</h1>



  
  
  <div>
  <form method="POST" action=" " name="myform"style="min-height: 70vh;"onsubmit="return validateForm()" enctype="multipart/form-data">
    <fieldset>
    <legend align="center" style="font-size: 2.0em; font-family: 'Zen Dots', cursive;">fill this</legend>

   
    
    <table cellpadding="6" width="30%"  align="right"cellspacing="25" style="padding: 16px 414px;">
    <tr id="name" align="center">
      <td><b>NAME</b></td>
      <td>
      	<input type="text"  maxlength="11" name="name" size="30"  style="border-radius: 7px;"><br><b><span style="color: indianred;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="dis" align="center">
      <td><b>DESCRIPTION</b></td>
      <td>
      	<textarea  name="dis" rows="6" cols="32" style="border-radius: 7px;"></textarea><br><b><span style="color: indianred;" class="formerror"></span></b>
      </td>
    </tr>


   

   

   <div>
   	<td align="center"><b>IMAGE</b></td>
   	<td align="center">
   	<input  type="file" name="image">
   	</td>
   </div>

  
   
    <br>

    
  

    
        <tr>
          <td></td>
          <td><input style="background-color: skyblue;color: black;padding: 10px 28px; font-size: 16px; border-radius:15px;font-family: 'Zen Dots', cursive; " type="Submit" name="submit" value="Add category"></td>
        </tr>
      
  </table>




    

        
    
    

        
    
</fieldset>

</form>
</div>


  
 


        
    




  

  

</body>

<script>
	function clearErrors(){
		errors=document.getElementsByClassName('formerror');
		for(let item of errors)
		{
			item.innerHTML="";
		}
	}
	function seterror(id,error) {
		element = document.getElementById(id);
		element.getElementsByClassName('formerror')[0].innerHTML = error;
		
	}

	function validateForm(){
		var returnval = true;
		clearErrors();
		var name = document.forms['myform']['name'].value;
    var correct = /^[A-Za-z]+$/;
		if(name.length<5){
			seterror("name","*Length of name is too short");
			returnval= false;
		}
     if(name.match(correct)){
      returnval=true;
    }
    else
    {
      seterror("name","*Only alphabets are allowed");
      returnval= false;
    }
		if(name.length==0){
			seterror("name","*Please fill up the name");
			returnval= false;
		}

			var dis = document.forms['myform']['dis'].value;
		if(dis.length<5){
			seterror("dis","*Length of description is too short");
			returnval= false;
		}
		if(dis.length==0){
			seterror("dis","*Please fill up the description");
			returnval= false;
		}
	// 	var email = document.forms['myform']['email'].value;
    
 //    var pattern =   /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		
    
 //      if(email.match(pattern))
 //      {
 //      // seterror("email","*valid email");
 //      returnval= true;
 //      }
 //      else
 //      {
 //      seterror("email","*invalid email");
 //      returnval= false;
 //      }
 //    if(email.length<3){
 //      seterror("email","*Length of email is too short");
 //      returnval= false;
 //    }
	// 	if(email.length==0){
	// 		seterror("email","*Please fill up the email");
	// 		returnval= false;
	// 	}
	// 	var username = document.forms['myform']['username'].value;
	// 	if(username.length>10){
	// 		seterror("username","*Length of name is too long");
	// 		returnval= false;
	// 	}
	// 	if(username.length==0){
	// 		seterror("username","*Please fill up the username");
	// 		returnval= false;
	// 	}
	// 	var date = document.forms['myform']['date'].value;
		
		
	// 	if(date.length==0){
	// 		seterror("date","*Please fill up the date");
	// 		returnval= false;
	// 	}
		
	// 	var password = document.forms['myform']['password'].value;
		
		
        
 //        if (password.length < 3)
 //        {

        
 //        seterror("password", "*Password should be atleast 3 characters long!");
 //        returnval = false;
 //        }
	// 	if(password.length==0)
	// 	{
	// 		seterror("password","*Please fill up the password");
	// 		returnval= false;
	// 	}

	// 	 var cpassword = document.forms['myform']['cpassword'].value;
 //         if (cpassword != password)
 //         {
 //        seterror("cpassword", "*Password and Confirm password should match!");
 //        returnval = false;
 //         }
         
 //        if(cpassword.length==0)
 //        {
	// 		seterror("cpassword","*Please fill up the  confirm password");
	// 		returnval= false;
	// 	}


		return returnval;

	 }
</script>
</body>
</html>