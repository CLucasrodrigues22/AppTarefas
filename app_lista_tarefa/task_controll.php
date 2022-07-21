<?php
require "conn.php";
require "tarefa.model.php";
require "tarefa.service.php";

$action = isset($_GET['action']) ? $_GET['action'] : $action;

if ($action == 'inserir') {
    $task = new Task();
    $task->__set('task', $_POST['task']);

    $conn = new Connection();

    $taskService = new TaskService($conn, $task);

    $taskService->insert();

    header('Location: nova_tarefa.php?inclusao=1');
} elseif ($action == 'recuperar') {

    $task = new Task();
    $conn = new Connection();

    $taskService = new TaskService($conn, $task);
    $tasks = $taskService->read();
} elseif ($action == 'atualizar') {

    $task = new Task();
    $task
        ->__set('id', $_POST['id'])
        ->__set('task', $_POST['task']);

    $conn = new Connection();

    $taskService = new TaskService($conn, $task);
    if ($taskService->update()) {
        header('location: todas_tarefas.php');
    }
} elseif ($action == 'remove') {
    
    $task = new Task();
    $task->__set('id', $_GET['id']);

    $conn = new Connection();

    $taskService = new TaskService($conn, $task);
    $taskService->delete();

    header('location: todas_tarefas.php');
} elseif ($action == 'checkTask') {
    $task = new Task();
    $task
        ->__set('id', $_GET['id'])
        ->__set('id_status', 2);

    $conn = new Connection();

    $taskService = new TaskService($conn, $task);
    $taskService->checkTask();

    header('location: todas_tarefas.php');
} elseif ($action == 'recuperarTaskPendentes') {
    $task = new Task();
    $task->__set('id_status', 1);

    $conn = new Connection();

    $taskService = new TaskService($conn, $task);
    $tasks = $taskService->readPendentesTask();
}
