<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="css/modalAlertSuccess.css">
</head>

<? if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
	<!-- Modal -->
	<div id="success_tic" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<a class="close" href="#" data-dismiss="modal">&times;</a>
				<div class="page-body">
					<div class="head">
						<h3 style="margin-top:5px;">Lorem ipsum dolor sit amet</h3>
						<h4>Lorem ipsum dolor sit amet</h4>
					</div>

					<h1 style="text-align:center;">
						<div class="checkmark-circle">
							<div class="background"></div>
							<div class="checkmark draw"></div>
						</div>
						<h1>

				</div>
			</div>
		</div>

	</div>
<? } ?>

<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				App Lista Tarefas
			</a>
		</div>
	</nav>

	<div class="container app">
		<div class="row">
			<div class="col-md-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
					<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
					<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Nova tarefa</h4>
							<hr />

							<form method="POST" action="task_controll.php?action=inserir">
								<div class="form-group">
									<label>Descrição da tarefa:</label>
									<input type="text" class="form-control" name="task" placeholder="Exemplo: Lavar o carro">
								</div>

								<button class="btn btn-success" data-toggle="modal" data-target="#success_tic">Cadastrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>