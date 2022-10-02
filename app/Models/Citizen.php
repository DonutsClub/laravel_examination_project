<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'city_id'
    ];

    public function city()
    {
        $this->hasMany(City::class, 'city_id');
    }
}
