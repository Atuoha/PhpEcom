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
<h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-id-card-o fa-fw"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> Edit User</span></h5>
</div>

<form method="post" enctype="multipart/form-data">

		<?php

				if(isset($_GET['edituser'])){
					$edit_id =  $_GET['edituser'];

					$query_pull_user_det = mysqli_query($conn,"SELECT * FROM user WHERE user_id  = '$edit_id' ");

					if(!$query_pull_user_det){
						die("Error " . mysqli_error($conn));
					}

					while ($row = mysqli_fetch_array($query_pull_user_det)) {
						$db_id = $row['user_id'];
						$db_username = $row['username'];
						$db_fname = $row['firstname'];
						$db_lastname = $row['lastname'];
						$db_email = $row['email'];
						$db_role = $row['user_role'];
						$db_passport = $row['passport'];
						$db_pass = $row['password'];

					}
				}




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


			

					if(!empty($user_img) && empty($role) ){
					move_uploaded_file($temp_img, "user_imgs/$user_img");
                 
                 $query_user_update = mysqli_query($conn,"UPDATE user SET username = '$uname',firstname = '$fname', lastname = '$lname', email = '$mail', passport = '$user_img', password = '$password_hash' WHERE user_id = '$edit_id' ");

                 	if(!$query_user_update){
                 		die("Error" .  mysqli_error($conn));
                 	}

                 	header("location:users.php");

                 }elseif (empty($user_img) && !empty($role)) {
                 	$query_user_update = mysqli_query($conn,"UPDATE user SET username = '$uname',firstname = '$fname', lastname = '$lname', email = '$mail', user_role = '$role', password = '$password_hash' WHERE user_id = '$edit_id' ");

                 	if(!$query_user_update){
                 		die("Error" .  mysqli_error($conn));
                 	}


					header("location:users.php");

				}elseif (!empty($user_img) && !empty($role)) {
					$query_user_update = mysqli_query($conn,"UPDATE user SET username = '$uname',firstname = '$fname', lastname = '$lname', email = '$mail',  passport = '$user_img', user_role = '$role', password = '$password_hash' WHERE user_id = '$edit_id' ");

                 	if(!$query_user_update){
                 		die("Error" .  mysqli_error($conn));
                 	}


					header("location:users.php");

				}elseif(empty($user_img) && empty($role))
				{
					$query_user_update = mysqli_query($conn,"UPDATE user SET username = '$uname',firstname = '$fname', lastname = '$lname', email = '$mail', password = '$password_hash' WHERE user_id = '$edit_id' ");

                 	if(!$query_user_update){
                 		die("Error" .  mysqli_error($conn));
                 	}
                 	header("location:users.php");
				}else{
					header("location:users.php");
				}


				

				
			}

		?>

<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Username</b> <i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($db_username)) echo $db_username ?>" name="uname" placeholder="Enter Username">
	</div>	

	<div class="input-field">
		<h6><b>Firstname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($db_fname)) echo $db_fname ?>" name="fname" placeholder="Enter Firstname">
	</div>	

		<div class="input-field">
		<h6><b>Lastname</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($db_lastname)) echo $db_lastname ?>" name="lname" placeholder="Enter Lastname">
	</div>	

	<div class="input-field">
		<h6><b>Role</b><i class="material-icons right">card_membership</i></h6>


<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field" >
    <select value="<?php echo $db_role ?>" name="role" class=" icons">
			<option disabled selected><?php if(isset($db_role)) echo $db_role ?></option>
    		<option>Admin</option>
    		<option>Subscriber</option>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->

	</div>


	<div class="input-field">
		<h6><b>Email</b><i class="material-icons right">mail</i></h6>
		<input type="mail" class="validate" value="<?php if(isset($db_email)) echo $db_email ?>" id="cat-input" name="email" placeholder="Enter Email">
	</div>	


	</div>



	<div class="col l6 s12">


		<div class="input-field">
		<h6><b>Password</b><i class="material-icons right">lock</i></h6>
		<input type="password" id="cat-input" value="<?php if(isset($db_pass)) echo $db_pass ?>" name="pass" placeholder="Enter Password">
	</div>	
	
	

		<div class="input-field">
			<p><img class="responsive-img" width="200px;" src="user_imgs/<?php echo $db_passport ?>"></p>
		<h6><b>User Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" value="<? if(isset($db_passport)) echo $db_passport ?>" name="user_img"  id="cat-input">
	</div>	

	

	<div class="input-field">
		<!-- <button type="submit" id="pst-btn" name="draft_btn" class="yellow accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Draft Product</button> -->

		<button type="submit" id="pst-btn" name="user_btn" class=" green accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">create</i>Edit User</button>
	</div>




	</div>
	




</div>


</form>	



</div>	
</div>