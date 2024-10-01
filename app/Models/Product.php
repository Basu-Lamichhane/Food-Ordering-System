<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  public function media()
  {
    return $this->belongsTo(Media::class);
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function reviewable()
  {
    return $this->hasMany(Reviewable::class);
  }
  public function reviews()
  {
    return $this->hasMany(Review::class);
  }
  public function isReviewed()
  {
    $countOfReviews = $this->reviews()
      ->where('user_id', auth()->user()->id)
      ->where('product_id', $this->id)
      ->get();

    return ($countOfReviews->count() >= 1 ? true : false);
  }
}
