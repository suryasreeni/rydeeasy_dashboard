<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactController extends Controller
{
    public function Contact()
    {
        $contacts = ContactForm::all()->map(function ($contact) {
            $latestAssignment = Assignment::where('name', $contact->name)
                ->orderByDesc(DB::raw("STR_TO_DATE(CONCAT(end_date, ' ', end_time), '%Y-%m-%d %H:%i')"))
                ->first();

            $contact->assigned_status = $latestAssignment ? 'Assigned' : null;
            $contact->assigned_vin = $latestAssignment ? $latestAssignment->vin : null;

            return $contact;
        });

        return view('contact.contact', compact('contacts'));

    }
    public function AddContact()
    {
        return view('contact.addcontact');


    }

    public function PostContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'group' => 'required|string',
            'mobile' => 'required|string',
            'filename' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $contact = new ContactForm();
        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->group = $request->group;
        $contact->mobile = $request->mobile;
        $contact->other_mobile = $request->other_mobile;
        $contact->address1 = $request->address1;
        $contact->address2 = $request->address2;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->pincode = $request->pincode;
        $contact->country = $request->country;
        $contact->jobtitle = $request->jobtitle;
        $contact->dob = $request->dob;
        $contact->licensenum = $request->licensenum;
        $contact->licensestate = $request->licensestate;

        // Upload image (store in storage/app/public/contacts)
        if ($request->hasFile('filename')) {
            $contact->filename = $request->file('filename')->store('contacts', 'public');
        }

        $contact->save();

        return redirect()->route('contact.contact')->with('success', 'User created successfully!');
    }

    public function update(Request $request, $id)
    {
        $contact = ContactForm::findOrFail($id);

        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->group = $request->group;
        $contact->mobile = $request->mobile;
        $contact->other_mobile = $request->other_mobile;
        $contact->address1 = $request->address1;
        $contact->address2 = $request->address2;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->pincode = $request->pincode;
        $contact->country = $request->country;
        $contact->jobtitle = $request->jobtitle;
        $contact->dob = $request->dob;
        $contact->licensenum = $request->licensenum;
        $contact->licensestate = $request->licensestate;

        // Update image (delete old + store new)
        if ($request->hasFile('filename')) {
            if ($contact->filename && Storage::disk('public')->exists($contact->filename)) {
                Storage::disk('public')->delete($contact->filename);
            }
            $contact->filename = $request->file('filename')->store('contacts', 'public');
        }

        $contact->save();

        return back()->with('success', 'Contact updated successfully.');
    }

    public function showAjax($id)
    {
        $contact = ContactForm::findOrFail($id);
        return view('contact.profile-modal', compact('contact'));
    }
    public function getContactInfo($id)
    {
        $contact = ContactForm::findOrFail($id);

        return response()->json([
            'mobile' => $contact->mobile,
            'address' => $contact->address1,
            'license' => $contact->licensenum,
        ]);
    }


    public function destroy($id)
    {
        $contact = ContactForm::findOrFail($id);

        // Delete image from storage if exists
        if ($contact->filename && \Storage::disk('public')->exists($contact->filename)) {
            \Storage::disk('public')->delete($contact->filename);
        }

        $contact->delete();

        return redirect()->route('contact.contact')->with('success', 'Contact deleted successfully.');
    }

}