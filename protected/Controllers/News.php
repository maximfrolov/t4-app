<?php

namespace App\Controllers;

use T4\Mvc\Controller;

/**
 * Class News
 * @package App\Controllers
 */
class News
    extends Controller
{

    /**
     * Метод-экшн для получения всех новостей от модели
     * в обратном порядке и передачи представлению.
     */
    public function actionAll()
    {
        $this->data->items = \App\Models\News::findAll(['order' => '__id DESC']);
    }

    /**
     * Метод-экшн для получения одной новости по id,
     * пришедшему от пользователя, и передачи представлению.
     * @param int $id
     */
    public function actionOne(int $id)
    {
        $this->data->item = \App\Models\News::findByPK($id);
    }

    /**
     * Метод-экшн для получения последней новости
     * и передачи представлению.
     */
    public function actionLast()
    {
        $this->data->item = \App\Models\News::find(['order' => '__id DESC']);
    }

}