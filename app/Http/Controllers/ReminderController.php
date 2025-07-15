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


        $now = Carbon::now();

        $reminders = ServiceReminder::with(['vehicle', 'serviceTask'])->latest()->get();
        $allvehicle = Vehicle::all();
        $servicetasks = ServiceTask::all();
        $overdueCount = $reminders->filter(function ($reminder) use ($now) {
            return $reminder->next_due_date &&
                Carbon::parse($reminder->next_due_date)->isPast();
        })->count();

        $dueSoonCount = $reminders->filter(function ($reminder) use ($now) {
            return $reminder->next_due_date &&
                !Carbon::parse($reminder->next_due_date)->isPast() &&
                $reminder->time_threshold &&
                Carbon::parse($reminder->next_due_date)->diffInDays($now) <= $reminder->time_threshold;
        })->count();

        $upcomingCount = $reminders->count() - $overdueCount - $dueSoonCount;
        return view('reminder.servicereminder', compact(
            'reminders',
            'allvehicle',
            'servicetasks',
            'overdueCount',
            'dueSoonCount',
            'upcomingCount'
        ));
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
    public function UpdateServiceReminder(Request $request, $id)
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

        $reminder = ServiceReminder::findOrFail($id);

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

        $reminder->update($validated);

        return redirect()->route('list.servicereminder')->with('success', 'Service Reminder updated successfully.');
    }
    public function DestroyServiceReminder($id)
    {
        $reminder = ServiceReminder::findOrFail($id);
        $reminder->delete();

        return redirect()->back()->with('success', 'Service Reminder deleted successfully.');
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