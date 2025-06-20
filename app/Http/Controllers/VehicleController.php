<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;
use App\Models\Type;
use App\Models\Vendor;
use App\Models\Vehicle;
use App\Models\VehicleStatus;
use Illuminate\Http\Request;
use function Termwind\render;

class VehicleController extends Controller
{
    public function VehicleList()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.vehiclelist', compact('vehicles'));
    }
    public function AddVehicle()
    {
        $vendors = Vendor::all();
        $contacts = ContactForm::all();
        $types = Type::all();
        $statuses = VehicleStatus::all();

        return view('vehicle.addvehicle', compact('vendors', 'contacts', 'types', 'statuses'));
    }
    public function vehiclestore(Request $request)
    {
        $request->validate([
            'vin' => 'required|unique:vehicles,vin',
            'vehicle_name' => 'required|string',
            'vehicle_type' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|numeric',
            'status_id' => 'required|exists:statuses,id',
            'ownership' => 'required|string',
            'group' => 'required|string',
            'vehicle_image' => 'nullable|image|max:2048',

            // Optional fields validation
            'in_service_date' => 'nullable|date',
            'in_service_odometer' => 'nullable|numeric',
            'out_of_service_date' => 'nullable|date',
            'out_of_service_odometer' => 'nullable|numeric',
            'purchase_vendor' => 'nullable|string',
            'purchase_date' => 'nullable|date',
            'odometer' => 'nullable|numeric',
            'purchase_price' => 'nullable|numeric',
            'purchase_type' => 'nullable|string',
            'lender' => 'nullable|string',
            'date_of_loan' => 'nullable|date',
            'amount_of_loan' => 'nullable|numeric',
            'annual_percentage_rate' => 'nullable|numeric',
            'down_payment' => 'nullable|numeric',
            'first_payment_date' => 'nullable|date',
            'monthly_payment' => 'nullable|numeric',
            'number_of_payment' => 'nullable|numeric',
            'loan_end_date' => 'nullable|date',
            'account_number' => 'nullable|string',
        ]);

        $vehicleImage = null;
        if ($request->hasFile('vehicle_image')) {
            $vehicleImage = $request->file('vehicle_image')->store('vehicles', 'public');
        }

        Vehicle::create([
            'vin' => $request->vin,
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'model' => $request->model,
            'year' => $request->year,
            'status_id' => $request->status_id,
            'ownership' => $request->ownership,
            'group' => $request->group,
            'vehicle_image' => $vehicleImage,
            'in_service_date' => $request->in_service_date,
            'in_service_odometer' => $request->in_service_odometer,
            'out_of_service_date' => $request->out_of_service_date,
            'out_of_service_odometer' => $request->out_of_service_odometer,
            'purchase_vendor' => $request->purchase_vendor,
            'purchase_date' => $request->purchase_date,
            'odometer' => $request->odometer,
            'purchase_price' => $request->purchase_price,
            'purchase_type' => $request->purchase_type,
            'lender' => $request->lender,
            'date_of_loan' => $request->date_of_loan,
            'amount_of_loan' => $request->amount_of_loan,
            'annual_percentage_rate' => $request->annual_percentage_rate,
            'down_payment' => $request->down_payment,
            'first_payment_date' => $request->first_payment_date,
            'monthly_payment' => $request->monthly_payment,
            'number_of_payment' => $request->number_of_payment,
            'loan_end_date' => $request->loan_end_date,
            'account_number' => $request->account_number,
        ]);

        return redirect()->route('vehicle.vehicle')->with('success', 'Vehicle added successfully.');
    }
    public function showAjax($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicle.vehicle-model', compact('vehicle'));
    }

    public function VehicleAssignment()
    {
        return view('vehicle.vehicleassignment');
    }
    public function MeterHistory()
    {
        return view('vehicle.meterhistory');
    }
    public function ExpenseHistory()
    {
        return view('vehicle.expensehistory');
    }
    public function ReplacementAnalysis()
    {
        return view('vehicle.replacementanalysis');
    }


}