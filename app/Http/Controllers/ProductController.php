<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

  public function index(Request $request)
  {
//
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {

    $productId = $request->product_id;
    $brandId = $request->brand_id;
    $userId = $request->user_id;

    $product = Product::find($productId);

    $product->brands()->attach($brandId, ['user_id' => $userId]);

    return redirect()->back();

  }

  public function show($id)
  {
    $brands = Brand::all();

    $product = Product::find($id);

    return view('productShow', compact('product','brands'));
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }

}
