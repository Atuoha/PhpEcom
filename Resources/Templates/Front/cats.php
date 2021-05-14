




<!-- SEARCH INCLUDES -->
<?php include "../Resources/Templates/Front/search.php"; ?>



    <div class="container" id="main-div"  >
        <div class="row">

            <!-- SideBar INcludes -->
            <?php include "../Resources/Templates/Front/sidebody.php"; ?>


            <div class="col l8 s12 m12 " >
            <div class="row">

              <div id="cat_div">
                <?php
                  if(isset($_GET['cat_items'])){
                    $cat_sel = $_GET['cat_items'];

                    $cat_query = mysqli_query($conn,"SELECT * FROM category WHERE cat_id = '$cat_sel' ");

                    while ($row = mysqli_fetch_assoc($cat_query)) {
                      $cat_name = $row['cat_title'];
                      $cat_img = $row['cat_img'];

                    }
                  }
                    
                    


                ?>
                     <span><h2  class='cat_title center-align'><b><?php echo $cat_name ?></b></h2></span>
                      
              </div>
              <?php
                  if(isset($_GET['cat_items'])){
                      $cat_id = $_GET['cat_items'];


                  $query_cat = mysqli_query($conn,"SELECT * FROM product WHERE status = 'Published' AND prod_quantity > 0  AND prod_cat = '$cat_id' ORDER by product_id DESC");

                  while ($row = mysqli_fetch_assoc($query_cat)) {
                    $pro_id = $row['product_id'];
                    $pro_title = $row['prod_title'];
                    $pro_cat = $row['prod_cat'];
                    $pro_price = $row['prod_price'];
                    $pro_img = $row['prod_img'];
                   
                    $pro_date = $row['date'];
                    $pro_desc = substr($row['prod_desc'], 0,90);

                    ?>

                    <div class="col l6 s12 m6">
                  <div class="card horizontal" style="min-height: 280px;max-height: 300px;">
                    <div class="card-image">
                      <a class="red-text" href="item.php?item=<?php echo $pro_id; ?>"><img src="/E-commerce/Public/Admin/product_imgs_upload/<?php echo $pro_img ?>" alt=""  ></a>
                      <span style="font-size:1.2em;" class="card-title"><b><a class="red-text" href="item.php?item=<?php echo $pro_id; ?>"><?php echo $pro_title ?></a></b></span>
                      <a href="/E-commerce/Resources/cart.php?add=<?php echo $pro_id ?>"  class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
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

                  }

                  $count = mysqli_num_rows($query_cat);

                  if($count == 0){
                    echo "<h6 class='center-align'><img id='error'  src='/E-commerce/Public/image/ss.PNG' class='img-responsive center-align'/><h5 class='center-align grey-text text-lighten-1   ' style='border-radius:10px; padding:5px'><i><b>OPPS!!!</b></i> There are no products available for this category<i>!</i></h6></h5>";
                  }
              ?>

                


                
            



                 </div>
            </div> 



         

    </div>




</div>     
<!-- END OF BODY -->