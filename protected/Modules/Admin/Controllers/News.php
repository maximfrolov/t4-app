<?php

namespace App\Modules\Admin\Controllers;

use T4\Mvc\Controller;

/**
 * Class News
 * @package App\Modules\Admin\Controllers
 */
class News
    extends Controller
{

    /**
     * Метод-экшн вывода таблицы новостей.
     */
    public function actionDefault()
    {
        $this->data->items = \App\Models\News::findAll(['order' => '__id DESC']);
    }

    /**
     * Метод-экшн вывода формы добавления и редактирования новости.
     * @param null $id
     */
    public function actionEdit($id = null)
    {
        if (null !== $id) {
            $this->data->item = \App\Models\News::findByPK($id);
            if (empty($this->data->item)) {
                $this->redirect('/admin/news');
            }
        } else {
            $this->data->item = new \App\Models\News();
        }
    }

    /**
     * Метод-экшн сохранения новости.
     */
    public function actionSave()
    {
        if (!empty($this->app->request->post->id)) {
            $item = \App\Models\News::findByPK($this->app->request->post->id);
        } else {
            $item = new \App\Models\News();
        }
        $item->fill($this->app->request->post);
        $item->save();
        $this->redirect('/admin/news');
    }

    /**
     * Метод-экшн удаления новости по id
     * @param int $id
     */
    public function actionDelete(int $id)
    {
        $item = \App\Models\News::findByPK($id);
        if (!empty($item)) {
            $item->delete();
        }
        $this->redirect('/admin/news');
    }

}