<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use App\Models\Goal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $activities = Activity::latest()->paginate(5);
        $id = Auth::user()->id; //untuk mengecek id user
        //$user = DB::table('users')->get();

        $activities = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activities', 'activities.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->get();

            //dd($users);

            // dd(count($activities);
        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $urls = end($url_array);
        
        
        return view('dashboard.activity.allreport', compact('activities', 'users','id','urls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function create()
    {
        //$activities = DB::table('activities');
        return view('dashboard.activity.addreport');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $activity = new Activity;



        // $activities = DB::table('activities')->insertGetId([ //menggunakan inserGetId untuk mengambil id latest
            // $activity->activity  = $request->activity;
            // $activity->result    = $request->result;
            // $activity->follow_up = $request->follow_up;
            // $activity->when      = $request->when;
            // $activity->user_id   = Auth::user()->id;
        // ]);
            // $activity->save();

        /*$idUser = Auth::user()->id; 
        $activityUser = ActivityUser::insert([ 
            'user_id' => $idUser,
            'activity_id' => $activities
        ]);*/

        $data = [
            'activity' => $request['activity'],
            'result'   => $request['result'],
            'follow_up' => $request['follow_up'],
            'when'      => $request['when'],
            'user_id'   => Auth::user()->id
        ];

        return Activity::create($data);//->with('success', 'Kegiatann Sudah di Tambah');


     
        // return redirect()->route('report.edit',$activity->id)->with('success', 'Report Added'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);

        return $activity;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $activity = Activity::find($id);
    
        // return view('dashboard.activity.editreport',compact('activity'));

        $activity = Activity::find($id);

        return $activity;
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

        /*$request = new Request;
        $activity->update([

            'activity'  => request('activity'),
            'result'    => request('result'),
            'follow_up' => request('follow_up'),
            'when'      => request('when'),
        ]);

        if ($activity->update()) {
            
        }

        return redirect()->back()->with('info','Success Updated');*/

        $activity = Activity::find($id);
        $activity->activity  = $request['activity'];
        $activity->result    = $request['result'];
        $activity->follow_up = $request['follow_up'];
        $activity->when      = $request['when'];

        $activity->update();

        return $activity;

        /*$activity = Activity::find($id);

        $activity->activity  = $request->activity;
        $activity->result    = $request->result;
        $activity->follow_up = $request->follow_up;
        $activity->when      = $request->when;

        $activity->update();
        return redirect()->route('report.all', compact('id', 'activity'));*/
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $activity = Activity::find($id);
        $activity->delete();

        // return redirect()->back()->with('danger', 'Report Deleted');

    }

    public function apiActivity(){

        // $activities = Activity::latest()->paginate(5);
        $id = Auth::user()->id; //untuk mengecek id user
        //$user = DB::table('users')->get();

        $activities = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activities', 'activities.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->orderBy('id','desc');

        return Datatables::of($activities)
        ->editColumn('when', function($activities){
            return $activities->when;
        })
        ->addColumn('activity', function($activities){
            return $activities->activity;
        })
        ->addColumn('action', function($activities){
            return '<a onclick="editActivity('.$activities->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a> '.
                '<a onclick="deleteActivity('.$activities->id.')" class="btn btn-outline btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a> ';
        })->make(true);
        
    }
}
