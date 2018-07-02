<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Confirmation;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ConfirmationController extends Controller
{
     public function index()
    {
        return view('dashboard.admin.confirmation.confirmation');
    }

    public function show($id)
    {
        $conf = Confirmation::find($id);
        return view('dashboard.admin.confirmation.confirmation-detail',compact('conf'));
    }

    public function edit($id)
    {
        $conf = Confirmation::find($id);
        return view('dashboard.admin.confirmation.confirmation-edit',compact('conf'));
    }

    public function update(Request $request, $id)
    {
        $conf = Confirmation::find($id);

        $conf->package      = $request->package;
        $conf->amount_month = $request->amount_month;
        $conf->price        = $request->price;
        $conf->status       = $request->status;
        
        $conf->save();

        return redirect()->route('invoice-admin.index')->with('success','Berhasil merubah Invoice');
    }

    public function destroy($id)
    {
        $conf = Confirmation::find($id);
        $conf->delete();
    }

    public function apiConfirmation(){

        $confs = DB::table('confirmations')->orderBy('id','desc')->get();

        return Datatables::of($confs)
        ->editColumn('fund', function($confs){
            return 'Rp '.$confs->fund.',-';
        })
        // ->addColumn('created_at', function($confs){
        //      return date('d/m/Y',strtotime($confs->created_at));
        // })
        // ->addColumn('price', function($confs){
        //      return 'Rp '.$confs->price;
        // })
        // ->addColumn('confirm', function($confs){
        //      if ($confs->confirm == 'confirm') {
        //          return 'sudah';
        //      }else{
        //         return 'belum';
        //      }
        // })
        ->addColumn('action', function($confs){
            return '<a target="_blank" style="margin-left: 5px;" onclick="detailInvoice('.$confs->id.')" class="btn btn-outline btn-info btn-xs">Detail</a> '.
            '<a target="_blank" style="margin-left: 5px;" onclick="deleteInvoice('.$confs->id.')" class="btn btn-outline btn-danger btn-xs">Delete</a> ';
        })->make(true);
        
    }
}
