
<?php
	ob_start();
	include "head.php";?>



<div  class="mainContainer">


<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-pencil-square-o fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> Edit Product</span></h5>
</div>

	<?php
			if (isset($_GET['editpro'])) {
			$edit_idd = $_GET['editpro'];

			$query_select_pro = mysqli_query($conn,"SELECT * FROM product WHERE product_id= '{$edit_idd}' ");
			if(!$query_select_pro){
				die("Error with edit query " . mysqli_error($conn));
			}

			while ($row = mysqli_fetch_assoc($query_select_pro)) {
					$id = $row['product_id'];
					$tit = $row['prod_title'];
					$cat = $row['prod_cat'];
					$author = $row['author'];
					$price = $row['prod_price'];
					$quan = $row['prod_quantity'];
					$img = $row['prod_img'];
					$desc = $row['prod_desc'];
					$short = $row['short_desc'];
					$status = $row['status'];
					$review = $row['review'];
					$date = $row['date'];

			$query_find_cat_title = mysqli_query($conn,"SELECT cat_title FROM category WHERE cat_id = '$cat' ");

					while ($row = mysqli_fetch_assoc($query_find_cat_title)) {
						$cat_title = $row['cat_title'];		
					
		}

	}

	}else{
		header("location:index.php");
	}

	?>



	<form method="post" enctype="multipart/form-data">
		
		<?php
			if(isset($_POST['edit_btn'])){
				$ed_title = $_POST['edit_title'];
				$ed_author = $_POST['edit_author'];
				$ed_price = $_POST['edit_price'];
				$ed_quan = $_POST['edit_quan'];
				$ed_desc = $_POST['edit_desc'];
				$ed_short = $_POST['edit_short'];	
				$ed_cat = $_POST['edit_cat'];
				$ed_img = $_FILES['edit_img']['name'];
				$temp_ed_img = $_FILES['edit_img']['tmp_name'];
				$ed_date = $_POST['edit_date'];

				$edit_idd;

				
				
				
				if(!empty($temp_ed_img && $ed_cat)){
					move_uploaded_file($temp_ed_img, "product_imgs_upload/$ed_img");

					$query_update_post = mysqli_query($conn,"UPDATE product SET prod_title = '$ed_title', prod_cat = '$ed_cat', author = '$ed_author', prod_price = '$ed_price', prod_quantity = '$ed_quan', prod_img = '$ed_img', short_desc = '$ed_short', prod_desc = '$ed_desc', date = '$ed_date' WHERE product_id = '$edit_idd' ");

					header("location:display_post.php");

					if(!$query_update_post){
						die("Error with updating " . mysqli_error($conn));
					}

				}elseif($temp_ed_img && !$ed_cat){
					move_uploaded_file($temp_ed_img, "product_imgs_upload/$ed_img");
					$query_update_post = mysqli_query($conn,"UPDATE product SET prod_title = '{$ed_title}', prod_cat = '{$cat}', author = '{$ed_author}', prod_price = '{$ed_price}', prod_quantity = '{$ed_quan}',  prod_img = '$ed_img',  short_desc = '$ed_short', prod_desc = '{$ed_desc}', date = '{ed_date}' WHERE product_id = '$edit_idd' ");

					if(!$query_update_post){
						die("Error with updating product " . mysqli_error($conn));
					}

					header("location:display_post.php");

				}elseif(!$temp_ed_img && $ed_cat){
					

					$query_update_post = mysqli_query($conn,"UPDATE product SET prod_title = '{$ed_title}', author = '{$ed_author}', prod_price = '{$ed_price}', prod_quantity = '{$ed_quan}', prod_cat = '$ed_cat', short_desc = '$ed_short', prod_desc = '{$ed_desc}', date = '{ed_date}' WHERE product_id = '{$edit_idd}' ");

					header("location:display_post.php");

					if(!$query_update_post){
						die("Error with updating " . mysqli_error($conn));
					}

				}elseif(!$temp_ed_img && !$ed_cat){

					$query_update_post = mysqli_query($conn,"UPDATE product SET prod_title = '{$ed_title}', author = '{$ed_author}', prod_price = '{$ed_price}', prod_quantity = '{$ed_quan}', short_desc = '$ed_short', prod_desc = '{$ed_desc}', date = '{ed_date}' WHERE product_id = '{$edit_idd}' ");

					header("location:display_post.php");

					if(!$query_update_post){
						die("Error with updating " . mysqli_error($conn));
					}

				}



			}



		?>
	




<div class="row">
	<div class="col l6 s12">
		<div class="input-field">
		<h6><b>Product Title</b> <i class="material-icons right">format_size</i></h6>
		<input type="text" id="cat-input" value="<?php echo $tit; ?>" name="edit_title" placeholder="Enter product title">
	</div>	

	<div class="input-field">
		<h6><b>Product Price</b><i class="material-icons right">attach_money</i></h6>
		<input type="text" id="cat-input" name="edit_price" value="<?php echo $price; ?>" placeholder="Enter product price">
	</div>	

		<div class="input-field">
		<h6><b>Product Quantity</b><i class="material-icons right">filter_none</i></h6>
		<input type="text" id="cat-input" name="edit_quan" value="<?php echo $quan; ?>" placeholder="Enter product Quantity">
	</div>	

	<div class="input-field">
		<h6><b>Category</b><i class="material-icons right">card_membership</i></h6>


<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field" >
    <select name="edit_cat"  class=" icons">
			<option disabled selected><?php echo $cat_title; ?></option>
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
		<input type="text" id="cat-input" name="edit_author" value="<?php echo $author; ?>" placeholder="Enter Author">
	</div>	
	

	</div>



	<div class="col l6 s12">

		<div class="input-field">
		<p><img class="responsive-img" width="100px;" src="/E-commerce/Public/Admin/product_imgs_upload/<?php echo $img ?>"></p>	
		<h6><b>Product Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" name="edit_img"  id="cat-input">
	</div>	

		<div class="input-field">
		<h6><b>Short Product Description</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg" type="text" name="edit_short"  placeholder="Enter Post content" ><?php echo $short ?></textarea>
	</div>

		<div class="input-field">
		<h6><b>Full Product Description</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg" type="text" name="edit_desc" placeholder="Enter Post content" ><?php echo $desc ?></textarea>
	</div>



	<div class="input-field">
		<h6><b>Post Date</b><i class="material-icons right">access_alarm</i></h6>
		<input type="date" class="date_picker" value="<?php echo $date ?>" name="edit_date"> 
	</div>

	<div class="input-field">
		

		<button type="submit" id="pst-btn" name="edit_btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Save Product</button>
	</div>




	</div>
	




</div>


</form>	

	
</div>	
</div>	






