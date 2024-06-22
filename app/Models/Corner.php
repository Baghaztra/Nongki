<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function fasiliti()
    {
        return $this->hasMany(Facility::class, 'facilitie_id', 'id');
    }

    public function categori()
    {
        return $this->belongsTo(Category::class, 'categorie_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'img_id', 'id');
    }
}