<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartController extends Controller
{
    public function Part()
    {
        return view('part.part');
    }
    public function AddPart()
    {
        return view('part.addpart');
    }
}