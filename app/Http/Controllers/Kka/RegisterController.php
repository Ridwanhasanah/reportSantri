<?php

namespace App\Http\Controllers\Kka;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Auth\UserActivationEmail;

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

        $this->validate(request(),[
            'email' => 'required|unique:users',
            'hp'    => 'required|unique:users',
        ]);

        $member->name             = $request->name;
        $member->department       = 'Foster Brother';
        $member->date_birth       = date('Y-m-d',strtotime($request->date_birth));
        $member->birth_place      = $request->birth_place;
        $member->address          = $request->address;
        $member->email            = $request->email;
        $member->hp               = $request->hp;
        $member->active           = false;
        $member->activation_token = str_random(255); 
        if ($request->password == $request->repass) {
            $member->password = bcrypt($request->password);
        }else{
            return redirect()->back()->with('danger', 'Password anda tidak sama');
        }

        $member->save();

        $role_user->user_id   = $member->id;
        $role_user->role_id   = 5;
         $role_user2->user_id = $member->id;
        $role_user2->role_id  = 4;

        $role_user->save();
        $role_user2->save();

        /*Send Email*/
        event(new UserActivationEmail($member));

        return redirect()->route('login')->with('register', 'Registrasi berhasil, Silahkan buka email anda untuk melakukan Vertifikasi, jika tidak memukannya anda bsa melihat di folder sosial atau promosi pada folder email anda, Anda kesulitan bisa hubungi nomor berikut 0857 1444 2664');
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
