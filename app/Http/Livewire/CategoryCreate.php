<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $title = 'Categorias';
    public $categoria;

    protected $rules = [
        'categoria' => ['required','unique:categories,categoria'],
    ];

    protected $messages = [
            'categoria.required' => 'Informe a CATEGORIA!',
            'categoria.unique' => 'Essa categoria já existe.',
        ];

    public function create()
    {
        $this->validate();

        Category::create([
            'categoria' => $this->categoria]);
        
        $this->categoria = null;
        $this->emit('updateCategory');

        session()->flash('message', 'Categoria cadastrada com sucesso.');
    }

    public function render()
    {
        return view('livewire.category-create')
                ->extends('layouts.app')
                ->section('content');
    }
}
