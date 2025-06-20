<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function Integration()
    {
        return view('integration.integration');
    }
}