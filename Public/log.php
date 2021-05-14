<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>E-COMM LOGS</title>
<!-- <link rel="stylesheet" href="bootstrap4/css/">-->
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/demos.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="iconfont/material-icons.css">
    <link rel="icon" href="image/cart.png" />
    <script src="javascript/jquery-2.1.3.min.js"></script>
    <script src="javascript/materialize.min.js"></script>
    <script src="javascript/main.js"></script>
    </head>

    <?php ob_start();?>
    <?php include "../Resources/config.php";?>
     <?php include "Admin/function.php";?>
<body>
	<header class="hide-on-med-and-down" id="log_header">					
	</header>

	<div class="container">

	<div class="container" id="log_div">


	<div class="center-align">	
	<img src="image/cd.png">	
	</div>



	<ul id="tabs-swipe-demo" class="tabs brown-text">
	    <li class="tab col s3 "><a  href="#test-swipe-2"><b>Register</b></a></li>
	    <li class="tab col s3 "><a class="active" href="#test-swipe-1"><b>Login</b></a></li>
   
  </ul>


<!-- LOGIN SECTION -->
  <div id="test-swipe-1" class="col s12 ">

<br>



<p class="center-align deep-orange-text text-lighten-3"><b>Login</b></p>
  		
		

		<form method="post" action="#test-swipe-1">

			<?php login_user() ?>


			<div class="row">
			<div class="input-field">
				<input type="text" name="username" id="user" placeholder="Username">
				<label class="lab" for="user"><i class="material-icons " >account_circle</i></label> 
			</div>	

			

			<div class="input-field">
				<input type="password" name="password" id="user" placeholder="********">
				<label class="lab" for="user"><i class="material-icons " >lock</i></label> 
			</div>
      <a href="#" class="brown-text"><b>Forgot password?<b></a>	



			<div class="input-field right-align">
				<button type="submit" id="abc" name="log_btn" class=" deep-orange lighten-3 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Login</button> 

        
			</div>
	</form>



			</div>
			</div>


			



  <div id="test-swipe-2" class="col s12 ">
<br>











<p class="center-align deep-orange-text text-lighten-3"><b>Register</b></p>


	

		<form   method="post" action="#test-swipe-2" enctype="multipart/form-data">

				<?php register_user();?>

			<div class="row">

			<div class="col m6 s12">

			<div class="input-field">
				<input type="text" name="user" id="user" placeholder="Username" autocomplete="on">

				<label class="lab" for="user"><i class="material-icons " >account_circle</i></label> 
			</div>	

			<div class="input-field">
				<input type="email" name="mail" id="user" placeholder="Email">
				<label class="lab" for="user"><i class="material-icons " >mail</i></label> 
			</div>	
			

			<div class="input-field">
				<input type="password" name="pass" id="user" placeholder="********">
				<label class="lab" for="user"><i class="material-icons " >lock</i></label> 
			</div>	
			</div>	


			<div class="col m6 s12">
			
				<div class="input-field">
				<input type="text" name="fname" id="user" placeholder="First Name">
				<label class="lab" for="user"><i class="material-icons " >assignment_ind</i></label> 
			</div>	

			<div class="input-field">
				<input type="text" name="lname" id="user" placeholder="Last Name">
				<label class="lab" for="user"><i class="material-icons " >assignment_ind</i></label> 
			</div>	
			

			<div class="input-field right-align">
			<button type="submit" id="abc" name="btn_reg" class=" deep-orange lighten-3 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Register</button> 
			</div>

			</div>	
			

		
		</div>	
	</div>	
</form>
</div>
</div>





</body>
</html>
