<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CornerFasilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'corner_id',
        'facility_id',
    ];

    public function corner()
    {
        return $this->belongsTo(Corner::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
