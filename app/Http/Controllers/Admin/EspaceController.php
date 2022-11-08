<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Espace; 

class EspaceController extends Controller
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
            $espaces = Espace::get();
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }
        return view('admin.espace.index', compact('espaces')); 
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
        return view('admin.espace.create', compact('tiers'));
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
            'numero' => 'required', 
            'type' => 'required', 
            'prix' => 'required'
        ]); 

        try{
            Espace::create([
                'bien_id' => $request->bien_id,
                'numero' => $request->numero, 
                'type' => $request->type, 
                'prix' => $request->prix
            ]); 
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }

        return redirect()->route('admin.bien.view', $request->bien_id); 
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
            $espace = espace::find($id); 
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }
        
        return view('admin.espace.show', compact('espace')); 
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
