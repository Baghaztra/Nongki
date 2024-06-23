<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'hari_buka' => 'array',
    ];
    
    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'corner_facilities', 'corner_id', 'facility_id')->distinct();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'corner_categories', 'corner_id', 'category_id')->distinct();
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'corner_id', 'id');
    }
}