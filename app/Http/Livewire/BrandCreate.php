<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Company;

class BrandCreate extends Component
{

  public $title = 'Marcas';
  public $marca;
  public $company_id;

  protected $rules = [
    'marca' => ['required', 'unique:brands,marca'],
    'company_id' => ['required','min:1'],
  ];

  protected $messages = [
    'marca.required' => 'Informe a MARCA!',
    'company_id.required' => 'Selecione a EMPRESA!',
    'company_id.min' => 'Selecione a EMPRESA!',
    'marca.unique' => 'Essa MARCA já existe.',
  ];

  public function create()
  {
    $this->validate();

    Brand::create([
      'marca' => $this->marca,
      'company_id' => $this->company_id
    ]);

    $this->marca = null;
    $this->company_id = null;
    $this->emit('updateBrand');

    session()->flash('message', 'Marca cadastrada com sucesso.');
  }

  public function render()
  {

    $companies = Company::orderBy('empresa')->get();

    return view('livewire.brand-create', compact('companies'))
    ->extends('layouts.app')
    ->section('content');
  }
}
