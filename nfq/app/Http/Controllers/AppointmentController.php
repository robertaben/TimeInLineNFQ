<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointment;

use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('status', '=', '0')->orderBy('created_at')->get();
        $allCompleted = Appointment::where('status', '=', '1')->orderBy('completed_at')->get();
        return view('appointments.index', ['appointments'=> $appointments, 'allCompleted'=> $allCompleted]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->user_id = 1;
        $appointment->customer_name = $request->input('customer_name');

        $appointment->save();

        $request->session()->flash('message', 'New appointment was created successfully!');
        return view('welcome');
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
        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->completed_at = now();
        $appointment->save();

        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::where('id', '=', $id);
        $appointment->delete();
        return redirect()->route('appointments.index');
    }

    public function display()
    {
        $appointments = Appointment::where('status', '=', '0')->orderBy('created_at')->limit(5)->get();
        return view('appointments.display', ['appointments'=> $appointments]);

    }
}
