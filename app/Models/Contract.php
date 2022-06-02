<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected function customer(){
      return $this->belongsTo('App\Models\Customer');
    }
    protected function plan(){
      return $this->belongsTo('App\Models\Plan');
    }
}
