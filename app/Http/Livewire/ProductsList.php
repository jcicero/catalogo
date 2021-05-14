<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class ProductsList extends Component
{
  public $title = 'Produtos';

  public $search = '';

  /*public function pesquisar()
  {
    $title = 'Produtos';
    $product = Product::with('category')
    ->where('category_id','=',2)
    ->where('descricao', '~*', $this->search)
    ->orWhere('resumida', '~*', $this->search)
    ->orWhere('codigo', 'LIKE', "%{$this->search}%")->get();
    $count = 1;
*/
    //return view('livewire.products-list', compact('product', 'count', 'title'));
 // }

  public function render()
  {
    $categories = Category::all();
    $product = Product::with('category')
      ->orWhere(function($query) {
        $query->where('descricao', '~*', $this->search)
              ->orWhere('resumida', '~*', $this->search)
              ->orWhere('codigo', '~*', $this->search);})
      ->where('active',true)
      ->orderBy('descricao')
      ->get();

    return view('livewire.products-list', [
      'products' => $product,
      'categories' => $categories,
    ])
      ->extends('layouts.app')
      ->section('content');
  }
}
