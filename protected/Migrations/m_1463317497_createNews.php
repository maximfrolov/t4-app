<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1463317497_createNews
    extends Migration
{

    public function up()
    {
        $this->createTable('news', [
            'title' => ['type' => 'text'],
            'text' => ['type' => 'text'],
            'date' => ['type' => 'date'],
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
    
}