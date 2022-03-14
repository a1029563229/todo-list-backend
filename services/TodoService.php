<?php

namespace app\services;

use app\models\TodoModel;
use app\repositories\TodoRepository;

class TodoService
{
    public function getAllTodo(TodoModel $model)
    {
        return TodoRepository::selectAll($model);
    }

    public function addTodo(TodoModel $model)
    {
        return TodoRepository::insertOne($model);
    }

    public function topTodo(TodoModel $model)
    {
        return TodoRepository::updateOne([
            'is_top' => 1
        ], $model->id);
    }

    public function completeTodo(TodoModel $model)
    {
        return TodoRepository::updateOne([
            'is_completed' => 1
        ], $model->id);
    }

    public function deleteTodo(TodoModel $model)
    {
        return TodoRepository::updateOne([
            'is_deleted' => 1
        ], $model->id);
    }

    public function getMockData(string $code, string $parameter) {
        return TodoRepository::queryMockData($code, $parameter);
    }
}