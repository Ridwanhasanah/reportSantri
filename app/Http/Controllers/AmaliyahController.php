<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Amaliyah;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AmaliyahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id; //untuk mengecek id user

        $amal = DB::table('users')
            ->select('amaliyahs.date')
            ->rightJoin('amaliyahs', 'amaliyahs.user_id', '=', 'users.id' )
            ->where('users.id', "$id")
            ->latest()->paginate(20);

        // $amal = new Amaliyah;
        // $date_array = explode('-',$amal->date);
        // $tgl = end($date_array);
        // dd($amal);

        return view('dashboard.amaliyah.amaliyah',compact('amal','tgl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amal = new Amaliyah;
        return view('dashboard.amaliyah.addamaliyah',compact('amal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $amal = new Amaliyah;

        $id = Auth::user()->id;

        // Ibadah Wajib
      
        $amal->user_id         = $id;
        $amal->subuh_jmh       = $request->subuh_jmh;
        $amal->dzuhur_jmh      = $request->dzuhur_jmh;
        $amal->ashar_jmh       = $request->ashar_jmh;
        $amal->maghrib_jmh     = $request->maghrib_jmh;
        $amal->isya_jmh        = $request->isya_jmh;
        $amal->tilawah_alquran = $request->tilawah;
        // Ibadah Sunnah
        $amal->tahajud         = $request->tahajud;
        $amal->witir           = $request->witir;
        $amal->qobliyah_subuh  = $request->qobliyah_subuh;
        $amal->hafalan         = $request->hafalan;
        $amal->dhuha           = $request->dhuha;
        $amal->qobliyah_dzuhur = $request->qobliyah_dzuhur;
        $amal->badiyah_dzuhur  = $request->badiyah_dzuhur;
        $amal->badiyah_maghrib = $request->badiyah_maghrib;
        $amal->badiyah_isya    = $request->badiyah_isya;
        $amal->puasa           = $request->puasa;
        $amal->doa_ortu        = $request->doa_ortu;
        $amal->doa_donatur     = $request->doa_donatur;
        $amal->infaq           = $request->infaq;
        $amal->dzikir_pagi     = $request->dzikir_pagi;
        $amal->dzikir_petang   = $request->dzikir_petang;
        $amal->alkahfi         = $request->alkahfi;
        $amal->date            = date('Y-m-d');

        if ($amal->date == 5) {
            
        }

        $amal->save();

        return view('dashboard.amaliyah.amaliyah',compact('amal'))->with('success', 'Amaliyah Sudah di Ubah dan di Simpan'); ;

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
