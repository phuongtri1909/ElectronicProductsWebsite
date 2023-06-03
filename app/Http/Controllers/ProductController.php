<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Product_attribute;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageName = 'Tất cả sản phẩm';

        $products = Product::select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
            ->leftJoin('categories', 'products.productCategory', '=', 'categories.id')
            ->leftJoin('manufacturers', 'products.productManu', '=', 'manufacturers.id')
            ->get();
        return view('products.isproducts_product.product', compact('pageName', 'products'));
    }

    public function nextCreate()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('products.isproducts_product.selected_categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $result = DB::table('properties')
            ->join('categories', 'properties.category_id', '=', 'categories.id')
            ->select('categories.*', 'properties.*')
            ->where('properties.category_id', '=', $request->category)
            ->get();

        $manufacturer = Manufacturer::orderBy('created_at', 'desc')->get();
        $categories = Category::where('id', $request->category)->first();

        return view('products.isproducts_product.create_product', compact('result', 'manufacturer', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'productName' => 'required|unique:products|max:255',
            'productPrice' => 'required|integer',
            'productCategory' => 'required',
            'productManu' => 'required',
            'productImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // them nhieu anh
            'descriptionProduct' => 'required',
        ]);

        $product = Product::create([
            'productName' => $request->productName,
            'productPrice' => $request->productPrice,
            'productCategory' => $request->productCategory,
            'productManu' => $request->productManu,
            'descriptionProduct' => $request->descriptionProduct,
        ]);
        //$thisProduct =  $product->where('productName',$request->productName)->first();

        if ($product) {
            foreach ($request->file('productImage') as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = $image->hashName();
                $image->move(public_path('images'), $filename);
                // $path = Storage::putFileAs('public/images', $image, $filename);
                //$path = $image->store('public/images');
                $product_image = Product_image::create([
                    'product_id' => $product->id,
                    'product_imageName' => $filename,
                ]);
                if (!$product_image) {
                    $product->delete();
                }
            }

            if ($request->input('attributes')) {
                foreach ($request->input('attributes') as $attribute_id => $value) {

                    $product_attribute = Product_attribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attribute_id,
                        'attribute_value' => $value,
                    ]);
                }
            } else {
                $product->delete();
            }
        }
        return redirect()->route('product.index');
    }

    /**..
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    public function nextEdit(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $thisCategory = "";
        foreach ($categories as $value) {

            if ($value->id == $request->idCategory) {
                $thisCategory = $value->id;
            }
        }
        $idProduct = $request->idProduct;
        return view('products.isproducts_product.edit_selected_categories', compact('categories', 'thisCategory', 'idProduct'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $idProduct = $request->idProduct;
        $idCategoryBefor = $request->idCategory;
        $idCategory = $request->category;
        $category = Category::where('id', $idCategory)->first();

        $product = Product::select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
            ->leftJoin('categories', 'products.productCategory', '=', 'categories.id')
            ->leftJoin('manufacturers', 'products.productManu', '=', 'manufacturers.id')
            ->where('products.id', $idProduct)
            ->get();

        $productAttributes = Product::select('properties.*', 'product_attributes.*')
            ->leftJoin('product_attributes', 'products.id', '=', 'product_attributes.product_id')
            ->leftJoin('properties', 'product_attributes.attribute_id', '=', 'properties.id')
            ->where('products.id', $idProduct)
            ->get();

        $manufacturers = Manufacturer::orderBy('created_at', 'desc')->get();

        $result = DB::table('properties')
            ->join('categories', 'properties.category_id', '=', 'categories.id')
            ->select('categories.*', 'properties.*')
            ->where('properties.category_id', '=', $request->category)
            ->get();
        return view('products.isproducts_product.edit_product', compact('result', 'category', 'idProduct', 'idCategoryBefor', 'product', 'productAttributes', 'manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'productName' => 'required|unique:products|max:255',
            'productPrice' => 'required|integer',
            'productCategory' => 'required',
            'productManu' => 'required',
            'descriptionProduct' => 'required',
        ]);

        $product = Product::find($id);
        $product->productName = $request['productName'];
        $product->productPrice = $request['productPrice'];
        $product->productCategory = $request['productCategory'];
        $product->productManu = $request['productManu'];
        $product->descriptionProduct = $request['descriptionProduct'];
        $product->save();

        if ($product) {

            // dd($request->input('attributesBefore'));
            if ($request->input('attributesBefore')) {
                foreach ($request->input('attributesBefore') as $productAttribute_id => $value) {
                    $product_attribute = Product_attribute::find($productAttribute_id);
                    $product_attribute->attribute_value = $value;
                    $product_attribute->save();
                }
            } else if ($request->input('attributesAfter')) {
                foreach ($request->input('attributesAfter') as $attribute_id => $value) {

                    $product_attribute = Product_attribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attribute_id,
                        'attribute_value' => $value,
                    ]);
                }
                foreach ($request->input('attributes') as $productAttribute_id) {
                    $product_attribute = Product_attribute::find($productAttribute_id);
                    $product_attribute->delete();
                }
            }
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $idProductAttribute = DB::table('product_attributes')
                ->join('properties', 'product_attributes.attribute_id', '=', 'properties.id')
                ->select('product_attributes.id')
                ->where('product_attributes.product_id', '=', $product->id)
                ->get();

            $idProductImage = DB::table('products')
                ->join('product_images', 'products.id', '=', 'product_images.product_id')
                ->select('product_images.id')
                ->where('product_id', '=', $product->id)
                ->get();

            foreach ($idProductImage as $image) {

                $product_image = Product_image::find($image->id);
                $product_image->delete();
            }

            foreach ($idProductAttribute as $attribute) {
                $product_attribute = Product_attribute::find($attribute->id);
                $product_attribute->delete();
            }

            $product->delete();
        }
        return redirect()->route('product.index');
    }
}