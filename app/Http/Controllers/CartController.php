<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $cartRepo;


    public function __construct()
    {
        $this->cartRepo = new CartRepository();
    }

    public function addProduct(CartRequest $request)
    {

        $this->cartRepo->newCartItem($request);

        return redirect()->back()->with("success", "Product is successfully added to cart");
    }

}
