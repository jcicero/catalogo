<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

class ProductsList extends Component
{
  public $title = 'Produtos';

  public $search = '';

  public function render()
  {
    $cat = Route::current()->categoria;
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
      'cat' => $cat
    ])
      ->extends('layouts.app')
      ->section('content');
  }
}
