<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $goals = Goal::latest()->paginate(5);

        $id = Auth::user()->id; //untuk mengecek id user

        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);
            // dd($users);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $urls = end($url_array);

        return view('dashboard.goal.allgoal', compact('goals','users','urls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function create()
    {
        //$activities = DB::table('activities');
        return view('dashboard.goal.addgoal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$goal = new Goal;

        $goal->goal        = $request->goal;
        $goal->option      = $request->option;
        $goal->when        = $request->when;
        $goal->reality     = $request->reality;
        $goal->information = $request->information;
        $goal->user_id     = Auth::user()->id;

        $goal->save();
     
        return redirect()->route('goal.edit',$goal->id)->with('success', 'Goal Added'); */

        $data = [
            'user_id'     => Auth::user()->id,
            'goal'        => $request['goal'],
            'option'      => $request['option'],
            'when'        => $request['when'],
            'information' => $request['information'],
            'reality'     => $request['reality']
        ];

        return Goal::create($data);

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
        $goal = Goal::find($id);
    
        return $goal;//view('dashboard.goal.editgoal',compact('goal'));
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
/*
        $request = new Request;
        $goal->update([

            'goal'    => request('goal'),
            'option'  => request('option'),
            'reality' => request('reality'),
            'when'    => request('when'),
        ]);

        return redirect()->back();*/

        
        $goal = Goal::find($id);

        $goal->goal        = $request->goal;
        $goal->option      = $request->option;
        $goal->reality     = $request->reality;
        $goal->information = $request->information;
        $goal->when        = $request->when;

         // dd($goal);

        $goal->update();
        return $goal;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $goal = goal::find($id);
        $goal->delete();

    }

    public function apiGoal(){

        $id = Auth::user()->id; //untuk mengecek id user

        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->orderBy('id','desc');

        return Datatables::of($goals)->addColumn('action', function($goals){
            return '<a onclick="editGoal('.$goals->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a> '.
                '<a onclick="deleteGoal('.$goals->id.')" class="btn btn-outline btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a> ';
        })->make(true);
        
    }
}
