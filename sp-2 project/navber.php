




<!DOCTYPE html>
<html>
<head>
	<title>navigation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

<link rel="stylesheet" media="screen and (max-width:1320px)" href="phone.css">
	

	<style>
		.navber{
			background-color: #009688;
			border-radius: 20px;
			/*display: flex;*/
			margin: 1px -9px;
			opacity: 0.95;
			flex-direction: column;

			

		}
		.navber ul{
			overflow: auto;
		}
		.navber li{
			float: right;
			list-style: none;
			margin: 18px 8px;

		}
		.navber li a{
		   display: block;
	       padding: 4px 1px;
	       text-decoration: none;
	       font-size: 18px;
	       color: white;
	       font-family: 'Open Sans', sans-serif;
		}

		.navber li a:hover{
		 
	       
	       color: black;
		}
		/*.search{
			float: right;
			padding: 18px 22px;
			border-radius: 4px;

		}*/

	/*	.navber input {
			border: 4px solid;
			border-radius: 14px;
			padding: 5px 15px;
			width: 183px;
		}
*/
        .logo{
        	float: left;
        	color: white;
        	padding: 1px 8px;
        	font-size:10px;
        	
        	

        	
        }
        .logo h1{
        	font-family: Georgia, serif;
        	font-size: 25px;
        	letter-spacing: 4px;
        	font-weight: bold;
        }

        .logo span{
        	color: red;
        	font-weight: bold;
        }
       
	</style>
		
</head>
<body>
	<header>
		<nav class="navber">

			

			<ul>
				<div class="logo" ><h1>E <span>GROCERY</span></h1></div>


				<!-- <li><a href="about.php"><i class="fa fa-home" aria-hidden="true"></i> ABOUT US</a></li>
				<li><a href="contact.php"><i class="fa fa-home" aria-hidden="true"></i> CONTACT</a></li> -->
				<li><a href="logoutadmin.php"><i class="fa fa-sign-in" aria-hidden="true"></i> LOG OUT</a></li>
				<li><a href="show profile.php"><i class="fa fa-sign-out" aria-hidden="true"></i> PROFILE</a></li>
				<!-- <li><a href="addproduct.php"><i class="fa fa-sign-out" aria-hidden="true"></i> ADD PRODUCT</a></li> -->
				<li><a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> DASHBOARD</a></li>
				<li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i><?php echo $_SESSION['usernameadmin']?> </a></li>

				<!-- <li ><p  class="text-dark my-0 mx-2">welcome &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['usernameadmin']?></p></li> -->

				

				<!-- <div class="search">
				<input type="text" name="search" placeholder="search here">
				
			    </div> -->
				

			</ul>

			
		</nav>
	</header>
 
</body>
</html>
