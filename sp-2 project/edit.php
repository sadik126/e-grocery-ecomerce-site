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
   include 'sidebar.html'; 
   include 'config.php';
?>


<?php
include 'config.php';
  $msql="select * from admin where username='$_SESSION[usernameadmin]'";
  $result = mysqli_query($con,$msql);
  while($row=mysqli_fetch_assoc($result)){

echo'
 <form method="POST" action="" name="myform" onsubmit="return validateForm()">
     <h1 align="center">EDIT YOUR PROFILE</h1>
    
    <legend align="center" style="font-size: 2.0em">Fill this box</legend>

   
    <div align="center">

<table cellpadding="3" width="50%" bgcolor="white" align="center"cellspacing="15">
    <tr id="name">
      <td>NAME</td>
      <td>
        <input type="text" maxlength="15" name="name" size="30" value="'.$row['name'].'"  style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="email">
      <td>EMAIL</td>
      <td>
        <input type="text" name="email" size="30" value="'.$row['email'].'" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="username">
      <td>USERNAME</td>
      <td>
        <input type="text" maxlength="20" name="username" value="'.$row['username'].'" size="30"style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="date">
      <td>DATE OF BIRTH</td>
      <td>
        <input type="Date" name="date" size="30" min="1953-01-01" max="1999-01-01" value="'.$row['dateofbirth'].'" style="border-radius: 7px;padding: 2px 60px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="password">
      <td>PASSWORD</td>
      <td>
        <input type="text" name="password" size="30" value="'.$row['password'].'" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr> 


   

    <tr id="gender">
      <td>GENDER</td>
      <td><input type="radio" name="gender" value="Male" checked="'.$row['gender'].'" size="30" >Male
      <input type="radio" name="gender" value="Female" size="30" >Female
      <input type="radio" name="gender" value="Other" size="30" >Other
       
    </td>
    </tr>

    
  

    
        <tr>
          <td></td>
          <td><input style="background-color: #277b8e;color: white;padding: 10px 28px; font-size: 16px; border-radius:15px;" type="Submit" name="updatedata" value="EDIT PROFILE"></td>
        </tr>
      
  </table>
</form>
</div>';}

 ?>


  <?php
  if(isset($_POST['updatedata']))
  {
    $username=$_POST['username'];
    $sql="update admin set name='$_POST[name]',email='$_POST[email]',dateofbirth='$_POST[date]',password='$_POST[password]',gender='$_POST[gender]'where username='$_POST[username]'";
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


  ?>
    


<br>


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

  


    return returnval;

  }
</script>
</body>
</html>