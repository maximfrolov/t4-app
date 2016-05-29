<?php

namespace App\Modules\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use T4\Mvc\Controller;
use T4\Core\MultiException;

/**
 * Class Products
 * @package App\Modules\Admin\Controllers
 */
class Products
    extends Controller
{
    public function actionDefault()
    {
        $this->data->products = Product::findAll();
    }

    /**
     * @param null $product
     */
    public function actionAdd($product = null)
    {
        if (!empty($product)) {
            try {
                $newProduct = new Product();
                $newProduct->fill($product);
                $newProduct->save();
                $this->redirect('/admin/products');
            } catch (MultiException $errors) {
                $this->data->errors = $errors;
                $this->data->product = $product;
            }
        }
        $this->data->cats = Category::findAllTree();
    }

    /**
     * @param int $id
     */
    public function actionDelete(int $id)
    {
        $product = Product::findByPK($id);
        if (!empty($product)) {
            $product->delete();
        }
        $this->redirect('/admin/products');
    }
}