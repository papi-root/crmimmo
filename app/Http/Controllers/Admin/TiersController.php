<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tiers; 

class tiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $tiers = Tiers::with(['biens'])->get();

        return view('admin.tiers.index', compact('tiers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.tiers.create'); 
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

        $this->validate($request, [
            'nom_complet' => 'required', 
            'adresse' => 'required', 
            'telephone' => 'required', 
        ]); 

        Tiers::create([
            'nom_complet' => $request->nom_complet, 
            'adresse' => $request->adresse,
            'telephone' => $request->telephone, 
            'email' => $request->email, 
            'type_tiers' => $request->type_tiers
        ]); 

        return redirect()->route('admin.tiers.index'); 
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

        $tiers = Tiers::where('id', '=', $id)->first();

        return view('admin.tiers.edit', compact('tiers', 'id')); 
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

        $this->validate($request, [
            'nom_complet' => 'required', 
            'adresse' => 'required', 
            'telephone' => 'required', 
        ]); 

        Tiers::create([
            'nom_complet' => $request->nom_complet, 
            'adresse' => $request->adresse,
            'telephone' => $request->telephone, 
            'email' => $request->email, 
            'type_tiers' => $request->type_tiers
        ]); 

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
