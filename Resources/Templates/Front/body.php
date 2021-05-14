
<!-- SLIDER INCLUDES -->
<?php include "slider.php"; ?>


<!-- SHORT DESCRIPTOION DIV -->
        <div id="descDiv">
          
          <div class="row">
            <div class="col l6 s12">
               <h4 class="hide-on-med-and-down">SERVICOM <br>
               STORES</h4>
		<p>...a place to purchase with pride and coins </p>
             </div>
             
             <div class="col l6 s12">
                <img src="/E-commerce/Public/image/cart.png"  class="responsive-img" />
             </div> 
          </div> 
          
        </div>
      
      
 <!-- SHORT DESCRIPTOION DIV -->





<!-- SEARCH INCLUDES -->
<?php include "search.php"; ?>



    <div class="container" id="main-div"  >
        <div class="row">

            <!-- SideBar INcludes -->
            <?php include "sidebody.php"; ?>


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

                    header("location:/E-commerce/Public/home.php");
                 } 

                
              }


            ?>

            <div class="col l8 s12 m12 " >
            <div class="row">
                
                <?php
                    
                    $pull_slides = mysqli_query($conn,"SELECT * FROM slider WHERE status = 'Approved' ORDER BY id DESC");
                    
                    if(!$pull_slides){
                        die("Error " . mysqli_error($conn));
                    }
                    
                    $count_rows = mysqli_num_rows($pull_slides);
                    
                    if($count_rows > 0){
                    ?>    
                        <div class="slider bodyslides hide-on-small-only">
                <ul class="slides">
                  
                  <!-- This section is a section that acts as the slider in the body, it shows images which were abled by the administrator in the admin dashboard --> 
                  
                  <?php
                    
                    $pull_slides = mysqli_query($conn,"SELECT * FROM slider WHERE status = 'Approved' ORDER BY id DESC");
                    
                    if(!$pull_slides){
                        die("Error " . mysqli_error($conn));
                    }
                    
                    while($row = mysqli_fetch_array($pull_slides)){
                        $title = $row['title'];
                        $image = $row['image'];
                        
                    ?>    
                    
                    <li>
                    <img src="/E-commerce/Public/Admin/slide_imgs/<?php echo $image ?>" class="responsive-img" "> 
                    <div class="caption center-align">
                      <h3><?php echo $title ?></h3>
                    </div>
                  </li>
                    
                    <?php    
                    }
                  
                  ?>
                  
                  
                  
                </ul>
              </div>
      
                        
                    <?php    
                    }
                    
                    ?>
           
              
                

               <?php


                $query_sel = mysqli_query($conn,"SELECT * FROM product WHERE status = 'Published' AND prod_quantity > 0 ORDER by product_id DESC");

                if(!$query_sel){
                  die("Error " . mysqli_error($conn));
                }

                 $count_products = mysqli_num_rows($query_sel);

                 if(isset($_GET['page'])){
                       $page = preg_replace("#[^0-9]#", ' ', $_GET['page']);
                 }else{
                   $page = 1;
                 }

                 $perpage = 4;  // NUMBER OF ITEM TO BE DISPLACED ON EACH PAGE

                 $lastpage = ceil($count_products / $perpage);

                 if($page < 1){
                    $page = 1;
                 }elseif($page > $lastpage){
                    $page = $lastpage;
                 }

                 $middlenumber = '';

                 $sub1 = $page - 1;
                 $sub2 = $page - 2;
                 $add1 = $page + 1;
                 $add2 = $page + 2;

                 if ($page == 1){
                     $middlenumber .= '<li class="active"><a>'. $page.'</a></li>';
                     $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$add1.' ">'.$add1.'</a></li>';
                  
                 }elseif ($page == $lastpage){
                      $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$sub1.' ">'.$sub1.'</a></li>';

                       $middlenumber .= '<li class="active"><a>'. $page.'</a></li>';

                 }elseif ($page > 2 && $page < ($lastpage -1)){
                      $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$sub2.' ">'.$sub2.'</a></li>';

                      $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$sub1.' ">'.$sub1.'</a></li>';

                       $middlenumber .= '<li class="active"><a>'. $page.'</a></li>';

                      $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$add1.' ">'.$add1.'</a></li>';

                      $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$add2.' ">'.$add2.'</a></li>';

                 }elseif ($page > 1 && $page < $lastpage) {
                     $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$sub1.' ">'.$sub1.'</a></li>';

                     $middlenumber .= '<li class="active"><a>'. $page.'</a></li>';

                     $middlenumber .= '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$add1.' ">'.$add1.'</a></li>';

                 } 

                 // TO CREATE A PAGINATION THAT HAS "PAGE 1 OF 100 OR PAGE 20 OF 50 USE"

                  // if($lastpage != 1){
                //     echo "Page $page of $lastpage";
                // }

                  // END OF COMMENT




                 // Back and Next Button

                 $outPagination = "";

                  if($page != 1){
                      $prev = $page - 1;
                      $outPagination = '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$prev.' ">Back</a></li>';
                  }

                  $nextPagination = "";

                  if($page != $lastpage){
                      $next  = $page + 1;
                      $nextPagination = '<li class="waves-effect"><a href=" '. $_SERVER['PHP_SELF'] .'?page= '.$next.' ">Next</a></li>';
                  }

                 // End of Back and Next Button

                  

                  $limit = 'LIMIT ' . ($page - 1) * $perpage . ' , ' . $perpage;

                  $query_sel2 = mysqli_query($conn,"SELECT * FROM product WHERE status = 'Published' AND prod_quantity > 0 ORDER by product_id DESC $limit ");

                if(!$query_sel2){
                  die("Error " . mysqli_error($conn));
                }

                  while ($row = mysqli_fetch_assoc($query_sel2)) {
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
                      <a href="home.php?adds=<?php echo $pro_id ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
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



                  <ul class="pagination">
                    <?php echo $outPagination . $middlenumber . $nextPagination ; ?>
                  </ul>


    </div>




</div>     
<!-- END OF BODY -->