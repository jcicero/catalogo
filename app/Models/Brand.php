<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  use HasFactory;

  protected $fillable = ['marca','company_id'];

  public function products()
  {
      return $this->belongsToMany(Product::class);
  }

  public function company()
  {
      return $this->belongsTo(Company::class);
  }
}
