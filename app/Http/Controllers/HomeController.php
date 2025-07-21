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

        $oneWeekFromNow = now()->addWeek()->toDateString();
        $today = now()->toDateString();

        // Count documents expiring within one week
        $reminders = [
            'insurance' => Vehicle::whereBetween('insurance_end_date', [$today, $oneWeekFromNow])->count(),
            'registration' => Vehicle::whereBetween('registration_valid_to', [$today, $oneWeekFromNow])->count(),
            'roadtax' => Vehicle::whereBetween('roadtex_last_date', [$today, $oneWeekFromNow])->count(),
            'puc' => Vehicle::whereBetween('puc_last_date', [$today, $oneWeekFromNow])->count(),
            'state_permit' => Vehicle::whereBetween('state_permit_end_date', [$today, $oneWeekFromNow])->count(),
            'national_permit' => Vehicle::whereBetween('national_permit_end_date', [$today, $oneWeekFromNow])->count(),
            'fitness' => Vehicle::whereBetween('fitness_certificate_end_date', [$today, $oneWeekFromNow])->count(),
            'explosive' => Vehicle::whereBetween('explosive_certificate_end_date', [$today, $oneWeekFromNow])->count(),
            'environmental' => Vehicle::whereBetween('enviornment_tax_end_date', [$today, $oneWeekFromNow])->count(),
        ];


        return view('home.homepage', compact('vehicles', 'assignments', 'reminders'));
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
    public function InsuranceList()
    {
        $today = now()->toDateString();
        $oneWeekFromNow = now()->addWeek()->toDateString();

        $insuranceList = Vehicle::select(
            'vehicle_name',
            'vin',
            'insurance_no',
            'insurance_end_date'
        )
            ->whereBetween('insurance_end_date', [$today, $oneWeekFromNow])
            ->whereNotNull('insurance_end_date')
            ->orderBy('insurance_end_date', 'asc')
            ->get();

        return view('reminderList.insurancelist', compact('insuranceList'));

    }

    public function RegistrationList()
    {
        $today = now()->toDateString();
        $oneWeekFromNow = now()->addWeek()->toDateString();

        $registrationList = Vehicle::select(
            'vehicle_name',
            'vin',
            'registration_no',
            'registration_valid_from',
            'registration_valid_to'
        )
            ->whereBetween('registration_valid_to', [$today, $oneWeekFromNow])
            ->whereNotNull('registration_valid_to')
            ->orderBy('registration_valid_to', 'asc')
            ->get();

        return view('reminderList.registrationlist', compact('registrationList'));

    }

    public function RoadtaxList()
    {
        $today = now()->toDateString();
        $oneWeekFromNow = now()->addWeek()->toDateString();

        $roadTaxList = Vehicle::select(
            'vehicle_name',
            'vin',
            'roadtex_no',
            'roadtex_last_date'
        )
            ->whereBetween('roadtex_last_date', [$today, $oneWeekFromNow])
            ->whereNotNull('roadtex_last_date')
            ->orderBy('roadtex_last_date', 'asc')
            ->get();

        return view('reminderList.roadtexlist', compact('roadTaxList'));

    }

    public function PUCList()
    {
        $today = now()->toDateString();
        $oneWeekFromNow = now()->addWeek()->toDateString();

        $pucList = Vehicle::select(
            'vehicle_name',
            'vin',
            'puc_no',
            'puc_last_date'
        )
            ->whereBetween('puc_last_date', [$today, $oneWeekFromNow])
            ->whereNotNull('puc_last_date')
            ->orderBy('puc_last_date', 'asc')
            ->get();

        return view('reminderList.puclist', compact('pucList'));

    }



}