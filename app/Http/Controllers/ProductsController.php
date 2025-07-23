<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductsRepository();
    }

    public function add(ProductsRequest $request)
    {
        $categoryId = $this->productRepo->getCategoryId($request->category);

        $this->productRepo->saveProduct($request, $categoryId);

        return redirect()->back()->with("success", "Product added successfully");
    }
}
