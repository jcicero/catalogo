<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;
    public $product;


    public function render()
    {
        return view('livewire.upload-photo');
    }

    public function save()
    {
        $this->validate([
            'photo' => 'required|image|max:1024', // 1MB Max
        ]);

        $produto = $this->product;

        $fileName = $this->product->codigo . '.' . $this->photo->getClientOriginalExtension();

        if($path = $this->photo->storeAs('product',$fileName)){
            $produto->update([
                'img_photo_path' => $path,
            ]);
        }
        
    }
}
