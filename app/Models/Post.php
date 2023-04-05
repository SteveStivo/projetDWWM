<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'post_title',
        'post_description',
        'post_author',
        'post_img',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($post){
            $post->user()->associate(auth()->user()->id);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
