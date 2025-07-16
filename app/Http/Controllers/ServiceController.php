<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\ServiceTask;
use App\Models\Vendor;
use App\Models\Service_Entry;
use Illuminate\Support\Facades\Storage;




use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Service()
    {

        $allvehicle = Vehicle::all();
        $servicetasks = ServiceTask::all();
        $vendors = Vendor::all();
        $service_entries = Service_Entry::with(['vehicle'])->latest()->get();
        return view('service.service', compact('service_entries', 'allvehicle', 'servicetasks', 'vendors'));
    }
    public function AddService()
    {
        $allvehicle = Vehicle::all();
        $servicetasks = ServiceTask::all();
        $vendors = Vendor::all();



        return view('service.addservice', compact('allvehicle', 'servicetasks', 'vendors'));
    }

    public function StoreService(Request $request)
    {
        $request->validate([
            'service_vehicle' => 'required',
            'serviced_on' => 'required|date',
            'service_odometer' => 'required|integer',
            'completed_task' => 'array',
            'resolved_issues' => 'array',
            'vendor' => 'nullable|string',
            'labour' => 'nullable|numeric',
            'parts' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'invoice_number' => 'nullable|string',
            'filename' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $fileName = null;
        if ($request->hasFile('filename')) {
            $fileName = $request->file('filename')->store('invoices', 'public');
        }

        Service_Entry::create([
            'service_vehicle' => $request->service_vehicle,
            'serviced_on' => $request->serviced_on,
            'service_odometer' => $request->service_odometer,
            'completed_task' => $request->completed_task,
            'resolved_issues' => $request->resolved_issues,
            'vendor' => $request->vendor,
            'service_comment' => $request->service_comment,
            'labour' => $request->labour,
            'parts' => $request->parts,
            'tax' => $request->tax,
            'total' => $request->total,
            'invoice_number' => $request->invoice_number,
            'filename' => $fileName,
        ]);

        return redirect()->route('service.list')->with('success', 'Service details saved successfully.');
    }

    public function UpdateService(Request $request, $id)
    {
        $validatedData = $request->validate([
            'service_vehicle' => 'required|string',
            'vendor' => 'required|integer',
            'completed_task' => 'nullable|array',
            'serviced_on' => 'required|date',
            'resolved_issues' => 'nullable|array',
            'odometer' => 'nullable|numeric',
            'service_comment' => 'nullable|string',
            'labour' => 'nullable|numeric',
            'parts' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'invoice_number' => 'nullable|string',
            'filename' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $serviceEntry = Service_Entry::findOrFail($id);

        $serviceEntry->service_vehicle = $validatedData['service_vehicle'];
        $serviceEntry->vendor = Vendor::find($validatedData['vendor'])->name ?? '';
        $serviceEntry->completed_task = $validatedData['completed_task'] ?? [];
        $serviceEntry->serviced_on = $validatedData['serviced_on'];
        $serviceEntry->resolved_issues = $validatedData['resolved_issues'] ?? [];
        $serviceEntry->service_odometer = $validatedData['odometer'] ?? null;
        $serviceEntry->service_comment = $validatedData['service_comment'] ?? '';
        $serviceEntry->labour = $validatedData['labour'] ?? 0;
        $serviceEntry->parts = $validatedData['parts'] ?? 0;
        $serviceEntry->tax = $validatedData['tax'] ?? 0;

        $labour = $serviceEntry->labour;
        $parts = $serviceEntry->parts;
        $tax = $serviceEntry->tax;

        $subtotal = $labour + $parts;
        $total = $subtotal + ($subtotal * ($tax / 100));
        $serviceEntry->total = $total;

        $serviceEntry->invoice_number = $validatedData['invoice_number'] ?? '';

        if ($request->hasFile('filename')) {
            if ($serviceEntry->filename && Storage::exists('public/' . $serviceEntry->filename)) {
                Storage::delete('public/' . $serviceEntry->filename);
            }

            $fileName = $request->file('filename')->store('invoices', 'public');
            $serviceEntry->filename = $fileName;
        }

        $serviceEntry->save();

        return redirect()->back()->with('success', 'Service entry updated successfully!');
    }

    public function DeleteService($id)
    {
        $serviceEntry = Service_Entry::findOrFail($id);

        if ($serviceEntry->filename && Storage::exists('public/' . $serviceEntry->filename)) {
            Storage::delete('public/' . $serviceEntry->filename);
        }

        $serviceEntry->delete();

        return redirect()->back()->with('success', 'Service entry deleted successfully!');
    }


}