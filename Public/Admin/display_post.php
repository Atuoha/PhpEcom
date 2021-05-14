<?php
	include "head.php";?>

<?php ob_start();?>


<div  class="mainContainer" id="display_post_div" >
<div class="center-align">
<h2 class="center-align">
	<img src="image/ps.png" alt="Some-image" width="140px;">
</h2>
</div>	





<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-file-powerpoint-o fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> All Products</span></h5>
</div>

<?php
	if(isset($_POST['checkedbox'])){

		foreach (($_POST['checkedbox']) as $array_input ) {
			$sel_options = $_POST['sel_options'];
			if($sel_options){
				
				switch ($sel_options) {
						
							case 'delete':



							$query_del = "DELETE FROM product WHERE product_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH DELETE" . mysqli_error($conn));
							}
								header("location:display_post.php");

							break;


							case 'publish':



							$query_del = "UPDATE product SET status = 'Published' WHERE product_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH PUBLISH UPDATE" . mysqli_error($conn));
							}
								header("location:display_post.php");

							break;


							case 'draft':



							$query_del = "UPDATE product SET status = 'Draft' WHERE product_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH Draft UPDATE" . mysqli_error($conn));
							}
								header("location:display_post.php");

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
    	
    		 <option  class=" circle" value="publish">Publish</option>
    		 <option  class=" circle" value="draft">Draft</option>
    		 <option  class=" circle" value="delete">Delete</option>
 

    </select>
  </div>

<button type="submit"   name="activate_btn" class="del-cat-btn blue waves-effect  waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Apply Action</button>


<a href="add_post.php" class="del-cat-btn green waves-effect waves-light hoverable white-text"  ><i class="material-icons right ">add_circle</i>Add New Product</a>



	<table class="bordered highlight responsive-table">
		<thead>
			<tr>
			    <th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th>
				<th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
				<th><i class="fa fa-pencil-square-o"></i> Title</th>
				<th><i class="fa fa-tasks"></i> Category</th>
				<th><i class="fa fa-photo"></i> Photo</th>
				<th><i class="fa fa-pie-chart"></i> Quantity</th>
				<th><i class="fa fa-money"></i> Price</th>
				<th><i class="fa fa-hashtag"></i> Description</th>
				<th><i class="fa fa-calendar"></i>  Date</th>
				<th><i class="fa fa-address-book-o"></i> Author</th>
				<th><i class="fa fa-check-square-o"></i> Status</th>
				<th><i class="fa fa-eye-slash"></i> Review</th>
				<th><i class="fa fa-eyedropper"></i> Edit</th>
				<th><i class="fa fa-calendar-minus-o"></i> Delete</th>

			</tr>

		</thead>
            <tbody>
			<?php
				$query_sel_products = mysqli_query($conn,"SELECT * FROM product ORDER BY product_id DESC");

				if (!$query_sel_products) {
					die("Error with selecting products " . mysqli_error($conn));
				}

				while ($row = mysqli_fetch_assoc($query_sel_products)) {
					$id = $row['product_id'];
					$tit = $row['prod_title'];
					$cat = $row['prod_cat'];
					$author = $row['author'];
					$price = $row['prod_price'];
					$quan = $row['prod_quantity'];
					$img = $row['prod_img'];
					$desc = substr($row['prod_desc'], 0,40);
					$status = $row['status'];
					$review = $row['review'];
					$date = $row['date'];


					$query_find_cat_title = mysqli_query($conn,"SELECT cat_title FROM category WHERE cat_id = '$cat' ");

					while ($row = mysqli_fetch_assoc($query_find_cat_title)) {
						$cat_title = $row['cat_title'];
					


					?>

					
						<tr>
						  <td>			
					      	<input type="checkbox"  class="checkboxes" name="checkedbox[]" value="<?php echo $id?>"  id="<?php echo $id?>" />
					      	<label for="<?php echo $id?>"></label>
					      	</form>
					      </td>	
							<td><?php echo $id ;?></td>
							<td><?php echo $tit ;?></td>
							<td><?php echo $cat_title ;?></td>
							<td><a href="#product_edit" id="<?php echo $id ?>" rel="<?php echo $tit . ' $' . $price . ' of Quantity ' .  $quan ; ?> " class="modal-close modal-trigger edit_pro"><img class="responsive-img" width="100px;" src="product_imgs_upload/<?php echo $img ?>"></a></td>
							<td><?php echo $quan ;?></td>
							<td>&#36 <?php echo $price ;?></td>
							<td><?php echo $desc ;?></td>
							<td><?php echo $date ;?></td>
							<td><?php echo $author ;?></td>
							<td><?php echo $status ;?></td>
						    <td><?php echo $review ;?></td>
							<td><a id="<?php echo $id ?>" rel="<?php echo $tit . ' $' . $price . ' of Quantity ' .  $quan ; ?> " class="modal-close modal-trigger edit-cat-btn edit_pro blue-text waves-effect waves-light hoverable" href="#product_edit" class="white-text"><i class="fa fa-pencil-square-o"></i></a></td>

							<td><a id="<?php echo $id ?>" rel="<?php echo $tit . ' $' . $price . ' of Quantity ' .  $quan ; ?> " class="modal-close modal-trigger edit-cat-btn remove_pro red-text waves-effect waves-light hoverable" href="#product_del" class="white-text"><i class="fa fa-minus"></i></a></td>

						</tr>	
						

			  <?php	
			  }		
				}
			?>

		<tbody>
			

		</table>








</div>
</div>

	<!-- DELETING POST -->
	<?php
		if(isset($_GET['delpro'])){
			$pro_idd = $_GET['delpro'];

			$query_del_pro = mysqli_query($conn, "DELETE FROM product WHERE product_id = '{$pro_idd}' " );

			if(!$query_del_pro){
				die("Error with deleting order " . mysqli_error($conn));
			}

			echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Order have successfully been deleted!</i></p>";

			header("location:display_post.php");

		}
	?>
<!-- END OF DELETING POST -->






<!-- MODAL FOR DELETING PRODUCT-->

		  <!-- Modal Structure -->
    <div id="product_del" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;"  class=" white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-minus"></i><b> Delete Product</b></h5>
      <hr class="line">
      <p class="white-text">Are you sure about deleting Product? <b>"<span class="para">  </span>"</b>
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
    <div id="product_edit" class="modal  blue darken-3" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-white btn-flat"><i style="font-size: 3em;" class="white-text material-icons">close</i></a>

      <h5 class="white-text"><i class="fa fa-pencil-square-o"></i><b> Edit Product</b></h5>
      <hr class="line">
      <p class="white-text">Are you sure about editing Product? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalEdit modal-close waves-effect waves-white btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->