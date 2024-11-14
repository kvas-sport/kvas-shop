<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'address', 'phone', 'status'];

    public function user(): BelongsTo
    {
        $this->belongsTo(User::class);
    }
}
