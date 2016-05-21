<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1463835830_createProducts
    extends Migration
{

    public function up()
    {
        $this->createTable('products', [
            'title' => ['type' => 'string'],
            'description' => ['type' => 'text'],
            'price' => ['type' => 'float'],
            '__category_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropTable('products');
    }
    
}