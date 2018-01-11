<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Goal::latest()->paginate(5);

        return view('dashboard.goal.allgoal', compact('goals'));
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
        $goal = new Goal;

        $goal->goal      = $request->goal;
        $goal->option    = $request->option;
        $goal->when      = $request->when;
        $goal->reality   = $request->reality;

        $goal->save();
     
        return redirect()->route('goal.edit',$goal->id); 

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
    
        return view('dashboard.goal.editgoal',compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Goal $Goal)
    {

        $request = new Request;
        $goal->update([

            'goal'  => request('goal'),
            'option'    => request('option'),
            'when' => request('when'),
            'reality'      => request('reality'),
        ]);

        return redirect()->back();

        /*$Goal = Goal::find($id);

        $Goal->Goal  = $request->Goal;
        $Goal->result    = $request->result;
        $Goal->follow_up = $request->follow_up;
        $Goal->when      = $request->when;

        $Goal->update();
        return redirect()->route('goal.all', compact('id', 'Goal'));*/
        
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

        return redirect()->back();

    }
}
