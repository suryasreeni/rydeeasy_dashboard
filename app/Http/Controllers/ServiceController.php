<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function ServiceHistory()
    {

        return view('service.servicehistory');
    }
    public function WorkOrder()
    {

        return view('service.workorder');
    }
    public function ServiceTask()
    {

        return view('service.servicetask');
    }
    public function ServiceProgram()
    {

        return view('service.serviceprogram');
    }
    public function ShopDirectory()
    {

        return view('service.servicedirectory');
    }
    public function ShopIntegration()
    {

        return view('service.serviceintegration');
    }
}