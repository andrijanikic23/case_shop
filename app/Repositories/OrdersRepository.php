<?php

namespace App\Repositories;

use App\Models\OrderItemsModel;
use App\Models\OrdersModel;
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
}
