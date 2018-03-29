<?php

namespace App\Http\Controllers\Admin;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use PDF;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url   = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url_array = explode('/', $url);
        $divisi = end($url_array);
        $registers = DB::table('registers')->latest()->paginate(10);
        
        return view('dashboard.admin.register.allRegister',compact('divisi','registers'));
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
    public function store(Requests $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $register = Register::find($id);
        return view('dashboard.admin.register.showRegister', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = Register::find($id);
        return view('dashboard.admin.register.editRegister', compact('register'));
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
        $register = Register::find($id);
            $register->divisi         = $request->divisi;
            $register->proses         = $request->proses;
            $register->nama           = $request->nama;
            $register->tgl_daftar     = date('d-m-Y');
            $register->tempat_lahir   = $request->tempat_lahir;
            $register->tanggal_lahir           = $request->tanggal_lahir;
            $register->email             = $request->email;
            $register->rumah             = $request->rumah;
            $register->kota              = $request->kota;
            $register->hobi              = $request->hobi;
            $register->cita              = $request->cita;
            $register->facebook          = $request->facebook;
            $register->hp                = $request->hp;
            $register->wa                = $request->wa;
            $register->lulusan           = $request->lulusan;
            $register->sekolah           = $request->sekolah;
            $register->jurusan           = $request->jurusan;
            $register->jml_ortu          = $request->jml_ortu;
            $register->hp_ortu           = $request->hp_ortu;
            $register->rizki             = $request->rizki;
            $register->tau               = $request->tau;
            $register->nama_ayah         = $request->nama_ayah;
            $register->nama_ibu          = $request->nama_ibu;
            $register->p_ayah            = $request->p_ayah;
            $register->p_ibu             = $request->p_ibu;
            $register->gaji              = $request->gaji;
            $register->j_saudara         = $request->j_saudara;
            $register->izin              = $request->izin;
            $register->laptop            = $request->laptop;
            $register->iq                = $request->iq;
            $register->hafalan           = $request->hafalan;
            $register->skill             = $request->skill;
            $register->kekuranganmu      = $request->kekuranganmu;
            $register->kelebihanmu       = $request->kelebihanmu;
            $register->idola             = $request->idola;
            $register->buku              = $request->buku;
            $register->ustad             = $request->ustad;
            $register->tanggungan        = $request->tanggungan;
            $register->rokok             = $request->rokok;
            $register->pacar             = $request->pacar;
            $register->kesehatan         = $request->kesehatan;
            $register->ada_tanggungan    = $request->ada_tanggungan;
            $register->karya             = $request->karya;
            $register->pernah            = $request->pernah;
            $register->pemahaman         = $request->pemahaman;
            $register->pernyataan        = $request->pernyataan;
            $register->limam                = $request->limam;
            $register->kekurangan        = $request->kekurangan;
            $register->marah             = $request->marah;
            $register->bahagia           = $request->bahagia;
            $register->alokasi           = $request->alokasi;
            $register->magang            = $request->magang;
            $register->berjuang          = $request->berjuang;
            $register->cita_pondok       = $request->cita_pondok;
            $register->berinfak          = $request->berinfak;
            $register->sudah_punya       = $request->sudah_punya;
            $register->peraturan         = $request->peraturan;
            $register->kekurangan_pondok = $request->kekurangan_pondok;
            $register->impian            = $request->impian;
            $register->alasan            = $request->alasan;
            $register->kamu_tau          = $request->kamu_tau;
            $register->jalani_kehidupan  = $request->jalani_kehidupan;
            $register->ktp               = $request->ktp;
            $register->harapan           = $request->harapan;
            if ($request->hasFile('foto')) {

            $filename = $request->foto->getClientOriginalName();
            
            $request->file('foto')->storeAs('photos',$filename);

            $register->foto   = $filename;

            }

            // $register->foto              = $fotoku;
            $register->update();
        return redirect()->back()->with('success', 'Berhasil di Ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = Register::find($id);
        $register->delete();
    }

    public function apiRegister(Request $request){

        DB::statement(DB::raw('set @rownum=0'));
        $register = Register::select([
            DB::raw('@rownum  := @rownum  + 1 AS no'),
            'id',
            'nama',
            'proses',
            'divisi',
            'tgl_daftar',
            'wa',
            'iq'
        ]);
        $datatables = Datatables::of($register);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        $register2 = DB::table('registers')->orderBy('id','asc')->get();
        return $datatables->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterProgrammer(Request $request){
       
       DB::statement(DB::raw('set @rownum=0'));
        $register = Register::select([
            DB::raw('@rownum  := @rownum  + 1 AS no'),
            'id',
            'nama',
            'proses',
            'divisi',
            'tgl_daftar',
            'wa',
            'iq'
        ])->where('divisi', '=', 'programmer');
        $datatables = Datatables::of($register);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        $register2 = DB::table('registers')->orderBy('id','asc')->get();
        return $datatables->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterMultimedia(Request $request){
        
        DB::statement(DB::raw('set @rownum=0'));
        $register = Register::select([
            DB::raw('@rownum  := @rownum  + 1 AS no'),
            'id',
            'nama',
            'proses',
            'divisi',
            'tgl_daftar',
            'wa',
            'iq'
        ])->where('divisi', '=', 'multimedia');
        $datatables = Datatables::of($register);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        $register2 = DB::table('registers')->orderBy('id','asc')->get();
        return $datatables->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterImers(Request $request){
       
        DB::statement(DB::raw('set @rownum=0'));
        $register = Register::select([
            DB::raw('@rownum  := @rownum  + 1 AS no'),
            'id',
            'nama',
            'proses',
            'divisi',
            'tgl_daftar',
            'wa',
            'iq'
        ])->where('divisi', '=', 'imers');
        $datatables = Datatables::of($register);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        $register2 = DB::table('registers')->orderBy('id','asc')->get();
        return $datatables->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterCyber(Request $request){
        
        DB::statement(DB::raw('set @rownum=0'));
        $register = Register::select([
            DB::raw('@rownum  := @rownum  + 1 AS no'),
            'id',
            'nama',
            'proses',
            'divisi',
            'tgl_daftar',
            'wa',
            'iq'
        ])->where('divisi', '=', 'cyber');
        $datatables = Datatables::of($register);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        $register2 = DB::table('registers')->orderBy('id','asc')->get();
        return $datatables->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function exportPDF($id){
        $register = Register::find($id);

        $pdf = PDF::loadView('dashboard.admin.register.pdf', compact('register'));

        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();//view('dashboard.admin.register.pdf',compact('register'));
    }
}
