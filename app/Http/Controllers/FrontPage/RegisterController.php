<?php

namespace App\Http\Controllers\FrontPage;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class RegisterController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('FrontPage.formRegister');
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

    public function store(Request $request)
    {
      $this->validate(request(),[
          'divisi'            => 'required|max:190',
          'nama'              => 'required|max:190',
          'tempat_lahir'      => 'required|max:190',
          'tanggal_lahir'     => 'required|max:190',
          'email'             => 'required|unique:registers|max:190',
          'rumah'             => 'required|max:190',
          'kota'              => 'required|max:190',
          'hobi'              => 'required|max:190',
          'cita'              => 'required|max:190',
          'facebook'          => 'required|max:190',
          'hp'                => 'required|unique:registers|max:13|min:10',
          'wa'                => 'required|unique:registers|max:13|min:10',
          'lulusan'           => 'required|max:190',
          'sekolah'           => 'required|max:190',
          'jurusan'           => 'required|max:190',
          'jml_ortu'          => 'required|max:190',
          'hp_ortu'           => 'required|max:13|min:10',
          'rizki'             => 'required|max:190',
          'tau'               => 'required|max:190',
          'nama_ayah'         => 'required|max:30|min:3',
          'nama_ibu'          => 'required|max:30|min:3',
          'p_ayah'            => 'required|max:16|min:5',
          'p_ibu'             => 'required|max:16|min:5',
          'gaji'              => 'required|max:190',
          'j_saudara'         => 'required|max:10',
          'izin'              => 'required|max:190',
          'laptop'            => 'required|max:190',
          'iq'                => 'required|max:10',
          'hafalan'           => 'required',
          'skill'             => 'required|min:8',
          'kekuranganmu'      => 'required|min:8',
          'kelebihanmu'       => 'required|min:8',
          'idola'             => 'required|max:190',
          'buku'              => 'required|max:190',
          'ustad'             => 'required|max:190',
          'tanggungan'        => 'required|max:190',
          'rokok'             => 'required|max:190',
          'pacar'             => 'required|max:190',
          'kesehatan'         => 'required|max:190',
          'ada_tanggungan'    => 'required|max:190',
          'karya'             => 'required|max:190',
          'pernah'            => 'required|max:190',
          'pemahaman'         => 'required|max:190',
          'pernyataan'        => 'required|max:190',
          'limam'             => 'required|min:20',
          'kekurangan'        => 'required|min:5',
          'marah'             => 'required|min:6',
          'bahagia'           => 'required|min:6',
          'alokasi'           => 'required|max:190',
          'magang'            => 'required|max:190',
          'berjuang'          => 'required|max:190',
          'cita_pondok'       => 'required|max:190',
          'berinfak'          => 'required|max:190',
          'sudah_punya'       => 'required|max:190',
          'peraturan'         => 'required|min:15',
          'kekurangan_pondok' => 'required|min:15',
          'impian'            => 'required|min:15',
          'harapan'            => 'required|min:15',
          'alasan'            => 'required|min:10',
          'kamu_tau'          => 'required|max:190',
          'jalani_kehidupan'  => 'required|min:10',
          'ktp'               => 'required|unique:registers|max:17|min:15',
          'disc'              => 'required|max:190',
          'foto'              => 'required',
        ]);

        // $disc = $request->file('disc')->storeAs('images', $request->ktp.'.xlsx');


        // $fotoku = $request->file('photo')->storeAs('photos',$filename);//$request->file('foto')->store('images');

        $register = new Register;
            $register->divisi         = $request->divisi;
            $register->nama           = $request->nama;
            $register->tgl_daftar     = date('d-m-Y');
            $register->tempat_lahir   = $request->tempat_lahir;
            $register->tanggal_lahir     = $request->tanggal_lahir;
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
            $register->harapan           = $request->harapan;
            $register->alasan            = $request->alasan;
            $register->kamu_tau          = $request->kamu_tau;
            $register->jalani_kehidupan  = $request->jalani_kehidupan;
            $register->ktp               = $request->ktp;
            // $register->disc              = $disc;

            if ($request->hasFile('foto')) {

                $filename = $request->foto->getClientOriginalName();
                
                $request->file('foto')->storeAs('photos',$filename);

                $register->foto   = $filename;

            }

            if ($request->hasFile('disc')) {

                $filename = $request->hp.'.xlsx';
                
                $request->file('disc')->storeAs('doc',$filename);
    
                $register->disc   = $filename;
    
            }

            // $register->foto              = $fotoku;
            $register->save();
        return redirect()->route('pendaftaran.index')->with('success', 'Selamat! Anda Berhasil Mendaftar, dan Akan Segera Kami Proses');
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
