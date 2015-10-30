<?php 

require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');

if ( isset($_GET['deletetask']) )
{
	$idtask = $_POST['idtask'];

	if ( is_numeric($idtask) ) {
		try {
			$sql = "DELETE FROM tasks WHERE id = :idtask";
			$ps = $pdo->prepare($sql);
			$ps->bindValue(':idtask', $idtask);
			$ps->execute();
		} catch (PDOException $e) {
			echo "Error";
			exit();
		}
	}
	
	header('Location: .');
	exit();
}

// completadas
try{
	$sql = 'SELECT * FROM tasks WHERE doneat IS NOT NULL ORDER BY deletedat';
	$ps = $pdo->prepare($sql);
	$ps->execute();
}catch(PDOException $e) {
	die("No se ha podido extraer información de la base de datos:". $e->getMessage());
}

while ($row = $ps->fetch(PDO::FETCH_ASSOC) ) {
	$completadas[] = $row;
}

require_once 'done.html.php';