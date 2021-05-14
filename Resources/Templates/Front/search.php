<!-- SEARCH POSITION -->
<section id="search" class="section section-search cyan darken-4 white-text center">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <form method="post" action="searched.php">
        <div class="input-field center-align">
          <input type="text" name="search" autocomplete="on" class="white grey-text autocomplete" placeholder="Search for contents ...">
          <button type="submit" name="search_btn"  class=" hide-on-large-only white-text btn cyan darken-3 hoverable waves-light waves-effect">Search</button>
      </div>
    </form>
    </div>
</div>
</section>


<!-- SEARCH POSITION -->


<?php
   if(isset($_POST['search_btn'])){
        $search = mysqli_real_escape_string($conn,$_POST['search']);



   } 
?>