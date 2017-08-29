<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_order extends Model
{
    protected $table = "barang_order";
    protected $fillable = ['order_id', 'barang_id','quantity'];


    public function barang()
    {
        return $this->belongsToMany('App\Barang','barang_order','order_id','barang_id');
    }

     public function order()
    {
    	return $this->belongsToMany('App\Order','barang_order','order_id','barang_id');
    }

}
