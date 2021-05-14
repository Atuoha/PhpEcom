
<?php
	include "head.php";?>



<div  class="mainContainer">

<h2 class="center-align">
	<img src="image/adP.png" alt="Some-image" width="150px;">
</h2>

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-calendar-plus-o fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> Add Product</span></h5>
</div>





	<form method="post" enctype="multipart/form-data">
		
		<?php
	if(isset($_POST['draft_btn'])){
		$pro_title = $_POST['pro_title'];
		$pro_price = $_POST['pro_price'];
		$pro_cat = $_POST['pro_cat'];
		$pro_author = $_POST['pro_author'];
		$pro_desc = $_POST['pro_desc'];
		$short_desc = $_POST['short_desc'];
		$pro_img = $_FILES['pro_img']['name'];
		$pro_temp_image = $_FILES['pro_img']['tmp_name'];
		$pro_date = $_POST['pro_date'];
		$pro_quan = $_POST['pro_quan'];




		$pro_title = mysqli_real_escape_string($conn,$pro_title);
		$pro_price = mysqli_real_escape_string($conn,$pro_price);
		$pro_author = mysqli_real_escape_string($conn,$pro_author);
		$pro_desc = mysqli_real_escape_string($conn,$pro_desc);
		$short_desc = mysqli_real_escape_string($conn,$short_desc);


		move_uploaded_file($pro_temp_image, "product_imgs_upload/$pro_img");
	
		if($pro_img && $pro_title && $pro_price && $pro_cat && $pro_author && $pro_desc && $short_desc && $pro_date  ){

			$query = "INSERT INTO product(prod_title,prod_cat, prod_price,author, prod_desc, short_desc, prod_img,prod_quantity,date) VALUES('$pro_title', '$pro_cat', '$pro_price', '$pro_author', '$pro_desc', '$short_desc',  '$pro_img', '$pro_quan', '$pro_date')";
			
			$query_result_insert = mysqli_query($conn,$query);

			if(!$query_result_insert){
				die('insert post query problem' . mysqli_error($conn));
			}

			echo "<img src='image/seen.png' class='img-responsive' width='40px;'/><p class='green-text'><b>Post added succesfully</b></p>";

				$last_created_id = mysqli_insert_id($conn);
			?>


				<!-- <a class="green-text" href="../single.php?viewPost=<?php echo $last_created_id ?>"><b>View Post</b></a> | |

				<a class="purple-text" href="edit_post.php?edPost=<?php echo $last_created_id ?>"><b>Edit Post</b></a> -->

			<?php
			
		}else{
			
			echo "<p class='red-text'><i><b>OOPS!!</b></i><b> Please fill respective fields</b></p>";
		}

	}



?>	



<!-- CODE FOR PUBLISHING POST -->



		<?php
	if(isset($_POST['pro_btn'])){
		$pro_title = $_POST['pro_title'];
		$pro_price = $_POST['pro_price'];
		$pro_cat = $_POST['pro_cat'];
		$pro_author = $_POST['pro_author'];
		$pro_desc = $_POST['pro_desc'];
		$short_desc = $_POST['short_desc'];
		$pro_img = $_FILES['pro_img']['name'];
		$pro_temp_image = $_FILES['pro_img']['tmp_name'];
		$pro_date = $_POST['pro_date'];
		$pro_quan = $_POST['pro_quan'];




		$pro_title = mysqli_real_escape_string($conn,$pro_title);
		$pro_price = mysqli_real_escape_string($conn,$pro_price);
		$pro_author = mysqli_real_escape_string($conn,$pro_author);
		$pro_desc = mysqli_real_escape_string($conn,$pro_desc);
		$short_desc = mysqli_real_escape_string($conn,$short_desc);


		move_uploaded_file($pro_temp_image, "product_imgs_upload/$pro_img");
	
		if($pro_img && $pro_title && $pro_price && $pro_cat && $pro_author && $pro_desc && $short_desc && $pro_date  ){

			$query = "INSERT INTO product(prod_title,prod_cat, prod_price,author, prod_desc, short_desc, prod_img,prod_quantity,date,status) VALUES('$pro_title', '$pro_cat', '$pro_price', '$pro_author', '$pro_desc', '$short_desc',  '$pro_img', '$pro_quan', '$pro_date','published')";
			
			$query_result_insert = mysqli_query($conn,$query);

			if(!$query_result_insert){
				die('insert post query problem' . mysqli_error($conn));
			}

			echo "<img src='image/seen.png' class='img-responsive' width='40px;'/><p class='green-text'><b>Post added succesfully</b></p>";

				$last_created_id = mysqli_insert_id($conn);
			?>


				<!-- <a class="green-text" href="../single.php?viewPost=<?php echo $last_created_id ?>"><b>View Post</b></a> | |

				<a class="purple-text" href="edit_post.php?edPost=<?php echo $last_created_id ?>"><b>Edit Post</b></a> -->

			<?php
			
		}else{
			
			echo "<p class='red-text'><i><b>OOPS!!</b></i><b> Please fill respective fields</b></p>";
		}

	}



?>	


<!-- END OF CODE FOR PUBLISHING POST -->





<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Product Title</b> <i class="material-icons right">format_size</i></h6>
		<input type="text" id="cat-input" name="pro_title" placeholder="Enter product title">
	</div>	

	<div class="input-field">
		<h6><b>Product Price</b><i class="material-icons right">attach_money</i></h6>
		<input type="text" id="cat-input" name="pro_price" placeholder="Enter product price">
	</div>	

		<div class="input-field">
		<h6><b>Product Quantity</b><i class="material-icons right">filter_none</i></h6>
		<input type="number" id="cat-input" name="pro_quan" placeholder="Enter product Quantity">
	</div>	

	<div class="input-field">
		<h6><b>Category</b><i class="material-icons right">card_membership</i></h6>


<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field" >
    <select name="pro_cat" class=" icons">
			<option disabled selected>Select Category</option>
    	<?php
    		$query = "SELECT * FROM category";

				$query_res = mysqli_query($conn,$query);

				while ($row = mysqli_fetch_assoc($query_res)){

					$id = $row['cat_id'];
					$cat_tit = $row['cat_title'];

				?>
    			  <option  value="<?php echo $id?>"  class=" circle"><?php echo ($cat_tit);?></option>	

				<?php	

			}
    	?>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->

	</div>

	<div class="input-field">
		<h6><b>Post Author</b><i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" name="pro_author" placeholder="Enter Author">
	</div>	
	

	</div>
















	<div class="col l6 s12">

		<div class="input-field">
		<h6><b>Product Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" name="pro_img"  id="cat-input">
	</div>	

		<div class="input-field">
		<h6><b>Short Product Description</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg" type="text"   name="short_desc" placeholder="Enter Post content" ></textarea>
	</div>

		<div class="input-field">
		<h6><b>Full Product Description</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg" type="text" name="pro_desc" placeholder="Enter Post content" ></textarea>
	</div>



	<div class="input-field">
		<h6><b>Post Date</b><i class="material-icons right">access_alarm</i></h6>
		<input type="date" class="date_picker" id="cat-input" name="pro_date" placeholder="Enter Post Tag">
	</div>

	<div class="input-field">
		<button type="submit" id="pst-btn" name="draft_btn" class="yellow accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Draft Product</button>

		<button type="submit" id="pst-btn" name="pro_btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Publish Product</button>
	</div>




	</div>
	




</div>


</form>	

	
</div>	
</div>	






