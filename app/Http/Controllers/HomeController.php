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

        $today = Carbon::today()->toDateString();
        $sevenDaysFromNow = Carbon::today()->addDays(7)->toDateString();

        $reminders = [
            'insurance' => [
                'due_soon' => Vehicle::whereNotNull('insurance_end_date')
                    ->whereBetween('insurance_end_date', [$today, $sevenDaysFromNow])->count(),
                'overdue' => Vehicle::whereNotNull('insurance_end_date')
                    ->whereDate('insurance_end_date', '<', $today)->count(),
            ],
            'registration' => [
                'due_soon' => Vehicle::whereNotNull('registration_valid_to')
                    ->whereBetween('registration_valid_to', [$today, $sevenDaysFromNow])->count(),
                'overdue' => Vehicle::whereNotNull('registration_valid_to')
                    ->whereDate('registration_valid_to', '<', $today)->count(),
            ],
            'roadtax' => [
                'due_soon' => Vehicle::whereNotNull('roadtex_last_date')
                    ->whereBetween('roadtex_last_date', [$today, $sevenDaysFromNow])->count(),
                'overdue' => Vehicle::whereNotNull('roadtex_last_date')
                    ->whereDate('roadtex_last_date', '<', $today)->count(),
            ],
            'puc' => [
                'due_soon' => Vehicle::whereNotNull('puc_last_date')
                    ->whereBetween('puc_last_date', [$today, $sevenDaysFromNow])->count(),
                'overdue' => Vehicle::whereNotNull('puc_last_date')
                    ->whereDate('puc_last_date', '<', $today)->count(),
            ],
            'state_permit' => [
                'due_soon' => Vehicle::whereNotNull('state_permit_end_date')
                    ->whereBetween('state_permit_end_date', [$today, $sevenDaysFromNow])->count(),
                'overdue' => Vehicle::whereNotNull('state_permit_end_date')
                    ->whereDate('state_permit_end_date', '<', $today)->count(),
            ],
            'national_permit' => [
                'due_soon' => Vehicle::whereNotNull('national_permit_end_date')
                    ->whereBetween('national_permit_end_date', [$today, $sevenDaysFromNow])->count(),
                'overdue' => Vehicle::whereNotNull('national_permit_end_date')
                    ->whereDate('national_permit_end_date', '<', $today)->count(),
            ],
            'fitness' => [
                'due_soon' => Vehicle::whereNotNull('fitness_certificate_end_date')
                    ->whereBetween('fitness_certificate_end_date', [$today, $sevenDaysFromNow])->count(),
                'overdue' => Vehicle::whereNotNull('fitness_certificate_end_date')
                    ->whereDate('fitness_certificate_end_date', '<', $today)->count(),
            ],

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
        $insuranceList = Vehicle::select(
            'id',
            'vehicle_name',
            'vin',
            'insurance_no',
            'insurance_start_date',

            'insurance_end_date'
        )
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
            'id',
            'vehicle_name',
            'vin',
            'registration_no',
            'registration_valid_from',
            'registration_valid_to'
        )
            ->whereNotNull('registration_valid_to')
            ->orderBy('registration_valid_to', 'asc')
            ->get();
        return view('reminderList.registrationlist', compact('registrationList'));

    }

    public function RoadtaxList()
    {
        $roadTaxList = Vehicle::select(
            'id',
            'vehicle_name',
            'vin',
            'roadtex_no',
            'roadtex_last_date'
        )
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
            'id',
            'vehicle_name',
            'vin',
            'puc_no',
            'puc_last_date'
        )
            ->whereNotNull('puc_last_date')
            ->orderBy('puc_last_date', 'asc')
            ->get();


        return view('reminderList.puclist', compact('pucList'));

    }
    public function StatePermitList()
    {
        $today = now()->toDateString();
        $oneWeekFromNow = now()->addWeek()->toDateString();

        $statepermitList = Vehicle::select(
            'id',
            'vehicle_name',
            'vin',
            'state_permit_start_date',
            'state_permit_end_date'
        )
            ->whereNotNull('state_permit_end_date')
            ->orderBy('state_permit_end_date', 'asc')
            ->get();

        return view('reminderList.statepermitlist', compact('statepermitList'));

    }

    public function NationalPermitList()
    {
        $today = now()->toDateString();
        $oneWeekFromNow = now()->addWeek()->toDateString();

        $nationalpermitList = Vehicle::select(
            'id',
            'vehicle_name',
            'vin',
            'national_permit_start_date',
            'national_permit_end_date'
        )
            ->whereNotNull('national_permit_end_date')
            ->orderBy('national_permit_end_date', 'asc')
            ->get();

        return view('reminderList.nationalpermitlist', compact('nationalpermitList'));

    }

    public function FitnessList()
    {
        $today = now()->toDateString();
        $oneWeekFromNow = now()->addWeek()->toDateString();

        $fitnesstList = Vehicle::select(
            'id',
            'vehicle_name',
            'vin',
            'fitness_certificate_start_date',
            'fitness_certificate_end_date'
        )
            ->whereNotNull('fitness_certificate_end_date')
            ->orderBy('fitness_certificate_end_date', 'asc')
            ->get();

        return view('reminderList.fitnesslist', compact('fitnesstList'));

    }





}