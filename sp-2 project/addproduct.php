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
  $price=$_POST["price"];
  $catid=$_POST["catid"];
  $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);
  $img_des = "upload/".$name.".".$img_ext;
  
  move_uploaded_file($img_loc,"upload/".$name.".".$img_ext);

  $query = "INSERT INTO `products`( `name`, `dis`, `price`, `cat_id`, `image`) VALUES ('$name','$dis','$price','$catid','$img_des')"; 
  $result = mysqli_query($con,$query);
}


  
?>
  <?php


?>










	

    <h1 align="center" style="font-family: 'Zen Dots', cursive;">Add product</h1>



  
  
  <div>
  <form method="POST" action=" " name="myform"style="min-height: 70vh;"onsubmit="return validateForm()" enctype="multipart/form-data">
    <fieldset>
    <legend align="center" style="font-size: 2.0em; font-family: 'Zen Dots', cursive;">fill this</legend>

   
    
    <table cellpadding="6" width="30%"  align="right"cellspacing="25" style="padding: 16px 414px;">
    <tr id="name" align="center">
      <td><b>NAME</b></td>
      <td>
      	<input type="text"  maxlength="11" name="name" size="30"  style="border-radius: 7px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="dis" align="center">
      <td><b>DESCRIPTION</b></td>
      <td>
      	<textarea  name="dis" rows="6" cols="32" style="border-radius: 7px;"></textarea><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="price" align="center">
      <td><b>PRICE</b></td>
      <td>
      	<input type="text" maxlength="20" name="price" size="30"style="border-radius: 7px;"><br><b><span style="color: whitesmoke;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="catid" align="center">
      <td><b>CATEGORY ID</b></td>
      <td>
      	<select name="catid" class="form-control" required="1" style="border-radius: 27px;"  >
                  <option value="" selected disabled >
                    -Select category number-
                  </option>
                  <option value="1">
                    1
                  </option>
                  <option value="2">
                    2
                  </option>
                  <option value="3">
                    3
                  </option>

                </select>
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
          <td><input style="background-color: red;color: white;padding: 10px 28px; font-size: 16px; border-radius:15px;font-family: 'Zen Dots', cursive; " type="Submit" name="submit" value="Add product"></td>
        </tr>
      
  </table>




    

        
    
    

        
    
</fieldset>

</form>
</div>


  
 


        
    




  

  

</body>

<script>
	// function clearErrors(){
	// 	errors=document.getElementsByClassName('formerror');
	// 	for(let item of errors)
	// 	{
	// 		item.innerHTML="";
	// 	}
	// }
	// function seterror(id,error) {
	// 	element = document.getElementById(id);
	// 	element.getElementsByClassName('formerror')[0].innerHTML = error;
		
	// }

	// function validateForm(){
	// 	var returnval = true;
	// 	clearErrors();
	// 	var name = document.forms['myform']['name'].value;
	// 	if(name.length<5){
	// 		seterror("name","*Length of name is too short");
	// 		returnval= false;
	// 	}
	// 	if(name.length==0){
	// 		seterror("name","*Please fill up the name");
	// 		returnval= false;
	// 	}
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


	// 	return returnval;

	// }
</script>
</body>
</html>