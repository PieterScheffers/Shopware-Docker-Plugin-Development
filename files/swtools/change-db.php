<?php

try
{
	list($scriptname, $host, $port, $database, $user, $pass) = $argv;
	
	$db = new PDO("mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4", $user, $pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Change locale of default shops to english
	$sql = "UPDATE s_core_shops SET locale_id = 2";
	$db->query($sql);

	// change locale of default users to english
	$sql = "UPDATE s_core_auth SET localeID = 2";
	$db->query($sql);
}
catch(Exception $ex)
{
	echo "change-db.php: Exception: " . $ex->getMessage() . "\n";
}
