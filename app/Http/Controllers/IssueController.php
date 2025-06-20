<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function Issue()
    {
        return view('issue.issue');
    }
    public function Fault()
    {
        return view('issue.fault');
    }
    public function Recall()
    {

        return view('issue.recall');
    }
}