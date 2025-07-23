<?php

namespace App\Repositories;

use App\Models\CategoriesModel;
use App\Models\ProductsModel;

class ProductsRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function getCategoryId($categoryName)
    {
        $categoryId = CategoriesModel::where("name", $categoryName)->first()->id;

        return $categoryId;
    }

    public function saveProduct($request, $categoryId)
    {
        $this->productModel::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image_url" => $request->imageUrl,
            "category_id" => $categoryId,
            "stock" => $request->stock,
        ]);
    }
}
