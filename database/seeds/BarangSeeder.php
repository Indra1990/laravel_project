<?php

use App\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
        	[
	        	'kode_barang'   => 'GB001',
	            'nama_barang'   => 'Goodie Bag Besar',
	            'satuan_barang'  => 'piece',
	        	'jumlah_barang' => '300',
	            'created_at'    => date('Y-m-d H:i:s'),
	            'updated_at'    => date('Y-m-d H:i:s'),
        	],

        	[
	        	'kode_barang'   => 'GB002',
	            'nama_barang'   => 'Goodie Bag kecil',
	            'satuan_barang'  => 'piece',
	        	'jumlah_barang' => '300',
	            'created_at'    => date('Y-m-d H:i:s'),
	            'updated_at'    => date('Y-m-d H:i:s'),
        	],

        	[
	        	'kode_barang'   => 'PY001',
	            'nama_barang'   => 'Payung Besar',
	            'satuan_barang'  => 'piece',
	        	'jumlah_barang' => '300',
	            'created_at'    => date('Y-m-d H:i:s'),
	            'updated_at'    => date('Y-m-d H:i:s'),
        	],

        	[
	        	'kode_barang'   => 'PY002',
	            'nama_barang'   => 'Payung Kecil',
	            'satuan_barang'  => 'piece',
	        	'jumlah_barang' => '300',
	            'created_at'    => date('Y-m-d H:i:s'),
	            'updated_at'    => date('Y-m-d H:i:s'),
        	],

        	[
	        	'kode_barang'   => 'PL001',
	            'nama_barang'   => 'Pulpen',
	            'satuan_barang'  => 'piece',
	        	'jumlah_barang' => '300',
	            'created_at'    => date('Y-m-d H:i:s'),
	            'updated_at'    => date('Y-m-d H:i:s'),
        	]

        	]);
    }
}
