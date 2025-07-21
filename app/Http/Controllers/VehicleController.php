<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;
use App\Models\Fuel_Type;
use App\Models\Type;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Location;

use App\Models\Vendor;
use App\Models\Vehicle;
use App\Models\VehicleStatus;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;


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
        $fueltypes = Fuel_Type::all();
        $locations = Location::all();
        $brands = VehicleBrand::all();



        $query = Vehicle::with(['brand', 'model', 'status']); // eager load relationships

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

        return view('vehicle.vehiclelist', compact('vehicles', 'types', 'statuses', 'vendors', 'contacts', 'fueltypes', 'locations', 'brands'));
    }




    public function AddVehicle(Request $request)
    {
        $vendors = Vendor::all();
        $contacts = ContactForm::all();
        $types = Type::all();
        $statuses = VehicleStatus::all();
        $brands = VehicleBrand::all();
        $fueltypes = Fuel_Type::all();
        $locations = Location::all();

        return view('vehicle.addvehicle', compact('vendors', 'contacts', 'types', 'statuses', 'brands', 'fueltypes', 'locations'));
    }

    public function fetchModels(Request $request)
    {
        $brandId = $request->input('brand_id');
        $models = VehicleModel::where('brand_id', $brandId)->pluck('model_name', 'id');

        return response()->json($models);
    }

    public function vehiclestore(Request $request)
    {
        $request->validate([
            'vin' => 'required|unique:vehicles,vin',
            'vehicle_name' => 'required|string',
            'vehicle_type' => 'required|string',
            'fueltype' => 'required|string',
            'year' => 'required|numeric',
            'status_id' => 'required|exists:statuses,id',
            'group' => 'required|string',
            'vehicle_image' => 'nullable|image|max:2048',

            'engine_no' => 'nullable|string',
            'chassis_no' => 'nullable|string',
            'vehicle_tyre_size' => 'nullable|string',
            'vehicle_tons' => 'nullable|string',
            'odometer_reading' => 'nullable|numeric',

            'owner' => 'nullable|string',
            'location' => 'nullable|string',
            'brand_id' => 'nullable|exists:vehicle_brands,id',
            'model_id' => 'nullable|exists:vehicle_models,id',

            // Reminder & Document Fields
            'insurance_no' => 'nullable|string',
            'insurance_start_date' => 'nullable|date',
            'insurance_end_date' => 'nullable|date',
            'roadtex_no' => 'nullable|string',
            'roadtex_last_date' => 'nullable|date',
            'permit_no' => 'nullable|string',
            'permit_last_date' => 'nullable|date',
            'puc_no' => 'nullable|string',
            'puc_last_date' => 'nullable|date',
            'registration_no' => 'nullable|string',
            'registration_valid_from' => 'nullable|date',
            'registration_valid_to' => 'nullable|date',
            'state_permit_start_date' => 'nullable|date',
            'state_permit_end_date' => 'nullable|date',
            'national_permit_start_date' => 'nullable|date',
            'national_permit_end_date' => 'nullable|date',
            'fitness_certificate_start_date' => 'nullable|date',
            'fitness_certificate_end_date' => 'nullable|date',
            'explosive_certificate_start_date' => 'nullable|date',
            'explosive_certificate_end_date' => 'nullable|date',
            'enviornment_tax_start_date' => 'nullable|date',
            'enviornment_tax_end_date' => 'nullable|date',
        ]);


        $vehicleImage = null;
        if ($request->hasFile('vehicle_image')) {
            $vehicleImage = $request->file('vehicle_image')->store('vehicles', 'public');
        }

        Vehicle::create([
            'vin' => $request->vin,
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'fueltype' => $request->fueltype,
            'year' => $request->year,
            'status_id' => $request->status_id,
            'group' => $request->group,
            'vehicle_image' => $vehicleImage,

            'engine_no' => $request->engine_no,
            'chassis_no' => $request->chassis_no,
            'vehicle_tyre_size' => $request->vehicle_tyre_size,
            'vehicle_tons' => $request->vehicle_tons,
            'odometer_reading' => $request->odometer_reading,

            'owner' => $request->owner,
            'location' => $request->location,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,

            // Document Dates
            'insurance_no' => $request->insurance_no,
            'insurance_start_date' => $request->insurance_start_date,
            'insurance_end_date' => $request->insurance_end_date,
            'roadtex_no' => $request->roadtex_no,
            'roadtex_last_date' => $request->roadtex_last_date,
            'permit_no' => $request->permit_no,
            'permit_last_date' => $request->permit_last_date,
            'puc_no' => $request->puc_no,
            'puc_last_date' => $request->puc_last_date,
            'registration_no' => $request->registration_no,
            'registration_valid_from' => $request->registration_valid_from,
            'registration_valid_to' => $request->registration_valid_to,
            'state_permit_start_date' => $request->state_permit_start_date,
            'state_permit_end_date' => $request->state_permit_end_date,
            'national_permit_start_date' => $request->national_permit_start_date,
            'national_permit_end_date' => $request->national_permit_end_date,
            'fitness_certificate_start_date' => $request->fitness_certificate_start_date,
            'fitness_certificate_end_date' => $request->fitness_certificate_end_date,
            'explosive_certificate_start_date' => $request->explosive_certificate_start_date,
            'explosive_certificate_end_date' => $request->explosive_certificate_end_date,
            'enviornment_tax_start_date' => $request->enviornment_tax_start_date,
            'enviornment_tax_end_date' => $request->enviornment_tax_end_date,
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

        // Validate inputs
        $request->validate([
            'vin' => 'required|unique:vehicles,vin,' . $vehicle->id,
            'vehicle_name' => 'required|string',
            'vehicle_type' => 'required|string',
            'fueltype' => 'required|string',
            'year' => 'required|numeric',
            'status_id' => 'required|exists:statuses,id',
            'group' => 'required|string',
            'vehicle_image' => 'nullable|image|max:2048',

            'engine_no' => 'nullable|string',
            'chassis_no' => 'nullable|string',
            'vehicle_tyre_size' => 'nullable|string',
            'vehicle_tons' => 'nullable|string',
            'odometer_reading' => 'nullable|numeric',

            'owner' => 'nullable|string',
            'location' => 'nullable|string',
            'brand_id' => 'nullable|exists:vehicle_brands,id',
            'model_id' => 'nullable|exists:vehicle_models,id',

            // Reminder & Document Fields
            'insurance_no' => 'nullable|string',
            'insurance_start_date' => 'nullable|date',
            'insurance_end_date' => 'nullable|date',
            'roadtex_no' => 'nullable|string',
            'roadtex_last_date' => 'nullable|date',
            'permit_no' => 'nullable|string',
            'permit_last_date' => 'nullable|date',
            'puc_no' => 'nullable|string',
            'puc_last_date' => 'nullable|date',
            'registration_no' => 'nullable|string',
            'registration_valid_from' => 'nullable|date',
            'registration_valid_to' => 'nullable|date',
            'state_permit_start_date' => 'nullable|date',
            'state_permit_end_date' => 'nullable|date',
            'national_permit_start_date' => 'nullable|date',
            'national_permit_end_date' => 'nullable|date',
            'fitness_certificate_start_date' => 'nullable|date',
            'fitness_certificate_end_date' => 'nullable|date',
            'explosive_certificate_start_date' => 'nullable|date',
            'explosive_certificate_end_date' => 'nullable|date',
            'enviornment_tax_start_date' => 'nullable|date',
            'enviornment_tax_end_date' => 'nullable|date',
        ]);

        // Handle vehicle image if uploaded
        if ($request->hasFile('vehicle_image')) {
            // Optional: delete old image
            if ($vehicle->vehicle_image) {
                Storage::disk('public')->delete($vehicle->vehicle_image);
            }

            $vehicleImage = $request->file('vehicle_image')->store('vehicles', 'public');
            $vehicle->vehicle_image = $vehicleImage;
        }

        // Update all fields
        $vehicle->update([
            'vin' => $request->vin,
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'fueltype' => $request->fueltype,
            'year' => $request->year,
            'status_id' => $request->status_id,
            'group' => $request->group,

            'engine_no' => $request->engine_no,
            'chassis_no' => $request->chassis_no,
            'vehicle_tyre_size' => $request->vehicle_tyre_size,
            'vehicle_tons' => $request->vehicle_tons,
            'odometer_reading' => $request->odometer_reading,

            'owner' => $request->owner,
            'location' => $request->location,
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,

            // Document fields
            'insurance_no' => $request->insurance_no,
            'insurance_start_date' => $request->insurance_start_date,
            'insurance_end_date' => $request->insurance_end_date,
            'roadtex_no' => $request->roadtex_no,
            'roadtex_last_date' => $request->roadtex_last_date,
            'permit_no' => $request->permit_no,
            'permit_last_date' => $request->permit_last_date,
            'puc_no' => $request->puc_no,
            'puc_last_date' => $request->puc_last_date,
            'registration_no' => $request->registration_no,
            'registration_valid_from' => $request->registration_valid_from,
            'registration_valid_to' => $request->registration_valid_to,
            'state_permit_start_date' => $request->state_permit_start_date,
            'state_permit_end_date' => $request->state_permit_end_date,
            'national_permit_start_date' => $request->national_permit_start_date,
            'national_permit_end_date' => $request->national_permit_end_date,
            'fitness_certificate_start_date' => $request->fitness_certificate_start_date,
            'fitness_certificate_end_date' => $request->fitness_certificate_end_date,
            'explosive_certificate_start_date' => $request->explosive_certificate_start_date,
            'explosive_certificate_end_date' => $request->explosive_certificate_end_date,
            'enviornment_tax_start_date' => $request->enviornment_tax_start_date,
            'enviornment_tax_end_date' => $request->enviornment_tax_end_date,
        ]);

        return redirect()->route('vehicle.vehicle')->with('success', 'Vehicle updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $newStatusId = $request->input('status_id');

        // Get the status name for the selected ID
        $newStatus = VehicleStatus::find($newStatusId);

        if (!$newStatus) {
            return redirect()->back()->with('error', 'Invalid status selected.');
        }

        $statusName = strtolower($newStatus->status_name);

        // 🚫 Prevent setting to "Inactive" if vehicle has active assignment
        if ($statusName === 'inactive') {
            $activeAssignment = Assignment::where('vin', $vehicle->vin)
                ->whereNull('end_date')
                ->first();

            if ($activeAssignment) {
                return redirect()->back()->with('error', 'This vehicle is currently under rental. You can only mark it as inactive after the assignment is finished.');
            }
        }

        // 🚫 Prevent setting to "Active" directly from vehicle table
        if ($statusName === 'active') {
            return redirect()->back()->with('error', 'You can only activate a vehicle from the assignment.');
        }

        // ✅ Safe to update
        $vehicle->status_id = $newStatusId;
        $vehicle->save();

        return redirect()->back()->with('success', 'Vehicle status updated successfully.');
    }



    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->back()->with('success', 'Vehicle deleted successfully!');
    }
    public function VehicleAssignment(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $assignments = Assignment::with(['contacts', 'vehicle', 'statusRelation']);

        if ($filter === 'complete') {
            $assignments->whereNotNull('end_date');
        } elseif ($filter === 'incomplete') {
            $assignments->whereNull('end_date');
        }

        $assignments = $assignments->latest()->get();

        $contacts = ContactForm::all();
        $vehicles = Vehicle::all();
        $statuses = VehicleStatus::all();

        return view('vehicle.vehicleassignment', compact('assignments', 'contacts', 'vehicles', 'statuses', 'filter'));
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
            'status' => 'nullable|integer|exists:statuses,id', // Make sure the status is valid
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

        // ✅ Handle file uploads
        $documentPaths = [];
        if ($request->hasFile('document_images')) {
            foreach ($request->file('document_images') as $file) {
                $path = $file->store('assignments/documents', 'public');
                $documentPaths[] = $path;
            }
        }

        // ✅ Prepare data
        $assignmentData = $validated;
        $assignmentData['documents_collected'] = $request->input('docs', []);
        $assignmentData['document_images'] = $documentPaths;

        // ✅ Save assignment
        $assignment = Assignment::create($assignmentData);

        // ✅ Update related vehicle status_id
        if ($request->filled('vin') && $request->filled('status')) {
            $vehicle = Vehicle::where('vin', $request->vin)->first();
            if ($vehicle) {
                $vehicle->status_id = $request->status;
                $vehicle->save();
            }
        }

        return redirect()->route('list.assignment', $assignment)
            ->with('success', 'Assignment created successfully!');
    }

    // Controller
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
    public function updateAssignment(Request $request, $id)
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
            'model' => 'nullable|string|max:100',
            'yard' => 'nullable|integer',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'start_km' => 'nullable|integer|min:0',
            'start_fuel' => 'nullable|numeric|min:0',
            'start_fuel_unit' => 'nullable|in:L,Gallons,%',
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
            'document_images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:10240',
            'remove_images' => 'nullable|array',
        ]);

        try {
            $assignment = Assignment::findOrFail($id);

            // Handle existing document images
            $documentPaths = $assignment->document_images ?? [];

            // Remove selected images
            if ($request->has('remove_images')) {
                $removeIndices = $request->input('remove_images');
                foreach ($removeIndices as $index) {
                    if (isset($documentPaths[$index])) {
                        Storage::disk('public')->delete($documentPaths[$index]);
                        unset($documentPaths[$index]);
                    }
                }
                $documentPaths = array_values($documentPaths);
            }

            // Handle new uploaded images
            if ($request->hasFile('document_images')) {
                foreach ($request->file('document_images') as $file) {
                    $path = $file->store('assignments/documents', 'public');
                    $documentPaths[] = $path;
                }
            }

            // Build update data
            $updateData = [
                'contact_id' => $validated['contact_id'] ?? null,
                'contact' => $validated['contact'],
                'address' => $validated['address'] ?? null,
                'booking_details' => $validated['booking_details'] ?? null,
                'reference_number' => $validated['reference_number'] ?? null,
                'expected_return' => $validated['expected_return'] ?? null,
                'purpose' => $validated['purpose'] ?? null,
                'vin' => $validated['vin'],
                'model' => $validated['model'] ?? null,
                'yard' => $validated['yard'] ?? null,
                'start_date' => $validated['start_date'],
                'start_time' => $validated['start_time'],
                'start_km' => $validated['start_km'] ?? null,
                'start_fuel' => $validated['start_fuel'] ?? null,
                'start_fuel_unit' => $validated['start_fuel_unit'] ?? null,
                'deposit_given' => $validated['deposit_given'] ?? null,
                'rent_given' => $validated['rent_given'] ?? null,
                'gst_given' => $validated['gst_given'] ?? null,
                'km_given' => $validated['km_given'] ?? null,
                'hour_given' => $validated['hour_given'] ?? null,
                'other_given' => $validated['other_given'] ?? null,
                'total_given' => $validated['total_given'] ?? null,
                'deposit_final' => $validated['deposit_final'] ?? null,
                'rent_final' => $validated['rent_final'] ?? null,
                'gst_final' => $validated['gst_final'] ?? null,
                'km_final' => $validated['km_final'] ?? null,
                'hour_final' => $validated['hour_final'] ?? null,
                'other_final' => $validated['other_final'] ?? null,
                'total_final' => $validated['total_final'] ?? null,
                'driving_license' => $validated['driving_license'] ?? null,
                'document_collected' => $validated['document_collected'] ?? null,
                'documents_collected' => json_encode($request->input('docs', [])),
                'document_number' => $validated['document_number'] ?? null,
                'cash_hand' => $validated['cash_hand'] ?? null,
                'cash_account' => $validated['cash_account'] ?? null,
                'total_received' => $validated['total_received'] ?? null,
                'account_name' => $validated['account_name'] ?? null,
                'account_number' => $validated['account_number'] ?? null,
                'ifsc_code' => $validated['ifsc_code'] ?? null,
                'document_images' => $documentPaths,
            ];

            // ✅ Update the assignment
            $assignment->update($updateData);

            // ✅ Update related vehicle's status_id based on vin
            if ($request->filled('status') && $request->filled('vin')) {
                $vehicle = Vehicle::where('vin', $request->vin)->first();
                if ($vehicle) {
                    $vehicle->status_id = $request->status;
                    $vehicle->save();
                }
            }

            return redirect()->route('list.assignment', $assignment->id)
                ->with('success', 'Assignment updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Assignment update failed: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update assignment. Please try again.');
        }
    }

    public function completionUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'nullable|integer|exists:statuses,id',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'end_time' => 'nullable',
            'end_km' => 'nullable|integer|min:0',
            'end_fuel' => 'nullable|numeric|min:0',
            'end_fuel_unit' => 'nullable|in:L,Gallons,%',
            'refund_amount' => 'nullable|numeric|min:0',
            // ...include other existing validations here
        ]);

        try {
            $assignment = Assignment::findOrFail($id);

            // Update the assignment fields
            $assignment->status = $validated['status'] ?? $assignment->status;
            $assignment->end_date = $validated['end_date'] ?? $assignment->end_date;
            $assignment->end_time = $validated['end_time'] ?? $assignment->end_time;
            $assignment->end_km = $validated['end_km'] ?? $assignment->end_km;
            $assignment->end_fuel = $validated['end_fuel'] ?? $assignment->end_fuel;
            $assignment->end_fuel_unit = $validated['end_fuel_unit'] ?? $assignment->end_fuel_unit;
            $assignment->refund_amount = $validated['refund_amount'] ?? $assignment->refund_amount;

            $assignment->save();

            // ✅ Also update related vehicle status_id
            if (!empty($assignment->vin) && !empty($validated['status'])) {
                $vehicle = Vehicle::where('vin', $assignment->vin)->first();

                if ($vehicle) {
                    $vehicle->status_id = $validated['status'];
                    $vehicle->save();
                }
            }

            return redirect()->route('list.assignment')
                ->with('success', 'Assignment and vehicle status updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Assignment update failed: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update assignment. Please try again.');
        }
    }
    public function destroyassignment($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        return redirect()->back()->with('success', 'Assignment deleted successfully.');
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