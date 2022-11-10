<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Acquisition; 
use App\Tier;
use App\Espace;
use Exception; 

class AcquisitionController extends Controller
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
            $acquisitions = Acquisition::with(['tiers', 'espace'])->get(); 
            //dd($acquisitions);
        }catch(Exception $e) {
            dd('Message : '. $e->getMessage()); 
        }

        return view('admin.acquisition.index', compact('acquisitions')); 
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
            $tiers = Tier::where('type_tiers', '=', 2)->orWhere('type_tiers', '=', 3)->get(); 
            $espaces = Espace::with(['bien'])->get(); 
        } catch (Exception $e) {
            dd('Message : ', $e->getMessage()); 
        }
        return view('admin.acquisition.create', compact('tiers', 'espaces'));
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
            'client' => 'required', 
            'espace' => 'required',
            'type' => 'required', 
        ]);

        Acquisition::create([
            'tiers_id' => $request->client,
            'espace_id' => $request->espace,
            'date' => $request->date,
            'type' => $request->type,
            'etat' => 1,
        ]); 

        return view('admin.acquisition.index');
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
