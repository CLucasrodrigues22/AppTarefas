<?php
$action = 'recuperar';
require 'task_controll.php';
?>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script>
		function editar(id, txt_task) {
			// criar um fomr de edição
			let form = document.createElement('form')
			form.action = 'task_controll.php?action=atualizar'
			form.method = 'post'
			form.className = 'row'

			// criar um input para entrada do texto
			let inputTask = document.createElement('input')
			inputTask.type = 'text'
			inputTask.name = 'task'
			inputTask.className = 'col-9 form-control'
			inputTask.value = txt_task

			//criar um input hidden para guardar o id da tarefa
			let inputId = document.createElement('input')
			inputId.type = 'hidden'
			inputId.name = 'id'
			inputId.value = id

			// criar um button para envio do form
			let button = document.createElement('button')
			button.type = 'submit'
			button.className = 'col-3 btn btn-info'
			button.innerHTML = 'Atualizar'

			// incluir inputTask no form
			form.appendChild(inputTask)

			// incluir o inputId no form
			form.appendChild(inputId)

			// incluir button no form
			form.appendChild(button)

			// selecionar a tarefa
			let task = document.getElementById('task_' + id)

			// limpar o texto da tarefa para inclusão do form
			task.innerHTML = ''

			// incluir do form na página
			task.insertBefore(form, task[0])

		}

		function remove(id) {
			location.href = 'todas_tarefas.php?action=remove&id=' + id
		}

		function checkTask(id) {
			location.href = 'todas_tarefas.php?action=checkTask&id=' + id
		}
	</script>
</head>

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
					<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
					<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
					<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Tarefas pendentes</h4>
							<hr />
							<?php foreach ($tasks as $key => $task) { ?>

								<?php if ($task->status == 'pendente') { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="task_<?= $task->id ?>"><?= $task->tarefa ?> (<?= $task->status ?>)</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remove(<?= $task->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $task->id ?>, '<?= $task->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="checkTask(<?= $task->id ?>)"></i>
										</div>
									</div>
								<?php } ?>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>