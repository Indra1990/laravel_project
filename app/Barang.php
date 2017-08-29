<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
	//protected $primaryKey = 'id_barang';

	protected $table = "barang";
    protected $fillable = ['kode_barang', 'nama_barang', 'satuan_barang','jumlah_barang',];
    
    public function order()
    {
    	return $this->belongsToMany('App\Order','barang_order','order_id','barang_id');
    }
}
