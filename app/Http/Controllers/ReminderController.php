<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function ServiceReminder()
    {

        return view('reminder.servicereminder');
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