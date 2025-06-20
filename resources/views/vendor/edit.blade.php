<div class="modal fade" id="editVendorModal{{ $vendor->id }}" tabindex="-1"
    aria-labelledby="editVendorModalLabel{{ $vendor->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">

            <!-- Header -->
            <div class="modal-header" style="background-color: #ff6a00; color: white;">
                <h5 class="modal-title fw-bold" id="editVendorModalLabel{{ $vendor->id }}">
                    Edit Vendor - {{ $vendor->name }}
                </h5>
                <button type="button" class="btn-close btn-close-white fs-6" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Body -->
            <form action="{{ route('vendor.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="modal-body d-flex flex-column gap-4"
                    style="font-size: 16px; max-height: 70vh; overflow-y: auto;">

                    <!-- Details Section -->
                    <div class="wg-box p-4 border rounded">
                        <h5 class="mb-4 fw-semibold">Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $vendor->name }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $vendor->email }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" name="website" class="form-control" value="{{ $vendor->website }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address1" class="form-control" value="{{ $vendor->address1 }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address 2</label>
                                <input type="text" name="address2" class="form-control" value="{{ $vendor->address2 }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="{{ $vendor->city }}">
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" value="{{ $vendor->state }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Zip</label>
                                <input type="text" name="zip" class="form-control" value="{{ $vendor->zip }}">
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" class="form-control" value="{{ $vendor->country }}">
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="wg-box p-4 border rounded">
                        <h5 class="mb-4 fw-semibold">Contact Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Name</label>
                                <input type="text" name="Contactname" class="form-control"
                                    value="{{ $vendor->contact_name }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Email</label>
                                <input type="email" name="contactemail" class="form-control"
                                    value="{{ $vendor->contact_email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Phone</label>
                                <input type="text" name="ContactPhone" class="form-control"
                                    value="{{ $vendor->contact_phone }}">
                            </div>
                        </div>
                    </div>

                    <!-- Classification Section -->
                    <div class="wg-box p-4 border rounded">
                        <div class="classification-header">Classification</div>

                        <div class="classification-box">
                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" name="is_charging"
                                        id="charging{{ $vendor->id }}" value="1"
                                        {{ $vendor->is_charging ? 'checked' : '' }}>
                                    <label class="form-check-label" for="charging{{ $vendor->id }}">
                                        Charging
                                    </label>
                                </div>
                                <div class="form-check-description">
                                    Charging classification allows vendor to be listed on Charging Entries.
                                </div>
                            </div>

                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" name="is_tools"
                                        id="tools{{ $vendor->id }}" value="1" {{ $vendor->is_tools ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tools{{ $vendor->id }}">
                                        Tools
                                    </label>
                                </div>
                                <div class="form-check-description">
                                    Tools classification allows vendor to be listed on Tools.
                                </div>
                            </div>

                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" name="is_fuel"
                                        id="fuel{{ $vendor->id }}" value="1" {{ $vendor->is_fuel ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fuel{{ $vendor->id }}">
                                        Fuel
                                    </label>
                                </div>
                                <div class="form-check-description">
                                    Fuel classification allows vendor to be listed on Fuel Entries.
                                </div>
                            </div>

                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" name="is_service"
                                        id="service{{ $vendor->id }}" value="1"
                                        {{ $vendor->is_service ? 'checked' : '' }}>
                                    <label class="form-check-label" for="service{{ $vendor->id }}">
                                        Service
                                    </label>
                                </div>
                                <div class="form-check-description">
                                    Service classification allows vendor to be listed on Service Entries and Work
                                    Orders.
                                </div>
                            </div>

                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" name="is_vehicle"
                                        id="vehicle{{ $vendor->id }}" value="1"
                                        {{ $vendor->is_vehicle ? 'checked' : '' }}>
                                    <label class="form-check-label" for="vehicle{{ $vendor->id }}">
                                        Vehicle
                                    </label>
                                </div>
                                <div class="form-check-description">
                                    Vehicle classification allows vendor to be listed on Vehicle Acquisitions.
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Footer -->
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn"
                        style="background-color: #ff6a00; color: white;padding:10px;font-size:12px;">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
.modal-body {
    scroll-behavior: smooth;
}

.classification-box {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-check {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.form-check-input {
    margin-top: 0.2rem;
    margin-right: 0.6rem;
}

.form-check-input:checked {
    background-color: #ff6a00;
    border-color: #ff6a00;
}

.form-check-label {
    font-weight: 600;
    font-size: 16px;
}

.form-check-description {
    margin-left: 1.8rem;
    margin-top: 0.2rem;
    font-size: 14px;
    color: #6c757d;
}

.classification-header {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #333;
}

.wg-box.p-4 {
    background-color: #fff;
}
</style>