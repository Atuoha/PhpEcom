 <!-- NAV  -->
    <div class="navbar-fixed">
    <nav>

        <div class="nav-wrapper cyan darken-4">
            <a class="brand-logo right hide-on-med-and-down" id="b"><b> <img src="/E-commerce/Public/image/logo-600.png" width="120px;"></b></a>
            <a class="brand-logo left hide-on-large-only" id="b"><b><img src="/E-commerce/Public/image/logo-600.png" width="120px;"></b></a>
            <a class="button-collapse right" data-activates="mobile"><i class="material-icons">menu</i></a>

            <div class="container">
            <ul class="right hide-on-med-and-down" id="list">
                <li class="list  nav_list"><a href="home.php">Home</a></li>
                <li class="list  nav_list"><a href="shop.php">Shop</a></li>
                 <li class="list  nav_list"><a href="checkout.php">Check Out</a></li>
                <li><a  href="" class="dropdown-button waves-effect  waves-light navlist" data-activates="dropmenu1" >
            Cashouts products</a></li>
                <li class="list  nav_list"><a href="contact.php">Contact</a></li>
                 <?php   check_login() ?>
                <?php check_admin();?>   

                 
              
            </ul> 

             <!-- DESKTOP DROPDOWN LIST FOR SERVICES -->
        <ul id="dropmenu1" class="dropdown-content cyan darken-4 white-text drop ">
            <?php check_cart() ?>
        </ul>
        <!-- END OF  DROPDOWN LIST FOR SERVICES --> 
            </div>



            <ul  id= "mobile" class="side-nav" > 
                 <li class="list  nav_list"><a href="home.php">Home</a></li>
                <li class="list  nav_list"><a href="shop.php">Shop</a></li>
                <li class="list  nav_list"><a href="checkout.php">Check Out</a></li>
                <li><a  class="dropdown-button waves-effect  waves-light navlist" data-activates="dropmenu2" >
            Cashouts products</a></li>
                <li class="list  nav_list"><a href="contact.php">Contact</a></li>
                 <?php   check_login() ?>
                <?php check_admin();?>   

                 
              
            </ul> 

             <!-- DESKTOP DROPDOWN LIST FOR SERVICES -->
        <ul id="dropmenu2" class="dropdown-content cyan darken-4 white-text drop ">
            <?php check_cart() ?>
        </ul>
        <!-- END OF  DROPDOWN LIST FOR SERVICES --> 
               


        </div>
    </nav>
</div>

<div class="fixed-action-btn"  style="bottom:10px;top:350px;">
                <?php
                $query_pull = mysqli_query($conn,"SELECT * FROM cart_prods");

                $count = mysqli_num_rows($query_pull);
                if($count > 0 ){
                echo "<b>" . $count . "</b>" ; 

                }

            ?>

            <a  class="btn-floating   btn-large red"  href="/E-commerce/Public/view_cartProds.php"><i class=" large material-icons">shopping_cart</i>
            </a>
            <a id="menu" class=" waves-effect waves-light  btn-floating btn-large cyan darken-4" onclick="$('.tap-target').tapTarget('open')"><i class="material-icons ">info</i></a>
            
            </div>
            
            <div class="tap-target cyan darken-4" data-activates="menu" >
             <div class="tap-target-content white-text">
                <p><img  width="110" src="/E-commerce/Public/image/logo-600.png"></p>
                       <h4 class="white-text"><I>e-</I><span class=" white-text text-darken-4 " style="font-weight:bold">Servicom</span></h4>

                         <p class="white-text">It may look like <b>our platfrom</b> is just in the business of sales on cash titles. But for us, 
                it’s much deeper than that.</p>
                         <p class="center-align" style="font-size: 2em; font-weight: 300;"><a class="btn red accent-4 waves-effect hoverable waves-light " href="/E-commerce/Public/log.php">Login</a></p>
                     </div>
       </div
<!-- END OF NAV  -->