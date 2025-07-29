<?php

namespace App\Http\Controllers;
use App\Models\PartCategory;
use App\Models\MeasurementUnit;
use App\Models\Vendor;
use App\Models\Part;

use Illuminate\Support\Facades\DB;




use Illuminate\Http\Request;

class PartController extends Controller
{
    public function Part()
    {

        $partcategories = PartCategory::all();
        $measurements = MeasurementUnit::all();
        $vendors = Vendor::all();

        $parts = Part::with('vendor')->get();
        return view('part.part', [
            'parts' => $parts,
            'vendors' => Vendor::all(),
            'partcategories' => $partcategories,
            'measurements' => $measurements,
        ]);
    }
    public function AddPart()
    {

        $partcategories = PartCategory::all();
        $measurements = MeasurementUnit::all();
        $vendors = Vendor::all();
        $lastPart = DB::table('parts')
            ->where('part_no', 'like', 'PR%')
            ->orderByDesc('id') // or orderByDesc('part_no') if preferred
            ->first();

        $nextNumber = 1;
        if ($lastPart && preg_match('/PR(\d+)/', $lastPart->part_no, $matches)) {
            $nextNumber = (int) $matches[1] + 1;
        }

        $nextPartNo = 'PR' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);


        return view('part.addpart', compact('partcategories', 'measurements', 'vendors', 'nextPartNo'));
    }

    public function StorePart(Request $request)
    {
        $validated = $request->validate([
            'part_no' => 'required|string|max:255',
            'part_category' => 'required|string',
            'part_name' => 'required|string',
            'measurement_unit' => 'required|string',
            'part_qty' => 'required|numeric|min:0',
            'price_per_unit' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'vendor_type' => 'required|string|in:regular,other',
            'purchase_date' => 'required|date',
            'part_status' => 'required|string',
            'part_photo' => 'nullable|image|max:2048',
            'other_vendor_name' => 'nullable|string',
            'other_vendor_address' => 'nullable|string',
            'other_vendor_phone' => 'nullable|string',
            'regular_vendor_id' => 'nullable|exists:vendors,id',
        ]);

        $photoPath = null;
        if ($request->hasFile('part_photo')) {
            $photoPath = $request->file('part_photo')->store('part_photos', 'public');
        }

        $part = new Part();
        $part->part_no = $request->part_no;
        $part->part_category = $request->part_category;
        $part->part_name = $request->part_name;
        $part->measurement_unit = $request->measurement_unit;
        $part->part_qty = $request->part_qty;
        $part->price_per_unit = $request->price_per_unit;
        $part->total_price = $request->total_price;
        $part->vendor_type = $request->vendor_type;
        $part->vendor_id = $request->vendor_type === 'regular' ? $request->regular_vendor_id : null;
        $part->vendor_name = $request->vendor_type === 'other' ? $request->other_vendor_name : null;
        $part->vendor_address = $request->vendor_type === 'other' ? $request->other_vendor_address : null;
        $part->vendor_phone = $request->vendor_type === 'other' ? $request->other_vendor_phone : null;
        $part->purchase_date = $request->purchase_date;
        $part->part_color = $request->part_color;
        $part->part_status = $request->part_status;
        $part->part_photo = $photoPath;
        $part->save();

        return redirect()->route('part.list')->with('success', 'Part saved successfully!');
    }

    public function updatePart(Request $request, $id)
    {
        $validated = $request->validate([
            'part_no' => 'required|string|max:255',
            'part_category' => 'required|string',
            'part_name' => 'required|string',
            'measurement_unit' => 'required|string',
            'part_qty' => 'required|numeric|min:0',
            'price_per_unit' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'vendor_type' => 'required|string|in:regular,other',
            'purchase_date' => 'required|date',
            'part_status' => 'required|string',
            'part_photo' => 'nullable|image|max:2048',
            'vendor_name' => 'nullable|string',
            'vendor_address' => 'nullable|string',
            'vendor_phone' => 'nullable|string',
            'vendor_id' => 'nullable|exists:vendors,id',
        ]);

        $part = Part::findOrFail($id);

        // Handle photo upload if new one provided
        if ($request->hasFile('part_photo')) {
            // Optionally: delete old image
            if ($part->part_photo && \Storage::disk('public')->exists($part->part_photo)) {
                \Storage::disk('public')->delete($part->part_photo);
            }

            $part->part_photo = $request->file('part_photo')->store('part_photos', 'public');
        }

        $part->part_no = $request->part_no;
        $part->part_category = $request->part_category;
        $part->part_name = $request->part_name;
        $part->measurement_unit = $request->measurement_unit;
        $part->part_qty = $request->part_qty;
        $part->price_per_unit = $request->price_per_unit;
        $part->total_price = $request->total_price;
        $part->vendor_type = $request->vendor_type;

        if ($request->vendor_type === 'regular') {
            $part->vendor_id = $request->vendor_id;
            $part->vendor_name = null;
            $part->vendor_address = $request->vendor_address;
            $part->vendor_phone = $request->vendor_phone;
        } else {
            $part->vendor_id = null;
            $part->vendor_name = $request->vendor_name;
            $part->vendor_address = $request->vendor_address;
            $part->vendor_phone = $request->vendor_phone;
        }

        $part->purchase_date = $request->purchase_date;
        $part->part_color = $request->part_color;
        $part->part_status = $request->part_status;

        $part->save();

        return redirect()->route('part.list')->with('success', 'Part updated successfully!');
    }

    public function DeletePart($id)
    {
        $part = Part::findOrFail($id);

        $part->delete();

        return redirect()->route('part.list')->with('success', 'Part deleted successfully.');
    }


}