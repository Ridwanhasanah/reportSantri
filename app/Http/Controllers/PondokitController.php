<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PondokitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function handle($request, Closure $next)
    // {
    //     $user = Auth::user();
    //     if($user->role === User::master) {
    //         return $next($request);
    //     }

    //     return redirect('home');
    // }
    
    public function index()
    {


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

        $students = DB::table('users')->select('*')->where('department',"Programmer")->latest()->paginate(21);


        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    public function santriMultimedia(){

        $students = DB::table('users')->select('*')->where('department',"Multimedia")->latest()->paginate(21);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Multimedia')->count();

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    public function santriImers(){

        $students = DB::table('users')->select('*')->where('department',"Imers")->latest()->paginate(21);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Imers')->count();

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    public function santriCyber(){

        $students = DB::table('users')->select('*')->where('department',"Cyber")->latest()->paginate(21);

        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);

        /*Menghitung Total santri*/
        $total = DB::table('users')->where('department','Cyber')->count();

        return view('dashboard.dashboard.listSantri', compact('students','divisi'));

    }

    /*================================ Menampilkan Santri Sesuai Divisi End ============================== */
}
