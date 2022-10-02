<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alias',
        'name'
    ];

    public function regions()
    {
        $this->hasMany(Region::class, 'country_id');
    }

}
