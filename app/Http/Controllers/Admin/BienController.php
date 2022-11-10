<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bien; 
use App\Tier; 
use App\Espace; 

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $biens = Bien::get();
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }
        return view('admin.bien.index', compact('biens')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try{
            $tiers = Tier::where('type_tiers', '=', 1)->get(); 
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }
        return view('admin.bien.create', compact('tiers'));
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
            'proprietaire' => 'required', 
            'adresse' => 'required', 
            'quartier' => 'required'
        ]); 

        $filename = ''; 

        if($request->file('image')){
            $file = $request->file('image'); 
            $filename = $request->proprietaire.'-'.date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('image-bien'), $filename);
        }   

        try{
            Bien::create([
                'tiers_id' => $request->proprietaire,
                'image' => $filename, 
                'adresse' => $request->adresse,
                'localisation' => $request->localisation,
                'quartier' => $request->quartiter,
                'commune' => $request->commune 
            ]); 
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }
        
        return redirect()->route('admin.bien.index'); 

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

        try {
            $bien = Bien::find($id); 

            $espaces = Espace::where('bien_id', '=', $id)->get(); 
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }

        return view('admin.bien.show', compact('bien', 'espaces')); 
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
