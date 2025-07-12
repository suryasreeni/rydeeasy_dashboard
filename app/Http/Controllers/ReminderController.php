<?php

namespace App\Http\Controllers;
use App\Models\ServiceTask;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function ServiceReminder()
    {

        return view('reminder.servicereminder');
    }
    public function AddServiceReminder()
    {

        $allvehicle = Vehicle::all();
        $servicetasks = ServiceTask::all();

        return view('reminder.addservicereminder', compact('allvehicle', 'servicetasks'));
    }
    public function VehicleRenewal()
    {

        return view('reminder.vehiclerenewal');
    }
    public function ContactRenewal()
    {

        return view('reminder.contactrenewal');
    }
}