<?php
	include "head.php";?>

<div  class="mainContainer">
<div class="center-align">
<div class="Bigcontainer" style="padding: 10px;">

 <div class="panel-heading">
      <h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-dashboard fa-fw"></i><b>Dashboard</b><span class="grey-text text-lighten-1" style="font-size: 20px;">Statistics</span></h5>
</div>
      <div class="row">
        <div class="col s12 m6 l3 z-depth-1">
          <div class="card deep-orange darken-3 cards ">
            <div class="card-content white-text">
              <div class="row">
              	<div class="col l4 s12 m12">
              		<i class="material-icons large">shopping_cart</i>
              	</div>

              	<div class="col l8 s12 m12">
              		<h5><?php echo returnCount('orders') ?></b></h5>
              		<h6><b>ORDERS(s)</b></h6>
              
              </div>
            </div>
             <hr class="line">
            <span><i class="clicked material-icons right">more</i><a href="order.php" class="white-text" style="text-transform: capitalize;" ><b>View Orders(s)</b></a></span>
              	</div>
          </div>
        </div>


        <div class="col s12 m6 l3 cards z-depth-1">
          <div class="card deep-orange lighten-1">
            <div class="card-content white-text">
              <div class="row">
              	<div class="col l4 s12 m12">
              		<i class="material-icons large">question_answer</i>
              	</div>

              	<div class="col l8 s12 m12">

              		<h5><b>22</b></h5>
              		<h6><b>Messages(s)</b></h6>
              	</div>
              		
              </div>
              <hr class="line">
            <span><i class="clicked material-icons right">more</i><a href="comment.php" class="white-text" style="text-transform: capitalize;" ><b>View Messages(s)</b></a></span>
            </div>
            
          </div>
        </div>


	<div class="col s12 m6 l3 cardss z-depth-1">
          <div class="card brown darken-2">
            <div class="card-content white-text">
             <div class="row">

              	<div class="col l4 s12 m12">
              		<i class="material-icons large">card_giftcard</i>
              	</div>

              	<div class="col l8 s12 m12">
              		<h5><b><?php echo returnCount('product') ?></b></h5>
              		<h6><b>Products(s)</b></h6>
              	</div>
              		
              </div>
               <hr class="line">
            <span><i class="clicked material-icons right">more</i><a href="display_post.php" class="white-text" style="text-transform: capitalize;"><b>View User(s)</b></a></span>
            </div>
          
          </div>
        </div>
	

<div class="col s12 m6 l3 cards z-depth-1">
          <div class="card brown lighten-1">
            <div class="card-content white-text">
              <div class="row">

                <div class="col l4 s12 m12">
                  <i class="material-icons large">storage</i>
                </div>

                <div class="col l8 s12 m12">
                  <h5><b><?php echo returnCount('category') ?></b></h5>
                  <h6><b>Categories</b></h6>
                </div>
                  
              </div>
               <hr class="line">
             <span ><i class=" clicked material-icons right">more</i><a href="cat.php" class="white-text" style="text-transform: capitalize;"><b>View Categories</b></a></span>
            </div>
          </div>
        </div>



      </div>
            
      <div class="row">
        
        <div  class="top_table col l6 s12 m6">

         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-money fa-fw"></i><b>Transactions Panel</b></h6>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class=" table-bordered centered hoverable highlight ">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Order Time</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/21/2013</td>
                                                <td>3:29 PM</td>
                                                <td>$321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3325</td>
                                                <td>10/21/2013</td>
                                                <td>3:20 PM</td>
                                                <td>$234.34</td>
                                            </tr>
                                            <tr>
                                                <td>3324</td>
                                                <td>10/21/2013</td>
                                                <td>3:03 PM</td>
                                                <td>$724.17</td>
                                            </tr>
                                            <tr>
                                                <td>3323</td>
                                                <td>10/21/2013</td>
                                                <td>3:00 PM</td>
                                                <td>$23.71</td>
                                            </tr>
                                            <tr>
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>

                                             <tr>
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="right-align">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                             </div> 
                       </div> 




                      <div  class="top_table col l6 s12 m6">

                          <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-money fa-fw"></i><b>Transactions Panel</b></h6>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class=" table-bordered centered hoverable highlight ">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Order Time</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/21/2013</td>
                                                <td>3:29 PM</td>
                                                <td>$321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3325</td>
                                                <td>10/21/2013</td>
                                                <td>3:20 PM</td>
                                                <td>$234.34</td>
                                            </tr>
                                            <tr>
                                                <td>3324</td>
                                                <td>10/21/2013</td>
                                                <td>3:03 PM</td>
                                                <td>$724.17</td>
                                            </tr>
                                            <tr>
                                                <td>3323</td>
                                                <td>10/21/2013</td>
                                                <td>3:00 PM</td>
                                                <td>$23.71</td>
                                            </tr>
                                            <tr>
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>

                                             <tr>
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="right-align">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                             </div> 
                       </div>    


    </div>
</div>
</div>	
</div>

