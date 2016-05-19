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
        /*$cat = new Category();
        $cat->title = 'Нехудожественная литература';
        $cat->save();*/
        /*$cat = Category::findByColumn('title', 'Нехудожественная литература');
        $cat1 = new Category();
        $cat1->title = 'Психология';
        $cat1->parent = $cat;
        $cat1->save();*/

        //$this->data->cats = Category::findAllByTree();
        $this->data->cats = Category::findAllTree('categories');

        /*var_dump($this->data->cats);
        die;*/
    }

}