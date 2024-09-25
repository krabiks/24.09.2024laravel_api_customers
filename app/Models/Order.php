<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps= 'false';

    public function orders(): BelongsTo
    {
        return $this->belongsTo(order::class);
    }
}
