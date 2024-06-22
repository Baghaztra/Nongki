<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    public function corners()
    {
        return $this->belongsToMany(Corner::class, 'corner_facilities', 'facility_id', 'corner_id');
    }
}
