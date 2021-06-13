<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationView extends Component
{
    public $product;

    public function __construct($product)
    {
      $this->product = $product;
    }

    public function render()
    {
        return view('components.notification-view');
    }
}
