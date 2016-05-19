<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1463332350_addColumnImage
    extends Migration
{

    public function up()
    {
        $this->addColumn('news', [
            'image' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropColumn('news', 'image');
    }
    
}