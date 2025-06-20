<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function Vendor()
    {

        $vendors = Vendor::all();
        return view('vendor.vendor', compact('vendors'));
    }
    public function AddVendor()
    {
        return view('vendor.addvendor');
    }

    public function postVendor(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address1' => 'required|string',
            'city' => 'required|string',
            'contactemail' => 'required|email',
            'Contactname' => 'required|string',
        ]);

        $data = $request->all();

        // Save checkbox states properly
        $data['is_charging'] = $request->has('is_charging') ? 1 : 0;
        $data['is_tools'] = $request->has('is_tools') ? 1 : 0;
        $data['is_fuel'] = $request->has('is_fuel') ? 1 : 0;
        $data['is_service'] = $request->has('is_service') ? 1 : 0;
        $data['is_vehicle'] = $request->has('is_vehicle') ? 1 : 0;

        Vendor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'website' => $data['website'] ?? null,
            'address1' => $data['address1'],
            'address2' => $data['address2'] ?? null,
            'city' => $data['city'],
            'state' => $data['state'] ?? null,
            'zip' => $data['zip'] ?? null,
            'country' => $data['country'] ?? null,

            'contact_name' => $data['Contactname'],
            'contact_email' => $data['contactemail'],
            'contact_phone' => $data['ContactPhone'] ?? null,

            'is_charging' => $data['is_charging'],
            'is_tools' => $data['is_tools'],
            'is_fuel' => $data['is_fuel'],
            'is_service' => $data['is_service'],
            'is_vehicle' => $data['is_vehicle'],
        ]);

        return redirect()->route('vendor.vendor')->with('success', 'Vendor added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|string|max:255',
            'address1' => 'nullable|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'Contactname' => 'nullable|string|max:255',
            'contactemail' => 'nullable|email',
            'ContactPhone' => 'nullable|string|max:20',
        ]);

        $vendor = Vendor::findOrFail($id);

        $vendor->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'Contactname' => $request->Contactname,
            'contactemail' => $request->contactemail,
            'ContactPhone' => $request->ContactPhone,

            // Checkboxes: default to 0 if not present in request
            'is_charging' => $request->has('is_charging') ? 1 : 0,
            'is_tools' => $request->has('is_tools') ? 1 : 0,
            'is_fuel' => $request->has('is_fuel') ? 1 : 0,
            'is_service' => $request->has('is_service') ? 1 : 0,
            'is_vehicle' => $request->has('is_vehicle') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Vendor updated successfully!');
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        return redirect()->back()->with('success', 'Vendor deleted successfully!');
    }



}