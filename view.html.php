<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mi lista de tareas</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
	<style>
		h1 a:hover {
			text-decoration: none;
		}
		.deletetask {
			text-align: right;
		}
		.deletetaskbutton {
			margin: 0px;
			padding: 0px;
		}
		.orderbutton {
			display: inline-block;
		}
		.orderbutton button {
			margin: 0px;
			padding: 6px 10px;
		}
		.orderbuttons {
			margin-top: 25px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="row">
					<div class="col-lg-8">
						<h1><a href="<?=$base_url?>">Mis Tareas</a></h1>
					</div>
					<div class="col-lg-4 orderbuttons">
						<div class="btn-group" role="group" aria-label="order">
							<form action="?tareaasc" method="post" class="orderbutton">
								<button type="submit" class="btn btn-default" title="Orden ascendente">
									<span class="glyphicon glyphicon-sort-by-alphabet"></span>
								</button>
							</form>
							<form action="?tareadesc" method="post" class="orderbutton" title="Orden descendente">
								<button type="submit" class="btn btn-default">
									<span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
								</button>
							</form>
							<form action="?nivelasc" method="post" class="orderbutton" title="Nivel ascendente">
								<button type="submit" class="btn btn-default">
									<span class="glyphicon glyphicon-sort-by-order"></span>
								</button>
							</form>
							<form action="?niveldesc" method="post" class="orderbutton" title="Nivel descendente">
								<button type="submit" class="btn btn-default">
									<span class="glyphicon glyphicon-sort-by-order-alt"></span>
								</button>
							</form>
						</div>
					</div>
				</div>
				
				<table class="table table-striped">
					<tbody>
						<?php if ( !empty($datos) ): ?>
							<?php foreach($datos as $dato):
								switch ($dato['nivel']) {
									case '1':
										$colorTarea = 'class="active"';
										break;
									case '2':
										$colorTarea = 'class="success"';
										break;
									case '3':
										$colorTarea = 'class="info"';
										break;
									case '4':
										$colorTarea = 'class="warning"';
										break;
									case '5':
										$colorTarea = 'class="danger"';
										break;
									default:
										$colorTarea = 'class=""';
										break;
								}
							?>
							<tr <?=$colorTarea?>>
								<th><?=$dato['tarea']?></th>
								<!-- <th><span class="glyphicon glyphicon-ok"></span></th> -->
								<th class="deletetask">
									<form action="?deletetask" method="post">
										<input type="hidden" name="idtask" value="<?=$dato['id']?>">
										<button type="submit" class="btn btn-link btn-sm deletetaskbutton"><i class="glyphicon glyphicon-trash"></i></button>
									</form>
								</th>
							</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<h2>No existen tareas</h2>
							<p>Introduce las que tengas pendientes</p>
						<?php endif; ?>
					</tbody>
				</table>
				<form action="?addtask" method="post">
					<div class="form-group col-xs-12 col-lg-8">
					    <input type="text" class="form-control col-lg-8" name="tarea" placeholder="Introducir Tarea">
					</div>
					<div class="form-group col-xs-12 col-lg-2">
					    <select class="form-control" name="nivel">
					      <option>Nivel</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select>
					</div>
					<div class="form-group col-xs-12 col-lg-2">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
			
			<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<?php if( isset($errores) ): ?>
			<div class="panel panel-danger">
				<div class="panel-heading">Error</div>
				<div class="panel-body">
					<?php foreach($errores as $error): ?>
						<?=$error?><br>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
			</div>
			</div>
		</div>

	</div>
</body>
</html>