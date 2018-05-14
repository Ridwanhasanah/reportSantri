<?php

namespace App\Http\Controllers\Kka;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $member    = new User;
        $role_user = new RoleUser;
        $role_user2 = new RoleUser;

        $member->name        = $request->name;
        $member->department  = 'Cyber';
        $member->date_birth  = date('Y-m-d',strtotime($request->date_birth));
        $member->birth_place = $request->birth_place;
        $member->address     = $request->address;
        $member->email       = $request->email;
        $member->hp          = $request->hp;
        $member->password    = bcrypt('123456');

        $member->save();

        $role_user->user_id   = $member->id;
        $role_user->role_id   = 5;
         $role_user2->user_id = $member->id;
        $role_user2->role_id  = 4;

        $role_user->save();
        $role_user2->save();

        return redirect()->route('login');
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
