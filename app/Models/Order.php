<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'address', 'phone', 'status'];

    public function user(): BelongsTo
    {
        $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function orderProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'order_products');
    }
}
