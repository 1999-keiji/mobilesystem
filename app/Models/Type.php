<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected function maker(){
      return $this->belongsTo('App\Models\Maker');
    }
    protected function stock(){
      return $this->belongsTo('App\Models\Stock');
    }
}
