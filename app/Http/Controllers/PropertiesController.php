<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DB::table('properties')
            ->join('categories', 'properties.category_id', '=', 'categories.id')
            ->select('categories.*', 'properties.*')
        //->where('properties.category_id', '=', $id)
            ->get();
        // $properties = Properties::orderBy('created_at', 'desc')->get();
        //  $categoryName = $properties->category_id;
        $pageName = "Thuộc Tính";
        return view('products.properties_product.properties', compact('pageName', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('products.properties_product.create_properties', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'propertiesName' => 'required|max:255',

        ]);
        $properties = new Properties;
        $properties->propertiesName = $request['propertiesName'];
        $properties->category_id = $request['category'];
        $properties->save();

        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }


    public function editProperties(Request $request)
    {
        $properties = Properties::find($request->idproperties);

        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('products.properties_product.edit_properties', compact('properties', 'categories'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'propertiesName' => 'required|max:255',

        ]);
        $properties = Properties::find($id);
        if($properties)
        {
        $properties->propertiesName = $request['propertiesName'];
        $properties->category_id = $request['category'];
        $properties->save();
        }
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properties = Properties::find($id);
        if ($properties) {
            $properties->delete();
        }
        return redirect()->route('properties.index');
    }
}