<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'auther_id',
        'category_id',
        'product_image'
    ];

    function auther():BelongsTo{
        return $this->belongsTo(Auther::class);
    }

    function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    function tags() : BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }
}
