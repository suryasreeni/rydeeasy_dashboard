<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function InspectionHistory()
    {

        return view('inspection.inspectionhistory');
    }
    public function ItemFailure()
    {

        return view('inspection.itemfailure');
    }
    public function Schedule()
    {

        return view('inspection.schedule');
    }
    public function Form()
    {

        return view('inspection.form');
    }

}