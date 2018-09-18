<?php

namespace App\Http\Controllers\Kka\dashboard\order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Caregiver;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use App\Events\Invoice\EventSendInvoice;

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
        $package = DB::table('users')->select('*')->where('id',$id_santri)->first();
        return view('kakakAsuh.dashboard.orderForm', compact('id_santri','package'));    
    }

    public function store(Request $request, $id_santri)
    {
        // variable ini $user di buat untuk di guanakn datanya saat mengirimkan email invoice
        $user = Auth::User();
        $price = $request->amount_month * $request->package;
        $user_santri = DB::table('users')->select('name')->where('id',$id_santri)->first();
        $last_id = DB::table('orders')->orderBy('id', 'desc')->first();

        $order = new Order;
        $caregiver = new Caregiver;

        $order->create([
            'user_id' => Auth::user()->id,
            'santri_id' => $id_santri,
            'package' => $request->package,
            'amount_month' => $request->amount_month,
            'price' => $price,
            'user_name' => Auth::user()->name,
            'user_santri' => $user_santri->name,
            'address' => Auth::user()->address,
            'hp' => Auth::user()->hp,
            'email' => Auth::user()->email,
            'status' => 'unpaid',
            'invoice' => $last_id->id + 1,

        ]);

        $caregiver->caregiver = Auth::user()->id;
        $caregiver->santri    = $id_santri;
        $caregiver->active    = false;
        $today = date('Y-m-d H:i:s'); //tanggal hari ini
        $caregiver->expired      = date('Y-m-d H:i:s', strtotime("+$request->amount_month month", strtotime($today)));
        $caregiver->save();

        //send email
        // $id_last = $last_id+1;
        $orderSendMail = Order::findOrFail($last_id->id+1);
        // $orderSendMail = DB::table('orders')->select('*')
        //                     ->where('id',$last_id+1)
        //                     ->first();
        event(new EventSendInvoice($orderSendMail));
        

        return redirect()->route('kka.santri')->with('success','Terima kasih pemintaan anda akan kami proses, Silahkan periksa email Anda');

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
