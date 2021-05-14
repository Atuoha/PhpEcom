<?php
	
	if(!$conn){
		die("DATABASE CONNECTION ERROR! " . mysqli_error($conn));
	}else{
		// echo "connection works perfect!";
	}

	function set_message($message){
		if(!empty($messsage)){
		$_SESSION['message'] = $message;
		}else{
			$messsage = "";
		}
	}


	function display_message(){
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
	}
	

?>