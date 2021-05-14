



<?php 
	function users_online(){
		if(isset($_GET['onlineUsers'])){
			global $conn;
				if(!$conn){
					include "includes/conn.php";


					$session = session_id();
			        $time = time();
			        $time_out_in_sec = 05;
			        $time_out = $time - $time_out_in_sec;

			        $query_sess = "SELECT * FROM users_online WHERE session = '$session' ";
			        $exec_sess = mysqli_query($conn,$query_sess);
			        $count = mysqli_num_rows($exec_sess);

				        if($count == NULL){
				            mysqli_query($conn,"INSERT INTO users_online(session,time) VALUES('$session','$time')");
				        }else{
				            mysqli_query($conn,"UPDATE users_online SET time = '$time'  WHERE session = '$session' ");
				        }

			        $users_online_query = "SELECT * FROM users_online WHERE time > '$time_out' ";
			        $exec_users_online_query = mysqli_query($conn,$users_online_query);

			        echo $usersOnline_count = mysqli_num_rows($exec_users_online_query);


			}
		}

		

	}
	



	// Function for preventing SQLI INJECTION, use it anywhere you have something going inside in the database

	function escape($string){
		global $conn;

		return mysqli_real_escape_string($conn,trim($string));
	}


	function returnCount($table){
		global $conn;
		

		$query_sel ="SELECT * FROM " . $table;

		$confirm_query = mysqli_query($conn,$query_sel);

		if(!$confirm_query){
			die("Error with query " . mysqli_error($conn));
		}

		$num_counts = mysqli_num_rows($confirm_query);

		return $num_counts;
	}
	// returnCount($table);



	function checkStatus($table,$column,$status){
		global $conn;

		$query_check = mysqli_query($conn,("SELECT * FROM $table WHERE $column = '$status'"));

		if(!$query_check){
			die("Error with checking status query in function " . mysqli_error($conn));
		}	

		return mysqli_num_rows($query_check);

	}


	function is_admin($username = ""){
		global $conn;

		$sel_users = mysqli_query($conn,"SELECT Role FROM users WHERE username = '$username'");

		if(!$sel_users){
			die("Error with Users select in function is_admin " . mysqli_error($conn));
		}

		$row_users = mysqli_fetch_array($sel_users);


		if($row_users['Role'] == "Admin"){
			return true;
		}else{
			return false;
		}
	}



	function user_exists($username){

		global $conn;

		$sel_users_query = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");

		if(!$sel_users_query){
			die("Error with Users select in function is_admin " . mysqli_error($conn));
		}

		if(mysqli_num_rows($sel_users_query) > 0){
			return true;
		}else{
			return false;
		}
	}





	function register_user(){
		global $conn;

  				if(isset($_POST['btn_reg'])){
						$user = mysqli_real_escape_string($conn,$_POST['user']);
						$mail = $_POST['mail'];
						$pass = $_POST['pass'];
						$fname = $_POST['fname'];
						$lname = $_POST['lname'];

						$pass = password_hash($pass, PASSWORD_BCRYPT, array('cost'=>12));


						if(!empty($user) && !empty($mail) && !empty($pass) && !empty($fname) && !empty($lname)){

							$query_insert = mysqli_query($conn,"INSERT INTO user(username,email,firstname,lastname,password) VALUES('{$user}','{$mail}','{$fname}','{$lname}','{$pass}' )");

							if(!$query_insert){
								die("Error with database connection " . mysqli_error($conn));
							}
						
							echo "<img src='image/seen.png' class='img-responsive' width='40px;'/><p class='green-text'><b> Registered successfully</b></p>" ;

						}else{
							echo "<p class='red-text'><i><b>OOPS!!</b> Please fill in details.</i></p>";
						}
					}
	}



	function login_user(){
		global $conn;
				if(isset($_POST['log_btn'])){
					$username = $_POST['username'];
					$password = $_POST['password'];

					if(!empty($username) && !empty($password)){

					$query_user_sel = mysqli_query($conn,"SELECT * FROM user WHERE username LIKE '%$username%'  AND status = 'Approved' ");

					if(!$query_user_sel){
						die("Error with pulling user with specific details " . mysqli_error($conn));
					}

					while ($row = mysqli_fetch_assoc($query_user_sel)) {
						$db_id = $row['user_id'];
						$db_username = $row['username'];
						$db_email = $row['email'];
						$db_fname = $row['firstname'];
						$db_lname = $row['lastname'];
						$db_pass = $row['password'];
						$db_status = $row['status'];
						$db_role = $row['user_role']; 
					}

					$count_user = mysqli_num_rows($query_user_sel);

					if($count_user == 0){
						echo "<p class='red-text'><i><b>OOPS!!</b> Login details not recognised</i></p>";
					}else{
						if(password_verify($password,$db_pass)){
								$_SESSION['user_id'] = $db_id;
								$_SESSION['username'] = $db_username;
								$_SESSION['email'] = $db_fname;
								$_SESSION['lname'] = $db_lname;
								$_SESSION['pass'] = $db_pass;
								$_SESSION['status'] = $db_status;
								$_SESSION['user_role'] = $db_role;

								header("location:Admin");

						}else{
							echo "<p class='red-text'><i><b>OOPS!!</b> Wrong password</i></p>";
						}
					}
					

				}else{
						echo "<p class='red-text'><i><b>OOPS!!</b> Please fill in details.</i></p>";
				}

				}

	}



	function ifitismethod($method=null){

		if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

		return true;
	}else{
		return false;
	}

}


	function check_admin(){
		global $conn;

		if(isset($_SESSION['user_id'])){
              $id = $_SESSION['user_id'];
                    $query_pull_user = mysqli_query($conn,"SELECT * FROM user WHERE user_id = '$id' ");

                      while($row = mysqli_fetch_assoc($query_pull_user)){
                        $username = $row['username'];
                        }

             ?>
            <li class="list  nav_list"><a href="Admin">Admin Logged in as <b><?php echo $username;?></b></a></li>
             <?php
                    }
	}



	function check_cart(){
			global $conn;
		foreach ($_SESSION as $name => $value) {


				if(isset($_SESSION)){
							if($value > 0 ){

				if(substr($name, 0, 8) == "product_"){

					$length = strlen($name);
					$min_res = $length - 8;
					$id = substr($name, 8,$min_res);

					$query_pulling = mysqli_query($conn,"SELECT * FROM product WHERE product_id = '$id' ORDER BY product_id DESC");
					

					while ($row = mysqli_fetch_assoc($query_pulling)) {
						$tit = $row['prod_title'];
					}	

			?>		
			<li class="list  nav_list"><a href="cashout.php?prod_data=<?php echo $id ?>"><?php echo $tit ?></a></li>
			<?php
		}
	}

				}
	
}

}


	function check_login(){

                    if(isset($_SESSION['user_id'])){
                        ?>
                        <li class="list  nav_list"><a href="logout.php">Logout</a></li>
                        <?php
                    }else{
                        ?>
                <li class="list  nav_list"><a href="log.php">Login</a></li>
                    <?php
                    
                    }    


	}

	function get_single_item(){
		global $conn;
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
	}


	

?>


