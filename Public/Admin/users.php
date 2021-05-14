<?php
	include "head.php";
	ob_start();
?>

<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/us.png" alt="Some-image" width="150px;">
</h2>
</div>	

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-user fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> All Users</span></h5>
</div>


	<?php
	if(isset($_POST['checkedbox'])){

		foreach (($_POST['checkedbox']) as $array_input ) {
			$sel_options = $_POST['sel_options'];
			if($sel_options){
				
				switch ($sel_options) {
						
							case 'delete':



							$query_del = "DELETE FROM user WHERE user_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH DELETE" . mysqli_error($conn));
							}
								header("location:users.php");

							break;


							case 'admin':



							$query_del = "UPDATE user SET user_role = 'Admin' WHERE user_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH ADMIN UPDATE" . mysqli_error($conn));
							}
								header("location:users.php");

							break;


							case 'subscriber':



							$query_del = "UPDATE user SET user_role = 'Subscriber' WHERE user_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH Subscriber UPDATE" . mysqli_error($conn));
							}
								header("location:users.php");

							break;


							case 'approve':



							$query_del = "UPDATE user SET status = 'Approved' WHERE user_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH Approved UPDATE" . mysqli_error($conn));
							}
								header("location:users.php");

							break;


							case 'unapprove':



							$query_del = "UPDATE user SET status = 'Unpproved' WHERE user_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH Unpproved UPDATE" . mysqli_error($conn));
							}
								header("location:users.php");

							break;



							default:
							# code...
							break;

						}
					}		

				}
			}	
	?>




<form method="post" >
	<div class="input-field col s12 m4" id="sel_input_divs" >
    <select name="sel_options">
			<option disabled selected value="none">Select options</option>
    	
    		 <option  class=" circle" value="admin">Admin</option>
    		 <option  class=" circle" value="subscriber">Subscriber</option>
    		 <option  class=" circle" value="approve">Approve</option>
    		 <option  class=" circle" value="unapprove">Unapprove</option>


    </select>
  </div>

<button type="submit"   name="activate_btn" class="del-cat-btn blue waves-effect  waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Apply Action</button>




<a href="add_user.php" class="del-cat-btn green waves-effect waves-light hoverable white-text"  ><i class="material-icons right ">add_circle</i>Add New User</a>

	<table class="bordered highlight responsive-table">
		<thead>
			<tr>
				<th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th>
				<th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
				<th><i class="fa fa-pencil-square-o"></i> Username</th>
				<th><i class="fa fa-tasks"></i> FIRSTNAME</th>
				<th><i class="fa fa-photo"></i> LASTNAME</th>
				<th><i class="fa fa-pie-chart"></i> EMAIL</th>
				<th><i class="fa fa-image"></i> PASSPORT</th>
				<th><i class="fa fa-money"></i> STATUS</th>
				<th><i class="fa fa-hashtag"></i> ROLE</th>
				<th><i class="fa fa-eyedropper"></i> Edit</th>
				<th><i class="fa fa-calendar-minus-o"></i> Delete</th>

			</tr>

		</thead>
                <tbody>
			<?php
				$query_sel_products = mysqli_query($conn,"SELECT * FROM user ORDER BY user_id DESC");

				if (!$query_sel_products) {
					die("Error with selecting products " . mysqli_error($conn));
				}

				while ($row = mysqli_fetch_assoc($query_sel_products)) {
					$id = $row['user_id'];
					$username = $row['username'];
					$fname = $row['firstname'];
					$lastname = $row['lastname'];
					$email = $row['email'];
					$status = $row['status'];
					$role = $row['user_role'];
					$passport = $row['passport'];

				?>

					
						<tr>
							<td>			
					      	<input type="checkbox"  class="checkboxes" name="checkedbox[]" value="<?php echo $id?>"  id="<?php echo $id?>" />
					      	<label for="<?php echo $id?>"></label>
					      	</form>
					      </td>	
							<td><?php echo $id ;?></td>
							<td><?php echo $username ;?></td>
							<td><?php echo $fname ;?></td>
							<td><?php echo $lastname ;?></td>
							<td><?php echo $email ;?></td>
							<td><img class="responsive-img" width="100px;" src="user_imgs/<?php echo $passport ?>"></td>	
							<td class="blue-text"><?php echo $status ;?></td>
							<td class="green-text"><?php echo $role ;?></td>
							<td><a id="<?php echo $id ?>" rel="<?php echo $username . ' | ' . $fname . ' ' . $lastname . ' |'; ?> " class="modal-close modal-trigger edit-cat-btn edit_user blue-text waves-effect waves-light hoverable" href="#user_edit" class="white-text"><i class="fa fa-pencil-square-o"></i></a></td>

							<td><a id="<?php echo $id ?>" rel="<?php echo $username . ' | ' . $fname . ' ' . $lastname . ' |';  ?> " class="modal-close modal-trigger edit-cat-btn remove_user red-text waves-effect waves-light hoverable" href="#user_del" class="white-text"><i class="fa fa-minus"></i></a></td>

						</tr>	
						

			  <?php	
			  }		
			?>

		<tbody>
			

		</table>








</div>
</div>

	<!-- DELETING POST -->
	<?php
		if(isset($_GET['deluser'])){
			$user_id = $_GET['deluser'];

			$query_del_pro = mysqli_query($conn, "DELETE FROM user WHERE user_id = '{$user_id}' " );

			if(!$query_del_pro){
				die("Error with deleting order " . mysqli_error($conn));
			}

			
			header("location:users.php");

		}
	?>
<!-- END OF DELETING POST -->






<!-- MODAL FOR DELETING PRODUCT-->

		  <!-- Modal Structure -->
    <div id="user_del" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;"  class=" white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-minus"></i><b> Delete User</b></h5>
      <hr class="line">
      <p class="white-text">Are you sure about deleting User? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalDel modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL  -->



<!-- MODAL FOR EDITING PRODUCT-->

		  <!-- Modal Structure -->
    <div id="user_edit" class="modal  blue darken-3" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;" class="white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-pencil-square-o"></i><b> Edit User</b></h5>
      <hr class="line">
      <p class="white-text">Are you sure about editing User? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalEdit modal-close waves-effect waves-white btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->

