<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Tarea</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="row">
					<div class="col-lg-8">
						<h1><a href="<?=$base_url?>">Mis Tareas</a></h1>
						<h2>Editar Tarea <?php echo $_POST['idtask']; ?></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="row">
					<form action="?updatetask" method="post">
						<div class="form-group col-xs-12 col-lg-8">
						    <input type="text" class="form-control col-lg-8" name="task" placeholder="Introducir Tarea" value="<?php if (isset($tarea['task']) ) echo $tarea['task']; ?>">
						</div>
						<div class="form-group col-xs-12 col-lg-2">
						    <select class="form-control" name="level">
						      <option>Nivel</option>
							  <option value="1" <?php if ( $tarea['level'] == 1) echo 'selected'; ?>>1</option>
							  <option value="2" <?php if ( $tarea['level'] == 2) echo 'selected'; ?>>2</option>
							  <option value="3" <?php if ( $tarea['level'] == 3) echo 'selected'; ?>>3</option>
							  <option value="4" <?php if ( $tarea['level'] == 4) echo 'selected'; ?>>4</option>
							  <option value="5" <?php if ( $tarea['level'] == 5) echo 'selected'; ?>>5</option>
							</select>
						</div>
						<input type="hidden" name="idtask" value="<?=$tarea['id']?>">
						<div class="form-group col-xs-12 col-lg-2">
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>