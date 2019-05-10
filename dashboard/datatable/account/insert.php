<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "Add")
	{
		
		$username = $_POST["username"];
		$level = $_POST["level"];
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		$con_pass = $_POST["con_pass"];
		$status = $_POST["status"];
		

		
		$sql = "SELECT * FROM `user_accounts` WHERE `user_Name`= :user_Name;";
		$statement = $conn->prepare($sql);
		$statement->bindParam(':user_Name', $username, PDO::PARAM_STR);
		$result = $statement->execute();
		$resultrows = $statement->rowCount();

		if (empty($resultrows)) { 
		   // if username is available

			$sql = "INSERT INTO `user_accounts` (`user_ID`, `level_ID`, `user_Name`, `user_Pass`, `user_Email`, `user_Registered`, `user_status`) VALUES (NULL, :level, :user_Name, :encrypted_pass, :email, CURRENT_TIMESTAMP, :status);";
			$statement = $conn->prepare($sql);
			
			$result = $statement->execute(
				array(
					':level'			=>	$level,
					':user_Name'		=>	$username,
					':encrypted_pass' 	=>	encryptIt($pass),
					':email'	  		=>	$email,
					':status'	 		=>	$status
				)
			);

			if(!empty($result))
			{
				echo 'Successfully User Added';
			}

		} else {
		   // if username is not available
			echo 'Username is Already Use';

		}

	
	}

	if($_POST["operation"] == "Edit")
	{
		
		$user_ID = $_POST["user_ID"];
		
		$level = $_POST["level"];
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		$con_pass = $_POST["con_pass"];
		$status = $_POST["status"];
		
		 $sql ="UPDATE `user_accounts` SET `level_ID` = :level,`user_Pass` = :encrypted_pass,`user_Email` = :email,`user_status` = :status WHERE `user_accounts`.`user_ID` = :user_ID;";
		
		$statement = $conn->prepare($sql);
		
		$result = $statement->execute(
				array(
					':user_ID'			=>	$user_ID,
					':level'			=>	$level,
					':encrypted_pass' 	=>	encryptIt($pass),
					':email'	  		=>	$email,
					':status'	 		=>	$status
				)
			);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}
?>
