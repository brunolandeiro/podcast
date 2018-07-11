<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Destaques extends Model
{
    use Notifiable;
    protected $table = 'destaques';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome'
    ];
}
