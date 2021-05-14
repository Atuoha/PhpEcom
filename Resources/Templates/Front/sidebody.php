              <div class="col l4 s12 m12 " >
                <ul class="collection">
                   <?php
                  $query_show_cat = mysqli_query($conn,"SELECT * FROM category");

                  while ($row = mysqli_fetch_assoc($query_show_cat)) {
                    $cat_id = $row['cat_id'];
                    $cat_tits = $row['cat_title'];
                    $cat_img = $row['cat_img'];
                    $cat_date = $row['date'];

                    ?>
                    <li class="collection-item avatar">
                      <img src="/E-commerce/Public/Admin/cat_imgs_upload/<?php echo $cat_img ?>" alt="" width="150px;" class="circle">
                      <p class="title"><b><?php echo $cat_tits  ?></b></p>
                      <p><i><?php echo date('d-M-Y || h:i:a', strtotime($cat_date)) ?></i><br>
                         <a class="red-text" href="cat_items.php?cat_items=<?php echo $cat_id ?>"><i class="material-icons right red-text">remove_red_eye</i>View Category</a>
                      </p>
                      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>

                    <?php
                  }

                    $count_cat_rows = mysqli_num_rows($query_show_cat);
                    if($count_cat_rows == 0){
                      echo "<p class='red-text'><b>CATEGORY SEEMS TO BE EMPTY!</b></p>";
                    }

                  ?>

               </ul>
            </div>  