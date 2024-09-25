<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $timestamps= 'false';

    public function isGoldMember(){
        return $this->points > 2000;
    }

    public function order(): HasMany
    {
        return $this->belongsTo(Order::class);
    }
}

