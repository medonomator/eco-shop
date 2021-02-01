<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentFeedBack;
use App\Models\FeedbacksProduct;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the comments from the user.
     */
    public function comments()
    {
        return $this->hasMany(FeedbacksProduct::class, 'product_id');
    }

    public function scopeBestPrice($query)
    {
        return $query->where('price', '>', 300);
    }
}
