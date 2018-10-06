<?php

namespace App\Http\Controllers\Kka\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caregiver;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caregivers = DB::table('caregivers')->select('*')
        ->where([
            ['caregiver',Auth::user()->id],
            ['active',true],
        ])->get();

        $count = DB::table('caregivers')->select('*')
        ->where([
            ['caregiver',Auth::user()->id],
            ['active',true],
        ])->count();
        
        return view('kakakAsuh.dashboard.adikAsuh.adik-asuh',compact('caregivers','user','count'));
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

    /*
    =================================================
    ================= Adik Asuh  Start===============
    =================================================
     */

    //=====  Activity Start =====

    public function indexActivtySantri($id)
    {
        $idNow = $id;

        $activities = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activities', 'activities.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);


            // dd($users);
        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $urls = end($url_array);
        
        
        return view('kakakAsuh.dashboard.adikAsuh.allActivity', compact('activities','idNow','urls'));
    }

    /*API*/
    public function apiActivtySantri($id){

        $activities = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activities', 'activities.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->orderBy('id','desc');

        return Datatables::of($activities)->addColumn('action', function($activities){
            return '<a onclick="editActivity('.$activities->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a> '.
                '<a onclick="deleteActivity('.$activities->id.')" class="btn btn-outline btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a> ';
        })->make(true);
        
    }
    //=====  Activity End ==========

    //=====  Goal/Target Start =====
    /*Index*/
    public function indexGoalSantri($id)
    {
        $idNow = $id;
        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $urls = end($url_array);

        return view('kakakAsuh.dashboard.adikAsuh.allTarget', compact('goals','users','idNow', 'urls'));
    }
    // Api
    public function apiGoalSantri($id){

        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->orderBy('id', 'desc');

        return Datatables::of($goals)->addColumn('action', function($goals){
            return '<a onclick="editGoal('.$goals->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a> '.
                '<a onclick="deleteGoal('.$goals->id.')" class="btn btn-outline btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a> ';
        })->make(true);
        
    }
    //=====  Goal/Target End =====    
    
    //=====  Amaliyah Start =====        
    public function amaliyahIndex($id){

        $santri = DB::table('users')->select('name')
                ->where('id','=',$id)->get();

        $amal = DB::table('amaliyahs')
               ->where('user_id', '=', $id)
               ->whereMonth('date', date('m'))
               ->get();

        $calender  = 'CAL_GREGORIAN';
        $month     = date('m');
        $year      = date('Y');
        $total_day = date('t');//cal_days_in_month($calender, $month, $year);

        return view('dashboard.admin.santri.santriAmaliyah',compact('santri','amal', 'month',  'total_day'));

    }
    //=====  Amaliyah End =====            
     /*
    =================================================
    ================= Adik Asuh  End ================
    =================================================
     */

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
