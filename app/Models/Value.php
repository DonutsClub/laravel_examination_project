<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'country_id'
    ];

    public function country()
    {
        $this->hasOne(Country::class);
    }
}
