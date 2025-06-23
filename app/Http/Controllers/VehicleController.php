<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;
use App\Models\Type;
use App\Models\Vendor;
use App\Models\Vehicle;
use App\Models\VehicleStatus;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Pagination\Paginator;
use function Termwind\render;

class VehicleController extends Controller
{
    public function VehicleList(Request $request)
    {
        $types = Type::all();
        $statuses = VehicleStatus::all();
        $vendors = Vendor::all();
        $contacts = ContactForm::all();

        $query = Vehicle::with('status'); // eager load relationships

        if ($request->has('name') && !empty($request->name)) {
            $search = $request->name;
            $query->where(function ($q) use ($search) {
                $q->where('vin', 'like', "%$search%")
                    ->orWhere('vehicle_name', 'like', "%$search%")
                    ->orWhere('model', 'like', "%$search%")
                    ->orWhere('year', 'like', "%$search%");
            });
        }

        $vehicles = $query->orderBy('id', 'desc')->paginate(10);

        return view('vehicle.vehiclelist', compact('vehicles', 'types', 'statuses', 'vendors', 'contacts'));
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


    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->vin = $request->vin;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->status_id = $request->status_id;
        $vehicle->ownership = $request->ownership;
        $vehicle->group = $request->group;

        if ($request->hasFile('vehicle_image')) {
            $imagePath = $request->file('vehicle_image')->store('vehicle_images', 'public');
            $vehicle->vehicle_image = $imagePath;
        }

        $vehicle->in_service_date = $request->in_service_date;
        $vehicle->in_service_odometer = $request->in_service_odometer;
        $vehicle->out_of_service_date = $request->out_of_service_date;
        $vehicle->out_of_service_odometer = $request->out_of_service_odometer;

        $vehicle->purchase_vendor = $request->purchase_vendor;
        $vehicle->purchase_date = $request->purchase_date;
        $vehicle->purchase_price = $request->purchase_price;
        $vehicle->odometer = $request->odometer;
        $vehicle->purchase_type = $request->purchase_type;

        $vehicle->lender = $request->lender;
        $vehicle->date_of_loan = $request->date_of_loan;
        $vehicle->amount_of_loan = $request->amount_of_loan;
        $vehicle->annual_percentage_rate = $request->annual_percentage_rate;
        $vehicle->down_payment = $request->down_payment;
        $vehicle->first_payment_date = $request->first_payment_date;
        $vehicle->monthly_payment = $request->monthly_payment;
        $vehicle->number_of_payment = $request->number_of_payment;
        $vehicle->loan_end_date = $request->loan_end_date;
        $vehicle->account_number = $request->account_number;

        $vehicle->save();

        return redirect()->route('vehicle.vehicle')->with('success', 'Vehicle updated successfully!');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->back()->with('success', 'Vehicle deleted successfully!');
    }

    public function VehicleAssignment()
    {
        $assignments = Assignment::with(['contact', 'vehicle', 'statusRelation'])->latest()->get();
        return view('vehicle.vehicleassignment', compact('assignments'));
    }
    public function AddAssignment()
    {

        $statuses = VehicleStatus::all();
        $contacts = ContactForm::all();
        $vehicles = Vehicle::whereHas('status', function ($q) {
            $q->where('status_name', 'Inactive');
        })->get();

        return view('vehicle.addassignment', compact('statuses', 'vehicles', 'contacts'));
    }
    public function storeAssignment(Request $request)
    {
        $validated = $request->validate([
            'contact_id' => 'nullable|exists:contact_forms,id',
            'contact' => 'required|string|max:20',
            'address' => 'nullable|string',
            'booking_details' => 'nullable|string|max:500',
            'reference_number' => 'nullable|string|max:100',
            'expected_return' => 'nullable|date',
            'purpose' => 'nullable|string|max:255',
            'vin' => 'required|string|max:50',
            'status' => 'nullable|integer',
            'model' => 'nullable|string|max:100',
            'yard' => 'nullable|integer',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'end_time' => 'nullable',
            'start_km' => 'nullable|integer|min:0',
            'end_km' => 'nullable|integer|min:0',
            'start_fuel' => 'nullable|numeric|min:0',
            'start_fuel_unit' => 'nullable|in:L,Gallons,%',
            'end_fuel' => 'nullable|numeric|min:0',
            'end_fuel_unit' => 'nullable|in:L,Gallons,%',
            'deposit_given' => 'nullable|numeric|min:0',
            'rent_given' => 'nullable|numeric|min:0',
            'gst_given' => 'nullable|numeric|min:0',
            'km_given' => 'nullable|numeric|min:0',
            'hour_given' => 'nullable|numeric|min:0',
            'other_given' => 'nullable|numeric|min:0',
            'total_given' => 'nullable|numeric|min:0',
            'deposit_final' => 'nullable|numeric|min:0',
            'rent_final' => 'nullable|numeric|min:0',
            'gst_final' => 'nullable|numeric|min:0',
            'km_final' => 'nullable|numeric|min:0',
            'hour_final' => 'nullable|numeric|min:0',
            'other_final' => 'nullable|numeric|min:0',
            'total_final' => 'nullable|numeric|min:0',
            'driving_license' => 'nullable|string|max:50',
            'document_collected' => 'nullable|in:Yes,No',
            'docs' => 'nullable|array',
            'document_number' => 'nullable|string|max:100',
            'cash_hand' => 'nullable|numeric|min:0',
            'cash_account' => 'nullable|numeric|min:0',
            'total_received' => 'nullable|numeric|min:0',
            'account_name' => 'nullable|string|max:100',
            'account_number' => 'nullable|string|max:50',
            'ifsc_code' => 'nullable|string|max:20',
            'refund_amount' => 'nullable|numeric|min:0',
            'document_images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:10240',
        ]);

        // Handle file uploads
        $documentPaths = [];
        if ($request->hasFile('document_images')) {
            foreach ($request->file('document_images') as $file) {
                $path = $file->store('assignments/documents', 'public');
                $documentPaths[] = $path;
            }
        }

        // Prepare data for storage
        $assignmentData = $validated;
        $assignmentData['documents_collected'] = $request->input('docs', []);
        $assignmentData['document_images'] = $documentPaths;

        // Create assignment
        $assignment = Assignment::create($assignmentData);

        return redirect()->route('list.assignment', $assignment)
            ->with('success', 'Assignment created successfully!');
    }
    public function getContactInfo($id)
    {
        $contact = ContactForm::find($id);

        if (!$contact) {
            return response()->json(['error' => 'Contact not found'], 404);
        }

        return response()->json([
            'mobile' => $contact->mobile ?? $contact->phone ?? '',
            'address' => $contact->address ?? '',
            'license' => $contact->driving_license ?? $contact->license ?? '',
        ]);
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