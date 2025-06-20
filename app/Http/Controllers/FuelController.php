<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuelController extends Controller
{
    public function FuelHistory()
    {
        return view('fuel.fuelhistory');
    }
    public function AddFuelHistory()
    {
        return view('fuel.addfuelhistory');
    }
    public function ChargingHistory()
    {
        return view('fuel.charginghistory');
    }
    public function AddChargingHistory()
    {
        return view('fuel.addcharginghistory');
    }

}