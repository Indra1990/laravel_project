<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //protected $primaryKey = 'id_order';
    protected $table = "order";
    protected $fillable = ['status', 'tanggal_order','due_date','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
    public function barang()
    {
        return $this->belongsToMany('App\Barang','barang_order','order_id','barang_id')->WithPivot('quantity');
    }

}

