

<?php include 'header.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
    <link rel="stylesheet" type="text/css" href="regestration.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">

</head>
<style >
  body{
    min-height: 100vh;
  }
</style>
<body >



<?php 

$login = false;
$showerror = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){

 
  include'config.php';
 
  $username=$_POST["username"];
  
  $password=$_POST["password"];
 
 
  

  

    $sql="select * from customers where username='$username'and password='$password'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    if($num > 0){

      $login =  true;
      
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
      $_SESSION['loggedin']=true;
      $_SESSION['id'] = $num['id'];
      $_SESSION['username']= $username;
      header("location:home.php");

      
    }
  
  else
  {
    

    $showerror = "please try again";
  
  }
}
  
?>
  <?php
  if($login)
{
echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>You are logged in</p>
  <hr>
  
</div>';
}
if(!empty($showerror))
{
echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Sorry!</h4>
  <p>Invalid login system</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}

   
    if($login)   
  {  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["username"] = $username;
   }  
   else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }  
   header("location:home.php"); 
  }  
  





?>



  <div class="container-fluid bg-dark text-light py-3">
  <h1 style="text-align:center; padding-top: 45px;   ">Login Here</h1>
  
  <form method="POST" action="" name="myform" style="min-height: 65vh;"  onsubmit="return validateForm()" >
    <fieldset>
    <legend align="center" style="font-size: 2.0em">Welcome to Login</legend>

   <table cellpadding="2" width="40%"  align="center"cellspacing="10">
    <tr id="username">
      <td><b>USERNAME</b></td>
      <td>
        <input type="text" id="username" name="username" size="30" style="border-radius: 6px;"  value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"><br>
        <b><span style="color: whitesmoke; font-size:15px;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="password">
      <td><b>PASSWORD</b></td>
      <td>
        <input type="text" id="password" name="password" size="30" style="border-radius: 6px;" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"><br>
        <b><span style="color: whitesmoke; font-size: 15px;" class="formerror"></span></b>
      </td>

    </tr>

     <tr>
       <td>
         <div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label>  
    </div> 
        
       </td>
     </tr>
      
     

   
       <tr>
          <td></td>
          <td><input style="background-color: orangered;color: white;padding: 10px 50px; font-size: 16px; border-radius:15px; font-family: 'Ubuntu Mono', monospace; font-size:20px; " type="Submit" name="submit" value="Login"></td>
        </tr>

        

       
  </table>

  

       <div  align="center">

    
    <span class="psw" > <a style="text-decoration: none;" href="forgetpass.php"> <span style="color: whitesmoke; padding: 5px 5px;">Forgot password?</span></a></span>
   </div>


        
    </div>
</fieldset>
</form>

<br>

<script >

  function clearErrors(){
    errors=document.getElementsByClassName('formerror');
    for(let item of errors)
    {
      item.innerHTML="";
    }
  }

  
  function seterror(id,error) 
  {
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
    
  }


  function validateForm()
  {
    var returnval = true;
    clearErrors();
    var username = document.forms['myform']['username'].value;
    if(username.length==0){
      seterror("username","*Please fill up the username");
      returnval= false;
    }
    var password = document.forms['myform']['password'].value;
    if(password.length==0)
    {
      seterror("password","*Please fill up the password");
      returnval= false;
    }



    return returnval;
  }
</script>




 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> 
</body>
</html>


<?php include 'footer.php' ?>