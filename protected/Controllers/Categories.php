<?php

namespace App\Controllers;

use App\Models\Category;
use T4\Mvc\Controller;

/**
 * Class Categories
 * @package App\Controllers
 */
class Categories
    extends Controller
{

    public function actionOne(int $id)
    {
        if (!empty(Category::findByPK($id))) {
            $this->data->cat = Category::findByPK($id);
            $this->data->products = $this->data->cat->products;
        } else {
            $this->redirect('/categories');
        }
    }

}