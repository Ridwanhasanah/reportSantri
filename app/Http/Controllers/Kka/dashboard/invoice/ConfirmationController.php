<?php

namespace App\Http\Controllers\Kka\dashboard\invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Confirmation;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;

class ConfirmationController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kakakAsuh.dashboard.invoice.confirmation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $confirmation = new Confirmation;
        $invoice = DB::table('orders')->select('invoice')->where('invoice', $request->invoice)->first();
        $invoice_id = DB::table('orders')->select('id')->where('invoice', $request->invoice)->first();

        if ($invoice == null) {
            return back()->with('danger','Maaf Nomor Invoice Tidak ada');
        }else{
            $confirmation->invoice = $request->invoice;
            $confirmation->transfer = $request->transfer;
            $confirmation->fund     = $request->fund;
            $confirmation->bill_name = Auth::user()->name;
            $confirmation->email = Auth::user()->email;
            $confirmation->hp = Auth::user()->hp;
            $confirmation->information = $request->information;

            if ($request->hasFile('photo')) {
                $filename = Auth::user()->id.$request->photo->getClientOriginalName();
                $request->file('photo')->storeAs('proof',$filename);
                $confirmation->photo = $filename;
            }

            $confirmation->save();

            $order = Order::find($invoice_id->id);
            $order->confirm = 'confirm';
            $order->update();

            return back()->with('success','Terima Kasih Telah Kormasi Donasi anda');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
