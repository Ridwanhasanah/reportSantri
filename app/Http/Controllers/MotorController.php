<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $urls = end($url_array);
        return view('dashboard.motor.allMotor',compact('id','urls'));
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'name'    => Auth::user()->name,
            'borrow'  => date('d  M y - H:i'),
            'return'  => $request['return'],
            'motor'   => $request['motor'],
            'info'    => $request['info']
        ];

        return Motor::create($data);
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $motor = Motor::find($id);
        return $motor;//view('dashboard.motor.createMotor',compact('motor'));
    }

    public function update(Request $request, $id)
    {
        $motor = Motor::find($id);
        $motor->return = date('d  M y - H:i');
        // $motor->motor = $request['motor'];
        // $motor->info = $request['info'];

        $motor->update();

        return $motor;
    }

    public function destroy($id)
    {
        $motor = Motor::find($id);
        $motor->delete();
    }

    public function apiMotor(){
        $id = Auth::user()->id;
        $motors = DB::table('users')
            ->select('motors.*')
            ->rightJoin('motors', 'motors.user_id', '=', 'users.id')
            ->where('users.id', "$id")
            ->orderBy('id', 'desc');

        return Datatables::of($motors)
        ->addColumn('action', function($motors){
            return '<a onclick="editMotor('.$motors->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp; Selesai</a> '.
                '<a onclick="deleteMotor('.$motors->id.')" class="btn btn-outline btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a> ';
        })->make(true);
    }
}
