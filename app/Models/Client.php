<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CommentFeedBack;
use App\Models\FeedbacksProduct;

class Client  extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatarUrl' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the comments from the user.
     */
    public function comments()
    {
        return $this->hasMany(CommentFeedBack::class, 'comment_id');
    }

    /**
     * Get the feedback by prduct from the user.
     */
    public function feedbacksByProducts()
    {
        return $this->hasMany(FeedbacksProduct::class, 'product_id');
    }
}
