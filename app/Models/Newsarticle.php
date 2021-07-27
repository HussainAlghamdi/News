<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsarticle extends Model
{
    use HasFactory;

    public $table = "newsarticles";
    public function comments(){

        return $this->hasMany('App\Models\Comment');
    }

    public function user(){

        return $this->belongsTo('App\Models\User');
    }
}
