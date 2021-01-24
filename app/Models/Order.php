<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'note',
        "sum",
        "currency"
    ];

    /**
     * Get the product for the Shipping Cart.
     */
    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
