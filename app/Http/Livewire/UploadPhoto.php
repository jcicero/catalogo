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

    protected $rules = [
        'photo' => 'required|image|max:1024', // 1MB Max
    ];

    protected $messages = [
        'photo.required' => 'Selecione uma imagem',
        'photo.image' => 'Formato aceito (jpg, png, svg)',
        'photo.max' => 'Tamanho máximo da imagem 1mb (1024kb)',
        ];

    public function render()
    {
        return view('livewire.upload-photo');
    }

    public function save()
    {
        $this->validate();

        $produto = $this->product;

        $fileName = $this->product->codigo . '.' . $this->photo->getClientOriginalExtension();

        if($path = $this->photo->storeAs('product',$fileName)){
            $produto->update([
                'img_photo_path' => $path,
            ]);

        session()->flash('message', 'Imagem enviada com sucesso.');

        }
        
    }
}
