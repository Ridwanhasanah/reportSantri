<?php

namespace App\Http\Controllers\Kka\dashboard\invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{

    public function index()
    {
        return view('kakakAsuh.dashboard.invoice.invoice');
    }
    public function unpaid(){
        $id = Auth::user()->id;
        $unpaid = DB::table('orders')->select('*')->
        where([
            ['status', 'unpaid'],
            ['user_id',  $id],
        ])->count();
        // dd($unpaid);
    }
    public function show($id)
    {
        $invoice = DB::table('orders')->select('*')->where('id',$id)->first();
        return view('kakakAsuh.dashboard.invoice.detail-invoice', compact('invoice'));

    }

    public function apiInvoice(){
        $id = Auth::user()->id; //untuk mengecek id user

        $invoices = DB::table('orders')
            ->select('*')->where('user_id',$id)->orderBy('id','desc')->get();

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
        ->addColumn('action', function($invoices){
            if ($invoices->status == 'unpaid') {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-danger btn-outline" style="width:110px;" >Belum Bayar</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> ';
            }elseif ($invoices->status == 'paid') {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-success btn-outline" style="width:110px;" >Sudah Bayar</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> ';
            }elseif ($invoices->status == 'canceled') {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-default btn-outline" style="width:110px;" >Batal</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> ';
            }else {
                return '<a target="_blank" onclick="detailInvoice('.$invoices->id.')" class="btn btn-info btn-outline" style="width:110px;" >Di Kembalikan</a>'.
                '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$invoices->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> ';
            }
        })->make(true);
        
    }
}
