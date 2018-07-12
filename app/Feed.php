<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use Notifiable;

    protected $table = 'feed';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'url','title','description','image','destaque'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
