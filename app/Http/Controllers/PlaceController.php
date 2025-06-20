<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function Place()
    {
        return view('place.place');
    }
    public function AddPlace()
    {
        return view('place.addplace');
    }
}