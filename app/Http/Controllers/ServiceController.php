<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\ServiceTask;
use App\Models\Vendor;


use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Service()
    {

        $allvehicle = Vehicle::all();
        return view('service.service', compact('allvehicle'));
    }
    public function AddService()
    {
        $allvehicle = Vehicle::all();
        $servicetasks = ServiceTask::all();
        $vendors = Vendor::all();



        return view('service.addservice', compact('allvehicle', 'servicetasks', 'vendors'));
    }
}