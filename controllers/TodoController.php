<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\services\TodoService;
use app\models\TodoModel;

class TodoController extends Controller
{
    public $todoService;
    public $enableCsrfValidation = false;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->todoService = new TodoService();
    }

    // 将响应数据转成 JSON
    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionGetTodoList()
    {
        $model = new TodoModel();
        $params = Yii::$app->request->get();
        // 取出 query 参数中的 key 字段
        $model->key = $params['key'];
        return [
            'code' => 0,
            'data' => $this->todoService->getAllTodo($model)
        ];
    }

    public function actionAdd()
    {
        $model = new TodoModel();
        $params = Yii::$app->request->post();
        $model->key = $params['key'];
        $model->title = $params['title'];
        $this->todoService->addTodo($model);
        return ['code' => 0];
    }

    public function actionTop()
    {
        $model = new TodoModel();
        $params = Yii::$app->request->post();
        $model->id = $params['id'];
        $this->todoService->topTodo($model);
        return ['code' => 0];
    }

    public function actionComplete()
    {
        $model = new TodoModel();
        $params = Yii::$app->request->post();
        $model->id = $params['id'];
        $this->todoService->completeTodo($model);
        return ['code' => 0];
    }

    public function actionDelete()
    {
        $model = new TodoModel();
        $params = Yii::$app->request->post();
        $model->id = $params['id'];
        $this->todoService->deleteTodo($model);
        return ['code' => 0];
    }
}