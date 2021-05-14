<?php include "../Resources/Templates/Front/search.php"; ?>
    <div class="container" id="main-div"  >
        <div class="row">

            <!-- SideBar INcludes -->
            <!--<?php include "../Resources/Templates/Front/sidebody.php"; ?>-->



            <?php
                 if(isset($_POST['search_btn'])){
                    $search = mysqli_real_escape_string($conn,$_POST['search']);

                    if(!empty($search)){

                     $query_sel = mysqli_query($conn,"SELECT * FROM product  WHERE status = 'Published' AND prod_quantity > 0 AND prod_title LIKE '%$search%'  ");

                     $count = mysqli_num_rows($query_sel);

                     if($count ==0){

                           echo "<h6 class='center-align'><img id='error'  src='image/ss.PNG' class='img-responsive center-align'/><h5 class='center-align grey-text text-lighten-1   ' style='border-radius:10px; padding:5px'><i><b>OPPS!!!</b></i> There are no products available for your search<i>!</i></h6></h5>";
                     }elseif($count == 1){

                             while ($row = mysqli_fetch_assoc($query_sel)) {
                            $pro_id = $row['product_id'];
                            $pro_title = $row['prod_title'];
                            $pro_cat = $row['prod_cat'];
                            $pro_price = $row['prod_price'];
                            $pro_img = $row['prod_img'];
                            $pro_date = $row['date'];
                            $pro_desc = $row['prod_desc'];
                            $short_desc = $row['short_desc'];

                             $pro_author = $row['author'];

                          }


                        ?>   
                <div class="col l12 s12 m12 " >
            <div class="row">
                <div class="col l6 12">
                  <img src="/E-commerce/Public/Admin/product_imgs_upload/<?php echo $pro_img ?>" width="300px" class="materialboxed" data-caption="<?php  echo $pro_title . " $".$pro_price; ?>"/>
                 </div> 

                   <div class="col l6 12 desc-part " style="padding: 10px;">

                    <h5><b><?php echo $pro_title ?></b></h5>
                    <p><i >...by <?php echo strtolower($pro_author) ?></i></p>

                    <br>
                    <p><b>$<?php echo $pro_price ?></b></p>
                    <span><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i></span>
                       <span class="right-align"></span><i>4.0 stars</i>
                     <p class="para_des">
                       <?php echo $short_desc ?>
                     </p>
                     <p class="right-align"><i><?php echo $pro_date ?></i></p>
                      <br>
                       <a href="/E-commerce/Resources/cart.php?add=<?php echo $pro_id ?>"  id="abc" class="red waves-effect white-text waves-light hoverable"><i class="material-icons right ">attach_money</i>
                        Purchase now</a>

                 </div> 

             
                  <ul id="tabs-swipe-demo" class="tabs">
                  <li class="tab col s3 "><a class="active" href="#test-swipe-1"><b>Description</b></a></li>
                  <li class="tab col s3"><a href="#test-swipe-2"><b>Reviews</b></a></li>
                </ul>
                <div id="test-swipe-1" class="col s12 ">
                    <?php echo $pro_desc ?>
                </div>


                <div id="test-swipe-2" class="col s12 ">
                   <div class="row">
                        <div class="col l6 s12">
                            <h6><b>3 Reviews From</b></h6>
                              <hr class="line"><hr class="line">

                             <span><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i></span><span> Mike Philips</span>
                             <i class="right-align" style="float: right">20 days ago</i>
                             <p>This product is intensely out of measure for it offers the best of all without trying to withdrawing some chances of receiving the full course</p>
                             <br>
                             <hr class="line">


                             <span><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i></span><span> Unknowns</span>
                             <i class="right-align" style="float: right">05 days ago</i>
                             <p>This product is intensely out of measure for it offers the best of all without trying to withdrawing some chances of receiving the full course</p>
                             <br>
                             <hr class="line">

                             <span><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i></span><span> Samson Diodio</span>
                             <i class="right-align" style="float: right">11 days ago</i>
                             <p>This product is intensely out of measure for it offers the best of all without trying to withdrawing some chances of receiving the full course</p>
                             <hr class="line">


                        </div>
                        
                        <div class="col l6 s12">
                                    <h6><b>Add A review</b></h6>
                                    <hr class="line">
                                    <hr class="line">
                                 <form  class="center-align" method="post" action="register.php" enctype="multipart/form-data">
                                      <div class="row">

                                      <div class="col m6 s12">

                                      <div class="input-field">
                                        <input type="text" name="user" id="user" placeholder="Username" autocomplete="on">

                                        <label class="lab" for="user"><i class="material-icons " >account_circle</i></label> 
                                      </div>  

                                      </div>  


                                      <div class="col m6 s12">
                                      
                                         <div class="input-field">
                                        <input type="email" name="mail" id="user" placeholder="Email">
                                        <label class="lab" for="user"><i class="material-icons " >mail</i></label> 
                                      </div> 

                                      </div>  

                                    </div>
                                      

                                      <div class="input-field">
                                      <textarea id="msg" type="email" name="con-msg" placeholder="Enter Message" ></textarea>  
                                      <label for="msg"><i class="material-icons medium">question_answer</i></label>
                                    </div>
                                    <br>
                                     <hr class="line">
                                    <hr class="line">
                                    <p><b>Your Rating</b></p>
                                    <p><span><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star deep-orange-text text-darken-3"></i><i class="fa fa-star  blue-grey-text text-lighten-4"></i></span></p>


                                      <div class="input-field right-align">
                                      <button type="submit" id="abc" name="btn-reg" class=" red waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Register</button> 
                                      </div>

                                        </form>

                                      </div>  

                                
                        </div>  
                </div>


                 </div>





            </div> 

            <?php 


            }else{


               while ($row = mysqli_fetch_assoc($query_sel)) {
                    $pro_id = $row['product_id'];
                    $pro_title = $row['prod_title'];
                    $pro_cat = $row['prod_cat'];
                    $pro_price = $row['prod_price'];
                    $pro_img = $row['prod_img'];
                   
                    $pro_date = $row['date'];
                    $pro_desc = substr($row['prod_desc'], 0,90);

                    ?>

                    <div class="col l4 s12 m4">
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


            }


                }else{
                           echo "<h6 class='center-align'><img id='error'  src='image/ss.PNG' class='img-responsive center-align'/><h5 class='center-align grey-text text-lighten-1   ' style='border-radius:10px; padding:5px'><i><b>OPPS!!!</b></i> You certainly have to enter a product name<i>!</i></h6></h5>";

                }

                }


            ?>







         



         

    </div>




</div>     
<!-- END OF BODY -->