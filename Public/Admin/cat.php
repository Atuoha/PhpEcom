<?php
	include "head.php";?>



<?php ob_start();?>



<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/cat.png" alt="Some-image" width="150px;">
</h2>
</div>


<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-calendar-plus-o fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> Category</span></h5>
</div>
<div>
	<div class="row">

		<div class="col l6 s12">
				<form method="post" enctype="multipart/form-data">
					<?php
				if(isset($_POST['cat-btn'])){
					$cat_input = mysqli_real_escape_string($conn,$_POST['cat_input']);
					$cat_imagery = $_FILES['cat_img_upload']['name'];
					$cat_temp = $_FILES['cat_img_upload']['tmp_name'];

					move_uploaded_file($cat_temp, "cat_imgs_upload/$cat_imagery");

					if(!empty($cat_input) && !empty($cat_temp)){

						$query_insert_cat = mysqli_prepare($conn,"INSERT INTO category(cat_title,date,cat_img) VALUES(?,now(),?)");

						mysqli_stmt_bind_param($query_insert_cat,'ss',$cat_input,$cat_imagery);
						mysqli_stmt_execute($query_insert_cat);

						echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Category added successfully</i></p>";

					}else{
						echo "<p class='red-text'><i class='material-icons right'>report_problem</i><i><b>OOPS! </b>Complete field data!</i></p>";
					}
				}
			?>

					<div class="input-field">
						<input type="text" id="cat-input" value="<?php if(isset($cat_input)) echo $cat_input ?>" name="cat_input" placeholder="Enter Category"/>
						<label for="cat-input"><i class="material-icons">storage</i></label>

						<input id="cat-input" type="file" name="cat_img_upload"><br>

					<button type="submit" id="cat-btn" name="cat-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">queue</i>Add Category</button>
		
					</div>
				</form>	


				<?php 

					if(isset($_GET['edit_cat'])){
							$cat_edit_id = $_GET['edit_cat'];
							$cat_edit_tits = $_GET['cat_tit'];

						$query_retreive_cat_img = mysqli_prepare($conn,"SELECT cat_img FROM category WHERE cat_id = ?");

						mysqli_stmt_bind_param($query_retreive_cat_img,'s',$cat_edit_id);
						mysqli_stmt_execute($query_retreive_cat_img);
						mysqli_stmt_bind_result($query_retreive_cat_img,$img);
						mysqli_stmt_fetch($query_retreive_cat_img);
						mysqli_stmt_close($query_retreive_cat_img);


					?>
					<br>
					<form method="post" enctype="multipart/form-data">
						<p>EDIT <b><?php echo $cat_edit_tits ?></b></p>

						<?php
							if(isset($_POST['cat_edit_btn'])){
								$edit_input = mysqli_real_escape_string($conn,$_POST['cat_edit_input']);
								$edit_imagery = $_FILES['cat_edit_img']['name'];
								$edit_temp_imagery = $_FILES['cat_edit_img']['tmp_name'];

								move_uploaded_file($edit_temp_imagery, "cat_imgs_upload/$edit_imagery");

								if(!empty($edit_temp_imagery) && !empty($edit_input)){

									$query_update_cat = mysqli_prepare($conn,"UPDATE category SET cat_title = ? , cat_img = ? WHERE cat_id = ?");

									mysqli_stmt_bind_param($query_update_cat,'ssi',$edit_input,$edit_imagery,$cat_edit_id);

									mysqli_stmt_execute($query_update_cat);

									echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Changes have successfully been saved!</i></p>";

								}elseif(empty($edit_temp_imagery) && empty($edit_input)){

										echo "<p class='green-text'><i><b>Huh! </b>You didn't make any change!</i></p>";

								}elseif(empty($edit_temp_imagery) && !empty($edit_input)){

										$query_update_cat = mysqli_prepare($conn,"UPDATE category SET cat_title = ? WHERE cat_id = ?");

									mysqli_stmt_bind_param($query_update_cat,'si',$edit_input,$cat_edit_id);

									mysqli_stmt_execute($query_update_cat);

									echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Changes have successfully been saved!</i></p>";

								}elseif(!empty($edit_temp_imagery) && empty($edit_input)){

										$query_update_cat = mysqli_prepare($conn,"UPDATE category SET cat_title = ? , cat_img = ? WHERE cat_id = ?");

									mysqli_stmt_bind_param($query_update_cat,'ssi',$cat_edit_tits,$edit_imagery,$cat_edit_id);

									mysqli_stmt_execute($query_update_cat);

									echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Changes have successfully been saved!</i></p>";
								}


							}



						?>




						<div class="input-field">
						<input type="text" id="cat-input" name="cat_edit_input" value="<?php echo $cat_edit_tits ?>" />
						<label for="cat-input"><i class="material-icons">storage</i></label>
						<p><img src="cat_imgs_upload/<?php echo $img ?>" width="100px" /></p>

						<input id="cat-input" type="file"  name="cat_edit_img">
						<br>

					<button type="submit" id="cat-btn" name="cat_edit_btn" class="green waves-effect white-text waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Edit Category</button>
		
					</div>

					</form>	
				<?php	
					}
				

				?>

		</div>
		

		<div class="col l6 s12" id="display_cats">
			<span id="cat-specs" class="hoverable"><b><i class="material-icons right">storage</i>Categories</b></span>
			
			<table class="bordered centered highlight">
				<thead>
				
					<tr>
					<th><i class="material-icons  hide-on-med-and-down">filter_1 </i><b> ID</b></th>
					<th><i class="material-icons  hide-on-med-and-down">description </i><b> CATEGORY TITLE</b></th>
					<th><i class="material-icons  hide-on-med-and-down">content_cut </i><b> REMOVE</b></th>
					<th><i class="material-icons  hide-on-med-and-down">format_color_text </i><b> UPDATE</b></th>
					</tr>
				</thead>

						<?php
							$query_show_cat = mysqli_query($conn,"SELECT * FROM category ORDER BY cat_id DESC");
							while ($row = mysqli_fetch_assoc($query_show_cat)) {
								$cat_id = $row['cat_id'];
								$cat_tits = $row['cat_title']
							
						?>

				<tbody>
					<tr>
						<td><?php echo $cat_id ?></td>
						<td><?php echo $cat_tits ?></td>
						<td><a href="#modal2" id="<?php echo $cat_id ?>" rel="<?php echo $cat_tits ?>" class="modal-trigger del-cat-btn red waves-effect waves-light hoverable white-text"  ><i class="material-icons right ">clear</i><b class="hide-on-med-and-down">Remove</b></a></td>

						<td><a  class=" edit-cat-btn green waves-effect waves-light hoverable" href="cat.php?edit_cat=<?php echo $cat_id ?> && cat_tit=<?php echo $cat_tits ?>" class="white-text"><i class="material-icons right ">playlist_add_check</i><b class="hide-on-med-and-down">Update</b></a></td>
					</tr>

					<?php

					}

					$count_cat_rows = mysqli_num_rows($query_show_cat);
					if($count_cat_rows == 0){
						echo "<p class='red-text'><b>CATEGORY SEEMS TO BE EMPTY!</b></p>";
					}

					?>


			
			</tbody>	
			</table>'	
		</div>	


	</div>	

</div>	
</div>	







	<!-- DELETING CATEGORY -->

		<?php

			if(isset($_GET['delCat'])){
				$del_id = $_GET['delCat'];

				$query_delCat = mysqli_prepare($conn,"DELETE FROM category WHERE cat_id = ?");

				mysqli_stmt_bind_param($query_delCat,'i',$del_id);
				mysqli_stmt_execute($query_delCat);

				header("location:cat.php");
			}

		?>


	<!-- END OF DELETING CATEGORY -->





<!-- MODAL -->

		  <!-- Modal Structure -->
    <div id="modal2" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-red btn-flat"><i class="material-icons">close</i></a>

      <h5><b>Delete category</b></h5>
      <hr class="line">
      <p>Are you sure about deleting category? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalCat modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->