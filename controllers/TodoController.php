<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\services\TodoService;
use app\models\TodoModel;

class TodoController extends Controller
{
    public $todoService;

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

    public function actionGetTodoList() {
        $model = new TodoModel();
        $params = Yii::$app->request->get();
        $model->key = $params['key'];
        return $this->todoService->getAllTodo($model);
    }
}