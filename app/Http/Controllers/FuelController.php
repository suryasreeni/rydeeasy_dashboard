<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\Fuel_Type;
use App\Models\FuelEntry;

use Illuminate\Http\Request;

class FuelController extends Controller
{
    public function FuelHistory()
    {
        $vehicles = Vehicle::all();
        $fueltypes = Fuel_Type::all();
        $fuel_entry = FuelEntry::all();
        return view('fuel.fuelhistory', compact('fuel_entry', 'vehicles', 'fueltypes'));
    }
    public function AddFuelHistory()
    {
        $vehicles = Vehicle::all();
        $fueltypes = Fuel_Type::all();

        return view('fuel.addfuelhistory', compact('vehicles', 'fueltypes'));
    }
    public function StoreFuelHistory(Request $request)
    {
        $validated = $request->validate([
            'fuel_entry_date' => 'required|date',
            'fuel_vehicle' => 'required|string',
            'fuel_vehicle_name' => 'nullable|string',
            'fuel_type' => 'nullable|string',
            'fuel_station' => 'required|string',
            'per_ltr_price' => 'required|numeric|min:0',
            'qty_in_ltr' => 'required|numeric|min:0',
            'total_amount' => 'nullable|numeric',
        ]);

        $fuelEntry = new FuelEntry();
        $fuelEntry->fuel_entry_date = $request->fuel_entry_date;
        $fuelEntry->fuel_vehicle = $request->fuel_vehicle;
        $fuelEntry->fuel_vehicle_name = $request->fuel_vehicle_name;
        $fuelEntry->fuel_type = $request->fuel_type;
        $fuelEntry->fuel_station = $request->fuel_station;
        $fuelEntry->per_ltr_price = $request->per_ltr_price;
        $fuelEntry->qty_in_ltr = $request->qty_in_ltr;
        $fuelEntry->total_amount = $request->per_ltr_price * $request->qty_in_ltr;
        $fuelEntry->fuel_odometer = $request->fuel_odometer ?? null;
        $fuelEntry->invoice_number = $request->invoice_number ?? null;

        if ($request->hasFile('invoice_photo')) {
            $file = $request->file('invoice_photo');
            $path = $file->store('fuel_documents', 'public');
            $fuelEntry->invoice_photo = $path;
        }

        $fuelEntry->save();

        return redirect()->route('fuel.fuelhistory')->with('success', 'Fuel entry saved successfully.');

    }
    public function UpdateFuelHistory(Request $request, $id)
    {
        $validated = $request->validate([
            'fuel_entry_date' => 'required|date',
            'fuel_vehicle' => 'required',
            'fuel_vehicle_name' => 'required',
            'fuel_type' => 'required',
            'fuel_station' => 'nullable|string',
            'per_ltr_price' => 'nullable|numeric',
            'qty_in_ltr' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
            'fuel_odometer' => 'nullable|string',
            'invoice_number' => 'nullable|string',
            'invoice_photo' => 'nullable|image|max:2048',
        ]);

        $fuel = FuelEntry::findOrFail($id);

        if ($request->hasFile('invoice_photo')) {
            $path = $request->file('invoice_photo')->store('invoice_photos', 'public');
            $validated['invoice_photo'] = $path;
        }

        $fuel->update($validated);

        return redirect()->route('fuel.fuelhistory')->with('success', 'Fuel entry updated successfully.');
    }

    public function DeleteFuelHistory($id)
    {
        $fuel = FuelEntry::findOrFail($id);
        if ($fuel->invoice_photo && \Storage::disk('public')->exists($fuel->invoice_photo)) {
            \Storage::disk('public')->delete($fuel->invoice_photo);
        }
        $fuel->delete();

        return redirect()->route('fuel.fuelhistory')->with('success', 'Fuel entry deleted successfully.');
    }

    public function ChargingHistory()
    {
        return view('fuel.charginghistory');
    }
    public function AddChargingHistory()
    {
        return view('fuel.addcharginghistory');
    }

}