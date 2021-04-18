<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class BrandShow extends Component
{
  protected $listeners = ['updateBrand' => 'render'];

  public function render()
  {
    return view('livewire.brand-show', [
      'brands' => Brand::orderBy('marca')->get(),
    ]);
  }
}
