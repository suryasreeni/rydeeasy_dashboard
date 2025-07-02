<?php

namespace App\Http\Controllers;
use App\Models\Assignment;
use App\Models\Vehicle;
use Carbon\Carbon;

use Illuminate\Http\Request;
use function Termwind\render;

class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('status')->paginate(6);
        $assignments = Assignment::paginate(6);

        return view('home.homepage', compact('vehicles', 'assignments'));
    }

    public function fetchDueAssignments()
    {
        $assignments = Assignment::whereNotNull('expected_return')->get();

        $data = $assignments->map(function ($item) {
            $expected = \Carbon\Carbon::parse($item->expected_return);
            $status = 'upcoming';

            if ($expected->isToday()) {
                $status = 'today';
            } elseif ($expected->isTomorrow()) {
                $status = 'tomorrow';
            } elseif ($expected->isPast()) {
                $status = 'overdue';
            }

            return [
                'vin' => $item->vin,
                'expected_return' => $expected->format('Y-m-d'),
                'status' => $status,
            ];
        });

        return response()->json($data);
    }




}