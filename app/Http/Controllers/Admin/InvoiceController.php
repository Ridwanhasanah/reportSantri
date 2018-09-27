<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Events\Invoice\EventConfirmationTransfer;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.invoice.invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Order::find($id);
        return view('dashboard.admin.invoice.invoice-detail',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Order::find($id);
        return view('dashboard.admin.invoice.invoice-edit',compact('invoice'));
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
        $invoice = Order::find($id);

        // dd($package->package);

        $invoice->package      = $request->package;
        $invoice->amount_month = $request->amount_month;
        $invoice->price        = $request->price;
        $invoice->status       = $request->status;
        
        
        if ($request->status == 'paid') {
            DB::table('caregivers')->select('*')->
            where([
                ['caregiver',$invoice->user_id],
                ['santri',$invoice->santri_id],

            ])->update(['active'=>true]);

            $package = DB::table('users')->select('*')->where('id',$invoice->santri_id)->first();

            if ($package->package == '') {
                if ($request->package == 108000) {
                DB::table('users')->select('*')->
                where('id',$invoice->santri_id)->update(['package'=>'A']);
                }elseif ($request->package == 180000) {
                    DB::table('users')->select('*')->
                    where('id',$invoice->santri_id)->update(['package'=>'B']);
                }elseif ($request->package == 288000) {
                    DB::table('users')->select('*')->
                    where('id',$invoice->santri_id)->update(['package'=>'C','status'=>'Telah Dibiayai']);
                }
            }elseif ($package->package == 'A' || $package->package == 'B') {
                DB::table('users')->select('*')->
                where('id',$invoice->santri_id)->update(['package'=>'AB','status'=>'Telah Dibiayai']);
            }

           

            // DB::table('users')->select('*')->
            // where('id',$invoice->santri_id)->update(['status'=>'Telah Dibiayai']);
        }
        $invoice->save();
        // Send Email
        event(new EventConfirmationTrangitsfer($invoice));

        return redirect()->route('invoice-admin.index')->with('success','Berhasil merubah Invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Order::find($id);
        $invoice->delete();

        DB::table('caregivers')->select('*')->
            where([
                ['caregiver',$invoice->user_id],
                ['santri',$invoice->santri_id],
            ])->delete();

        DB::table('users')->select('*')->
            where('id',$invoice->santri_id)->update(['status'=>NULL]);
    }

    public function apiInvoice(){

        $invoices = DB::table('orders')->orderBy('id','desc')->get();

        return Datatables::of($invoices)
        ->editColumn('invoice', function($invoices){
            return $invoices->invoice;
        })
        ->addColumn('created_at', function($invoices){
             return date('d/m/Y',strtotime($invoices->created_at));
        })
        ->addColumn('price', function($invoices){
             return 'Rp '.$invoices->price;
        })
        ->addColumn('confirm', function($invoices){
             if ($invoices->confirm == 'confirm') {
                 return 'sudah';
             }else{
                return 'belum';
             }
        })
        ->addColumn('action', function($invoices){
            if ($invoices->status == 'unpaid') {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-danger btn-outline" style="width:110px;" >Belum Bayar</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="deleteInvoice('.$invoices->id.')" class="btn btn-outline btn-danger btn-xs">Delete</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="editInvoice('.$invoices->id.')" class="btn btn-outline btn-success btn-xs">Edit</a> ';
            }elseif ($invoices->status == 'paid') {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-success btn-outline" style="width:110px;" >Sudah Bayar</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="deleteInvoice('.$invoices->id.')" class="btn btn-outline btn-danger btn-xs">Delete</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="editInvoice('.$invoices->id.')" class="btn btn-outline btn-success btn-xs">Edit</a> ';
            }elseif ($invoices->status == 'canceled') {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-default btn-outline" style="width:110px;" >Batal</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="deleteInvoice('.$invoices->id.')" class="btn btn-outline btn-danger btn-xs">Delete</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="editInvoice('.$invoices->id.')" class="btn btn-outline btn-success btn-xs">Edit</a> ';
            }else {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-info btn-outline" style="width:110px;" >Di Kembalikan</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="deleteInvoice('.$invoices->id.')" class="btn btn-outline btn-danger btn-xs">Delete</a> '.
                '<a target="_blank" style="margin-left: 5px;" onclick="editInvoice('.$invoices->id.')" class="btn btn-outline btn-success btn-xs">Edit</a> ';
            }
             
        })->make(true);
        
    }
}
