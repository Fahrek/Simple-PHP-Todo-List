<?php
require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php'); 

try{
	$sql = "CREATE TABLE tasks (
		id 			INT AUTO_INCREMENT PRIMARY KEY,
		task 		VARCHAR(255) NOT NULL,
		level   	ENUM('1','2','3','4','5') NOT NULL DEFAULT '1',
		createdat	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		doneat 		TIMESTAMP NULL DEFAULT NULL,
		deletedat 	TIMESTAMP NULL DEFAULT NULL
	) DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB";

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec($sql);

}catch(PDOException $e){
		die("No se ha podido crear la tabla 'tasks':". $e->getMessage());
}