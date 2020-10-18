<?php 
// DB credentials.
define('DB_HOST','198.71.225.55:3306');
define('DB_USER','20152416');
define('DB_PASS','hlkiJ8');
define('DB_NAME','IA20152416');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>