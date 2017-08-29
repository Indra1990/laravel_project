<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Order;
use App\Barang_order;
use validate;
use DB;
use Carbon\Carbon;
use DateTime;
use validation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Barang;
use App\Http\Requests;
use Illuminate\Http\Request;


class UserController extends Controller
{
   
    public function profile()
    {
    	return view('/profile',array('user'=>Auth::user()) );
    }
	public function edit_user($id)
    {
        $users = User::find($id);

        return view('/edit_user', compact('users'));
    }
    public function update_user(Request $request, $id)
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
            return redirect('/profile');
    }

    
    public function barang_order(Request $request)
    {
        $Barang = DB::table('barang')->pluck('nama_barang','id')->all();

        return view('/barang_order',compact('Barang'));
    }
   
    public function barang_order_store(Request $request)
    {
        $input = $request->all();


        $this->validate($request, [
            'quantity' => ['required']
        ]);

            $orders=Order::create(['tanggal_order'=>$request['tanggal_order'],
                                    'due_date'=>$request['due_date'],
                                    'user_id'=>Auth::user()->id             
                ]);

            foreach($input['barang'] as $key => $barangId) {
           
            $orders->barang()->attach($barangId,['quantity' => $input['quantity'][$key]]);
              
        }
            
        session()->flash('insert' , 'Berhasil Order Barang');
        return redirect('barang_order');   
    }

    public function create_order()
    {
        $orders = Order::find(1);
        $orders->barang()->attach(3);
    }

    public function riwayat($id)
    { 

        $user = User::with(['order.barang'])->findOrFail($id);
        //$user = User::with(['order.barang'])->where('id',$id)->get();


        foreach ($user->order as $value) {
            $value->tanggal_order = Carbon::now()->diffInDays(new Carbon($value->due_date));

        }
           // $tunggu=date_diff($tanggal_order,$due_date);

       // dd($tunggu);
        return view('riwayat.history',compact('user'));
        //return view('riwayat.history')->with(['orders'=>$orders],['users'=>$users]);
        //return view('riwayat/history', ['user'=>User::find($id)]);
    }

    public function panel()
    {
        return view('/panel');
    }
    public function __construct() 
    { 
        $this->middleware('RevalidateBackHistory'); 
        $this->middleware('auth'); 
    }
}
