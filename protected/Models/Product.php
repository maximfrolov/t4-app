<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Product
 * @package App\Models
 *
 * @property string $title
 * @property string $description
 * @property float $price
 * @property \App\Models\Category $category
 */
class Product
    extends Model
{
    protected static $schema =[
        'columns' => [
            'title' => ['type' => 'string'],
            'description' => ['type' => 'text'],
            'price' => ['type' => 'float'],
        ],
        'relations' => [
            'category' => ['type' => self::BELONGS_TO, 'model' => Category::class],
        ],
    ];

}