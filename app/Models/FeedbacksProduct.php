<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentFeedBack;

class FeedbacksProduct extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbacks_product';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'product_id',
        "feedback",
    ];

    /**
     * Get the comments and User data
     */
    static function getCommentUser(int $productId): object 
    {
        return \DB::table('feedbacks_product')
            ->select(['name', 'feedback', 'avatarUrl', 'client_id', 'feedbacks_product.id'])
            ->join('clients', function ($join) {
                $join->on('clients.id', '=', 'feedbacks_product.client_id');
            })
            ->join('products', function ($join) use ($productId) {
                $join->on('products.id', '=', 'feedbacks_product.product_id')
                    ->where('products.id', '=', $productId);
            })
            ->orderBy('feedbacks_product.created_at', 'asc')
            ->get();
    }
}
