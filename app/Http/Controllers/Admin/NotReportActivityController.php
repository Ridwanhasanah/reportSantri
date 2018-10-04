<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class NotReportActivityController extends Controller
{
    public function index(){
        return view('dashboard.admin.santri.dailyActivity.dailyNotReport');
    }

    /**
     * Semua Santri yang Belum laporan Start
     */

    public function apiNotDailyActivity(){
        // $activities = DB::table('users')
        //                 ->distinct()
        //                 ->select('users.name','users.department','users.id')
        //                 ->rightJoin('activities','activities.user_id','=','users.id')
        //                 ->whereNotIn('activities.when',[date('Y-m-d')])
        //                 ->orderBy('id','desc');
        $activities = User::whereDoesntHave('activities', function($q) {
                        $q->where(
                            'when',date('Y-m-d')
                        )
                        ->orWhere('result',NULL);
                    });
        return DataTables::of($activities)->make(true);
    }


     /**
     * Semua Santri yang Belum laporan END
     */
}
