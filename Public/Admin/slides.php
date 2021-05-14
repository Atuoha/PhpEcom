<?php
    ob_start();
	include "head.php";?>

<div  class="mainContainer">
<div class="center-align">
<h2 class="center-align">
	<img src="image/slide.png" alt="Some-image" width="170px;">
</h2>
</div>	

<div style="padding: 10px;">
<div class="panel-heading">
<h5 class="panel-title grey lighten-4 left-align" style="padding: 10px; border-radius:10px 10px 0 0;"><i class="fa fa-file-video-o"></i><b> Admin</b><span class="grey-text text-lighten-1" style="font-size: 20px;"> Slides</span></h5>
</div>





<form method="post" enctype="multipart/form-data">

	<?php

		if(isset($_POST['slide_btn'])){
			
			$title = mysqli_real_escape_string($conn,$_POST['title']);
			$image = $_FILES['slide_img']['name'];
			$image_temp = $_FILES['slide_img']['tmp_name'];

			$pullExist_slides = mysqli_query($conn,"SELECT * FROM slider WHERE image = '$image' ");

			if(!$pullExist_slides){
				die("Error " . mysqli_error($conn));
			}

			$count_rows = mysqli_num_rows($pullExist_slides);

			if($count_rows == 0 ){

				if(!empty($title && $image)){
				move_uploaded_file($image_temp, "slide_imgs/$image");
				$query_insert_slide = mysqli_query($conn,"INSERT INTO slider(title,image) VALUES('$title','$image')");

				if(!$query_insert_slide){
					die("Error " . mysqli_error($conn));
				}

				echo "<i class='green-text'><b><i class='fa fa-check-circle'></i> Bravos! Slide added successfully.</b></i>";
				header("location:slides.php");
			}else{
				echo "<i class='red-text'><b><i class='fa fa-window-close'></i> 0pps! You certainly have to fill fields.</b></i>";
			}


			}else{
				echo "<i class='red-text'><b><i class='fa fa-window-close'></i> 0pps! Slide already exists.</b></i>";
			}


			
		}
	?>

<div class="row">

 <div class="col l6 m6 s12">
	<div class="input-field">
		<h6><b>Title</b> <i class="material-icons right">text_fields</i></h6>
		<input type="text" id="cat-input"  name="title" placeholder="Enter Title">
	</div>	


	<div class="input-field">
		<button type="submit" id="pst-btn" name="slide_btn" class="hide-on-med-and-down light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Add Slide</button>
	</div>

</div>

<div class="col l6 m6 s12">

	<div class="input-field">
		<i class="material-icons large">movie_filter</i>
		<h6><b>Slide Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" name="slide_img"  id="cat-input">
	</div>	
	

	<div class="input-field">
		<button type="submit" id="pst-btn" name="slide_btn" class="hide-on-large-only light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Add Slide</button>
	</div>

</div>


</div>

</form>	













<!-- TABLE CHECKING ACTION -->


<?php
	if(isset($_POST['checkedbox'])){

		foreach (($_POST['checkedbox']) as $array_input ) {
			$sel_options = $_POST['sel_options'];
			if($sel_options){
				
				switch ($sel_options) {
						
							case 'delete':

                            $query_pull_image_name = mysqli_query($conn,"SELECT image FROM slider WHERE id = '$array_input' ");
                            
                            if(! $query_pull_image_name){
                                die("Error " . mysqli_error($conn));
                            }
                            
                            while($row = mysqli_fetch_array($query_pull_image_name)){
                                
                                echo $image_name = $row['image'];
                            }
                        
							$query_del = "DELETE FROM slider WHERE id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);
							
							$target_path = "slide_imgs/$image_name";
							
							unlink($target_path);

							if(!$exec_del){
								die("ERROR WITH DELETE" . mysqli_error($conn));
							}
								header("location:slides.php");

							break;
							
							case 'approve':



							$query_del = "UPDATE slider SET status = 'Approved' WHERE id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH UPDATE" . mysqli_error($conn));
							}
								header("location:slides.php");

							break;
                            
                            
                            case 'unapprove':



							$query_del = "UPDATE slider SET status = 'Unpproved'  WHERE id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH UPDATE" . mysqli_error($conn));
							}
								header("location:slides.php");

							break;





							default:
							# code...
							break;

						}
					}		

				}
			}	
	?>




<form method="post" >
	<div class="input-field col s12 m4" id="sel_input_divs" >
    <select name="sel_options">
			<option disabled selected value="none">Select options</option>
            
            <option  class=" circle" value="approve">Approve</option>	
            <option  class=" circle" value="unapprove">Unapprove</option>
    		 <option  class=" circle" value="delete">Delete</option>
 

    </select>
  </div>

<button type="submit"   name="activate_btn" class="del-cat-btn green waves-effect  waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Apply Action</button>



<div class="row">

<table class="responsive-table centered highlight">
<caption><b>Slide Preview</b></caption>	
	<thead class="blue white-text darken-2">
		<tr>
			<tr>
				<th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th>
			<th>ID</th>
			<th>Title</th>
			<th>Status</th>
			<th>Image</th>
		
			
		</tr>	
	</thead>

	<tbody>
		<?php
			$pull_slides = mysqli_query($conn,"SELECT * FROM slider ORDER BY id DESC");

			if(!$pull_slides){
				die("Error " . mysqli_error($conn));
			}

			while ($row = mysqli_fetch_array($pull_slides)) {
				$id = $row['id'];
				$db_title = $row['title'];
				$db_image = $row['image'];
				$db_status = $row['status'];

			?>
			
			<tr>
				<td>			
				<input type="checkbox"  class="checkboxes" name="checkedbox[]" value="<?php echo $id?>"  id="<?php echo $id?>" />
				<label for="<?php echo $id?>"></label>
			    </form>
			    </td>	
				<td><?php echo $id ?></td>
				<td><?php echo $db_title ?></td>
				<td class='green-text'><?php echo $db_status ?></td>
				<td><img src="slide_imgs/<?php echo $db_image ?>" class="responsive-img materialboxed" data-caption="<?php echo $db_title ?>" width="100px"></td>
			</tr>	

			<?php	
			}
		?>
		

	</tbody>	

</table>	

</dic>	


</div>	
</div>