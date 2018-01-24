<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Activity;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AllUserController extends Controller
{
    public function index()
    {
        /*Mengambil Url dan mengambil url divinysa untuk di masukan sebagaikondisi*/
        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Jika Urlnya stall maka jalankan ini*/
        if ($divisi == 'staff') {
            
            $users = DB::table('users')
            ->where('department','Staff Pondok IT')
            ->latest()->paginate(20);

            $department = 'Staff';

        }else{

            $users = DB::table('users')
            ->whereIn('department',[
             'Programmer',
             'Multimedia',
             'Imers',
             'Cyber',
         ])->latest()->paginate(20);

            $department = 'Santri';

        }

        $semuaUser = DB::table('users')->count();

        $admin = DB::table('users')->where('department','Staff Pondok IT')->count();
        $santri = $semuaUser - $admin;

        return view('dashboard.admin.alluser', compact('users', 'santri', 'department'));
    }

    public function create()
    {
        if (Auth::user()->level == 1) {

             return view('dashboard.admin.adduser');

        }else{
            return redirect()->route('dashboardIT');
        }
    }

    public function store(Request $request)
    {

        
        $user  = new User;

        $this->validate($request,[

            'name' => 'required|min:3',
            'password' => 'required|min:6',
            'email' => 'required'

        ]);

        $user->name        = $request->name;
        $user->password    = bcrypt($request->password);
        $user->department  = $request->department;
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

        if ($user->department == 'Staff Pondok IT') {
            
            $user->level = 1;
        
        }else{
            $user->level = 2;
        }

        if ($request->hasFile('photo')) {

            $filename = $request->photo->getClientOriginalName();
            
            $request->file('photo')->storeAs('photos',$filename);

            $user->photo   = $filename;


        }



        $user->save();

        return redirect()->route('user.edit',$user->id)->with('success', 'User Added');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('dashboard.admin.userdetail', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.admin.useredit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user  = User::find($id);

        $user->name        = $request->name;
        $user->department  = $request->department;
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

        return redirect()->back()->with('success', ' Profile Updated');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('danger', 'User Deleted');
    }


    /*========== Menampilkan Santri Sesuai Divisi Start ========== */
    public function santriProgrammer(){

        $users = DB::table('users')->select('*')->where('department',"Programmer")->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Programmer')->count();


        return view('dashboard.admin.santri.santridivisi', compact('users','divisi', 'total'));

    }

    public function santriMultimedia(){

        $users = DB::table('users')->select('*')->where('department',"Multimedia")->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Multimedia')->count();

        return view('dashboard.admin.santri.santridivisi', compact('users','divisi', 'total'));

    }

    public function santriImers(){

        $users = DB::table('users')->select('*')->where('department',"Imers")->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Imers')->count();

        return view('dashboard.admin.santri.santridivisi', compact('users','divisi', 'total'));

    }

    public function santriCyber(){

        $users = DB::table('users')->select('*')->where('department',"Cyber")->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Cyber')->count();

        return view('dashboard.admin.santri.santridivisi', compact('users','divisi', 'total'));

    }

    /*======================================== Menampilkan Santri Sesuai Divisi End ============================== */

    /*======================================== Activty Santri CRUD Start ========================================*/

    /*Index*/
     public function indexActivtySantri($id)
    {

        $activities = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activities', 'activities.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);

            // dd($users);

        
        
        return view('dashboard.activity.allreport', compact('activities', 'users','id'));
    }

    /*Create*/
    public function createActivitySantri($id)
    {
        return view('dashboard.activity.addreport',compact('id'));
    }

    /*Store*/
    public function storeActivitySantri(Request $request, $id)
    {
        $activity = new Activity;
        $user = DB::table('users');



        // $activities = DB::table('activities')->insertGetId([ //menggunakan inserGetId untuk mengambil id latest
            $activity->activity  = $request->activity;
            $activity->result    = $request->result;
            $activity->follow_up = $request->follow_up;
            $activity->when      = $request->when;
            $activity->user_id   = $id;

            // dd($id);
        // ]);
            $activity->save();

        /*$idUser = Auth::user()->id; 
        $activityUser = ActivityUser::insert([ 
            'user_id' => $idUser,
            'activity_id' => $activities
        ]);*/


     
        return redirect()->route('report.edit',$activity)->with('success', 'Report Added'); 

    }
    /*================================================== Activiry Santi CRUD End ========================================*/

    /*================================================== Goal Santri CRUD Start ========================================*/
    /*Index*/
    public function indexGoalSantri($id)
    {

        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);

        return view('dashboard.goal.allgoal', compact('goals','users','id'));
    }

    /*Create*/
    public function createGoalSantri($id)
    {
        return view('dashboard.goal.addgoal',compact('id'));
    }

    /*Store*/
    public function storeGoalSantri(Request $request,$id)
    {
        $goal = new Goal;
        $user = DB::table('users');

        $goal->goal        = $request->goal;
        $goal->option      = $request->option;
        $goal->when        = $request->when;
        $goal->reality     = $request->reality;
        $goal->information = $request->information;
        $goal->user_id     = $id;

        $goal->save();
     
        return redirect()->route('goal.edit',$goal->id)->with('success', 'Goal Added'); 

    }
    /*================================================== Goal Santri CRUD End ========================================*/


}

