<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;

class BrandCreate extends Component
{

  public $title = 'Marcas';
  public $marca;

  protected $rules = [
    'marca' => ['required', 'unique:brands,marca'],
  ];

  protected $messages = [
    'marca.required' => 'Informe a MARCA!',
    'marca.unique' => 'Essa MARCA já existe.',
  ];

  public function create()
  {
    $this->validate();

    Brand::create([
      'marca' => $this->marca
    ]);

    $this->marca = null;
    $this->emit('updateBrand');

    session()->flash('message', 'Marca cadastrada com sucesso.');
  }

  public function render()
  {
    return view('livewire.brand-create')
    ->extends('layouts.app')
    ->section('content');
  }
}
