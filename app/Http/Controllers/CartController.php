<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemMinusRequest;
use App\Http\Requests\CartRequest;
use App\Models\CartModel;
use App\Models\ProductsModel;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\b;

class CartController extends Controller
{

    private $cartRepo;


    public function __construct()
    {
        $this->cartRepo = new CartRepository();
    }

    public function addProduct(CartRequest $request)
    {
        $productId = $request->productId;
        $userId = Auth::id();
        $productExist = CartModel::where("product_id", $productId)->where("user_id", $userId)->first();

        if($productExist)
        {
            $this->cartRepo->updateCartItem($productExist, $request);
        }
        else
        {
            $this->cartRepo->newCartItem($request);
        }


        return redirect()->back()->with("success", "Product is successfully added to cart");
    }

    public function display()
    {
        $userId = Auth::id();

        $cartItems = CartModel::where("user_id", $userId)->get();

        if($cartItems->isEmpty())
        {
            return view("noCartItems");
        }

        $totalPrice = 0;

        Session::forget("cartItems");

        foreach($cartItems as $item)
        {
            Session::push("cartItems", $item);
            $totalPrice += $item["price"];
        }

        return view("cartDisplay", ["cartItems" => $cartItems, "totalPrice" => $totalPrice]);
    }

    public function minusCartItem(CartItemMinusRequest $request)
    {
        $productId = $request->productId;
        CartModel::where("user_id", Auth::id())->where("product_id", $productId)->decrement("quantity");
        $quantity = CartModel::where("user_id", Auth::id())->where("product_id", $productId)->first()->quantity;

        if($quantity == 0)
        {
            CartModel::where("user_id", Auth::id())->where("product_id", $productId)->delete();
        }

        $pricePerProduct = ProductsModel::whereId($productId)->first()->price;
        $newPrice = $quantity * $pricePerProduct;

        CartModel::where("user_id", Auth::id())->where("product_id", $productId)->update([
            "price" => $newPrice,
        ]);

        return redirect()->back();
    }

    public function emptyCart($userId)
    {
        $this->cartRepo->dumpAllCartItems($userId);
    }

}
