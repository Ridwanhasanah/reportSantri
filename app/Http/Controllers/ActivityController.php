<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\ActivityUser;
use App\User;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use App\Models\Goal;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::latest()->paginate(5);
        $id = Auth::user()->id; //untuk mengecek id user
        //$user = DB::table('users')->get();

        $users = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activity_users', 'activity_users.user_id', '=', 'users.id' )
            ->leftJoin('activities','activity_users.activity_id', '=', 'activities.id')
            ->where('users.id', "$id")
            ->get();

            //dd($users);

        
        
        return view('dashboard.activity.allreport', compact('activities', 'users','id'));
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
        $activity = new Activity;

        $activities = DB::table('activities')->insertGetId([ //menggunakan inserGetId untuk mengambil id latest
            'activity' => $request->activity,
            'result' => $request->result,
            'follow_up' => $request->follow_up,
            'when' => $request->when
        ]);


        /*$activity->activity  = $request->activity;
        $activity->result    = $request->result;
        $activity->follow_up = $request->follow_up;
        $activity->when      = $request->when;*/

        // dd(DB::table('activities')->getPdo()->lastInsertId());

        // $activity->save();
        // dd($activity);
        /*Pivot*/
        // $id = DB::getPdo()->lastInsertId();
        $idUser = Auth::user()->id;
        $activityUser = ActivityUser::insert([ 
            'user_id' => $idUser,
            'activity_id' => $activities
        ]);

        // $activityUser->user_id = $idUser; //masukin id user ke pivot activityUser
        // $activityUser->activity_id = $activities;


     
        return redirect()->route('report.edit',$activities); 

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
        $activity = Activity::find($id);
    
        return view('dashboard.activity.editreport',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Activity $activity)
    {

        $request = new Request;
        $activity->update([

            'activity'  => request('activity'),
            'result'    => request('result'),
            'follow_up' => request('follow_up'),
            'when'      => request('when'),
        ]);

        return redirect()->back();

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

        return redirect()->back();

    }
}
