<?php

namespace App\Modules\Admin\Controllers;

use T4\Mvc\Controller;
use App\Models\Category;

/**
 * Class Categories
 * @package App\Modules\Admin\Controllers
 */
class Categories
    extends Controller
{

    public function actionDefault()
    {
        $this->data->cats = Category::findAllTree();
    }

    /**
     * @param null $id
     */
    public function actionEdit($id = null)
    {
        if (null !== $id) {
            $this->data->cat = Category::findByPK($id);
            if (empty($this->data->cat)) {
                $this->redirect('/admin/categories');
            }
        } else {
            $this->redirect('/admin/categories');
        }
    }

    public function actionUpdate()
    {
        $post = $this->app->request->post;
        if (!empty($post->id)) {
            $cat = Category::findByPK($post->id);
            $cat->fill($post);
            $cat->save();
        }
        $this->redirect('/admin/categories');
    }

    public function actionAdd()
    {
        $this->data->cats = Category::findAllTree();
    }

    public function actionSave($cat)
    {
        if (!empty($cat->title)) {
            $newCat = new Category();
            $newCat->fill($cat);
            $newCat->save();
        }
        $this->redirect('/admin/categories');
    }

    /**
     * @param int $id
     */
    public function actionDelete(int $id)
    {
        $cat = Category::findByPK($id);
        if (!empty($cat)) {
            $cat->delete();
        }
        $this->redirect('/admin/categories');
    }

}