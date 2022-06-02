<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected function pay(){
      return $this->belongsTo('App\Models\Pay');
    }
    protected function user(){
      return $this->belongsTo('App\Models\User', 'user_id');
    }
    protected function customer(){
      return $this->belongsTo('App\Models\Customer');
    }
    protected function stock(){
      return $this->belongsTo('App\Models\Stock');
    }
    protected function category(){
      return $this->belongsTo('App\Models\Category');
    }
}
