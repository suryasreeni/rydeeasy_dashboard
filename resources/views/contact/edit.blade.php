<div class="modal fade" id="editModal{{ $contact->id }}" tabindex="-1"
    aria-labelledby="editModalLabel{{ $contact->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            {{-- Modal Header --}}
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title">Edit Contact: {{ $contact->name }} {{ $contact->lastname }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <br><br>
            <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $contact->id }}">

                <div class="modal-body py-4 px-4">

                    {{-- Section: Basic Details --}}
                    <div class="mb-5">
                        <h6 class="text-primary fw-semibold  pb-2 mb-4">Basic Details</h6><br><br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label mb-4">First Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $contact->name) }}" required>
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Last Name</label>
                                <input type="text" name="lastname" class="form-control"
                                    value="{{ old('lastname', $contact->lastname) }}" required>
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $contact->email) }}" required>
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Group</label>
                                <select name="group" class="form-select" style="height:50px; border-radius:10px;">
                                    <option value="" disabled {{ $contact->group ? '' : 'selected' }}>Please Select
                                    </option>
                                    <option value="Operator" {{ $contact->group == 'Operator' ? 'selected' : '' }}>
                                        Operator</option>
                                    <option value="Employee" {{ $contact->group == 'Employee' ? 'selected' : '' }}>
                                        Employee</option>
                                    <option value="Technician" {{ $contact->group == 'Technician' ? 'selected' : '' }}>
                                        Technician</option>
                                    <option value="Driver" {{ $contact->group == 'Driver' ? 'selected' : '' }}>Driver
                                    </option>
                                    <option value="Customer" {{ $contact->group == 'Customer' ? 'selected' : '' }}>
                                        Customer</option>
                                    <option value="Fleet Manager"
                                        {{ $contact->group == 'Fleet Manager' ? 'selected' : '' }}>Fleet Manager
                                    </option>
                                    <option value="Mechanic" {{ $contact->group == 'Mechanic' ? 'selected' : '' }}>
                                        Mechanic</option>
                                    <option value="Vendor" {{ $contact->group == 'Vendor' ? 'selected' : '' }}>Vendor
                                    </option>
                                    <option value="Contractor" {{ $contact->group == 'Contractor' ? 'selected' : '' }}>
                                        Contractor</option>
                                    <option value="Administrator"
                                        {{ $contact->group == 'Administrator' ? 'selected' : '' }}>Administrator
                                    </option>
                                    <option value="Cleaner" {{ $contact->group == 'Cleaner' ? 'selected' : '' }}>Cleaner
                                    </option>
                                    <option value="Agent" {{ $contact->group == 'Agent' ? 'selected' : '' }}>Agent
                                    </option>
                                    <option value="Supervisor" {{ $contact->group == 'Supervisor' ? 'selected' : '' }}>
                                        Supervisor</option>
                                    <option value="Partner" {{ $contact->group == 'Partner' ? 'selected' : '' }}>Partner
                                    </option>
                                    <option value="Temporary Staff"
                                        {{ $contact->group == 'Temporary Staff' ? 'selected' : '' }}>Temporary Staff
                                    </option>
                                </select>
                            </div><br><br>


                            <div class="col-md-6">
                                <label class="form-label mb-4">Profile Image</label>
                                <div class="mb-2">
                                    <input type="file" name="filename" class="form-control"
                                        style="height:50px; border-radius:10px;">
                                    @error('filename')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($contact->filename)
                                <div class="border p-2 rounded bg-light d-inline-block">
                                    <small class="text-muted d-block mb-1">Current Image:</small>
                                    <img src="{{ asset('storage/' . $contact->filename) }}" alt="Profile Image"
                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
                                </div>
                                @endif
                            </div>


                        </div>
                    </div>

                    {{-- Section: Contact Information --}}
                    <div class="mb-5">
                        <h6 class="text-primary fw-semibold pb-2 mb-4">Contact Information</h6><br><br>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label mb-4">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control"
                                    value="{{ old('mobile', $contact->mobile) }}">
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Other Number</label>
                                <input type="text" name="other_mobile" class="form-control"
                                    value="{{ old('other_mobile', $contact->other_mobile) }}">
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Address 1</label>
                                <input type="text" name="address1" class="form-control"
                                    value="{{ old('address1', $contact->address1) }}">
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Address 2</label>
                                <input type="text" name="address2" class="form-control"
                                    value="{{ old('address2', $contact->address2) }}">
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">City</label>
                                <input type="text" name="city" class="form-control"
                                    value="{{ old('city', $contact->city) }}">
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">State</label>
                                <input type="text" name="state" class="form-control"
                                    value="{{ old('state', $contact->state) }}">
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Postal Code</label>
                                <input type="text" name="pincode" class="form-control"
                                    value="{{ old('pincode', $contact->pincode) }}">
                            </div><br><br>
                            <div class="col-md-6">
                                <label class="form-label mb-4">Country</label>
                                <input type="text" name="country" class="form-control"
                                    value="{{ old('country', $contact->country) }}">
                            </div><br><br>
                        </div>
                    </div><br><br><br>

                    {{-- Section: Personal Details --}}
                    <div>
                        <h6 class="text-primary fw-semibold pb-2 mb-4">Personal Details</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Job Title</label>
                                <input type="text" name="jobtitle" class="form-control"
                                    value="{{ old('jobtitle', $contact->jobtitle) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control"
                                    value="{{ old('dob', $contact->dob) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">License Number</label>
                                <input type="text" name="licensenum" class="form-control"
                                    value="{{ old('licensenum', $contact->licensenum) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">License State</label>
                                <input type="text" name="licensestate" class="form-control"
                                    value="{{ old('licensestate', $contact->licensestate) }}">
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Modal Footer --}}
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" class="btn btn-primary" style="padding: 13px; font-size: 15px;">Save
                        Changes</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        style="padding: 13px; font-size: 15px;">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>