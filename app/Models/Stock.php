<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['supply-date'];
    protected function maker(){
      return $this->belongsTo('App\Models\Maker');
    }
    protected function device(){
      return $this->belongsTo('App\Models\Device');
    }
    protected function category(){
      return $this->belongsTo('App\Models\Category');
    }
    protected function supplier(){
      return $this->belongsTo('App\Models\Supplier');
    }
    protected function customer(){
      return $this->belongsTo('App\Models\Customer');
    }
    protected function inventory(){
      return $this->belongsTo('App\Models\Inventory');
    }
}
