


<header class="z-depth-2 hide-on-med-and-down" id="check_divHeader">

</header>	

<div id="check_div" class="container  z-depth-2">
	

<img src="/E-commerce/Public/image/cart.png" width="100px;" />
	<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png" alt="Buy now with PayPal" />
<h5><b>Checkout</b></h5>






<h5 class="center-align red lighten-1 white-text"><?php display_message() ?></h5>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="atutechs@business.com">
  <input type="hidden" name="upload" value="1">

<table class="bordered responsive-table centered highlight  responsive-table">
		<thead class="cyan darken-4 white-text">
			<tr>
				<th><i class="material-icons  hide-on-med-and-down">filter_1</i><b>  ID</b></th>
				
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">attach_money</i><b>  Price</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">class</i><b>  Quantity</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">event_note</i><b>  Sub-total</b></th>
				<th class="center-align"><i class="material-icons  hide-on-med-and-down">descriptions</i><b>  Product</b></th>
				<th><i class="material-icons  hide-on-med-and-down">assignment_turned_in</i><b>  Action</b></th>

			</tr>	
		</thead>	
		<tbody>



		
			<?php display_item() ?>

			


			
			</tbody>



	</table>
	<br>

			<?php
				if(isset($_SESSION['itemQuan'])){
			 		if( $_SESSION['itemQuan'] < '1'){
			?>
				<div class="center-align">
				 <img src="image/cashout-warning.png" class="responsive-img">
				</div>
			<?php
				    }
			    }
				
			?>

<?php
	if(isset($_SESSION['itemQuan'])){
	if($_SESSION['itemQuan'] > '0'){
		?>

		<input type="image" name="upload" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" alt="PayPal Credit" />
		<?php
	}

}
?>
	
	
</form>


	<span id="cart-totDivs" class="right-align col l4 s12">
		

			<table class="bordered centered highlight hoverable">
			<caption><h5 class="left-align"><b>#Cart Totals </b></h5></caption>

			<tr>
				<th><b> Items</b></th>
				<td><?php 
					echo isset($_SESSION['itemQuan']) ? $_SESSION['itemQuan'] : $_SESSION['itemQuan'] = "0";
				 ?></td>
			</tr>

			<tr>
				<th><b>Shipping and Handling</b></th>
				<td>Free shipping</td>	
			</tr>

			<tr>
				<th><b>Order Total</b></th>
				<td>&#36 <?php 

				 echo isset($_SESSION['itemTotal']) ?  $_SESSION['itemTotal'] : $_SESSION['itemTotal'] = "0";
				?></td>	
			</tr>
	</table>	



	</span>
</div>	





	<!-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
	<script>paypal.Buttons().render('table');</script -->
