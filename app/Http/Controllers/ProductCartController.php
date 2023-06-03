<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Auth;
use DB;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{

    public function index()
    {

        if (auth()->check()) {
            $products = DB::table('products')
                ->join('product_carts', 'product_carts.product_id', '=', 'products.id')
                ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
                ->groupBy('products.id', 'products.productName', 'products.productPrice', 'product_carts.quantity', 'product_carts.id')
                ->select('products.id', 'products.productName', 'products.productPrice', 'product_carts.quantity', 'product_carts.id as product_cart_id', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
                ->where('product_carts.user_id', '=', auth()->user()->id)
                ->get();

            $count = DB::table('products')
                ->join('product_carts', 'product_carts.product_id', '=', 'products.id')

                ->where('product_carts.user_id', '=', auth()->user()->id)
                ->count();

            $cart_total = (int) ProductCart::where('user_id', auth()->user()->id)->sum('quantity');

            $total_price_cart = Product::join('product_carts', 'product_carts.product_id', '=', 'products.id')
                ->where('product_carts.user_id', '=', auth()->user()->id)
                ->selectRaw('SUM(products.productPrice * product_carts.quantity) AS total_amount')
                ->first()
                ->total_amount;

            $total_money = $total_price_cart;
        } else {
            $count = null;
            $products = null;
            $cart_total = null;
            $total_price_cart = null;
            $total_money = null;
        }

        return view('website.cart', compact('products', 'count', 'cart_total', 'total_price_cart', 'total_money'));
    }

    public function cartProductAdd(Request $request)
    {

        $productId = $request->input('product_id');

        $user = Auth::user();

        $product_cart = ProductCart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($product_cart) {
            $product_cart->increment('quantity');
        } else {
            $product_cart = new ProductCart([
                'product_id' => $productId,
                'user_id' => $user->id,
                'quantity' => "1",
            ]);
            $product_cart->save();
        }

        $cartItemCount = DB::table('product_carts')
            ->where('user_id', $user->id)
            ->count();
        session()->put('cart', $cartItemCount);

        return back();
    }

    public function cartProductDecrease(Request $request)
    {
        $productId = $request->input('product_id');

        $user = Auth::user();

        $product_cart = ProductCart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($product_cart) {
            if ($product_cart->quantity <= 1) {

                return back()->with('Decrement', 'số lượng sản phẩm đã giảm đến mức tối thiểu');
            } else {
                $product_cart->decrement('quantity', 1);
            }
        }
        $cartItemCount = DB::table('product_carts')
            ->where('user_id', $user->id)
            ->count();
        session()->put('cart', $cartItemCount);

        return back();
    }

    public function cartProductRemove(Request $request)
    {
        $product_cart = ProductCart::find($request->product_cart_id);
        if($product_cart)
      {
        $product_cart->delete();

        $cartItemCount = DB::table('product_carts')
            ->where('user_id', auth()->user()->id)
            ->count();

        session()->put('cart', $cartItemCount);
      }
        return redirect()->back();

    }

    public function cartProductBye(Request $request)
    {
        $productId = $request->input('product_id');

        $user = Auth::user();

        $product_cart = ProductCart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();
      
            if ($product_cart) {
                $product_cart->increment('quantity');
            } else {
                $product_cart = new ProductCart([
                    'product_id' => $productId,
                    'user_id' => $user->id,
                    'quantity' => "1",
                ]);
                $product_cart->save();
            }
            $cartItemCount = DB::table('product_carts')
                ->where('user_id', $user->id)
                ->count();
            session()->put('cart', $cartItemCount);
      
        return redirect()->route('productCart');
    }
}