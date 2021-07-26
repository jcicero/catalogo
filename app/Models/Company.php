<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
      'empresa',
      'cnpj',
      'telefone',
      'email',
      'url',
      'user_id'
    ];

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function getUrlAttribute($value)
    {
      return preg_replace("(^https?://)", "", $value );
    }
}
