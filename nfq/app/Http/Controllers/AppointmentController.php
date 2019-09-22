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
        $appointments = Appointment::activeAppointments()->get();
        $allCompleted = Appointment::where('status', 1)->orderBy('completed_at')->get();
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
        if (Appointment::where('status', 0)->doesntExist())
        {
            $appointment->started_at = now();
        }
        $appointment->save();
        $appointment->slug = str_slug($appointment->id.$appointment->created_at, '');
        $appointment->save();

        Appointment::waitingTime($appointment->id, $appointment->user_id);
//        dd(Appointment::averageAppointmentTime($appointment->user_id));

        $request->session()->flash('message', 'New appointment was created successfully! You can see your appointment status in the link below: http://127.0.0.1:8000/appointments/'.$appointment->slug);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $appointment = Appointment::where('slug', '=', $slug)->first();

        return view('appointments.show', ['appointment' => $appointment]);
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

        if (Appointment::where('status', 0)->exists())
        {
            $nextAppointment = Appointment::where('status', 0)->oldest()->first();
            $nextAppointment->started_at = $appointment->completed_at;
            $nextAppointment->save();
        }

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
        $appointment = Appointment::where('id', $id);
        $appointment->delete();
        return redirect()->route('appointments.index');
    }

    public function display()
    {
        $appointments = Appointment::activeAppointments()->where('started_at', null)->get();
        return view('appointments.display', ['appointments'=> $appointments]);
    }
}
