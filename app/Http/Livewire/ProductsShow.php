<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsShow extends Component
{
    public $title = 'Produtos';

    public function render()
    {
        return view('livewire.products-show', [
            'products' => Product::orderBy('descricao')->get(),
        ])
        ->extends('layouts.app')
        ->section('content');

    }
}
