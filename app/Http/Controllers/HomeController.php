<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $product_by_category = array();
        $manufacturer_by_category = array();
        $categories = Category::get();

        foreach ($categories as $category) {
            $manufacturers = DB::table('manufacturers')
                ->join('products', 'manufacturers.id', '=', 'products.productManu')
                ->join('categories', 'products.productCategory', '=', 'categories.id')
                ->where('categories.id', '=', $category->id)
                ->orderBy('categories.created_at', 'desc')
                ->select('manufacturers.*')
                ->distinct()
                ->get();
            $manufacturer_by_category[$category->id] = $manufacturers;

            $products = Product::select('products.id', 'products.productName', 'products.productPrice', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
                ->join('categories', 'products.productCategory', '=', 'categories.id')
                ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
                ->where('products.productCategory', $category->id)
                ->groupBy('products.id', 'products.productName', 'products.productPrice')
                ->orderBy('products.created_at', 'desc')
                ->take(10)

                ->get();
            $product_by_category[$category->id] = $products;
        }

        if (auth()->check()) {
            $product_favorite = Product_favorite::where('user_id', auth()->user()->id)->get();
        } else {
            $product_favorite = null;
        }

        return view('website.home', compact('categories', 'product_by_category', 'manufacturer_by_category', 'product_favorite'));
    }

    public function categoryUser($categoryName)
    {
        $categoryName =   ucwords(str_replace('-', ' ', $categoryName));
        
        $products = DB::table('products')
            ->select('products.id', 'products.productName', 'products.productPrice', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->groupBy('products.id', 'products.productName', 'products.productPrice')
            ->join('categories', 'categories.id', '=', 'products.productCategory')
            ->where('categories.categoryName', $categoryName)
            ->paginate(6);

        $manufacturers = DB::table('manufacturers')
            ->join('products', 'manufacturers.id', '=', 'products.productManu')
            ->join('categories', 'products.productCategory', '=', 'categories.id')
            ->where('categories.categoryName', $categoryName)
            ->orderBy('categories.created_at', 'desc')
            ->select('manufacturers.*')
            ->distinct()
            ->get();


        if (auth()->check()) {
            $product_favorite = Product_favorite::where('user_id', auth()->user()->id)->get();
        } else {
            $product_favorite = null;
        }
$manufacturerName = null;
        
        return view('website.all_product_category', compact('products', 'product_favorite', 'categoryName', 'manufacturers','manufacturerName'));
    }

    public function categoryByManufacturer($categoryName, $manufacturerName)
    {
        $categoryName = ucwords(str_replace('-', ' ', $categoryName));
        $manufacturerName = ucwords(str_replace('-', ' ', $manufacturerName));
    
        $products = DB::table('products')
            ->select('products.id', 'products.productName', 'products.productPrice', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
            ->join('manufacturers', 'manufacturers.id', '=', 'products.productManu')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->groupBy('products.id', 'products.productName', 'products.productPrice')
            ->join('categories', 'categories.id', '=', 'products.productCategory')
            ->where('categories.categoryName', $categoryName)
            ->where('manufacturers.manufacturerName', $manufacturerName)
            ->paginate(6);
            
            if (auth()->check()) {
                $product_favorite = Product_favorite::where('user_id', auth()->user()->id)->get();
            } else {
                $product_favorite = null;
            }
        return view('website.all_product_category', ['product_favorite'=>  $product_favorite,'products' => $products,'categoryName'=>$categoryName,'manufacturerName'=>$manufacturerName,'manufacturers'=> null]);
    }


    public function detailProduct($productName)
    {
        $productName =   ucwords(str_replace('-', ' ', $productName));

        $product = Product::select('products.*')
            ->join('categories', 'products.productCategory', '=', 'categories.id')
            ->join('manufacturers', 'products.productManu', '=', 'manufacturers.id')
            ->where('products.productName', $productName)
            ->get();

        $productAttributes = Product::select('properties.propertiesName as attributteName', 'product_attributes.attribute_value as attributeValue')
            ->leftJoin('product_attributes', 'products.id', '=', 'product_attributes.product_id')
            ->leftJoin('properties', 'product_attributes.attribute_id', '=', 'properties.id')
            ->where('products.productName', $productName)
            ->get();

        $product_image = Product::select('product_images.product_imageName')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->where('products.productName', $productName)
            ->get();

        if ($product->count() != 0) {
            return view('website.detail_product', compact('product', 'productAttributes', 'product_image'));
        }
        return view('website.link_not_found');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::select('products.id as idProduct', 'products.productName', 'products.productPrice', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
            ->join('categories', 'products.productCategory', '=', 'categories.id')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->where('products.productName', 'like', '%' . $keyword . '%')
            ->groupBy('products.id', 'products.productName', 'products.productPrice')
            ->orderBy('products.created_at', 'desc')
            ->get();

        $count = 0;
        foreach ($products as $value) {
            $count++;
        }

        if (auth()->check()) {
            $product_favorite = Product_favorite::where('user_id', auth()->user()->id)->get();
        } else {
            $product_favorite = null;
        }

        return view('website.search_products', compact('count', 'keyword', 'products', 'product_favorite'));
    }
}