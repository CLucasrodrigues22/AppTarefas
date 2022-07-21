<?php

// CRUD METHODS 
class TaskService {

    private $conn;
    private $task;

    public function __construct(Connection $conn, Task $task)
    {
        $this->conn = $conn->conn();
        $this->task = $task;
    }

    public function insert() {
        $q = "insert into tb_tarefas(tarefa) values (?)";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1, $this->task->__get('task'));
        $stmt->execute();
    }

    public function read() {
        $q = "select t.id, s.status, t.tarefa from tb_tarefas as t left join tb_status as s on (t.id_status = s.id)";
        $stmt = $this->conn->prepare($q);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update() {
        $q = "update tb_tarefas set tarefa = ? where id = ?";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1, $this->task->__get('task'));
        $stmt->bindValue(2, $this->task->__get('id'));
        return $stmt->execute();
    }

    public function delete() {
        $q = "delete from tb_tarefas where id = ?";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1, $this->task->__get('id'));
        return $stmt->execute();
    }

    public function checkTask() {
        $q = "update tb_tarefas set id_status = ? where id = ?";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1, $this->task->__get('id_status'));
        $stmt->bindValue(2, $this->task->__get('id'));
        return $stmt->execute();
    }

    public function readPendentesTask() {
        
    }
}