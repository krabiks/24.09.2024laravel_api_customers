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
    public $timestamps= false;

    public function isGoldMember(){
        return $this->points > 2000;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'phone',
        'address',
        'city',
        'state',
        'points'
    ];
}

