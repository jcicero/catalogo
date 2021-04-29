<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
  public $title = 'Produtos';

  public $search = '';

  public function pesquisar()
  {
    $title = 'Produtos';
    $product = Product::where('descricao', '~*', $this->search)
    ->orWhere('resumida', '~*', $this->search)
    ->orWhere('codigo', 'LIKE', "%{$this->search}%")->get();
    $count = 1;

    //return view('livewire.products-list', compact('product', 'count', 'title'));
  }

  public function render()
  {
    $product = Product::where('descricao', '~*', $this->search)
    ->orWhere('resumida', '~*', $this->search)
    ->orWhere('codigo', 'LIKE', $this->search)
    ->orderBy('descricao')
    ->get();

    return view('livewire.products-list', [
      'products' => $product,
    ])
      ->extends('layouts.app')
      ->section('content');
  }
}
