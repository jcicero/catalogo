<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

  protected static $logAttributes = ['*'];

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
      return $this->belongsToMany(Brand::class)->withTimestamps()->withPivot('user_id');
  }

  public function notes()
  {
      return $this->hasMany(Note::class);
  }
}
