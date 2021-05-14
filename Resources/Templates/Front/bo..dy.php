
<!-- SLIDER INCLUDES -->
<?php include "../Resources/Templates/Front/slider.php"; ?>


<!-- SHORT DESCRIPTOION DIV -->
        <div id="descDiv">
          
          <div class="row">
            <div class="col l6 s12">
               <h4> E-SERVICOM <br>
               STORES</h4>
             </div>
             
             <div class="col l6 s12">
                <img src="/E-commerce/Public/image/cart.png"  class="responsive-img" />
             </div> 
          </div> 
          

        </div>
      
      
 <!-- SHORT DESCRIPTOION DIV -->





<!-- SEARCH INCLUDES -->
<?php include "../Resources/Templates/Front/search.php"; ?>



    <div class="container" id="main-div"  >
        <div class="row">

            <!-- SideBar INcludes -->
            <?php include "../Resources/Templates/Front/sidebody.php"; ?>


            <?php
              if(isset($_GET['adds'])){
                $add_id = $_GET['adds'];



                  $query_sel_pro = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$add_id' ");
                 while($row = mysqli_fetch_assoc($query_sel_pro)){
                    $pro_id = $row['product_id'];
                    $pro_titled = $row['prod_title'];
                    $pro_catd = $row['prod_cat'];
                    $pro_priced = $row['prod_price'];
                    $pro_imgd = $row['prod_img'];

                    $pro_descd = $row['prod_desc'];
                 } 

                 $query_check = mysqli_query($conn,"SELECT prod_id FROM cart_prods WHERE prod_id = '$add_id' ");

                 $count_row = mysqli_num_rows($query_check);

                 if($count_row == 0){
                      $add_cart = mysqli_query($conn,"INSERT INTO cart_prods(prod_id, prod_title,prod_cat, prod_price,prod_img,prod_desc) 
                      VALUES('$pro_id', '$pro_titled', '$pro_catd','$pro_priced','$pro_imgd','$pro_descd')");
                      
                    if(!$add_cart){
                      die("ERROR WITH ADDING " . mysqli_error($conn));
                    }

                    header("location:/E-commerce/public/home.php");
                 } 

                
              }


            ?>

            <div class="col l8 s12 m12 " >
            <div class="row">

              <?php
                  $query_sel = mysqli_query($conn,"SELECT * FROM product ORDER by product_id DESC");

                  while ($row = mysqli_fetch_assoc($query_sel)) {
                    $pro_id = $row['product_id'];
                    $pro_title = $row['prod_title'];
                    $pro_cat = $row['prod_cat'];
                    $pro_price = $row['prod_price'];
                    $pro_img = $row['prod_img'];

                    $pro_date = $row['date'];
                    $pro_desc = substr($row['prod_desc'], 0,90);

                    ?>

                    <div class="col l6 m6 s12 m4" id="body">
                  <div class="card horizontal" style="min-height: 280px;max-height: 300px;">
                    <div class="card-image">
                      <a class="red-text" href="item.php?item=<?php echo $pro_id; ?>"><img src="/E-commerce/Public/Admin/product_imgs_upload/<?php echo $pro_img ?>" alt=""  ></a>
                      <span style="font-size:1.2em;" class="card-title"><b><a class="red-text" href="item.php?item=<?php echo $pro_id; ?>"><?php echo $pro_title ?></a></b></span>
                      <a href="/E-commerce/Public/home.php?adds=<?php echo $pro_id ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                    </div>
                    <div class="card-content">
                      <p><b>$<?php echo $pro_price ?></b></p>
                      <p><?php echo $pro_desc ?></p><br>
                      <p><span><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i></span></p>
                       <span class="right-align"></span><i>15 reveiws</i>
                    </div>
                  </div>
                </div>

               <?php     
                  }


              ?>

            <!--  -->
                            
            



                 </div>
            </div> 



         

    </div>




</div>     
<!-- END OF BODY -->