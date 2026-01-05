<?php

namespace App\Repositories;

use App\Models\OrderItemsModel;
use App\Models\OrdersModel;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdersRepository
{
    private $ordersModel;
    private $orderItemsModel;

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
        $this->orderItemsModel = new OrderItemsModel();
    }

    public function fillOrderTables($request)
    {
        $totalPrice = $request->totalPrice;
        $userId = Auth::id();

        $this->ordersModel::create([
            "user_id" => $userId,
            "total_price" => $totalPrice,
        ]);

        $orderId = $this->ordersModel::where("user_id", $userId)->latest()->value("id");


        foreach(Session::get("cartItems") as $item)
        {
            $this->orderItemsModel::create([
                "order_id" => $orderId,
                "product_id" => $item["product_id"],
                "quantity" => $item["quantity"],
                "price" => $item["price"],
            ]);
        }

        Session::forget("cartItems");

        return $userId;

    }

    public function orderStockCheck()
    {
        foreach(Session::get("cartItems") as $item) {
            $productId = $item["product_id"];
            $orderedQuantity = $item["quantity"];
            $stock = ProductsModel::whereId($productId)->value('stock');
            if($stock >= $orderedQuantity) {
                $difference = $stock - $orderedQuantity;
                ProductsModel::whereId($productId)->update(["stock" => $difference]);
                return true;
            }
            else {
                return false;
            }
        }
    }
}
