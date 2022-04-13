<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\car;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings=booking::paginate(5);
    //    dd($request->all());
        //point to interface named index
        
        return view('booking.index')
        ->with(compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cars=car::paginate(100);
        $users=User::paginate(100);
        //
        return view('booking.create')
        ->with(compact('cars','users'));
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

        // dd($request->all());
         //store data to databasse
        //data validation/all field not nullable
        $request->validate([
            'nama' => 'required',
            'tarikh_tempah' => 'required',
            'kereta' => 'required',
        ]);
        //execute saving record to database model
        booking::create([
            'user_id'=> $request->nama,
            'tarikh_tempah'=> $request->tarikh_tempah,
            'car_id'=> $request->kereta,
            
        ]);//insert sql

        //redirect
        return redirect()->route('booking.create')
        ->with('success', 'Tempahan Berjaya.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\booking  $booking
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
        $bookings=booking::find($id);
        return view('booking.edit')
                ->with(compact('bookings'));
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
        $bookings=booking::find($id);
        $bookings->update(
            $request->only('nama','tarikh_tempat','kereta')
        );
            return redirect('/booking')
            ->with('success','Tempahan dikemaskini');
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
        $bookings=booking::find($id);
        $bookings->delete();
        return redirect('/booking')
                ->with('success','Tempahan Dibatalkan');
    }
}
