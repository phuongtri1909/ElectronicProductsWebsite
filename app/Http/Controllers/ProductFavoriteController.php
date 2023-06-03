<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use App\Models\Product_favorite;
class ProductFavoriteController extends Controller
{
   
    public function index()
    {
        if(auth()->check())
        {
           $products = DB::table('products')
           ->join('product_favorites', 'product_favorites.product_id','=','products.id')
           ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
           ->groupBy('products.id','products.productName','products.productPrice')   
           ->select('products.id','products.productName','products.productPrice',DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
           ->where('product_favorites.user_id', '=', auth()->user()->id)
           ->get();
        }
        else{
            $products = null;
        }
        return view('website.favorite_product',compact('products'));
    }

    public function favoriteProductAdd(Request $request)
    {
        $productId = $request->input('product_id');
        $user = Auth::user();
        $product_favorite = new Product_favorite([
            'product_id' => $productId,
            'user_id' => $user->id, 
        ]);

        $product_favorite->save();
        
        return redirect()->back();
    }

    public function favoriteProductRemove(Request $request)
    {
        $product_favorite = Product_favorite::find($request->product_favorite_id);
        if($product_favorite)
        {
        $product_favorite->delete();
        }
        return redirect()->back();
    }
   
}