<?php

namespace App\Http\Controllers\Kka\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportToKa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportToKAController extends Controller
{
    public function index(){
        // $rk = DB::table('report_to_kas')
        //         ->select('*')
        //         ->where('user_id', Auth::user()->id)
        //         ->get();
        $rk = ReportToKa::where('user_id',Auth::user()->id)->get();
        return view('kakakAsuh.dashboard.report.reportToKA',compact('rk'));
    }
    public function create(){
        return view('kakakAsuh.dashboard.report.createReportToKa');
    }

    public function store(Request $request){
        $rk = new ReportToKa;

        $rk->report = $request ->report;
        $rk->user_id = Auth::user()->id;
        $rk->save();

        return redirect()->route('reporttoka.index')->with('success','Terimaksih sudah memberikan Laporan');
    }

    public function show($id){
        $rk = ReportToKa::findOrFail($id);
        return view('kakakAsuh.dashboard.report.showReportToKA',compact('rk'));
    }

    public function edit($id){
        $rk = ReportToKa::findOrFail($id);
        return view('kakakAsuh.dashboard.report.updateReportToKA', compact('rk'));
    }

    public function update(Request $request, $id){
        $rk = ReportToKa::find($id);
        $rk->report = $request->report;
        $rk->update();
        return redirect()->back()->with('info', 'Update Laporan Sukses');

    }

    public function destroy($id){
        $rk = ReportToKa::findOrFail($id);
        $rk->delete();

        return redirect()->back()->with('danger', 'berhasil di hapus');
    }

    /**
     * All Report Adik Asuh to kakak Asuh Start
     */
    public function allReportAdikAsuh($id){
        $rk = User::find($id)->reportToKas()->latest()->paginate(15);
        
        return view('kakakAsuh.dashboard.report.reportToKA',compact('rk'));
    }

     /**
     * All Report Adik Asuh to kakak Asuh End
     */


}
