<?php

namespace app\repositories;

use Yii;
use app\models\TodoModel;

class TodoRepository {
    /**
     * @throws \yii\db\Exception
     */
    public static function selectAll(TodoModel $todo) {
        $db = Yii::$app->db;
        $sql = "SELECT * FROM `todos` WHERE `key` = '$todo->key' AND `is_deleted` = 0";
        return $db->createCommand($sql)->queryAll();
    }

    public static function insertOne(TodoModel $todo) {

    }

    public static function deleteOne(TodoModel $todo) {

    }

    public static function updateOne(TodoModel $todo) {

    }
}