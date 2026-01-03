<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    private $ordersRepo;

    public function __construct()
    {
        $this->ordersRepo = new OrdersRepository();
    }


    public function finished(OrdersRequest $request)
    {

        $this->ordersRepo->orderStockCheck();

        if(Session::has("cartItems") == false)
        {
            return view("cart/thankYouPage");
        }

        $userId = $this->ordersRepo->fillOrderTables($request);

        $deleteCartItems = new CartController();
        $deleteCartItems->emptyCart($userId);

        return view("cart/thankYouPage");
    }
}
