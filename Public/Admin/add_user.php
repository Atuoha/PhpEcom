<?php
	include "head.php";?>

<div  class="mainContainer">
<div class="center-align">
<h2 class="center-align">
	<img src="image/adU.png" alt="Some-image" width="170px;">
</h2>
</div>	

<div style="padding: 10px;">
<div class="panel-heading">
<h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-user-plus fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> Add User</span></h5>
</div>

<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['user_btn'])){

				$uname = mysqli_real_escape_string($conn,$_POST['uname']);
				$fname = mysqli_real_escape_string($conn,$_POST['fname']);
				$lname = mysqli_real_escape_string($conn,$_POST['lname']);
				$role = mysqli_real_escape_string($conn,$_POST['role']);
				$mail = mysqli_real_escape_string($conn,$_POST['email']);
				$pass = mysqli_real_escape_string($conn,$_POST['pass']);
				$user_img = $_FILES['user_img']['name'];
				$temp_img = $_FILES['user_img']['tmp_name'];


				$password_hash = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 12));


				$query_pull_email = mysqli_query($conn,"SELECT email FROM user WHERE email = '$mail' ");

				if(!$query_pull_email){
					die("Error " . mysqli_error($conn));
				}

				$count_mail = mysqli_num_rows($query_pull_email);

				if($count_mail == 0){

					if(!empty($uname && $fname && $lname && $role && $pass && $user_img && $mail)){
					move_uploaded_file($temp_img, "user_imgs/$user_img");
                 
                 $query_user_insert = mysqli_query($conn,"INSERT INTO user(username,firstname,lastname,email,user_role,passport,password) VALUES('$uname','$fname','$lname', '$mail','$role','$user_img','$password_hash')");

                 	if(!$query_user_insert){
                 		die("Error" .  mysqli_error($conn));
                 	}


					echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> Kudos! You have to successfully added a user.</b></i>";



				}else
				{
					echo "<i class='red-text'><b><i class='fa fa-window-close'></i> Opps! You have to complete the form.</b></i>";
				}


				}else{
					echo "<i class='red-text'><b><i class='fa fa-window-close'></i> Opps! User already exist with same email account.</b></i>";
				}


				
			}

		?>

<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Username</b> <i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($uname)) echo $uname ?>" name="uname" placeholder="Enter Username">
	</div>	

	<div class="input-field">
		<h6><b>Firstname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($fname)) echo $fname ?>" name="fname" placeholder="Enter Firstname">
	</div>	

		<div class="input-field">
		<h6><b>Lastname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($lname)) echo $lname ?>" name="lname" placeholder="Enter Lastname">
	</div>	

	<div class="input-field">
		<h6><b>Role</b><i class="material-icons right">card_membership</i></h6>


<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field" >
    <select name="role" class=" icons">
			<option disabled selected>Select Role</option>
    		<option>Admin</option>
    		<option>Subscriber</option>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->

	</div>


	<div class="input-field">
		<h6><b>Email</b><i class="material-icons right">mail</i></h6>
		<input type="mail" class="validate" value="<?php if(isset($mail)) echo $mail ?>" id="cat-input" name="email" placeholder="Enter Email">
	</div>	


	</div>



	<div class="col l6 s12">


		<div class="input-field">
		<h6><b>Password</b><i class="material-icons right">lock</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($pass)) echo $pass ?>" name="pass" placeholder="Enter Password">
	</div>	
	
	

		<div class="input-field">
			<i class="fa fa-user fa-5x"></i>
		<h6><b>User Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" name="user_img"  id="cat-input">
	</div>	

	

	<div class="input-field">
		<!-- <button type="submit" id="pst-btn" name="draft_btn" class="yellow accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Draft Product</button> -->

		<button type="submit" id="pst-btn" name="user_btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Add User</button>
	</div>




	</div>
	




</div>


</form>	



</div>	
</div>