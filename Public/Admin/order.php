<?php
	include "head.php";?>

<?php ob_start();?>

<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/shop.png" alt="Some-image" width="150px;">
</h2>
</div>	

<div style="padding: 10px;">
<div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-shopping-cart fa-fw"></i><b>Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> All Orders Report</span></h5>
</div>
	<table class="bordered responsive-table highlight">
		<thead>
			<tr>
				<th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
				
				<th><i class="fa fa-pie-chart"></i> Quantity</th>
				<th><i class="fa fa-money"></i> Price</th>
				<th><i class="fa fa-money"></i> Currency</th>
				<th><i class="fa fa-hashtag"></i> Invoice Number</th>
				<th><i class="fa fa-calendar"></i> Order Date</th>
				<th><i class="fa fa-check-square-o"></i> Status</th>
				<th><i class="fa fa-pencil-square-o"></i> Title</th>
				<th><i class="fa fa-photo"></i> Photo</th>
				<th><i class="fa fa-calendar-minus-o"></i> Delete</th>

			</tr>

		</thead>
		<tbody>
				<?php
					$query_sel = mysqli_query($conn,"SELECT * FROM report ORDER BY id DESC");
					if(!$query_sel){
						die("Error with query selection " . mysqli_error($conn));
					}

					while ($row = mysqli_fetch_assoc($query_sel)) {
						
						$id = $row['id'];
						$prod_id = $row['prod_id'];
						$prod_total_price = $row['prod_total_price'];
						$prod_quantity = $row['prod_quantity'];
						$order_id = $row['order_id'];
						$date = $row['date'];


						$query_sel_items_from_products = mysqli_query($conn,"SELECT prod_title,prod_img FROM product WHERE product_id = '{$prod_id}' ");

						while ($row = mysqli_fetch_assoc($query_sel_items_from_products)) {
							$tit = $row['prod_title'];
							$img = $row['prod_img'];

						$query_sel_order_features = mysqli_query($conn, "SELECT * FROM orders WHERE id = '{$order_id}' ");
						
						while ($row = mysqli_fetch_assoc($query_sel_order_features)) {
								$order_trans = $row['order_transaction'];
								$order_status = $row['order_status'];
								$order_currency = $row['order_currency'];
								

						?>
							

						
								<tr>
									<td><?php echo $id; ?></td>
									
									<td><?php echo $prod_quantity; ?></td>
									<td>&#36 <?php echo $prod_total_price; ?></td>
									<td><?php echo $order_currency  ;?></td>
									<td><?php echo $order_trans  ;?></td>
									<td><?php echo date('d-m-Y  || h:i:a', strtotime ($date));?></td>
									<td><?php echo $order_status ;?></td>
									<td><?php echo $tit; ?></td>
									<td><img class="responsive-img" width="100px;" src="/E-commerce/Public/Admin/product_imgs_upload/<?php echo $img ?>"></td>
									<td><a id="<?php echo $id ?>" rel="<?php echo $tit . ' $' . $prod_total_price . ' of Quantity ' .  $prod_quantity ; ?> " class="modal-close modal-trigger edit-cat-btn remove_cat red waves-effect waves-light hoverable" href="#order_del" class="white-text"><i class="fa fa-calendar-minus-o"></i><b class="hide-on-med-and-down"> Delete</b></a></td>
								</tr>	

						

						<?php

						}

						}

					}

				?>

	</tbody>
	</table>



</div>
</div>


	<?php
		if(isset($_GET['delOrder'])){
			$rep_idd = $_GET['delOrder'];

			$query_del_order = mysqli_query($conn, "DELETE FROM report WHERE id = '{$rep_idd}' " );

			if(!$query_del_order){
				die("Error with deleting order " . mysqli_error($conn));
			}

			echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><i><b>Bravos! </b>Order have successfully been deleted!</i></p>";

			header("location:order.php");

		}



	?>









<!-- MODAL -->

		  <!-- Modal Structure -->
    <div id="order_del" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-red btn-flat"><i style="font-size: 3em;"  class=" white-text material-icons">close</i></a>


      <h5 class="white-text"><i class="fa fa-minus"></i><b> Delete Order</b></h5>
      <hr class="line">
      <p class="white-text">Are you sure about deleting Order? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalDel modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->