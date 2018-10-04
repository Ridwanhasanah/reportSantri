<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class DailyActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.santri.dailyActivity.dailyactivity');
    }
    /**
     * Semua Santri yang sudah laporan start
     */
    public function apiDailyActivity(){
        $activities = DB::table('users')
                        ->select('users.name','users.department','activities.*')
                        ->rightJoin('activities','activities.user_id','=','users.id')
                        ->where('activities.when',date('Y-m-d'))
                        ->orderBy('id','desc');
        return DataTables::of($activities)->make(true);
    }

    public function apiDailyActivityProgrammer(){
        $activities = DB::table('users')
                        ->select('users.name','users.department','activities.*')
                        ->rightJoin('activities','activities.user_id','=','users.id')
                        ->where([
                            ['users.department','=','programmer'],
                            ['activities.when','=',date('Y-m-d')]
                            ])
                        ->orderBy('id','desc');

        return DataTables::of($activities)->make(true);
    }

    public function apiDailyActivityMultimedia(){
        $activities = DB::table('users')
                        ->select('users.name','users.department','activities.*')
                        ->rightJoin('activities','activities.user_id','=','users.id')
                        ->where([
                            ['users.department','=','Multimedia'],
                            ['activities.when','=',date('Y-m-d')]
                            ])
                        ->orderBy('id','desc');
                        
        return DataTables::of($activities)->make(true);
    }

    public function apiDailyActivityImers(){
        $activities = DB::table('users')
                        ->select('users.name','users.department','activities.*')
                        ->rightJoin('activities','activities.user_id','=','users.id')
                        ->where([
                            ['users.department','=','Imers'],
                            ['activities.when','=',date('Y-m-d')]
                            ])
                        ->orderBy('id','desc');
                        
        return DataTables::of($activities)->make(true);
    }

    public function apiDailyActivityCyber(){
        $activities = DB::table('users')
                        ->select('users.name','users.department','activities.*')
                        ->rightJoin('activities','activities.user_id','=','users.id')
                        ->where([
                            ['users.department','=','Cyber'],
                            ['activities.when','=',date('Y-m-d')]
                            ])
                        ->orderBy('id','desc');
                        
        return DataTables::of($activities)->make(true);
    }
    /**
     * Semua Santri yang sudah laporan END
     */
}
