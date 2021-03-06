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

    /**==================== User Start =======================*/

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

        
        $member  = new User;
        $role_users1 = new RoleUser; //RoleUser 1
        $role_users2 = new RoleUser; //RoleUser 2
        $role_users3 = new RoleUser; //RoleUser 3
        $role_users4 = new RoleUser; //RoleUser 4
        $role_users5 = new RoleUser; //RoleUser 5

        $this->validate($request,[

            'name' => 'required|min:3',
            'password' => 'required|min:6',
            'email' => 'required'

        ]);

        $member->name        = $request->name;
        $member->password    = bcrypt($request->password);
        $member->department  = $request->department;
        $member->status      = $request->status;
        $member->date_birth  = $request->date_birth;
        $member->birth_place = $request->birth_place;
        $member->gender      = $request->gender;
        $member->city        = $request->city;
        $member->district    = $request->district;
        $member->address     = $request->address;
        $member->email       = $request->email;
        $member->hp          = $request->hp;
        $member->dream       = $request->dream;
        $member->hobby       = $request->hobby;
        $member->experience  = $request->experience;
        $member->active      = true;
        $member->creation    = $request->creation;

        
        //jika ada photo maka
        if ($request->hasFile('photo')) {

            $filename = $request->photo->getClientOriginalName();
            
            $request->file('photo')->storeAs('photos',$filename);

            $member->photo   = $filename;


        }


        $member->save();

        /*Menambahkan RoleUser Sesuai dengan Department yang di pilih*/
        if ($request->department == 'Staff Pondok IT') {
            
            $role_users2->user_id = $member->id;
            $role_users2->role_id = 2;
            $role_users3->user_id = $member->id;
            $role_users3->role_id = 3;
            $role_users4->user_id = $member->id;
            $role_users4->role_id = 4;

            $role_users2->save();
            $role_users3->save();
            $role_users4->save();
        
        }elseif ($request->department == 'Teacher') {
            
            $role_users3->user_id = $member->id;
            $role_users3->role_id = 3;
            $role_users4->user_id = $member->id;
            $role_users4->role_id = 4;

            $role_users3->save();
            $role_users4->save();
        
        }elseif ($request->department == 'Foster Brother') {
            
            $role_users3->user_id = $member->id;
            $role_users3->role_id = 4;
            $role_users5->user_id = $member->id;
            $role_users5->role_id = 5;

            $role_users3->save();
            $role_users5->save();
        
        }elseif ($request->department == 'Master') {
            
            $role_users1->user_id = $member->id;
            $role_users1->role_id = 1;
            $role_users2->user_id = $member->id;
            $role_users2->role_id = 2;
            $role_users3->user_id = $member->id;
            $role_users3->role_id = 3;
            $role_users4->user_id = $member->id;
            $role_users4->role_id = 4;

            $role_users1->save();
            $role_users2->save();
            $role_users3->save();
            $role_users4->save();
        
        }else{

            $role_users4->user_id = $member->id;
            $role_users4->role_id = 4;

            $role_users4->save();
        }

        return redirect()->route('user.edit',$member->id)->with('success', 'Santri / Staff sudah di tambah');
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

        $user->name        = $request->name;
        $user->department  = $request->department;
        $user->status      = $request->status;
        $user->date_birth  = $request->date_birth;
        $user->birth_place = $request->birth_place;
        $user->gender      = $request->gender;
        $user->city        = $request->city;
        $user->district    = $request->district;
        $user->address     = $request->address;
        $user->email       = $request->email;
        $user->hp          = $request->hp;
        $user->dream       = $request->dream;
        $user->hobby       = $request->hobby;
        $user->experience  = $request->experience;
        $user->creation    = $request->creation;
        $user->quote       = $request->quote;

        if ($request->hasFile('photo')) {

            $extention =  $request->photo->getClientOriginalName();
            $extention1 = explode('.', $extention);
            $extention2 = end($extention1);
            // dd($extention2);
            if ($extention2 == "png" || $extention2 == "jpg") {
                $filename = Auth::user()->id.$request->photo->getClientOriginalName();
            
                $request->file('photo')->storeAs('photos',$filename);

                $user->photo  = $filename;
            }else{
                return redirect()->back()->with('danger','Maaf anda hanya di perbolehkan menguplod file PNG atau JPG');
            }
        }

        $user->update();

        return redirect()->back()->with('success', ' Profile Updated');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // return redirect()->route('user.index')->with('danger', 'Santri sudah di hapus');
    }

    /**========== Api Show ALl Divisi start========== */
    
    public function apiUser($categorie){

        if($categorie == 'user'){ /**All Santri */
             // Ini hanya untuk menampilkan seluruh santri saja
            $users = DB::table('users')
            ->whereIn('department',[
            'Programmer',
            'Multimedia',
            'Imers',
            'Cyber',
            ])->select('*')
            ->orderBy('id','desc');
        
            return Datatables::of($users)->addColumn('action',function($users){
                return  '<a onclick="detailUser('.$users->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-star"></i> Detail</a>&nbsp;'.
                '<a onclick="editUser('.$users->id.')" class="btn btn-outline btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;'.
                        '<a onclick="deleteUser('.$users->id.')" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>'; 
            })->make(true);

        }elseif($categorie == 'programmer'){ /**Santri Prorammer */
            $users = DB::table('users')
            ->where('department','Programmer')
            ->select('*')
            ->orderBy('id','desc');
        
            return Datatables::of($users)->addColumn('action',function($users){
                return  '<a onclick="detailUser('.$users->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-star"></i> Detail</a>&nbsp;'.
                '<a onclick="editUser('.$users->id.')" class="btn btn-outline btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;'.
                        '<a onclick="deleteUser('.$users->id.')" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>'; 
            })->make(true);

        }elseif($categorie == 'multimedia'){ /**Santri Multimedia */
            $users = DB::table('users')
            ->where('department','Multimedia')
            ->select('*')
            ->orderBy('id','desc');
        
            return Datatables::of($users)->addColumn('action',function($users){
                return  '<a onclick="detailUser('.$users->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-star"></i> Detail</a>&nbsp;'.
                '<a onclick="editUser('.$users->id.')" class="btn btn-outline btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;'.
                        '<a onclick="deleteUser('.$users->id.')" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>'; 
            })->make(true);

        }elseif($categorie == 'imers'){ /**Santri Imers */
            $users = DB::table('users')
            ->where('department','Imers')
            ->select('*')
            ->orderBy('id','desc');
        
            return Datatables::of($users)->addColumn('action',function($users){
                return  '<a onclick="detailUser('.$users->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-star"></i> Detail</a>&nbsp;'.
                '<a onclick="editUser('.$users->id.')" class="btn btn-outline btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;'.
                        '<a onclick="deleteUser('.$users->id.')" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>'; 
            })->make(true);

        }elseif($categorie == 'cyber'){ /**Santri Cyber */
            $users = DB::table('users')
            ->where('department','Cyber')
            ->select('*')
            ->orderBy('id','desc');
        
            return Datatables::of($users)->addColumn('action',function($users){
                return  '<a onclick="detailUser('.$users->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-star"></i> Detail</a>&nbsp;'.
                '<a onclick="editUser('.$users->id.')" class="btn btn-outline btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;'.
                        '<a onclick="deleteUser('.$users->id.')" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>'; 
            })->make(true);


        }elseif($categorie == 'staff'){ /**ALl Staff */
            // Ini hanya untuk menampilkan seluruh santri prgorammer
           $users = DB::table('users')
           ->where('department','Staff Pondok IT')
           ->select('*')
           ->orderBy('id','desc');
       
           return Datatables::of($users)->addColumn('action',function($users){
               return  '<a onclick="detailUser('.$users->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-star"></i> Detail</a>&nbsp;'.
               '<a onclick="editUser('.$users->id.')" class="btn btn-outline btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;'.
                       '<a onclick="deleteUser('.$users->id.')" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>'; 
           })->make(true);

        }else{ /**ALl Kakak Asuh */
                // Ini hanya untuk menampilkan seluruh santri prgorammer
            $users = DB::table('users')
            ->where('department','Foster Brother')
            ->select('*')
            ->orderBy('id','desc');
        
            return Datatables::of($users)->addColumn('action',function($users){
                return  '<a onclick="detailUser('.$users->id.')" class="btn btn-outline btn-primary btn-xs"><i class="glyphicon glyphicon-star"></i> Detail</a>&nbsp;'.
                '<a onclick="editUser('.$users->id.')" class="btn btn-outline btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;'.
                        '<a onclick="deleteUser('.$users->id.')" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>'; 
            })->make(true);

        }

    }
    /**========== Api Show ALl Divisi End========== */

    /**==================== User End =======================*/


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

