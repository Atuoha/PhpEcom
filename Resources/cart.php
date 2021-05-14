


<?php include "config.php";?>
<?php include "../public/Admin/function.php";?>



<?php
	if(isset($_GET['add'])){
		 unset($_SESSION['message']); 
		
		 $prod_id = mysqli_real_escape_string($conn,$_GET['add']);

			$query_pull_prod = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$prod_id' ");

			if(!$query_pull_prod){
				die("Error with pulling product with specific ID " . mysqli_error($conn));
			}

			while ($row = mysqli_fetch_array($query_pull_prod)) {
				

				if($row['prod_quantity'] != $_SESSION['product_'.$prod_id]){
					$_SESSION['product_'.$prod_id]+=1;


					header("location:../Public/checkout.php");
				}else{
					$_SESSION['message'] = ("We only have ".$row['prod_quantity']. " <b>" . $row['prod_title'] . " </b>"  . " available");
					header("location:../Public/checkout.php");
				}
			}
	}


	if(isset($_GET['removeitem'])){
		 unset($_SESSION['message']); 


		 $_SESSION['product_'.$_GET['removeitem']]--;
		if($_SESSION['product_'.$_GET['removeitem']] < 1){

			unset($_SESSION['itemTotal']);

		 	unset($_SESSION['itemQuan']);

			header("location:../Public/checkout.php");
		}else{
			header("location:../Public/checkout.php");
		} 

	}

	if(isset($_GET['delitems'])){
		 unset($_SESSION['message']); 

		 unset($_SESSION['itemTotal']);

		 unset($_SESSION['itemQuan']);

		$_SESSION['product_'.$_GET['delitems']] = '0';
			header("location:../Public/checkout.php");
		
	}
?>






<?php


	function display_item(){
		global $conn;

		$total = 0;
		$itemQuan = 0;

		$item_name = 1;
		$item_number = 1;
		$amount = 1;
		$quantity = 1;

		foreach ($_SESSION as $name => $value) {

			if($value > 0 ){

				if(substr($name, 0, 8) == "product_"){

					$length = strlen($name);
					
					 $id = substr($name, 8,$length);

			 $query_pulling = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$id' ");

			 
			 

			

		if(!$query_pulling){
			die("Error with query_pulling " . mysqli_error($conn));
		}

		while ($row = mysqli_fetch_array($query_pulling)) {
			$pro_id = $row['product_id'];
			$prod_price = $row['prod_price'];
			$prod_name = $row['prod_title'];
			$prod_img = $row['prod_img'];


		?>
			
			<tr>
				<td><?php echo $pro_id ?></td>
				<td>&#36 <?php echo $prod_price ?></td>	
				<td><?php echo $_SESSION['product_'.$pro_id]?></td>	
				<td>&#36 <?php 
				echo  $subtot = $prod_price * $_SESSION['product_'.$pro_id]
					 
				?></td>	
					<?php $itemQuan += $value; ?>
				<?php    $_SESSION['itemTotal'] = $total  += $subtot; ?>
				<?php    $_SESSION['itemQuan']  = $itemQuan; ?>

                <td><?php echo $prod_name ?>
				<p class="center"> <img src="../Public/Admin/product_imgs_upload/<?php echo $prod_img ?>" width="100px;" class="responsive-img circle" alt="Product imagery"> </p>	
				</td>
				 

				
			 

				<td>
					<a  class="check-btn red waves-effect waves-light hoverable" href="/E-commerce/Resources/cart.php?removeitem=<?php echo $pro_id ?>" class="white-text"><i class="material-icons  ">remove</i></a>

					<a  class="check-btn yellow darken-2 waves-effect waves-light hoverable" href="/E-commerce/Resources/cart.php?add=<?php echo $pro_id ?>" class="white-text"><i class="material-icons  ">add</i></a>

					<a  class="check-btn green waves-effect waves-light hoverable" href="/E-commerce/Resources/cart.php?delitems=<?php echo $pro_id ?>" class="white-text"><i class="material-icons  ">close</i></a>
				</td>	

			</tr>	

			 		<input type="hidden" name="item_name_<?php echo $item_name ?>" value="<?php echo $prod_name ?>">
				  <input type="hidden" name="item_number_<?php echo $item_number ?>" value="<?php echo $pro_id ?>">
				  <input type="hidden" name="amount_<?php echo $amount ?>" value="<?php echo $prod_price ?>">
				  <input type="hidden" name="quantity_<?php echo $quantity ?>" value="<?php echo $value ?>">
				  
		<?php

		}

			$item_name ++;
			$item_number ++;
			$amount ++;
			$quantity ++;

		}




			}

			
			
		}

		
		}	







		function report(){
		global $conn;

		if(isset($_GET['tx'])){

		$amount = $_GET['amt'];
		$transaction =$_GET['tx'];
		$status = $_GET['st'];
		$currency = $_GET['cc'];

		

		$total = 0;
		$itemQuan = 0;

		foreach ($_SESSION as $name => $value) {

			


			if($value > 0 ){

				if(substr($name, 0, 8) == "product_"){

					$length = strlen($name);
					$min_res = $length - 8;
					 $id = substr($name, 8,$min_res);

			 $query_pulling = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$id' ");

		if(!$query_pulling){
			die("Error with query_pulling " . mysqli_error($conn));
		}

		while ($row = mysqli_fetch_array($query_pulling)) {
			 $pro_id = $row['product_id'];
			$prod_price = $row['prod_price'];

			 $_SESSION['product_'.$pro_id] ;
				
			  $subtot = $prod_price * $_SESSION['product_'.$pro_id];
					 
			$itemQuan += $value; 
			$total  += $subtot;


			
		// INSERTING INTO ORDER TABLE
			$query_inserts = mysqli_query($conn, "INSERT INTO orders(order_amount, order_transaction, order_currency, order_status) VALUES('{$amount}', '{$transaction}', '{$currency}', '{$status}' )  ");

		$last_order_id = mysqli_insert_id($conn);

		if(!$query_inserts){
			die("Error with query " . mysqli_error($conn));
		}
		// END OF INSERTING INTO ORDER PAGE


			$query_insert_into = mysqli_query($conn,"INSERT INTO report(prod_id,prod_total_price,prod_quantity,date,order_id) 
				VALUES('{$pro_id}','{$subtot}','{$value}', now(), '{$last_order_id}' )");

			if(!$query_insert_into){
				die("Error with inserting into report " . mysqli_error($conn));
			}

			session_destroy();
			
	   }

		   }
			
		}

		
	}
	
}else{
		header("location:home.php");
	}

}	

?>