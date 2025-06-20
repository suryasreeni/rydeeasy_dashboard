<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleStatus;
use App\Models\Type;
class SettingController extends Controller
{

    public function Setting()
    {

        $statuses = VehicleStatus::all(); // Fetch all statuses from the DB
        $types = Type::all();
        return view('setting.setting', compact('statuses', 'types'));
    }
    public function storestatus(Request $request)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
            'status_color' => 'required|string|max:7',
        ]);

        VehicleStatus::create([
            'status_name' => $request->status_name,
            'status_color' => $request->status_color,
        ]);

        return redirect()->to(route('setting.setting') . '#vehicle_status')
            ->with('success', 'Status added successfully!');
    }
    public function updatestatus(Request $request, $id)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
            'status_color' => 'required|string|max:7',
        ]);

        $status = VehicleStatus::findOrFail($id);
        $status->update([
            'status_name' => $request->status_name,
            'status_color' => $request->status_color,
        ]);

        return redirect()->route('setting.setting')
            ->with('scrollTo', 'vehicle_status')
            ->with('success', 'Status updated successfully!');


    }

    public function destroystatus($id)
    {
        VehicleStatus::destroy($id);
        return redirect(route('setting.setting') . '#vehicle_status')->with('success', 'Status deleted successfully!');
    }



    public function storetype(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string|unique:types,type_name',
        ]);

        Type::create([
            'type_name' => $request->type_name,
        ]);

        return redirect()->to(route('setting.setting') . '#vehicle_type')
            ->with('success', 'Vehicle type added successfully.');

    }
}