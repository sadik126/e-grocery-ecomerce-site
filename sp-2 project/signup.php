
<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
  
  <link rel="stylesheet" type="text/css" href="regestration.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
</head>
<body>
<?php include 'header.php' ?>

  <?php 
// $name = $email = $username = $dateofbirth = $password="";
// $nameErr = $emailErr = $usernameErr = $dateofbirthErr = $passwordErr="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{

 
  include'config.php';
  $name=$_POST["name"];
  $email=$_POST["email"];
  $username=$_POST["username"];
  $dateofbirth=$_POST["date"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  
  $gender=$_POST["gender"];
  
  $showAlert =false;
  $showerror = false;
   $showerror1 = false;
   

 //   if(empty($_POST["name"])){
 // 	$nameErr="Name is required";
 // }

  // $con=mysqli_connect("localhost","root","","egrocery");
  $existSql = "select * from customers where username = '$username'";

  $result = mysqli_query($con,$existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    $showerror1= true;
  }
  else{
  

   if(($password==$cpassword) )
  {

    $sql="insert into customers(name,email,username,dateofbirth,password,gender) value ('$name','$email','$username','$dateofbirth','$password','$gender')";
    $result = mysqli_query($con,$sql);

    if($result)
    {
      $showAlert =  true;
      
    }
  }
  else
  {
    $showerror = true;
  

    }

  }

}
  


  
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
echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Sorry!</h4>
  <p> username already exists</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}





?>










	
	

	




   



  
  
  
<div class="container-fluid bg-primary text-light py-3">
    <h1 align="center" style="font-family: 'Zen Dots', cursive;">WELCOME TO REGESTRATION</h1>



  
  
  
  <form method="POST" action="" name="myform" style="min-height: 70vh;" onsubmit="return validateForm()">
    <fieldset>
    <legend align="center" style="font-size: 2.0em; font-family: 'Zen Dots', cursive;">Fill Up the Form Carefully</legend>

   
    
    <table cellpadding="3" width="50%"  align="center"cellspacing="15">
    <tr id="name">
      <td><b>NAME</b></td>
      <td>
      	<input type="text" maxlength="11" name="name" size="30"  style="border-radius: 7px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="email">
      <td><b>EMAIL</b></td>
      <td>
      	<input type="text" name="email" size="30" style="border-radius: 7px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="username">
      <td><b>USERNAME</b></td>
      <td>
      	<input type="text" maxlength="20" name="username" size="30"style="border-radius: 7px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="date">
      <td><b>DATE OF BIRTH</b></td>
      <td>
      	<input type="Date" name="date" size="30" min="1953-01-01" max="1999-01-01" style="border-radius: 7px;padding: 2px 60px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="password">
      <td><b>PASSWORD</b></td>
      <td>
      	<input type="text" name="password" size="30" style="border-radius: 7px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr> 


    <tr id="cpassword">
      <td><b>CONFIRM PASSWORD</b></td>
      <td>
      	<input type="text" name="cpassword" size="30" style="border-radius: 7px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="gender">
      <td><b>GENDER</b></td>
      <td><input type="radio" name="gender" value="Male" size="30" >Male
      <input type="radio" name="gender" value="Female" size="30" >Female
      <input type="radio" name="gender" value="Other" size="30" >Other
       
    </td>

    </tr>
    <br>

    
  

    
        <tr>
          <td></td>
          <td><input style="background-color: red;color: white;padding: 10px 28px; font-size: 16px; border-radius:15px;font-family: 'Zen Dots', cursive; " type="Submit" name="submit" value="SIGN UP"></td>
        </tr>
      
  </table>



  
    


    

        
    
    

        
    
</fieldset>

</form>



  
 


        
    




  

  

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
   
		if(name.length<5){
			seterror("name","*Length of name is too short");
			returnval= false;
		}
   
		if(name.length==0){
			seterror("name","*Please fill up the name");
			returnval= false;
		}
    var correct = /^[A-Za-z]+$/;
    if(name.match(correct)){
      returnval=true;
    }
    else
    {
      seterror("name","*Only alphabets are allowed");
      returnval= false;
    }
		var email = document.forms['myform']['email'].value;
    
    var pattern =   /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		
    
      if(email.match(pattern))
      {
      // seterror("email","*valid email");
      returnval= true;
      }
      else
      {
      seterror("email","*invalid email");
      returnval= false;
      }
    if(email.length<3){
      seterror("email","*Length of email is too short");
      returnval= false;
    }
		if(email.length==0){
			seterror("email","*Please fill up the email");
			returnval= false;
		}
		var username = document.forms['myform']['username'].value;
		if(username.length>10){
			seterror("username","*Length of name is too long");
			returnval= false;
		}
		if(username.length==0){
			seterror("username","*Please fill up the username");
			returnval= false;
		}
		var date = document.forms['myform']['date'].value;
		
		
		if(date.length==0){
			seterror("date","*Please fill up the date");
			returnval= false;
		}
		
		var password = document.forms['myform']['password'].value;
		
		
        
        if (password.length < 3)
        {

        
        seterror("password", "*Password should be atleast 3 characters long!");
        returnval = false;
        }
		if(password.length==0)
		{
			seterror("password","*Please fill up the password");
			returnval= false;
		}

		 var cpassword = document.forms['myform']['cpassword'].value;
         if (cpassword != password)
         {
        seterror("cpassword", "*Password and Confirm password should match!");
        returnval = false;
         }
         
        if(cpassword.length==0)
        {
			seterror("cpassword","*Please fill up the  confirm password");
			returnval= false;
		}


		return returnval;

	}
</script>
</html>
<br>
</div>
<?php include 'footer.php' ?>


<!-- -->