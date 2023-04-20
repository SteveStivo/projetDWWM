<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable =[
        'event_title',
        'event_description',
        'event_img',
        'event_place',
        'event_location',
        'event_date_start',
        'event_date_end',
        'event_price',
        'event_map',
        'event_video_link',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($event){
            /* récupère l'ID authentifié et l'associe à user() dans $event */
            $event->user()->associate(auth()->user()->id);
        });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
