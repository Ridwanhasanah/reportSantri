<?php

namespace App\Http\Controllers\Kka\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caregiver;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caregivers = DB::table('caregivers')->select('*')
        ->where([
            ['caregiver',Auth::user()->id],
            ['active',true],
        ])->get();

        $count = DB::table('caregivers')->select('*')
        ->where([
            ['caregiver',Auth::user()->id],
            ['active',true],
        ])->count();
        
        return view('kakakAsuh.dashboard.adik-asuh',compact('caregivers','user','count'));
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
    public function store(Request $request)
    {
        //
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
