<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
  public function createManufacturer()
  {
    return view('products.manufacturer_product.create_manufacturer');
  }



  public function index()
  {
    $manufacturers = Manufacturer::orderBy('created_at', 'desc')->get();
    $pageName = "Hãng sản xuất";
    return view('products.manufacturer_product.manufacturer', compact('pageName', 'manufacturers'));
  }

  public function adminCreateManufacturer(Request $request)
  {
    $request->validate([
      'manufacturerName' => 'required|unique:manufacturers|max:255',
    ]);
    $data = $request->all();
    $check = $this->create($data);
    return redirect("manufacturer")->withSuccess('Bạn đã thêm 1 hãng sản xuất');
  }

  public function create(array $data)
  {
    return Manufacturer::create([
      'manufacturerName' => $data['manufacturerName'],
    ]);
  }

  public function editManufacturer(Request $request)
  {
    $data = $request->all();
    $manufacturer = Manufacturer::findOrFail($data['idManufacturer']);
    return view('products.manufacturer_product.edit_manufacturer', compact('manufacturer'));
  }

  public function adminUpdateManufacturer(Request $request, $id)
  {
    
    $manufacturer = Manufacturer::find($id);
    $request->validate([
      'manufacturerName' => 'required|unique:manufacturers|max:255',
    ]);
    if($manufacturer)
    {
    $manufacturer->manufacturerName = $request['manufacturerName'];
    $manufacturer->save();
    }
    return redirect()->route('manufacturer');
  }

  public function delete(Request $request)
  {

    $manufacturer = Manufacturer::find($request['idManufacturer']);
    if($manufacturer)
    {
      $manufacturer->delete();
    }
    
    return redirect()->route('manufacturer');
  }
}