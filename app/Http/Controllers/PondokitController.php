<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Caregiver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PondokitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $santri = DB::table('caregivers')->select('*')->get();
        foreach ($santri as $santri) {
            
            // echo strtotime(date('Y-m-d H:i:s'));
            // echo $expired = date(strtotime($santri->expired)); 
            if (strtotime($santri->expired) <= strtotime(date('Y-m-d H:i:s')) ) {
                DB::table('users')->select('*')->where('id',$santri->santri)
                ->update(['status'=>'','package'=>'']);
            //     echo "<pre>";
            //     echo $santri->expired . "==" . date('Y-m-d H:i:s');
            //     echo "</pre>";

            }
        }
    }

    // public function handle($request, Closure $next)
    // {
    //     $user = Auth::user();
    //     if($user->role === User::master) {
    //         return $next($request);
    //     }

    //     return redirect('home');
    // }
    
    public function index(){


        $programmer = DB::table('users')->where('department','Programmer')->count();
        $multimedia = DB::table('users')->where('department','Multimedia')->count();
        $imers      = DB::table('users')->where('department','Imers')->count();
        $cyber      = DB::table('users')->where('department','Cyber')->count();

        // dd(Auth::user()->roles->id);

        // $userRoleName = User::find(1)->role[0]->name;
        return view('dashboard.dashboard.dashboard', compact('programmer','multimedia','imers','cyber','userRoleName'));
    }

    /*========== Menampilkan Santri Sesuai Divisi Start ========== */
    public function santriProgrammer(){

        $students = DB::table('users')->select('*')->where('department',"Programmer")->latest()->paginate(20);


        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    public function santriMultimedia(){

        $students = DB::table('users')->select('*')->where('department',"Multimedia")->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Multimedia')->count();

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    public function santriImers(){

        $students = DB::table('users')->select('*')->where('department',"Imers")->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Imers')->count();

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    public function santriCyber(){

        $students = DB::table('users')->select('*')->where('department',"Cyber")->latest()->paginate(20);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Cyber')->count();

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    /*================================ Menampilkan Santri Sesuai Divisi End ============================== */

    
}
