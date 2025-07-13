<?php

namespace App\Http\Controllers;
use App\Models\ServiceTask;
use App\Models\Vehicle;
use App\Models\ServiceReminder;
use Carbon\Carbon;


use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function ServiceReminder()
    {

        $reminders = ServiceReminder::with(['vehicle', 'serviceTask'])->latest()->get();
        $allvehicle = Vehicle::all();
        $servicetasks = ServiceTask::all();
        return view('reminder.servicereminder', compact('reminders', 'allvehicle', 'servicetasks'));
    }
    public function AddServiceReminder()
    {

        $allvehicle = Vehicle::all();
        $servicetasks = ServiceTask::all();

        return view('reminder.addservicereminder', compact('allvehicle', 'servicetasks'));
    }

    public function StoreServiceReminder(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'service_task_id' => 'required|exists:service_tasks,id',
            'time_interval' => 'nullable|integer|min:1',
            'time_interval_unit' => 'nullable|string|in:day,week,month,year',
            'time_threshold' => 'nullable|integer|min:0',
            'time_threshold_unit' => 'nullable|string|in:day,week,month,year',
            'primary_meter_interval' => 'nullable|integer|min:1',
            'current_reading' => 'nullable|integer|min:1',
            'primary_meter_due_soon_threshold' => 'nullable|integer|min:0',
            'next_due_date' => 'nullable|date',
            'next_due_primary_meter' => 'nullable|integer|min:0',
        ]);

        // Auto-calculate next_due_date if not provided
        if (empty($validated['next_due_date']) && !empty($validated['time_interval']) && !empty($validated['time_interval_unit'])) {
            $now = Carbon::now();

            switch ($validated['time_interval_unit']) {
                case 'day':
                    $now->addDays($validated['time_interval']);
                    break;
                case 'week':
                    $now->addWeeks($validated['time_interval']);
                    break;
                case 'month':
                    $now->addMonths($validated['time_interval']);
                    break;
                case 'year':
                    $now->addYears($validated['time_interval']);
                    break;
            }

            $validated['next_due_date'] = $now->format('Y-m-d');
        }

        ServiceReminder::create($validated);

        return redirect()->back()->with('success', 'Service Reminder added successfully.');
    }

    public function VehicleRenewal()
    {

        return view('reminder.vehiclerenewal');
    }
    public function ContactRenewal()
    {

        return view('reminder.contactrenewal');
    }
}