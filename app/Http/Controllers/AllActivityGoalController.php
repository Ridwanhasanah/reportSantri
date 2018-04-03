<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AllActivityGoalController extends Controller
{
    public function index($id)
    {
        // $activities = Activity::latest()->paginate(5);
         //untuk mengecek id user
        //$user = DB::table('users')->get();

        $activities = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activities', 'activities.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);

            //dd($users);

        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);

        
        

        return view('dashboard.admin.santri.allactivitygoal', compact('activities','goals','id'));
    }

    public function apiActivity($id){

        // $activities = Activity::latest()->paginate(5);
         //untuk mengecek id user
        //$user = DB::table('users')->get();

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

    public function apiGoal($id){

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
