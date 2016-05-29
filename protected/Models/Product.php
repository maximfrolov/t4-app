<?php

namespace App\Models;

use T4\Orm\Model;
use T4\Core\Exception;

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

    protected function validateTitle($val)
    {
        if (strlen($val) < 3) {
            yield new Exception('Too short a name!');
        }
        if (!preg_match('~[а-яa-z]~i', $val)) {
            yield new Exception('The letters must be in the title product!');
        }
        return true;
    }

    protected function sanitizeTitle($val)
    {
        return trim($val);
    }

    protected function validateDescription($val)
    {
        if (strlen($val) < 10) {
            yield new Exception('Too short product description!');
        }
        if (!preg_match('~[а-яa-z]~i', $val)) {
            yield new Exception('The letters must be in the product description!');
        }
        return true;
    }

    protected function sanitizeDescription($val)
    {
        return trim($val);
    }

    protected function validatePrice($val)
    {
        if (!preg_match('~\d+~', $val)) {
            yield new Exception('Only numbers are allowed');
        }

        if ($val < 0) {
            yield new Exception('The price cannot be less than zero!');
        }
    }

    protected function sanitizePrice($val)
    {
        return (float)$val;
    }
}