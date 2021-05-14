
            <?php
              if(isset($_SESSION['user_id'])){
                  $id = $_SESSION['user_id'];
                  $query_pull_user = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$id' ");

                  while($row = mysqli_fetch_assoc($query_pull_user)){
                        $username = $row['username'];
                  }
              }


            ?>





<ul class="side-nav fixed navBar blue darken-3 white-text" id="sidenav" >
<li id="head-det">
    <div class="user-view">
         <div class="background">
             <img src="image/ba.png" class="responsive-img" alt="some-image">
    </div>
        <a href="">
             <img src="image/hl.png" class="circle"  alt="some-image">
        </a>
            <span class="black-text center-align"><b>E-COM ADMINISTRATOR</b></span>
    </div>
</li>



<li><a href="index.php" class="white-text" id="home"><i class="material-icons white-text">apps</i><b>Dashboard</b></a></li>
<br >

<li><a id="pst" class="dropdown-button white-text" data-activates="posts-li"><i class="material-icons white-text">descriptions</i><i class="material-icons white-text right T-btn">arrow_drop_down</i><b>Products</b>
</a></li>

<ul class="dropdown-content" id="posts-li" >
<li><a  href="display_post.php" ><i class="material-icons">book</i><b>View all products</b></a></li>
    <li><a href="add_post.php"><i class="material-icons">add_cirlce</i><b>Add product</b></a></li>
</ul>
<br class="hide-on-med-and-down">

<li><a href="cat.php" class="white-text" id="cat"><i class="material-icons white-text">storage</i><b>Categories</b></a></li>
<br class="hide-on-med-and-down">

<li><a href="comment.php" class="white-text" id="comment"><i class="material-icons white-text">insert_comment</i><b>Review Comments</b></a></li>
<br class="hide-on-med-and-down">

<li><a href="order.php" class="white-text"><i class="material-icons white-text">shopping_cart</i><b>Orders Report</b></a></li>
<br class="hide-on-med-and-down">

<li><a href="contact.php" class="white-text" id="comment"><i class="material-icons white-text">contacts</i><b>Contacts</b></a></li>
<br class="hide-on-med-and-down">

<li><a href="slides.php" class="white-text" id="comment"><i class="material-icons white-text">movie_filter</i><b>Slides</b></a></li>
<br class="hide-on-med-and-down">

<li><a  id="users" class="dropdown-button white-text" data-activates="users-li"><i class="material-icons white-text">people</i><i class="material-icons white-text right T-btn ">arrow_drop_down</i><b>Users</b></a></li>

<ul class="dropdown-content white-text" id="users-li" >
<li><a  href="users.php" ><i class="material-icons">assignment_ind</i><b>View all users</b></a></li>
<li><a href="add_user.php"><i class="material-icons">add_cirlce</i><b>Add user</b></a></li>
</ul>

<br class="hide-on-med-and-down">

<li><a href="profile.php" class="white-text" id="Profile"><i class="material-icons white-text">person</i><b>Profile</b></a></li>
<br>




<li><a href="" class="dropdown-button waves-effect waves-light white-text" data-activates="drop-list1" ><i class="material-icons white-text">account_circle</i><i class="material-icons white-text right T-btn" >arrow_drop_down</i><b> <?php echo $username ?>  </b></a></li>



</ul>


 <ul id="drop-list1" class="dropdown-content">
    <li><a href="includes/logout.php" id="liveChat"><i class="material-icons">settings_power</i><b>Logout</b></a></li>
    <li><a href="../home.php" target="_blank"><i class="material-icons">extension</i><b>Visit website</b></a></li>


</ul>