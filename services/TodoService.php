<?php

namespace app\services;

use app\models\TodoModel;
use app\repositories\TodoRepository;

class TodoService {
    public function getAllTodo(TodoModel $model) {
        return TodoRepository::selectAll($model);
    }

    public function addTodo(TodoModel $model) {

    }

    public function topTodo(TodoModel $model) {

    }

    public function completeTodo(TodoModel $model) {

    }

    public function deleteTodo(TodoModel $model) {

    }
}