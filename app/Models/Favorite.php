<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    protected $table = "favorites";

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
