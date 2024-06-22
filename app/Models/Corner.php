<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'corner_facilities', 'corner_id', 'facility_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'corner_categories', 'corner_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'corner_id', 'id');
    }
}