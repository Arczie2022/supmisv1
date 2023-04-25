<?php
	require '../../Models/Connection/connection_token.php';

	$result = $db->prepare("SELECT SUM(`stockBalance`) as `balance` FROM `tblstock` WHERE `supplyID` = :Supply");
	$result->execute([":Supply" => POST("Supply")]);
	if($row = $result->fetch()){
		$arrayStock[] = array("message" => "success", 'Stock' => $row["balance"]);		
	}else{
		$arrayStock[] = array("message" => "success", 'Stock' => "0");		
	}

	jsEncode($arrayStock);
?>