<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'media_id',
        'url',
        'active',
    ];
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
