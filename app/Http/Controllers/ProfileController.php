<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dreams = explode(',', $user->dream);
        return view('dashboard.profile.profile',compact('user' ,'dreams'));


    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $user = Auth::user();
        return view('dashboard.profile.editProfile',compact('user'));
    }

    public function update(Request $request, $id)
    {
       $user  = User::find($id);

        $user->name        = $request->name;
        // $user->department = $request->department;
        $user->date_birth  = $request->date_birth;
        $user->birth_place = $request->birth_place;
        $user->gender      = $request->gender;
        $user->address     = $request->address;
        $user->email       = $request->email;
        $user->hp          = $request->hp;
        $user->dream       = $request->dream;
        $user->hobby       = $request->hobby;
        $user->experience  = $request->experience;
        $user->creation    = $request->creation;

        if ($request->hasFile('photo')) {

            $filename = $request->photo->getClientOriginalName();
            
            $request->file('photo')->storeAs('photos',$filename);

            $user->photo   = $filename;


        }



        $user->update();

        return redirect()->back()->with('success', 'Profile Updated');
    }

    public function destroy($id)
    {
        //
    }

    // 100 Cita Cita / 100 Dream
    public function dreamIndex(){

        $user = Auth::user();
        $dreams = explode(',', $user->dream);
        return view('dashboard.dream.dream',compact('user' ,'dreams'));
    }

    public function dreamEdit($id){

        $user = Auth::user();

        return view('dashboard.dream.editDream',compact('user'));
    }

    public function dreamUpdate(Request $request, $id){

        $user = User::find($id);

        $user->dream       = $request->dream;

        $user->update();

        return redirect()->back()->with('success', '100 Cita - Cita telah di perbarui');
    }


    // Target Terdekat
    public function targetIndex(){

        $user = Auth::user();
        $targets = explode(',', $user->target);
        return view('dashboard.target.target',compact('user' ,'targets'));
    }

    public function targetEdit($id){

        $user = Auth::user();

        return view('dashboard.target.editTarget',compact('user'));
    }

    public function targetUpdate(Request $request, $id){

        $user = User::find($id);

        $user->target = $request->target;

        $user->update();

        return redirect()->back()->with('success', 'Target Terdekat Updated');
    }

    /*========== Edit Password Start =========*/
    public function passwordEdit($id){
        return view('dashboard.profile.editPassword',compact('id'));
    }

    public function passwordUpdate(Request $request, $id){

        $this->validate($request,[

            'password'   => 'required|min:6',
            'repassword' => 'required|min:6',

        ]);

        $user = User::find($id);
        if ($request->password == $request->repassword) {
            $user->password = bcrypt($request->password);
        }else{
            return redirect()->back()->with('danger', 'Password tidak sama');
        }
        $user->update();
        return redirect()->route('profile.edit',$id)->with('success','Password telah di ubah');   
        
    }
    /*========== Edit Password End =========*/


}
