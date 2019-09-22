<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Appointment extends Model
{
    protected $table = 'appointments';

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public static function activeAppointments()
    {
        return Appointment::where('status', 0)->orderBy('created_at');
    }

    public static function averageAppointmentTime($user_id)
    {
        $appointments = Appointment::where([['user_id', $user_id], ['status', 1]])->get();
        if ($appointments->count() == 0 )
        {
            return 0;
        } else
        {
            $sum = 0;
            foreach ($appointments as $appointment) {
               $sum+= self::appointmentDuration($appointment->id);
            }
            return $sum / $appointments->count();
        }
    }

    public static function appointmentDuration($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        $duration = Carbon::parse($appointment->completed_at)->diffInSeconds(Carbon::parse($appointment->started_at));
        return $duration;

    }

    public static function waitingTime($appointment_id, $user_id)
    {
        $firstActiveAppointment = self::activeAppointments()->first();
        $appointment = Appointment::find($appointment_id);
        if (self::activeAppointments()->count() > 1) // nes ir katik sukrutas jau isiiskaiciuoja
        {
            $waitingTime =  self::averageAppointmentTime($user_id) * (self::activeAppointments()->where('created_at', '<', $appointment->created_at)->count()) -
                (now()->diffInSeconds(Carbon::parse($firstActiveAppointment->started_at)));
            if ($waitingTime <= 0 )
            {
                return "Less than ~1min";
            } else
            {
                return gmdate("H:i:s", $waitingTime);
            }
        }
        else
        {
            return 0;
        }
    }
}
