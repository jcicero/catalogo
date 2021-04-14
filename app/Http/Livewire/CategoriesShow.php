<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesShow extends Component
{
    protected $listeners = ['updateCategory' => 'render'];
    public function render()
    {
        return view('livewire.categories-show', [
            'categories' => Category::orderBy('categoria')->get(),
        ]);
    }
}
