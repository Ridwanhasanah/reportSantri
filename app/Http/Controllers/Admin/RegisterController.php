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
         
        return view('dashboard.admin.register.allRegister',compact('divisi'));
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

    public function apiRegister(){
        $register = Register::all();

        return Datatables::of($register)
            ->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterProgrammer(){
        $register = DB::table('registers')->where('divisi', '=', 'programmer')->get();

        return Datatables::of($register)
            ->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterMultimedia(){
        $register = DB::table('registers')->where('divisi', '=', 'multimedia')->get();

        return Datatables::of($register)
            ->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterImers(){
        $register = DB::table('registers')->where('divisi', '=', 'imers')->get();

        return Datatables::of($register)
            ->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function apiRegisterCyber(){
        $register = DB::table('registers')->where('divisi', '=', 'cyber')->get();

        return Datatables::of($register)
            ->addColumn('action', function($register){
                return '<a onclick="showRegis('.$register->id.')" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>'.
                        '<a onclick="editRegis('.$register->id.')" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>'.
                        '<a onclick="deleteRegis('.$register->id.')" class="btn btn-outline btn-danger">Hapus</a>';
            })->make(true);
    }

    public function exportPDF($id){
        $register = Register::find($id);

        $pdf = PDF::loadView('dashboard.admin.register.pdf', compact('register'));

        $pdf->setPaper('a4', 'potrait');

        return $pdf->download();//view('dashboard.admin.register.pdf',compact('register'));
    }
}
