<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Http\Requests\SearchRequest;
use App\Models\ProductsModel;
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

    public function products($categoryId)
    {
        $products = $this->productRepo->allParticularProducts($categoryId);

       return view("allCases", compact("products", "categoryId"));
    }

    public function search(SearchRequest $request)
    {
        $productName = $request->get("product");
        $categoryId = $request->get("categoryId");


        $products = ProductsModel::where("category_id", $categoryId)->where("name", "LIKE", "%$productName%")->get();
        if(count($products) < 1)
        {
            return redirect()->back()->with("error", "No products found");
        }


        return view("allCases", compact("products", "categoryId"));
    }
}
