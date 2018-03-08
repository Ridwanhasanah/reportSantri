<?php

namespace App\Http\Controllers;
use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //untukmenggunakan Controller Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = Suggestion::all();

        return view('dashboard.suggestion.suggestion',compact('suggestions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.suggestion.addSuggestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suggestion = new Suggestion;

        $suggestion->name       = $request->name;
        $suggestion->hp         = $request->hp;
        $suggestion->suggestion = $request->suggestion;
        $suggestion->save();

        return redirect()->route('dashboard.home')->with('success', 'Saran Telah di Kirim');
    }

    public function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
    }
    
    public function show($id)
    {
        
        $suggestion = Suggestion::find($id);
        return view('dashboard.suggestion.viewSuggestion', compact('suggestion'));
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
        $suggestion = Suggestion::find($id);

        $suggestion->delete();

        return redirect()->back()->with('danger', 'Saran Telah di Hapus');
    }
}
