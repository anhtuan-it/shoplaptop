<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
   protected $table ="tbl_product";

   public function ctsp()
    {
    	return $this->belongsTo('App\Chitietsanpham','id');
    }
}

