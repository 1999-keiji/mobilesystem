<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected function stock(){
      return $this->belongsTo('App\Models\Stock');
    }
}
