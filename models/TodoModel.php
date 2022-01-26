<?php

namespace app\models;

use Yii;
use yii\base\Model;

class TodoModel extends Model
{
    public $id;
    public $key = '';
    public $title = '';
    public $is_top = 0;
    public $is_completed = 0;
    public $is_deleted = 0;

    public function rules()
    {
        return [
            [['id', 'key', 'title'], 'required']
        ];
    }
}