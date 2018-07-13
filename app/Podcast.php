<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Podcast extends Model
{
    protected $table = 'podcast';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'url','title','description','image','audio','type','pubDate'
    ];
}
