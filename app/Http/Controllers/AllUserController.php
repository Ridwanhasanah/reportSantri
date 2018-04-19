<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Activity;
use App\Models\RoleUser;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AllUserController extends Controller
{
    public function index()
    {
        /*Mengambil Url dan mengambil url divinysa untuk di masukan sebagaikondisi*/
        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Jika Urlnya staff maka jalankan ini*/
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
        if (Auth::user()->hasRole('admin')) {

             return view('dashboard.admin.adduser');

        }else{
            return redirect()->route('dashboard.home');
        }
    }

    public function store(Request $request)
    {

        
        $memeber  = new User;
        $role_users1 = new RoleUser; //RoleUser 1
        $role_users2 = new RoleUser; //RoleUser 2
        $role_users3 = new RoleUser; //RoleUser 3
        $role_users4 = new RoleUser; //RoleUser 4

        $this->validate($request,[

            'name' => 'required|min:3',
            'password' => 'required|min:6',
            'email' => 'required'

        ]);

        $memeber->name        = $request->name;
        $memeber->password    = bcrypt($request->password);
        $memeber->department  = $request->department;
        $memeber->date_birth  = $request->date_birth;
        $memeber->birth_place = $request->birth_place;
        $memeber->gender      = $request->gender;
        $memeber->address     = $request->address;
        $memeber->email       = $request->email;
        $memeber->hp          = $request->hp;
        $memeber->dream       = $request->dream;
        $memeber->hobby       = $request->hobby;
        $memeber->experience  = $request->experience;
        $memeber->creation    = $request->creation;

        
        //jika ada photo maka
        if ($request->hasFile('photo')) {

            $filename = $request->photo->getClientOriginalName();
            
            $request->file('photo')->storeAs('photos',$filename);

            $memeber->photo   = $filename;


        }


        $memeber->save();

        /*Menambahkan RoleUser Sesuai dengan Department yang di pilih*/
        if ($request->department == 'Staff Pondok IT') {
            
            $role_users2->user_id = $memeber->id;
            $role_users2->role_id = 2;
            $role_users3->user_id = $memeber->id;
            $role_users3->role_id = 3;
            $role_users4->user_id = $memeber->id;
            $role_users4->role_id = 4;

            $role_users2->save();
            $role_users3->save();
            $role_users4->save();
        
        }elseif ($request->department == 'Teacher') {
            
            $role_users3->user_id = $memeber->id;
            $role_users3->role_id = 3;
            $role_users4->user_id = $memeber->id;
            $role_users4->role_id = 4;

            $role_users3->save();
            $role_users4->save();
        
        }elseif ($request->department == 'Master') {
            
            $role_users1->user_id = $memeber->id;
            $role_users1->role_id = 1;
            $role_users2->user_id = $memeber->id;
            $role_users2->role_id = 2;
            $role_users3->user_id = $memeber->id;
            $role_users3->role_id = 3;
            $role_users4->user_id = $memeber->id;
            $role_users4->role_id = 4;

            $role_users1->save();
            $role_users2->save();
            $role_users3->save();
            $role_users4->save();
        
        }else{

            $role_users4->user_id = $memeber->id;
            $role_users4->role_id = 4;

            $role_users4->save();
        }

        return redirect()->route('user.edit',$memeber->id)->with('success', 'Santri / Staff sudah di tambah');
    }

    /*===== Show =====*/
    public function show($id)
    {
        $user = User::find($id);

        return view('dashboard.admin.userdetail', compact('user'));
    }
    /*===== Edit =====*/
    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.admin.useredit', compact('user'));
    }
    /*===== Update =====*/
    public function update(Request $request, $id)
    {
        $user  = User::find($id);

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
        $user->quote       = $request->quote;

        if ($request->hasFile('photo')) {

            if (strlen($request->photo) != 0){
                //unlink(public_path('storage/photos/'.$user->photo));

                echo '<h1>'.strlen($request->photo).'</h1>';
            }
            
            $filename = Auth::user()->id.$request->photo->getClientOriginalName();
            
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

        return redirect()->route('user.index')->with('danger', 'Santri sudah di hapus');
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

    /*================================ Menampilkan Santri Sesuai Divisi End ============================== */

    /*================================ Activty Santri CRUD Start ========================================*/

    /*Index*/
     public function indexActivtySantri($id)
    {

        $activities = DB::table('users')
            ->select('activities.*')
            ->rightJoin('activities', 'activities.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);


            // dd($users);
        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $urls = end($url_array);
        
        
        return view('dashboard.activity.allreport', compact('activities', 'users','id','urls'));
    }

    /*Create*/
    // public function createActivitySantri($id)
    // {
    //     return view('dashboard.activity.addreport',compact('id'));
    // }

    /*Store*/
    public function storeActivitySantri(Request $request, $id)
    {
        $activity = new Activity;
        $user = DB::table('users');

        $data = [
            'activity'  => $request['activity'],
            'result'    => $request['result'],
            'follow_up' => $request['follow_up'],
            'when'      => $request['when'],
            'user_id'   => $id
        ];

        return Activity::create($data);
        // $activities = DB::table('activities')->insertGetId([ //menggunakan inserGetId untuk mengambil id latest
            // $activity->activity  = $request->activity;
            // $activity->result    = $request->result;
            // $activity->follow_up = $request->follow_up;
            // $activity->when      = $request->when;
            // $activity->user_id   = $id;
        // ]);
          // return  $activity->save();
        /*$idUser = Auth::user()->id; 
        $activityUser = ActivityUser::insert([ 
            'user_id' => $idUser,
            'activity_id' => $activities
        ]);*/
        // return redirect()->route('report.edit',$activity)->with('success', 'Report Added'); 
    }

    /*Edit*/
    public function editActivitySantri($id)
    {
        // $activity = Activity::find($id);
    
        // return view('dashboard.activity.editreport',compact('activity'));

        $activity = Activity::find($id);

        return $activity;
    }

    public function updateActivitySantri(Request $request, $id)
    {

        $activity = Activity::find($id);
        $activity->activity  = $request['activity'];
        $activity->result    = $request['result'];
        $activity->follow_up = $request['follow_up'];
        $activity->when      = $request['when'];

        $activity->update();

        return $activity;
        
    }
    /*API*/
    public function apiActivtySantri($id){

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
    /*======================================= Activity Santi CRUD End ========================================*/

    /*======================================== Goal Santri CRUD Start ========================================*/
    /*Index*/
    public function indexGoalSantri($id)
    {

        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $urls = end($url_array);

        return view('dashboard.goal.allgoal', compact('goals','users','id', 'urls'));
    }

    /*Create*/
    // public function createGoalSantri($id)
    // {
    //     return view('dashboard.goal.addgoal',compact('id'));
    // }
    /*Store*/
    public function storeGoalSantri(Request $request, $id)
    {
        $activity = new Activity;
        $user = DB::table('users');

        $data = [
            'goal'  => $request['goal'],
            'option'    => $request['option'],
            'reality' => $request['reality'],
            'when'      => $request['when'],
            'information' => $request['information'],
            'user_id'   => $id
        ];

        return Goal::create($data);
    }

    /*Edit*/
    public function editGoalSantri($id)
    {
        $goal = Goal::find($id);
        return $goal;
    }
    public function updateGoalSantri(Request $request, $id)
    {
        $goal = Goal::find($id);
        $goal->goal        = $request->goal;
        $goal->option      = $request->option;
        $goal->when        = $request->when;
        $goal->reality     = $request->reality;
        $goal->information = $request->information;
        $goal->update();

        return $goal;
    }

    /*API*/
    public function apiGoalSantri($id){

        $goals = DB::table('users')
            ->select('goals.*')
            ->rightJoin('goals', 'goals.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->orderBy('id', 'desc');

        return Datatables::of($goals)->addColumn('action', function($goals){
            return '<a onclick="editGoal('.$goals->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a> '.
                '<a onclick="deleteGoal('.$goals->id.')" class="btn btn-outline btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a> ';
        })->make(true);
        
    }
    /*======================================== Goal Santri CRUD End ========================================*/

    /*======================================== Amaliyah Santri Start ======================================*/
    public function amaliyahIndex($id){

        $santri = DB::table('users')->select('name')
                ->where('id','=',$id)->get();

        $amal = DB::table('amaliyahs')
               ->where('user_id', '=', $id)
               ->whereMonth('date', date('m'))
               ->get();

        $calender  = 'CAL_GREGORIAN';
        $month     = date('m');
        $year      = date('Y');
        $total_day = date('t');//cal_days_in_month($calender, $month, $year);

        return view('dashboard.admin.santri.santriAmaliyah',compact('santri','amal', 'month',  'total_day'));

    }
    /*======================================== Amaliyah Santri End =========================================*/
    
    /*======================================== Ubah Password Start =========================================*/
    public function passwordEdit($id){
        return view('dashboard.admin.editPassword',compact('id'));
    }

    public function passwordUpdate(Request $request, $id){

        // $this->validate($request,[

        //     'password'   => 'required|min:6',
        //     'repassword' => 'required|min:6',

        // ]);


        $user = User::find($id);
        if ($request->password == $request->repass) {
            $user->password = bcrypt($request->password);
        }else{
            return redirect()->back()->with('danger', 'Password tidak sama');
        }
        $user->update();
        // return redirect()->route('user.edit',$id)->with('success','Password telah di ubah');   
        
    }

    /*======================================== Ubah Password End   =========================================*/
}

