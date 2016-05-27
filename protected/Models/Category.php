<?php

namespace App\Models;

use T4\Core\Exception;
use T4\Orm\Model;

/**
 * Class Category
 * @package App\Models
 *
 * @property string $title
 */
class Category
    extends Model
{
    static protected $schema = [
        'table' => 'categories',
        'columns' => [
            'title' => ['type' => 'string'],
        ],
        'relations' => [
            'products' => ['type' => self::HAS_MANY, 'model' => Product::class],
        ],
    ];

    static protected $extensions = ['tree'];

    protected function validateTitle($val)
    {
        if (strlen($val) <= 3) {
            yield new Exception('Too short a name!');
        }
        if (!preg_match('~[а-яa-z]~i', $val)) {
            yield new Exception('The letters must be in the title category!');
        }
        return true;
    }

    protected function sanitizeTitle($val)
    {
        return trim($val);
    }
}