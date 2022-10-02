<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region_id'
    ];

    public function region()
    {
        $this->hasMany(Region::class, 'region_id');
    }

    public function citizen()
    {
        $this->belongsTo(Citizen::class);
    }
}
