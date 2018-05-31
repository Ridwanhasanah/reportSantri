<?php

namespace App\Http\Controllers\Kka\dashboard\order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create($id_santri)
    {
        return view('kakakAsuh.dashboard.orderForm', compact('id_santri'));    
    }

    public function store(Request $request, $id_santri)
    {

        $price = $request->amount_month * $request->package;
        $user_santri = DB::table('users')->select('name')->where('id',$id_santri)->first();
        $last_id = DB::table('orders')->orderBy('id', 'desc')->first();

        $order = new Order;

        $order->create([
            'user_id' => Auth::user()->id,
            'package' => $request->package,
            'amount_month' => $request->amount_month,
            'price' => $price,
            'user_name' => Auth::user()->name,
            'user_santri' => $user_santri->name,
            'address' => Auth::user()->address,
            'hp' => Auth::user()->hp,
            'status' => 'unpaid',
            'invoice' => $last_id->id + 1,

        ]);
        

        return redirect()->route('kka.santri')->with('success','Terima kasih pemintaan anda akan kami proses');

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
