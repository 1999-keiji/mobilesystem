<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use HasFactory;
  protected $guarded = [];
  protected function stock(){
    return $this->hasOne('App\Models\Stock');
  }
  protected function sale(){
    return $this->hasOne('App\Models\Sale');
  }
}
