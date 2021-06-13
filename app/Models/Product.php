<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    'descricao',
    'resumida',
    'codigo',
    'apresentacao',
    'classification',
    'img_photo_path',
    'category_id',
    'active',
    'user_id'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function getPhotoAttribute()
  {
    return $this->img_photo_path;
  }

  public function brands()
  {
      return $this->belongsToMany(Brand::class)->withTimestamps();
  }

  public function notifications()
  {
      return $this->hasMany(Notification::class);
  }
}
