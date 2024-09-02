<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auther extends Model
{
    use HasFactory;

    protected $fillable = ['auther_name','bio','auther_country'];

    function products() : HasMany{
        return $this->hasMany(Product::class);
    }
}
