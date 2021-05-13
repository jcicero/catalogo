<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

  public function index(Request $request)
  {
    //
  }

  public function create()
  {
    $title = 'Cadastrar Produto';

    $categories = Category::orderBy('categoria','asc')->get();

    return view('product.create',compact('title','categories'));
  }

  public function store(Request $request)
  {
    $product = $request->all();
    $insert = Product::create($product);

    session()->flash('message', 'Registro inserido com sucesso.');

    if ($insert)
     // return redirect()->back();
      return redirect()->route('produto.show', $insert->id);
    else {
      return redirect()->back();
    }
  }

  public function storebrand(Request $request)
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
    $brands = Brand::orderBy('marca')->get();

    $product = Product::find($id);

    return view('productShow', compact('product', 'brands'));
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

  public function pesquisar(Request $request)
  {
    dd($request);
    $title = 'Produtos';
    $product = Product::where('descricao', 'LIKE', "%{$request->search}%")
      ->orWhere('resumida', 'LIKE', "%{$request->search}%")
      ->orWhere('codigo', 'LIKE', "%{$request->search}%")->get();
    $count = 1;

    return view('livewire.products-list', compact('product', 'count', 'title'));
  }
}
