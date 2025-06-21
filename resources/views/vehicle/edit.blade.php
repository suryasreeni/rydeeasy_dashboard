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
                                <label for="vehicle_type">Type</label>
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
                                <label for="model">Model</label>
                                <input type="text" name="model" class="form-control" value="{{ $vehicle->model }}">
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
                                <label for="ownership">Ownership</label>
                                <select name="ownership" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Select</option>
                                    <option value="Owned" {{ $vehicle->ownership == 'Owned' ? 'selected' : '' }}>Owned
                                    </option>
                                    <option value="Leased" {{ $vehicle->ownership == 'Leased' ? 'selected' : '' }}>Leased
                                    </option>
                                    <option value="Rented" {{ $vehicle->ownership == 'Rented' ? 'selected' : '' }}>Rented
                                    </option>
                                </select>
                            </div>
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
                                    <option value="Service Vehicle" {{ $vehicle->group == 'Service Vehicle' ? 'selected' : '' }}>Service Vehicle
                                    </option>
                                    <option value="Replacement Vehicle" {{ $vehicle->group == 'Replacement Vehicle' ? 'selected' : '' }}>Replacement Vehicle
                                    </option>
                                    <option value="Demo/Test Drive" {{ $vehicle->group == 'Demo/Test Drive' ? 'selected' : '' }}>Demo/Test Drive
                                    </option>
                                    <option value="Customer Travel" {{ $vehicle->group == 'Customer Travel' ? 'selected' : '' }}>Customer Travel
                                    </option>
                                    <option value="Standby" {{ $vehicle->group == 'Standby' ? 'selected' : '' }}>Standby
                                    </option>
                                </select>
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

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="in_service_date">In-Service Date</label>
                                <input type="date" name="in_service_date" class="form-control"
                                    value="{{ $vehicle->in_service_date }}">
                            </div>
                            <div class="col-md-4">
                                <label for="in_service_odometer">In-Service Odometer</label>
                                <input type="text" name="in_service_odometer" class="form-control"
                                    value="{{ $vehicle->in_service_odometer }}">
                            </div>
                            <div class="col-md-4">
                                <label for="out_of_service_date">Out-of-Service Date</label>
                                <input type="date" name="out_of_service_date" class="form-control"
                                    value="{{ $vehicle->out_of_service_date }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="out_of_service_odometer">Out-of-Service Odometer</label>
                                <input type="text" name="out_of_service_odometer" class="form-control"
                                    value="{{ $vehicle->out_of_service_odometer }}">
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_vendor">Purchase Vendor</label>
                                <select name="purchase_vendor" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled>Select Vendor</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ $vehicle->purchase_vendor == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_date">Purchase Date</label>
                                <input type="date" name="purchase_date" class="form-control"
                                    value="{{ $vehicle->purchase_date }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="odometer">Odometer (mi)</label>
                                <input type="text" name="odometer" class="form-control" value="{{ $vehicle->odometer }}">
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_price">Purchase Price</label>
                                <input type="text" name="purchase_price" class="form-control"
                                    value="{{ $vehicle->purchase_price }}">
                            </div>
                            <div class="col-md-4">
                                <label for="purchase_type">Purchase Type</label>
                                <select name="purchase_type" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="loan" {{ $vehicle->purchase_type == 'loan' ? 'selected' : '' }}>Loan
                                    </option>
                                    <option value="lease" {{ $vehicle->purchase_type == 'lease' ? 'selected' : '' }}>Lease
                                    </option>
                                    <option value="none" {{ $vehicle->purchase_type == 'none' ? 'selected' : '' }}>None
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Loan Form -->
                        <div id="loan-form" class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <h5 class="form-title">Loan Details</h5>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="lender" style="font-size:12px;">Lender Name</label>
                                <select id="lender" name="lender" class="form-select"
                                    style="height:48px;border-radius:10px;color:black;font-size:13px;font-weight:500;">
                                    <option value="" disabled {{ !$vehicle->lender ? 'selected' : '' }}>Please select
                                    </option>
                                    @foreach ($contacts as $contact)
                                        <option value="{{ $contact->id }}" {{ $vehicle->lender == $contact->id ? 'selected' : '' }}>
                                            {{ $contact->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="date_of_loan">Date of Loan</label>
                                <input type="date" id="date_of_loan" name="date_of_loan" class="form-control"
                                    value="{{ $vehicle->date_of_loan }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="amount_of_loan">Amount of Loan</label>
                                <input type="text" id="amount_of_loan" name="amount_of_loan" class="form-control"
                                    value="{{ $vehicle->amount_of_loan }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="annual_percentage_rate">Annual Percentage Rate (APR)(%)</label>
                                <input type="text" id="annual_percentage_rate" name="annual_percentage_rate"
                                    class="form-control" value="{{ $vehicle->annual_percentage_rate }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="down_payment">Down Payment</label>
                                <input type="text" id="down_payment" name="down_payment" class="form-control"
                                    value="{{ $vehicle->down_payment }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="first_payment_date">First Payment Date</label>
                                <input type="date" id="first_payment_date" name="first_payment_date" class="form-control"
                                    value="{{ $vehicle->first_payment_date }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="monthly_payment">Monthly Payment</label>
                                <input type="text" id="monthly_payment" name="monthly_payment" class="form-control"
                                    value="{{ $vehicle->monthly_payment }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="number_of_payment">Number of Payments</label>
                                <input type="text" id="number_of_payment" name="number_of_payment" class="form-control"
                                    value="{{ $vehicle->number_of_payment }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="loan_end_date">Loan End Date</label>
                                <input type="date" id="loan_end_date" name="loan_end_date" class="form-control"
                                    value="{{ $vehicle->loan_end_date }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="account_number">Account Number</label>
                                <input type="text" id="account_number" name="account_number" class="form-control"
                                    value="{{ $vehicle->account_number }}">
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
    <style>
        #loan-form {
            display: none;
        }
    </style>

@endforeach