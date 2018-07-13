<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FeedUser extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'feed_user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'feed_id'
    ];
}
