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
    
    public function index(){ }
    public function store(Request $request)
    {
        $member    = new User;
        $role_user = new RoleUser;
        $role_user2 = new RoleUser;

        $target = [
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'date_birth' => 'required',
            'hp'    => 'required|unique:users',
            'address' => 'required|min:10',
            'password'=> 'required'
        ];

        $msg = [
            'name.required' => 'Maaf Nama Wajib di isi',
            'email.required' => 'Maaf Email wajib di isi',
            'date_birth.required' => 'Maaf Tanggal lahir wajib di isi',
            'hp.required' => 'Maaf Nomor Handphone wajib di isi',
            'address.required' => 'Maaf Alamat wajib di isi',
            'password.required' => 'Maaf Password wajib di isi',
            'email.unique' => 'Maaf Email sudah terdaftar, gunakan Email lain',
            'hp.unique' => 'Maaf Nomor Handphone sudah terdaftar, gunakan Nomor Handphone lain',

        ];

        $validation = \Validator::make($request->all(),$target,$msg);

        if ($validation->passes()) {
        $member->name             = $request->name;
        $member->department       = 'Foster Brother';
        $member->date_birth       = date('Y-m-d',strtotime($request->date_birth));
        $member->address          = $request->address;
        $member->email            = $request->email;
        $member->hp               = $request->hp;
        $member->active           = false;
        $member->activation_token = str_random(255); 
        $member->password = bcrypt($request->password);

        $member->save();

        $role_user->user_id   = $member->id;
        $role_user->role_id   = 5;
        $role_user2->user_id = $member->id;
        $role_user2->role_id  = 4;

        $role_user->save();
        $role_user2->save();

        /*Send Email*/
        event(new UserActivationEmail($member));
        return response()->json($member);

        // return redirect()->route('login')->with('register', '');
       }else{
           return response()->json(['errors'=>$validation->errors()->all()]);
       }
    }
}
