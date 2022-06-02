<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected function stock(){
      return $this->belongsTo('App\Models\Stock');
    }
    protected function devices(){
      return $this->hasMany('App\Models\Device');
    }
}
