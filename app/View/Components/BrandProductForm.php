<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BrandProductForm extends Component
{
    public $brands;
    public $product;

    public function __construct($brands, $product)
    {
      $this->brands = $brands;
      $this->product = $product;
    }

    public function render()
    {
        return view('components.brand-product-form');
    }
}
