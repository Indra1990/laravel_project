<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Barang;
use App\Order;
use App\Barang_order;
use Illuminate\Support\Facades\Validator;
use validation;
use validate;
use Carbon\Carbon;
use Excel;
use Session;
use Khill\Lavacharts\Lavacharts;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Lava;
use View;
use DB;
use Alert;

class AdminController extends Controller
{
 	public function home()
 	{
       
 		$users = User::count();
        $barangs = Barang::count();
        $orders = Order::with('barang')->count();

       // $votes  = \Lava::DataTable();
      // $data = Barang::select('jumlah_barang')->get()->toArray();
      //  $votes->addStringColumn('jumlah_barang')
       // ->addNumberColumn('Jumlah Barang')
       // ->addRow(['Goodie Bag Besar' ])
       // ->addRow(['Goodie Bag Kecil', rand(10,500)])
       // ->addRow(['Payung Besar', rand(10,500)])
        //->addRow(['Payung Kecil', rand(10,500)])
       // ->addRow(['Pulpen', rand(10,500)]);

        //Lava::BarChart('Votes', $votes);

		return view('admin/home',array('users'=>$users,'barangs'=>$barangs,'orders'=>$orders));
 	}
    public function search_user(Request $request)
    {
        $search = \Request::get('search');
        $users = User::where('name','like','%'.$search.'%')
                ->orderBy('id')->get();
        return view('admin/user_profile',compact('users',$users));

    }
     public function downloadExcelUser()
    {
        $users = User::all('name','email','sales')->toArray();
        return Excel::create('Data_User', function($excel) use ($users) {
            $excel->sheet('MyUser', function($sheet) use ($users)
            {
                $sheet->fromArray($users);
            });
        })->download('xls');

    }
 	public function user_profile()
    {

      //$users =User::all()  ;
         $search = \Request::get('search');
         if (isset($search)) {
         $users = User::where('name','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('sales','like','%'.$search.'%')
                ->get();
         }
         if (empty($search)) {
            $users = User::orderBy('name')->get();
                     //session()->flash('search','data tidak ada');
         
         }

        return view('admin/user_profile',compact('users',$users));
    }
    public function user_single($id)
    {
        $users = User::find($id);
        return view('admin/user_single', compact('users',$users));
    }
    public function user_edit($id)
    {
        $users = User::find($id);

        return view('admin/user_edit', compact('users',$users));
    }
    public function user_update(Request $request, $id)
    {
    	$input = $request->all();

        $this->validate($request,[
                'name' =>'required',
                'email' =>'required|email',
                'sales'=>'required',
                ]);

			$users = User::find($id);
            $users->update($input);
            session()->flash('update' , 'Berhasil Update user');
            return redirect('admin/user_profile');
    }
    public function user_delete($id)
    {
         $users = User::find($id);
                User::find($id)->delete();
            if ($users) {
                session()->flash('delete' , 'User Berhasil Dihapus');
                return redirect('admin/user_profile');
                }
    }
    public function merchandise_profile()
    {   
        //$barangs = Barang::all();
        $search = \Request::get('search');
        if (isset($search)) {
        $barangs = Barang::where('nama_barang','like','%'.$search.'%')
                ->orWhere('kode_barang','like','%'.$search.'%')
                ->get();
        }
       
       
         if (empty($search)) {
            $barangs = Barang::orderBy('nama_barang')->get();
            //session()->flash('search','data tidak ada')  ;
        }

        return view('admin/merchandise_profile',compact('barangs',$barangs ));
    }
    public function merchandise_tambah()
    {   
        alert()->message('Masukan Data Barang Baru','Silakan...!!!')->persistent('Close');

        return view('admin/merchandise_tambah');
    }
    public function merchandise_tambahh(Request $request)
    {
        $input = $request->all();
        $validator = validator::make($input,[
                'kode_barang' => 'required|unique:barang,kode_barang|max:6',
                'nama_barang' => 'required|max:30',
                'satuan_barang'=> 'required', 
                'jumlah_barang'=> 'required|numeric|min:1', 
            ]);

        if ($validator->fails()){
             return redirect('admin/merchandise_tambah')
                     ->withInput()
                     ->withErrors($validator);
         }

        barang::create($input);
        session()->flash('insert','Berhasil Masukan Data Barang');
        return redirect('admin/merchandise_profile');
    }
    public function merchandise_single($id)
    {
        $barangs = Barang::find($id);
        return view('admin/merchandise_single', compact('barangs',$barangs));
    }

    public function merchandise_edit($id)
    {
        $barangs = Barang::find($id);
        return view('admin/merchandise_edit',compact('barangs',$barangs));
    }
    public function merchandise_update(Request $request, $id)
    {
        $input = $request->all();

        $this->validate($request,[
                
                'jumlah_barang'=> 'required|numeric',
                ]);

            //$barangs = Barang::find($id);

            $barangs = Barang::where('id', '=', $request->id)->first();
           // $barangs['jumlah_barang']=(['jumlah_barang'=>($request->jumlah_barang)+($barangs->jumlah_barang)])
            //$barangs->jumlah_barang=(int)$barangs->jumlah_barang + (int)$request->jumlah_barang;
            //$barangs->save();
      
            $barangs->update($input);
           

            session()->flash('update' , 'Berhasil Tambah Jumlah Barang');
            return redirect('admin/merchandise_profile');
    }
    
    public function search_merchandise()
    {
        $search = \Request::get('search');
        $barangs = Barang::where('nama_barang','like','%'.$search.'%')
                ->orWhere('kode_barang','like','%'.$search.'%')
                ->orderBy('id_barang')->get();
        return view('admin/merchandise_profile',compact('barangs',$barangs));
    }
    
 	public function dashboard()
 	{
 		die('ini halaman dashboard');
 	}
     public function downloadExcelBarang()
    {
        $barangs = Barang::all('kode_barang','nama_barang','satuan_barang','jumlah_barang')->toArray();
         Excel::create('Data_Barang', function($excel) use ($barangs) {
            $excel->sheet('MyBarang', function($sheet) use ($barangs)
            {

                $sheet->fromArray($barangs);

            });
        })->export('xls');

    }
//Cek Barang Order

    public function cek_barang_order()
    {
        $search = \Request::get('search');
        if (isset($search)) {
          
        $orders = Order::with('barang.order')->where('status','=','Order')
                ->whereHas('barang', function($query) use ($search){
                    $query->where('nama_barang','like','%'.$search.'%');
                })->orWhere('tanggal_order','like','%'.$search.'%')
                  ->where('status','=','Order')->orWhere('status','=','Proses')->latest()->paginate(7);
        }
      

        $push = order::where('status', '=' ,'Order')->orWhere('status','=','Proses')->count();

        return view('admin/cek_barang_order',compact('orders','push'));
    }
    public function search_cek_barang_order()
    {
        $search = \Request::get('search');
        $orders = Order::with('barang')->where('status','=','Order')
                ->whereHas('barang', function($query) use ($search){
                    $query->where('nama_barang','like','%'.$search.'%');
                })->orWhere('tanggal_order','like','%'.$search.'%')
                  ->where('status','=','Order')->orWhere('status','=','Proses')->latest()->paginate(7);
        
        $push = Order::where('status' ,'=' ,'Order')->orWhere('status','=','Proses')->count();
       //var_dump($push);

        return view('admin/cek_barang_order',compact('orders','push'));
    }
    public function edit_cek_barang_order($id)
    {
        $order = Order::find($id);
        return view('admin/edit_cek_barang_order',compact('order',$order));
    }

    public function update_cek_barang_order(Request $request, $id)
    {
        $input = $request->all();

        $this->validate($request,[
                'status' => 'required',                
                ]);

        //$jumlah = Order::with('barang')->where('id',$id)->get();
        
        $order = Order::with('barang')->findOrFail($id);
        //$proses = Order::where('status', '=', 'Proses');

            foreach ($order->barang as $key ) {
            if(Order::where('status', '=', 'Proses')->orWhere('status', '=', 'Selesai')) {
                $key['jumlah_barang']=(int)$key->jumlah_barang - (int)$key->pivot->quantity;

                $key->save();
                } 
             
            } 
            $order->update($input);
            
            //$order->save();   
            session()->flash('update' , 'Berhasil Update Status Order Barang');
            return redirect('admin/cek_barang_order');
    }
    public function selesaiedit_cek_barang_order($id)
    {
        $order = Order::find($id);
        return view('admin/selesai_cek_order_barang',compact('order',$order));
    }
    public function selesai_cek_barang_order(Request $request, $id)
    {
         $input = $request->all();

        $this->validate($request,[
                'status' => 'required',                
                ]);

        //$jumlah = Order::with('barang')->where('id',$id)->get();
        
        $order = Order::with('barang')->findOrFail($id);
        //$proses = Order::where('status', '=', 'Proses');
            
            $order->update($input);
       
            
            //$order->save();   
            session()->flash('update' , 'Berhasil Update Status Order Barang');
            return redirect('admin/cek_barang_order');
    }
    //Laporan order 
    public function laporan_order(Request $request)
    {   
        $search = \Request::input('search');
        $search2 = \Request::input('search2');

        if (isset($search)) {
          
        $orders = Order::with('barang.order')->where('status','=','Selesai')
                ->whereHas('barang', function($query) use ($search){
                    //$query->Where('tanggal_order','>=','%'.$search.'%');
                    $query->whereBetween(DB::raw('date(tanggal_order)'), [$search, $search2]) ;

                })//->Where('tanggal_order','<=','%'.$search2.'%')
                  ->where('status','=','Selesai')->latest()->paginate(5);
        }
            
        return view('admin/laporan',compact('orders'));
    }
    //pencarian laporan 
    public function search_laporan(Request $request)
    {
        $search = Carbon::parse($request->search);
        $search2 = Carbon::parse($request->search2);

        $orders = Order::with('barang.order')//->where('status','=','Selesai')
                ->whereHas('barang', function($query) use ($search ,$search2){
                   // $query->Where('tanggal_order','>=','%'.$search.'%');
                    $query->whereBetween(DB::raw('date(tanggal_order)'), [$search, $search2]) ;
                })//->orWhere('tanggal_order','<=','%'.$search2.'%')
                  ->where('status','=','Selesai')->latest()->paginate(5);

        return view('admin/laporan',compact('orders'));
    }
    //laporan Order Barang
    public function downloadExcelLaporan()
    {
        Excel::create('Laporan Order Barang', function($excel) {

            $excel->sheet('Laporan', function($sheet) {
                $orders = Order::where('status','=','Selesai')->get();

                $arr =array();
                foreach($orders as $order) {
                    foreach($order->barang as $barang_){
                        $data = array(date('d-m-Y', strtotime($order->tanggal_order)), $order->status, $order->user->name, $barang_->nama_barang, $barang_->pivot->quantity);
                        array_push($arr, $data);
                    }
                }

                //set the titles

                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(array(
                        'Tanggal Order', 'Status', 'Nama', 'Nama Barang', 'Quantity'
                      
                    )

                );


            });

        })->export('csv');
    }

    
    public function __construct() 
    { 
        $this->middleware('RevalidateBackHistory'); 
        $this->middleware('auth'); 
    }

}
