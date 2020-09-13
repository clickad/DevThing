<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Termin;

class CalendarController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['index', 'show']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calendar.index');
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
        $this->validate($request,[
            'description' => 'required'
        ]);

        $termin = new Termin;
        $termin->user_id = auth()->user()->id;
        $termin->date = $request->input('date');
        $termin->time = $request->input('time');
        $termin->description = $request->input('description');
        $termin->save();
        return redirect('calendar')->with('success', 'Termin created.');
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
        $appointment = Termin::find($id);
        if(auth()->user()->id !== $appointment->user_id){
            return redirect('/calendar')->with('error','Unauthorized page.');
        }
        $appointment->delete();
        return redirect('calendar')->with('success', 'Appointment deleted.');
    }

    public function getApointments()
    {
        $appointments = DB::table('termins')->get();
        return response($appointments, 200)
                  ->header('Content-Type', 'application/json; charset=utf-8');
    }
}
