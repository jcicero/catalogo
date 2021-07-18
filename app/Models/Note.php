<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
      'anvisa',
      'sei',
      'dtocorrencia',
      'setor',
      'profissional',
      'registroanvisa',
      'brand_id',
      'product_id',
      'lote',
      'validade',
      'queixa',
      'user_id',
      'email',
      'produtodesc'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
