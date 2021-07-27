<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
      'produtodesc',
      'isAceito',
      'marca'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getDtOcorrenciaAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
