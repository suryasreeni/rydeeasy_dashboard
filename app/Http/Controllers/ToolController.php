<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Termwind\render;

class ToolController extends Controller
{
    public function Tool()
    {
        return view('tool.tool');
    }
    public function AddTool()
    {
        return view('tool.addtool');
    }


}