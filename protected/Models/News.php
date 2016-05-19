<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class News
 * @package App\Models
 */
class News
    extends Model
{

    /**
     * @property array Схема таблицы БД
     */
    protected static $schema = [
        'table' => 'news',
        'columns' => [
            'title' => ['type' => 'text'],
            'text' => ['type' => 'text'],
            'date' => ['type' => 'date'],
            'image' => ['type' => 'string'],
        ],
    ];

}