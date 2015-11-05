<?php
require_once(dirname(dirname(__FILE__)).'/app/info.php');
require_once(__ROOT__.'/db/connectdb.php');

if ( isset($_GET['updatetask']) ) {
	$id = $_POST['idtask'];
	$task = $_POST['task'];
	$level = $_POST['level'];

	try{
		$sql = "UPDATE tasks SET task = :task, level = :level WHERE id = :id";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':task', $task);
		$ps->bindValue(':level', $level);
		$ps->bindValue(':id', $id);
		$ps->execute();
	}catch(PDOException $e){
		die('No se pudo actualizar la tarea. Error: '.$e->getMessage() );
	}

	header( 'Location: '.$base_url);
}

if ( isset($_POST['idtask']) ) {
	$id = $_POST['idtask'];

	try{
		$sql = "SELECT id, task, level FROM tasks WHERE id = :id";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(':id', $id);
		$ps->execute();
	}catch(PDOException $e){
		die('No se puede extraer información de la tarea. Error: '.$e->getMessage() );
	}

	// OJO AL DATO:
	// Estamos seguros que esta consulta solo devuelve como mucho 1 resultado
	$tarea = $ps->fetch(PDO::FETCH_ASSOC);

	require_once 'editar.html.php';
}else{
	header('Location: '.$base_url);
}