@foreach($vehicles as $vehicle)
    <div class="modal fade" id="editModal{{ $vehicle->id }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $vehicle->id }}" aria-hidden="true" style="padding:50px">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding:20px">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $vehicle->id }}">Edit Vehicle -
                        {{ $vehicle->vehicle_name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container py-3">
                        <h5 class="form-title">Basic Details</h5><br>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="vin">VIN/SN</label>
                                <input type="text" name="vin" class="form-control" value="{{ $vehicle->vin }}">
                            </div>
                            <div class="col-md-4">
                                <label for="vehicle_name">Vehicle Name</label>
                                <input type="text" name="vehicle_name" class="form-control"
                                    value="{{ $vehicle->vehicle_name }}">
                            </div>
                            <div class="col-md-4">
                                <label for="vehicle_type">Vehicle Type</label>
                                <select name="vehicle_type" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Please select</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->type_name }}" {{ $vehicle->vehicle_type == $type->type_name ? 'selected' : '' }}>
                                            {{ $type->type_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="fueltype">Fuel Type</label>
                                <select name="fueltype" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Please select</option>
                                    @foreach($fueltypes as $fuel)
                                        <option value="{{ $fuel->fuel_type }}" {{ $vehicle->fueltype == $fuel->fuel_type ? 'selected' : '' }}>
                                            {{ $fuel->fuel_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="year">Year</label>
                                <select name="year" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Select Year</option>
                                    @for($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}" {{ $vehicle->year == $year ? 'selected' : '' }}>{{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="status_id">Status</label>
                                <select name="status_id" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Select Status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $vehicle->status_id == $status->id ? 'selected' : '' }}>
                                            {{ $status->status_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label for="group">Group</label>
                                <select name="group" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Select</option>
                                    <option value="Rental" {{ $vehicle->group == 'Rental' ? 'selected' : '' }}>Rental
                                    </option>
                                    <option value="Employee Transport" {{ $vehicle->group == 'Employee Transport' ? 'selected' : '' }}>Employee Transport
                                    </option>
                                    <option value="Pickup & Delivery" {{ $vehicle->group == 'Pickup & Delivery' ? 'selected' : '' }}>Pickup & Delivery
                                    </option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="engine_no">Engine No</label>
                                <input type="text" name="engine_no" class="form-control" value="{{ $vehicle->engine_no }}">
                            </div>
                            <div class="col-md-4">
                                <label for="chassis_no">Chassis Number</label>
                                <input type="text" name="chassis_no" class="form-control"
                                    value="{{ $vehicle->chassis_no }}">
                            </div>

                        </div><br>


                        <h5 class="form-title">Advance Details</h5><br>

                        <div class="row mb-3">

                            <div class="col-md-3">
                                <label for="owner">Owner</label>
                                <select name="owner" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Select Owner</option>
                                    @foreach($contacts as $contact)
                                        <option value="{{ $contact->id }}" {{ $vehicle->owner == $contact->id ? 'selected' : '' }}>{{ $contact->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="location_name">Location</label>
                                <select name="location" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Select Vendor</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ $vehicle->location == $location->id ? 'selected' : '' }}>
                                            {{ $location->location_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="brand_id">Vehicle Brand</label>
                                <select id="brand_id" name="brand_id" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="">-- Select Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $vehicle->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="model_id">Vehicle Model</label>
                                <select id="model_id" name="model_id" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="">-- Select Model --</option>
                                </select>

                            </div>
                            <div class="col-md-4">
                                <label for="vehicle_tyre_size">Vehicle Tyre Size</label>
                                <input type="text" name="vehicle_tyre_size" class="form-control"
                                    value="{{ $vehicle->vehicle_tyre_size }}">
                            </div>
                            <div class="col-md-4">
                                <label for="vehicle_tons">Vehicle Tons</label>
                                <input type="text" name="vehicle_tons" class="form-control"
                                    value="{{ $vehicle->vehicle_tons }}">
                            </div>
                            <div class="col-md-4">
                                <label for="odometer_reading">Odometer Reading</label>
                                <input type="text" name="odometer_reading" class="form-control"
                                    value="{{ $vehicle->odometer_reading }}">
                            </div>


                        </div>


                        <!-- Loan Form -->
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <h5 class="form-title">Remainder Date</h5>
                            </div><br>

                            <div class="col-md-4 mb-3">
                                <label for="insurance_no">Insurance No</label>
                                <input type="text" id="insurance_no" name="insurance_no" class="form-control"
                                    value="{{ $vehicle->insurance_no }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="insurance_start_date">Insurance Start Date</label>
                                <input type="date" id="insurance_start_date" name="insurance_start_date"
                                    class="form-control" value="{{ $vehicle->insurance_start_date }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="insurance_end_date">Insurance End Date</label>
                                <input type="date" id="insurance_end_date" name="insurance_end_date" class="form-control"
                                    value="{{ $vehicle->insurance_end_date }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="roadtex_no">RoadTex No</label>
                                <input type="text" id="roadtex_no" name="roadtex_no" class="form-control"
                                    value="{{ $vehicle->roadtex_no }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="roadtex_last_date">RoadTex Last Date</label>
                                <input type="date" id="roadtex_last_date" name="roadtex_last_date" class="form-control"
                                    value="{{ $vehicle->roadtex_last_date }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="permit_no">Permit No</label>
                                <input type="text" id="permit_no" name="permit_no" class="form-control"
                                    value="{{ $vehicle->permit_no }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="permit_last_date">Permit Last Date</label>
                                <input type="date" id="permit_last_date" name="permit_last_date" class="form-control"
                                    value="{{ $vehicle->permit_last_date }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="puc_no">PUC No</label>
                                <input type="text" id="puc_no" name="puc_no" class="form-control"
                                    value="{{ $vehicle->puc_no }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="puc_last_date">PUC Last Date</label>
                                <input type="date" id="puc_last_date" name="puc_last_date" class="form-control"
                                    value="{{ $vehicle->puc_last_date }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="registration_no">Registration No</label>
                                <input type="text" id="registration_no" name="registration_no" class="form-control"
                                    value="{{ $vehicle->registration_no }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="registration_valid_from">Registration Valid From</label>
                                <input type="date" id="registration_valid_from" name="registration_valid_from"
                                    class="form-control" value="{{ $vehicle->registration_valid_from }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="registration_valid_to">Registration Valid To</label>
                                <input type="date" id="registration_valid_to" name="registration_valid_to"
                                    class="form-control" value="{{ $vehicle->registration_valid_to }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state_permit_start_date">State Permit Start</label>
                                <input type="date" id="state_permit_start_date" name="state_permit_start_date"
                                    class="form-control" value="{{ $vehicle->state_permit_start_date }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state_permit_end_date">State Permit End</label>
                                <input type="date" id="state_permit_end_date" name="state_permit_end_date"
                                    class="form-control" value="{{ $vehicle->state_permit_end_date }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="national_permit_start_date">National Permit Start Date</label>
                                <input type="date" id="national_permit_start_date" name="national_permit_start_date"
                                    class="form-control" value="{{ $vehicle->national_permit_start_date }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="national_permit_end_date">National Permit End Date</label>
                                <input type="date" id="national_permit_end_date" name="national_permit_end_date"
                                    class="form-control" value="{{ $vehicle->national_permit_end_date }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="fitness_certificate_start_date">Fitness Certificate Start Date</label>
                                <input type="date" id="fitness_certificate_start_date" name="fitness_certificate_start_date"
                                    class="form-control" value="{{ $vehicle->fitness_certificate_start_date }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="fitness_certificate_end_date">Fitness Certificate End Date</label>
                                <input type="date" id="fitness_certificate_end_date" name="fitness_certificate_end_date"
                                    class="form-control" value="{{ $vehicle->fitness_certificate_end_date }}">
                            </div>



                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <h5 class="form-title">Image</h5>
                            </div>

                            <div class="col-md-4">
                                <label for="vehicle_image">Vehicle Image</label><br>
                                @if($vehicle->vehicle_image)
                                    <img src="{{ asset('storage/' . $vehicle->vehicle_image) }}" alt="Vehicle Image"
                                        class="img-thumbnail mb-2" style="max-height: 100px;">
                                @endif
                                <input type="file" name="vehicle_image" class="form-control">
                            </div>
                        </div>

                        <!-- Submit buttons -->
                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleLoanForm() {
            const purchaseType = document.querySelector('select[name="purchase_type"]');
            const loanForm = document.getElementById("loan-form");
            if (purchaseType && loanForm) {
                loanForm.style.display = (purchaseType.value === "loan") ? "flex" : "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            toggleLoanForm(); // Run on page load
            const purchaseTypeSelect = document.querySelector('select[name="purchase_type"]');
            if (purchaseTypeSelect) {
                purchaseTypeSelect.addEventListener("change", toggleLoanForm);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const brandSelect = document.getElementById('brand_id');
            const modelSelect = document.getElementById('model_id');

            const currentBrandId = '{{ $vehicle->brand_id }}';
            const currentModelId = '{{ $vehicle->model_id }}';

            // Function to fetch and populate model list
            function loadModels(brandId, selectedModelId = null) {
                modelSelect.innerHTML = '<option value="">-- Select Model --</option>';

                if (brandId) {
                    fetch(`/vehicle/models/fetch?brand_id=${brandId}`)
                        .then(res => res.json())
                        .then(data => {
                            for (const id in data) {
                                const option = document.createElement('option');
                                option.value = id;
                                option.text = data[id];
                                if (selectedModelId && id == selectedModelId) {
                                    option.selected = true;
                                }
                                modelSelect.appendChild(option);
                            }
                        });
                }
            }

            // Auto-load model options on page load if editing
            if (currentBrandId) {
                loadModels(currentBrandId, currentModelId);
            }

            // Reload model list when brand changes
            brandSelect.addEventListener('change', function () {
                loadModels(this.value);
            });
        });
    </script>

    <style>
        #loan-form {
            display: none;
        }
    </style>

@endforeach