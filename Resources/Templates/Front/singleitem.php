
    <div class="container" id="main-div"  >
        <div class="row">

            <!-- SideBar INcludes -->
            <!--<?php include "../Resources/Templates/Front/sidebody.php"; ?>-->



            <?php
                if(isset($_GET['item'])){
                  $item_id = $_GET['item'];

                     $query_sel = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$item_id' ");

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

                }


            ?>







            <div class="col l12 s12 m12 " >
            <div class="row">
                <div class="col l6 12">
                  <img src="/E-commerce/Public/Admin/product_imgs_upload/<?php echo $pro_img ?>"  width="300px" class="img-responsive materialboxed" data-caption="<?php  echo $pro_title . " $".$pro_price; ?>"/>
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
                  <li class="tab col s3"><a class="active" href="#test-swipe-1">Description</a></li>
                  <li class="tab col s3"><a href="#test-swipe-2">Reviews</a></li>
                </ul>
                <div id="test-swipe-1" class="col s12" style="text-align: justify;">
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
                                      <button type="submit" id="abc" name="btn-reg" class=" red waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Submit</button> 
                                      </div>

                                        </form>

                                      </div>  

                                
                        </div>  

                    </div>  

                </div>


                 </div>





            </div> 



         

    </div>




</div>     
<!-- END OF BODY -->