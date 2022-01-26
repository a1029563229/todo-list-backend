<?php

namespace app\repositories;

use Yii;
use app\models\TodoModel;

class TodoRepository
{
    /**
     * @throws \yii\db\Exception
     */
    public static function selectAll(TodoModel $todo)
    {
        $db = Yii::$app->db;
        // 组装 SQL 语句，查询对应 key 且未删除的数据
        // 查询的数据按照 `是否完成` 升序排列，按照 `是否置顶` 降序排列
        $sql = "SELECT * 
                FROM `todos`
                WHERE `key` = :code AND `is_deleted` = 0
                ORDER BY is_completed ASC, is_top DESC";
        return $db->createCommand($sql)->bindValue(':code', $todo->key)->queryAll();
    }

    /**
     * @throws \yii\db\Exception
     */
    public static function insertOne(TodoModel $todo)
    {
        $db = Yii::$app->db;
        return $db->createCommand()->insert('todos', $todo)->execute();
    }

    /**
     * @throws \yii\db\Exception
     */
    public static function updateOne(array $todoData, string $id)
    {
        $db = Yii::$app->db;
        return $db
                ->createCommand()
                ->update('todos', $todoData, "id = :id")
                ->bindValue("id", $id)
                ->execute();
    }
}