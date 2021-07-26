<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ProductsList extends Component
{
  public $title = 'Produtos';

  public $cat;

  public $search = '';

  public function mount()
  {
    $this->cat = Route::current()->categoria;
  }

  public function render()
  {

    $products = DB::table('categories')
                ->join('products', 'categories.id', '=', 'products.category_id')
                ->orWhere(function($query) {
                  $query->where('descricao', '~*', $this->search)
                        ->orWhere('resumida', '~*', $this->search)
                        ->orWhere('codigo', '~*', $this->search)
                        ;})
                ->where('active',true)
                ->where('categoria',$this->cat)
                ->orderBy('descricao')
                ->get();

/*    
      $products = Product::with('category')
      ->orWhere(function($query) {
        $query->where('descricao', '~*', $this->search)
              ->orWhere('resumida', '~*', $this->search)
              ->orWhere('codigo', '~*', $this->search)
             // ->where('categoria','Medicamentos')
              ;})
      ->where('active',true)
      ->orderBy('descricao')
      ->get();
*/

    return view('livewire.products-list', [
      'products' => $products,
      //'categories' => $categories,
     // 'cat' => $cat
    ])
      ->extends('layouts.app')
      ->section('content');
  }
}
