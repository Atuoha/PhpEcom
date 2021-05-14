<?php include "../Resources/config.php";?>
<?php include "Admin/function.php";?>

<?php include "../Resources/Templates/Front/head.php";?>
<?php include "../Resources/Templates/Front/search.php"; ?>
<?php ob_start();?>
<div>



        
<div class="container" id="main-div"  >
        <div class="row">

            <!-- SideBar INcludes -->
            <?php include "../Resources/Templates/Front/sidebody.php"; ?>



            <div class="col l8 s12 m12 " >
            	<h4><b>CART ITEMS</b></h4>
            <div class="row">

              <?php
                  $query_sel = mysqli_query($conn,"SELECT * FROM cart_prods ORDER by id DESC");

                  while ($row = mysqli_fetch_assoc($query_sel)) {
                    $pro_id = $row['prod_id'];
                    $pro_title = $row['prod_title'];
                    $pro_cat = $row['prod_cat'];
                    $pro_price = $row['prod_price'];
                    $pro_img = $row['prod_img'];

                    $pro_desc = substr($row['prod_desc'], 0,90);

                    ?>

                    

                    <div class="col l6 s12 m6" id="body">
                  <div class="card horizontal" style="min-height: 280px;max-height: 300px;">
                    <div class="card-image">
                      <a class="red-text" href="item.php?item=<?php echo $pro_id; ?>"><img src="/E-commerce/Public/Admin/product_imgs_upload/<?php echo $pro_img ?>" alt=""  ></a>
                      <span style="font-size:1.2em;" class="card-title"><b><a class="red-text" href="item.php?item=<?php echo $pro_id; ?>"><?php echo $pro_title ?></a></b></span>
                      <a href="../Resources/cart.php?add=<?php echo $pro_id ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">attach_money</i></a>
                    </div>
                    <div class="card-content">
                      <p><b>$<?php echo $pro_price ?></b></p>
                      <p><?php echo $pro_desc ?></p><br>
                      <p><span><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i></span></p>
                       <span class="right-align"></span><i>15 reveiws</i><br>
                       <a href="view_cartProds.php?delCart=<?php echo $pro_id ?>" class="red-text">Remove From Cart</a>
                    </div>
                  </div>
                </div>

               <?php     
                  }


              ?>

            <!--  -->
                            
            
            <?php 
                        $counting_items = mysqli_num_rows($query_sel);

                        if($counting_items < 1){
                            ?>
                            <div class="center">
                            <img  src="image/warning_cart.PNG" class="responsive-img">
                          </div>
                            <?php
                        }

                    ?>


                 </div>
            </div> 



         

    </div>




</div>     
<!-- END OF BODY -->

<div>
<?php include "../Resources/Templates/Front/foot.php";?>
</div>  
  
</body>
</html>



<?php
  if(isset($_GET['delCart'])){
    $delcart_id = $_GET['delCart'];

    $query_del = mysqli_query($conn,"DELETE FROM cart_prods WHERE prod_id = '$delcart_id' ");

    if(!$query_del){
      die("Error " . mysqli_error($conn));
    }

    header("location:view_cartProds.php");
  }


?>