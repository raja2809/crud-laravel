<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
         $cars=car::paginate(5);
       
         //point to interface named index
         
         return view('car.index')
         ->with(compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('car.create');
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
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'kapasiti' => 'required',
           

        ]);
        //execute saving record to database model
        car::create($request->all());//insert sql

        //redirect
        return redirect()->route('car.create')
        ->with('success', 'kereta ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
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
        $cars=car::find($id);
        return view('car.edit')
                ->with(compact('cars'));
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
        $cars=car::find($id);
        $cars->update(
            $request->only('nama','jenis','kapasiti')
        );
            return redirect('/car')
            ->with('success','Kereta dikemaskini');
        
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
        $cars=car::find($id);
        $cars->delete();
        return redirect('/car')
                ->with('success','Kereta Dibuang');
    }

}