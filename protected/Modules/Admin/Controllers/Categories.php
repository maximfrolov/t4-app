<?php

namespace App\Modules\Admin\Controllers;

use T4\Core\MultiException;
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
     * @param null $cat
     */
    public function actionEdit($id = null, $cat = null)
    {
        if (null !== $id) {
            $this->data->cat = Category::findByPK($id);
            if (empty($this->data->cat)) {
                $this->redirect('/admin/categories');
            }
        }
        if (!empty($cat)) {
            try {
                $updatedCat = Category::findByPK($cat['pk']);
                $updatedCat->fill($cat);
                $updatedCat->save();
                $this->redirect('/admin/categories');
            } catch (MultiException $errors) {
                $this->data->errors = $errors;
                $this->data->cat = $cat;
            }
        }
    }

    /**
     * @param null $cat
     */
    public function actionAdd($cat = null)
    {
        if (!empty($cat)) {
            try {
                $newCat = new Category();
                $newCat->fill($cat);
                $newCat->save();
                $this->redirect('/admin/categories');
            } catch (MultiException $errors) {
                $this->data->errors = $errors;
                $this->data->cat = $cat;
            }
        }
        $this->data->cats = Category::findAllTree();
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