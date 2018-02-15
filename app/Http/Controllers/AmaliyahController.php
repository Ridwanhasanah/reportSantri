<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Amaliyah;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \stdClass;
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

        $amal = DB::table('amaliyahs')
               ->where('user_id', '=', $id)
               ->whereMonth('date', date('m'))
               ->get();

        $calender  = 'CAL_GREGORIAN';
        $month     = date('m');
        $year      = date('Y');
        $total_day = date('t');//cal_days_in_month($calender, $month, $year);

        /*Untk cek amal di bulan sekarang apakah masih kosong*/
        if (count($amal) != 0) {

            return view('dashboard.amaliyah.amaliyah',compact('amal', 'month', 'total_day'));

        }else{

            return redirect()->route('amaliyah.create');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $last_day = date('t'); //total hari dalam 1 bulan
        $month = date('Y-m-'); //Tahun dan bulan

        $id = Auth::user()->id; //id user
        $tgl = date('Y-m-d'); //tanggal hari ini
        $amal = new Amaliyah; 
        $amaldate = DB::table('users')
            ->select('amaliyahs.date')
            ->rightJoin('amaliyahs', 'amaliyahs.user_id', '=', 'users.id' )
            ->where('users.id', date('Y-m-d'));

        $amaliyah = DB::table('amaliyahs')->where([
            ['user_id', '=', $id],
            ['date', '=', $month.'01'],
        ])->first();

         // dd($id);

        /*Periksa apakah sudah punya inputan data pada awal bulan*/
        if ($amaliyah != $month.'01') {

            $dataSet = [];
            for ($i=1; $i <= $last_day; $i++) { 
                $dataSet[] = [
                    'user_id' => $id,
                    'date'    => $month.$i,
                ];
            }

            DB::table('amaliyahs')->insert($dataSet);
            }
        

        return redirect()->route('amaliyah.index')->with('amal', 'Amaliyah mu masih kosong ayo di isi.. ');//view('dashboard.amaliyah.amaliyah',compact('amal','amaldate','id','tgl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /*Store, fungsi ini sudah tidak di gunakan lagi */
    public function store(Request $request)
    {
        $amaldate = DB::table('users')
            ->select('amaliyahs.date')
            ->rightJoin('amaliyahs', 'amaliyahs.user_id', '=', 'users.id' )
            ->where('users.id', date('Y-m-d'));

        $amal = new Amaliyah;

        $id = Auth::user()->id;

        // Ibadah Wajib
        $amal->user_id         = $id;
        $amal->subuh_jmh       = $request->subuh_jmh;
        $amal->dzuhur_jmh      = $request->dzuhur_jmh;
        $amal->ashar_jmh       = $request->ashar_jmh;
        $amal->maghrib_jmh     = $request->maghrib_jmh;
        $amal->isya_jmh        = $request->isya_jmh;
        $amal->tilawah_alquran = $request->tilawah_alquran;
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

        $amal->save();
        return view('dashboard.amaliyah.updateamaliyah',compact('amal','amaldate'))->with('success', 'Amaliyah Sudah di Ubah dan di Simpan'); ;

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

        // $id = Auth::user()->id;
        $tgl = date('Y-m-d');

        // $amal = App\Amaliyah::where([
        //     ['user_id', '=', $id],
        //     ['date', '=', $tgl],
        // ])->first();
        // DB::table('amaliyahs')->where([
        //     ['user_id', '=', $id],
        //     ['date', '=', $tgl],
        // ])->all();

        $amal = Amaliyah::find($id);
        // dd($amal);
        // Ibadah Wajib
        $amal->subuh_jmh       = $request->subuh_jmh;
        $amal->dzuhur_jmh      = $request->dzuhur_jmh;
        $amal->ashar_jmh       = $request->ashar_jmh;
        $amal->maghrib_jmh     = $request->maghrib_jmh;
        $amal->isya_jmh        = $request->isya_jmh;
        if ($request->tilawah_alquran >127) {
            $amal->tilawah_alquran = 127;
        }else{
            $amal->tilawah_alquran = $request->tilawah_alquran;
        }
        // Ibadah Sunnah
        $amal->tahajud         = $request->tahajud;
        $amal->witir           = $request->witir;
        $amal->qobliyah_subuh  = $request->qobliyah_subuh;
        if ($request->hafalan >127) {
            $amal->hafalan = 127;
        }else{
            $amal->hafalan = $request->hafalan;
        }
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

        $amal->update();
        return redirect()->route('amaliyah.index');//return view('dashboard.amaliyah.updateamaliyah', compact('amal'));


    }

    public function destroy($id)
    {
        //
    }


/*Untuk Chek Amaliyah apakah Sudah punya amaliyah atau blom*/
    public function checkAmaliyah(){

        $id = Auth::user()->id;
        $tgl = date('Y-m-d');

        $amal = DB::table('amaliyahs')->where([
            ['user_id', '=', $id],
            ['date', '=', $tgl],
        ])->first();

        if ( $amal) {
            
           return view('dashboard.amaliyah.updateamaliyah', compact('amal'));
        }else{

            return redirect()->route('amaliyah.create');//return view('dashboard.amaliyah.addamaliyah',compact('amal','amaldate'/*,'id','tgl'*/));
        }
    }
}
