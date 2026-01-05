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

        $stockCheck = $this->ordersRepo->orderStockCheck();

        if($stockCheck) {
            $userId = $this->ordersRepo->fillOrderTables($request);

            $deleteCartItems = new CartController();
            $deleteCartItems->emptyCart($userId);

            return view("cart/thankYouPage");
        }
        else {
            return redirect()->back()->with('failure', 'Not  enough product in stock!');
        }


    }
}
