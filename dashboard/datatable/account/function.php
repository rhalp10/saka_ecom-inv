<?php
function encryptIt($q)
{
  $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
  $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
  return ($qEncoded);
}

function decryptIt($q)
{
  $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
  $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
  return ($qDecoded);
}

function get_total_all_records()
{
	include('db.php');
	$statement = $conn->prepare("SELECT * FROM `user`");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function check_user_level($var)
{
	include('db.php');
	$statement = $conn->prepare("SELECT * FROM `user_level` WHERE `lvl_ID` = $var");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$level_name = $row["lvl_Name"];
	}
	return $level_name;
}



?>