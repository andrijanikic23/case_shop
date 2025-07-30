<?php

namespace App\Repositories;


use App\Models\CartModel;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Auth;

class CartRepository
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function newCartItem($request)
    {
        $userId = Auth::id();
        $productId = $request->productId;
        $productName = $request->productName;
        $imageUrl = $request->imageUrl;
        $quantity = $request->quantity;
        $singleProductPrice = $request->singleProductPrice;
        $totalPrice = $quantity * $singleProductPrice;


        $this->cartModel::create([
            "user_id" => $userId,
            "product_id" => $productId,
            "product_name" => $productName,
            "image_url" => $imageUrl,
            "quantity" => $quantity,
            "price" => $totalPrice
        ]);
    }
}
