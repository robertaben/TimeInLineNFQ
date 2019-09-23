<?php

use App\Appointment;
use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointment1 = new Appointment();
        $appointment1->user_id = 1;
        $appointment1->customer_name = 'Petras';
        $appointment1->status = 1;
        $appointment1->created_at = '2019-09-21 08:15:13';
        $appointment1->started_at = '2019-09-21 08:15:13';
        $appointment1->completed_at = '2019-09-21 08:30:00';
        $appointment1->slug = '120190921081513';
        $appointment1->save();

        $appointment2 = new Appointment();
        $appointment2->user_id = 1;
        $appointment2->customer_name = 'Jonas';
        $appointment2->status = 1;
        $appointment2->created_at = '2019-09-21 08:17:13';
        $appointment2->started_at = '2019-09-21 08:30:00';
        $appointment2->completed_at = '2019-09-21 08:47:00';
        $appointment2->slug = '220190921081713';
        $appointment2->save();

        $appointment3 = new Appointment();
        $appointment3->user_id = 1;
        $appointment3->customer_name = 'Ona';
        $appointment3->status = 1;
        $appointment3->created_at = '2019-09-21 08:33:21';
        $appointment3->started_at = '2019-09-21 08:47:00';
        $appointment3->completed_at = '2019-09-21 08:55:00';
        $appointment3->slug = '320190921083321';
        $appointment3->save();

        $appointment4 = new Appointment();
        $appointment4->user_id = 1;
        $appointment4->customer_name = 'Giedrius';
        $appointment4->status = 1;
        $appointment4->created_at = '2019-09-21 08:41:19';
        $appointment4->started_at = '2019-09-21 08:55:00';
        $appointment4->completed_at = '2019-09-21 09:15:45';
        $appointment4->slug = '420190921084119';
        $appointment4->save();

        $appointment5 = new Appointment();
        $appointment5->user_id = 1;
        $appointment5->customer_name = 'Jonas';
        $appointment5->status = 1;
        $appointment5->created_at = '2019-09-21 10:01:05';
        $appointment5->started_at = '2019-09-21 10:01:05';
        $appointment5->completed_at = '2019-09-21 10:27:47';
        $appointment5->slug = '520190921100105';
        $appointment5->save();

        $appointment6 = new Appointment();
        $appointment6->user_id = 1;
        $appointment6->customer_name = 'Antanas';
        $appointment6->status = 1;
        $appointment6->created_at = '2019-09-21 10:10:05';
        $appointment6->started_at = '2019-09-21 10:27:47';
        $appointment6->completed_at = '2019-09-21 10:44:00';
        $appointment6->slug = '620190921101005';
        $appointment6->save();

        $appointment7 = new Appointment();
        $appointment7->user_id = 1;
        $appointment7->customer_name = 'Saulius';
        $appointment7->status = 1;
        $appointment7->created_at = '2019-09-21 10:15:19';
        $appointment7->started_at = '2019-09-21 10:44:00';
        $appointment7->completed_at = '2019-09-21 11:05:47';
        $appointment7->slug = '720190921101519';
        $appointment7->save();

        $appointment8 = new Appointment();
        $appointment8->user_id = 1;
        $appointment8->customer_name = 'Paulina';
        $appointment8->status = 1;
        $appointment8->created_at = '2019-09-21 11:39:06';
        $appointment8->started_at = '2019-09-21 11:39:06';
        $appointment8->completed_at = '2019-09-21 12:01:44';
        $appointment8->slug = '820190921113906';
        $appointment8->save();

        $appointment9 = new Appointment();
        $appointment9->user_id = 1;
        $appointment9->customer_name = 'Indrė';
        $appointment9->status = 1;
        $appointment9->created_at = '2019-09-21 13:05:55';
        $appointment9->started_at = '2019-09-21 13:05:55';
        $appointment9->completed_at = '2019-09-21 13:30:03';
        $appointment9->slug = '920190921130555';
        $appointment9->save();

        $appointment10 = new Appointment();
        $appointment10->user_id = 1;
        $appointment10->customer_name = 'Jokūbas';
        $appointment10->created_at = '2019-09-21 13:07:39';
        $appointment10->started_at = null;
        $appointment10->completed_at = null;
        $appointment10->slug = '1020190921130739';
        $appointment10->save();

        $appointment11 = new Appointment();
        $appointment11->user_id = 1;
        $appointment11->customer_name = 'Rimgailė';
        $appointment11->created_at = '2019-09-21 13:09:50';
        $appointment11->started_at = null;
        $appointment11->completed_at = null;
        $appointment11->slug = '1120190921130950';
        $appointment11->save();

        $appointment12 = new Appointment();
        $appointment12->user_id = 1;
        $appointment12->customer_name = 'Juozas';
        $appointment12->created_at = '2019-09-21 13:15:10';
        $appointment12->started_at = null;
        $appointment12->completed_at = null;
        $appointment12->slug = '1220190921131510';
        $appointment12->save();

        $appointment13 = new Appointment();
        $appointment13->user_id = 1;
        $appointment13->customer_name = 'Lukas';
        $appointment13->created_at = '2019-09-21 13:17:29';
        $appointment13->started_at = null;
        $appointment13->completed_at = null;
        $appointment13->slug = '1320190921131729';
        $appointment13->save();

        $appointment14 = new Appointment();
        $appointment14->user_id = 1;
        $appointment14->customer_name = 'Dovilė';
        $appointment14->created_at = '2019-09-21 13:24:19';
        $appointment14->started_at = null;
        $appointment14->completed_at = null;
        $appointment14->slug = '1420190921132419';
        $appointment14->save();

        $appointment15 = new Appointment();
        $appointment15->user_id = 1;
        $appointment15->customer_name = 'Andrius';
        $appointment15->created_at = '2019-09-21 13:29:29';
        $appointment15->started_at = null;
        $appointment15->completed_at = null;
        $appointment15->slug = '1520190921132929';
        $appointment15->save();
    }
}
