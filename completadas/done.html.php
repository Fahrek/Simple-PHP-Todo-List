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
		.listicon {
			text-align: right;
			width: 20px;
		}
		.listiconbutton {
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

		.footer {
			text-align: right;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-1 col-lg-9">
				<div class="row">
					<div class="col-lg-8">
						<h1><a href="<?=$base_url?>">Mis Tareas</a></h1>
						<h2>Tareas completadas</h2>
					</div>
				</div>

				<?php if ( !empty($completadas) ): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tarea</th>
							<th>Creada</th>
							<th>Realizada</th>
							<th>Borrada</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($completadas as $completada):
							switch ($completada['level']) {
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
							<th><?=$completada['task']?></th>
							<th><?=$completada['createdat']?></th>
							<th><?=$completada['doneat']?></th>
							<th><?=$completada['deletedat']?></th>
							<!-- <th class="listicon">
								<form action="?completetask" method="post">
									<input type="hidden" name="idtask" value="<?=$dato['id']?>">
									<button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-saved"></i></button>
								</form>
							</th>  -->
							<th class="listicon">
								<form action="?deletetask" method="post">
									<input type="hidden" name="idtask" value="<?=$completada['id']?>">
									<button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-trash"></i></button>
								</form>
							</th>
						</tr>
						<?php endforeach; ?>
						<?php else: ?>
							<h2>No existen tareas completadas</h2>
							<p>Cuando borres tus tareas pendientes o acabadas aparecerán en esta lista.</p>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-offset-1 col-lg-9 footer">
					<a class="btn btn-default" href="<?=$base_url?>" role="button">Página Principal</a>
			</div>
			</div>
		</div>
	</div>
</body>