<style>
/* Basic form styling */
.section-group {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.section-title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    margin-bottom: 5px;
    font-weight: 500;
}

.form-control {
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.required {
    color: red;
}

.datetime-group {
    display: flex;
    gap: 10px;
    align-items: center;
}

.measurement-group {
    display: flex;
    gap: 10px;
}

.rent-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.rent-table th,
.rent-table td {
    padding: 8px;
    border: 1px solid #ddd;
    text-align: left;
}

.rent-table th {
    background-color: #f5f5f5;
}

.current-images {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 10px;
}

.image-item {
    position: relative;
}

.image-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.remove-image {
    position: absolute;
    bottom: 0;
    left: 0;
    background: rgba(255, 255, 255, 0.9);
    font-size: 12px;
    padding: 2px 4px;
}
</style>
@foreach($assignments as $assignment)
{{-- Edit Assignment Modal --}}
<div class="modal fade" id="editAssignmentModal{{ $assignment->id }}" tabindex="-1"
    aria-labelledby="editModalLabel{{ $assignment->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Assignment (VIN: {{ $assignment->vin }})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('assignment.update', $assignment->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Customer Information Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Customer Information</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="edit_contact_id_{{ $assignment->id }}">Select Customer</label>
                                <select class="form-control contact-select" data-assignment-id="{{ $assignment->id }}"
                                    id="edit_contact_id_{{ $assignment->id }}"
                                    style="height:48px;font-size:15px;font-weight:400;" name="contact_id">
                                    <option value="">Search and select a name</option>
                                    @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}"
                                        {{ $assignment->contact_id == $contact->id ? 'selected' : '' }}>
                                        {{ $contact->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_contact_{{ $assignment->id }}">Contact Number</label>
                                <input type="tel" id="edit_contact_{{ $assignment->id }}" class="form-control"
                                    value="{{ $assignment->contact }}" name="contact">
                            </div>

                            <div class="form-group">
                                <label for="edit_address_{{ $assignment->id }}">Address</label>
                                <input type="text" id="edit_address_{{ $assignment->id }}" class="form-control"
                                    value="{{ $assignment->address }}" name="address">
                            </div>

                            <div class="form-group">
                                <label for="edit_driving_license_{{ $assignment->id }}">Driving License</label>
                                <input type="text" id="edit_driving_license_{{ $assignment->id }}" class="form-control"
                                    value="{{ $assignment->driving_license }}" name="driving_license">
                            </div>
                        </div>
                    </div>

                    {{-- Booking Information Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Booking Details</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="edit_booking_details_{{ $assignment->id }}">Booking Details</label>
                                <input type="text" id="edit_booking_details_{{ $assignment->id }}"
                                    name="booking_details" class="form-control"
                                    value="{{ $assignment->booking_details }}">
                            </div>
                            <div class="form-group">
                                <label for="edit_reference_number_{{ $assignment->id }}">Reference Number</label>
                                <input type="text" id="edit_reference_number_{{ $assignment->id }}"
                                    name="reference_number" class="form-control"
                                    value="{{ $assignment->reference_number }}">
                            </div>
                            <div class="form-group">
                                <label for="edit_expected_return_{{ $assignment->id }}">Expected Return</label>
                                <input type="datetime-local" id="edit_expected_return_{{ $assignment->id }}"
                                    name="expected_return" class="form-control"
                                    value="{{ $assignment->expected_return ? date('Y-m-d\TH:i', strtotime($assignment->expected_return)) : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="edit_purpose_{{ $assignment->id }}">Purpose of Rental</label>
                                <input type="text" id="edit_purpose_{{ $assignment->id }}" name="purpose"
                                    class="form-control" value="{{ $assignment->purpose }}">
                            </div>
                        </div>
                    </div>

                    {{-- Vehicle Information Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Vehicle Information</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="edit_vin_{{ $assignment->id }}">Registration No. <span
                                        class="required">*</span></label>
                                <select id="edit_vin_{{ $assignment->id }}" class="form-control vin-select" name="vin"
                                    data-assignment-id="{{ $assignment->id }}" required>
                                    <option value="">Select Vehicle</option>
                                    @foreach ($vehicles as $vehicle)
                                    <option value="{{ $assignment->vin }}" data-model="{{ $vehicle->model }}"
                                        {{ $assignment->vin == $vehicle->vin ? 'selected' : '' }}>
                                        {{ $vehicle->vin }} — {{ $vehicle->status->status_name ?? 'N/A' }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="edit_status_{{ $assignment->id }}">Status</label>
                                <select id="edit_status_{{ $assignment->id }}" name="status" class="form-control"
                                    style="height:48px;font-size:15px;font-weight:400;">
                                    <option value="">Select Status</option>
                                    @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ $assignment->status == $status->id ? 'selected' : '' }}>
                                        {{ $status->status_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_model_{{ $assignment->id }}">Vehicle Model</label>
                                <input type="text" id="edit_model_{{ $assignment->id }}" name="model"
                                    class="form-control" value="{{ $assignment->model }}">

                            </div>
                            <div class="form-group">
                                <label for="edit_yard_{{ $assignment->id }}">Yard</label>
                                <select id="edit_yard_{{ $assignment->id }}" name="yard" class="form-control"
                                    style="height:48px;font-size:15px;font-weight:400;">
                                    <option value="">Select Yard</option>
                                    <option value="0" {{ $assignment->yard == 0 ? 'selected' : '' }}>Malappuram</option>
                                    <option value="1" {{ $assignment->yard == 1 ? 'selected' : '' }}>Kochi</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Rental Period Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Rental Period</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Start Date & Time <span class="required">*</span></label>
                                <div class="datetime-group">
                                    <input type="datetime" name="start_date" class="form-control"
                                        value="{{ $assignment->start_date }}" required>
                                    <div class="datetime-separator">at</div>
                                    <input type="time" name="start_time" class="form-control"
                                        value="{{ $assignment->start_time }}" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Vehicle Condition Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Vehicle Condition</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Start Odometer Reading (KM)</label>
                                <input type="number" name="start_km" class="form-control"
                                    value="{{ $assignment->start_km }}" placeholder="Enter KM reading">
                            </div>

                            <div class="form-group">
                                <label>Start Fuel Level</label>
                                <div class="measurement-group">
                                    <input type="number" name="start_fuel" class="form-control"
                                        value="{{ $assignment->start_fuel }}" placeholder="Amount" step="0.1">
                                    <select name="start_fuel_unit" class="form-control" style="font-size:15px;">
                                        <option value="L" {{ $assignment->start_fuel_unit == 'L' ? 'selected' : '' }}>
                                            Liters</option>
                                        <option value="Gallons"
                                            {{ $assignment->start_fuel_unit == 'Gallons' ? 'selected' : '' }}>Gallons
                                        </option>
                                        <option value="%" {{ $assignment->start_fuel_unit == '%' ? 'selected' : '' }}>
                                            Percentage</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Rent Details Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Rent Details</h2>
                        <table class="rent-table">
                            <thead>
                                <tr>
                                    <th style="width: 30%">Particulars</th>
                                    <th style="width: 35%">Given</th>
                                    <th style="width: 35%">Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Deposit</strong></td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="deposit_given" class="currency-input"
                                                value="{{ $assignment->deposit_given }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="deposit_final" class="currency-input"
                                                value="{{ $assignment->deposit_final }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Rent</strong></td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="rent_given" class="currency-input"
                                                value="{{ $assignment->rent_given }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="rent_final" class="currency-input"
                                                value="{{ $assignment->rent_final }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>GST</strong></td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="gst_given" class="currency-input"
                                                value="{{ $assignment->gst_given }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="gst_final" class="currency-input"
                                                value="{{ $assignment->gst_final }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>KM Charges</strong></td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="km_given" class="currency-input"
                                                value="{{ $assignment->km_given }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="km_final" class="currency-input"
                                                value="{{ $assignment->km_final }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Hour Charges</strong></td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="hour_given" class="currency-input"
                                                value="{{ $assignment->hour_given }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="hour_final" class="currency-input"
                                                value="{{ $assignment->hour_final }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Other Charges (if any)</strong></td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="other_given" class="currency-input"
                                                value="{{ $assignment->other_given }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="other_final" class="currency-input"
                                                value="{{ $assignment->other_final }}" placeholder="0.00" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="total-row">
                                    <td><strong>TOTAL</strong></td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="total_given" class="currency-input"
                                                value="{{ $assignment->total_given }}" placeholder="0.00" step="0.01"
                                                readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-with-currency">
                                            <input type="number" name="total_final" class="currency-input"
                                                value="{{ $assignment->total_final }}" placeholder="0.00" step="0.01"
                                                readonly>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Driver & Documents Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Driver Information & Documents</h2>

                        <div style="display: flex; gap: 20px; margin-bottom: 20px;">

                            <div style="flex: 0 0 550px;">
                                <label>Document Collected</label>
                                <div style="display: flex; gap: 16px; padding-top: 8px;">
                                    <label style="display: flex; align-items: center; cursor: pointer;">
                                        <input type="radio" name="document_collected" value="Yes"
                                            {{ $assignment->document_collected == 'Yes' ? 'checked' : '' }}
                                            style="margin-right: 6px;">
                                        Yes
                                    </label>
                                    <label style="display: flex; align-items: center; cursor: pointer;">
                                        <input type="radio" name="document_collected" value="No"
                                            {{ $assignment->document_collected == 'No' ? 'checked' : '' }}
                                            style="margin-right: 6px;">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; gap: 20px; align-items: flex-start;">
                            <div style="flex: 1;">
                                <label>Documents Collected</label>
                                <div style="display: flex; flex-wrap: wrap; gap: 12px; padding: 8px 0;">
                                    @php
                                    $selectedDocs = is_array($assignment->documents_collected)
                                    ? $assignment->documents_collected
                                    : json_decode($assignment->documents_collected, true) ?? [];
                                    @endphp
                                    <label style="display: flex; align-items: center; cursor: pointer;">
                                        <input type="checkbox" name="docs[]" value="Voter ID"
                                            {{ in_array('Voter ID', $selectedDocs) ? 'checked' : '' }}
                                            style="margin-right: 6px;">
                                        Voter ID
                                    </label>
                                    <label style="display: flex; align-items: center; cursor: pointer;">
                                        <input type="checkbox" name="docs[]" value="PAN"
                                            {{ in_array('PAN', $selectedDocs) ? 'checked' : '' }}
                                            style="margin-right: 6px;">
                                        PAN Card
                                    </label>
                                    <label style="display: flex; align-items: center; cursor: pointer;">
                                        <input type="checkbox" name="docs[]" value="Adhar Card"
                                            {{ in_array('Adhar Card', $selectedDocs) ? 'checked' : '' }}
                                            style="margin-right: 6px;">
                                        Aadhaar Card
                                    </label>
                                    <label style="display: flex; align-items: center; cursor: pointer;">
                                        <input type="checkbox" name="docs[]" value="Passport"
                                            {{ in_array('Passport', $selectedDocs) ? 'checked' : '' }}
                                            style="margin-right: 6px;">
                                        Passport
                                    </label>
                                </div>
                            </div>
                            <div style="flex: 1;">
                                <label for="edit_document_number_{{ $assignment->id }}">Document Number</label>
                                <input type="text" id="edit_document_number_{{ $assignment->id }}"
                                    name="document_number" class="form-control"
                                    value="{{ $assignment->document_number }}" placeholder="Enter document number">
                            </div>
                        </div>
                    </div>

                    {{-- Payment Details Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Payment Details</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="edit_cash_hand_{{ $assignment->id }}">Cash by Hand</label>
                                <div class="input-with-currency">
                                    <input type="number" class="form-control currency-input calc-input"
                                        id="edit_cash_hand_{{ $assignment->id }}" name="cash_hand"
                                        data-assignment-id="{{ $assignment->id }}" value="{{ $assignment->cash_hand }}"
                                        placeholder="0.00" step="0.01">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_cash_account_{{ $assignment->id }}">Cash by Account</label>
                                <div class="input-with-currency">
                                    <input type="number" class="form-control currency-input calc-input"
                                        id="edit_cash_account_{{ $assignment->id }}" name="cash_account"
                                        data-assignment-id="{{ $assignment->id }}"
                                        value="{{ $assignment->cash_account }}" placeholder="0.00" step="0.01">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_total_received_{{ $assignment->id }}">Total Received</label>
                                <div class="input-with-currency">
                                    <input type="number" class="form-control currency-input"
                                        id="edit_total_received_{{ $assignment->id }}" name="total_received"
                                        value="{{ $assignment->total_received }}" placeholder="0.00" step="0.01"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Account Details & Refund Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Account Details & Refund</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="edit_account_name_{{ $assignment->id }}">Account Name</label>
                                <input type="text" id="edit_account_name_{{ $assignment->id }}" name="account_name"
                                    class="form-control" value="{{ $assignment->account_name }}"
                                    placeholder="Account holder name">
                            </div>
                            <div class="form-group">
                                <label for="edit_account_number_{{ $assignment->id }}">Account Number</label>
                                <input type="text" id="edit_account_number_{{ $assignment->id }}" name="account_number"
                                    class="form-control" value="{{ $assignment->account_number }}"
                                    placeholder="Bank account number">
                            </div>
                            <div class="form-group">
                                <label for="edit_ifsc_code_{{ $assignment->id }}">IFSC Code</label>
                                <input type="text" id="edit_ifsc_code_{{ $assignment->id }}" name="ifsc_code"
                                    class="form-control" value="{{ $assignment->ifsc_code }}"
                                    placeholder="Bank IFSC code">
                            </div>

                        </div>
                    </div>

                    {{-- Documents Upload Section --}}
                    <div class="section-group">
                        <h2 class="section-title">Documents Upload</h2>

                        {{-- Existing Images --}}
                        @if(is_array($assignment->document_images) && count($assignment->document_images) > 0)
                        <div class="form-group">
                            <label>Current Documents</label>
                            <div class="current-images">
                                @foreach($assignment->document_images as $index => $image)
                                <div class="image-item">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Document">
                                    <label class="remove-image">
                                        <input type="checkbox" name="remove_images[]" value="{{ $index }}">
                                        Remove
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- New File Upload --}}
                        <div class="form-group">
                            <label>Upload New Documents</label>
                            <input type="file" name="document_images[]" multiple accept="image/*,.pdf,.doc,.docx"
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Assignment</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endforeach
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script>
$(document).ready(function() {
    // Re-initialize Select2 every time modal is shown
    $('.modal').on('shown.bs.modal', function() {
        $(this).find('.contact-select').select2({
            dropdownParent: $(this), // ensures dropdown shows above modal backdrop
            placeholder: 'Search and select a name',
            allowClear: true,
            width: 'resolve'
        });
    });

    // Handle select change event
    $(document).on('change', '.contact-select', function() {
        const contactId = $(this).val();
        const assignmentId = $(this).data('assignment-id');

        console.log("Selected contact:", contactId, "for assignment:", assignmentId);

        if (contactId) {
            $.ajax({
                url: '/get-contact-info/' + contactId,
                type: 'GET',
                success: function(data) {
                    console.log("AJAX Success:", data);
                    $('#edit_contact_' + assignmentId).val(data.mobile);
                    $('#edit_address_' + assignmentId).val(data.address);
                    $('#edit_driving_license_' + assignmentId).val(data.license);
                },
                error: function(xhr) {
                    console.error("AJAX Error:", xhr.responseText);
                }
            });
        } else {
            $('#edit_contact_' + assignmentId).val('');
            $('#edit_address_' + assignmentId).val('');
            $('#edit_driving_license_' + assignmentId).val('');
        }
    });
});
</script>

<script>
function calculateTotals() {
    // Get all the input names for both columns
    const givenFields = ['deposit_given', 'rent_given', 'gst_given', 'km_given', 'hour_given', 'other_given'];
    const finalFields = ['deposit_final', 'rent_final', 'gst_final', 'km_final', 'hour_final', 'other_final'];

    let totalGiven = 0;
    let totalFinal = 0;

    // Calculate total for "Given"
    givenFields.forEach(name => {
        const value = parseFloat(document.querySelector(`input[name="${name}"]`)?.value) || 0;
        totalGiven += value;
    });

    // Calculate total for "Final"
    finalFields.forEach(name => {
        const value = parseFloat(document.querySelector(`input[name="${name}"]`)?.value) || 0;
        totalFinal += value;
    });

    // Update the total fields
    document.querySelector('input[name="total_given"]').value = totalGiven.toFixed(2);
    document.querySelector('input[name="total_final"]').value = totalFinal.toFixed(2);
}

// Attach event listeners on page load
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.currency-input');
    inputs.forEach(input => {
        input.addEventListener('input', calculateTotals);
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Attach event to all .calc-input fields
    document.querySelectorAll('.calc-input').forEach(function(input) {
        input.addEventListener('input', function() {
            const assignmentId = this.dataset.assignmentId;

            const cashHandEl = document.getElementById('edit_cash_hand_' + assignmentId);
            const cashAccountEl = document.getElementById('edit_cash_account_' + assignmentId);
            const totalReceivedEl = document.getElementById('edit_total_received_' +
                assignmentId);

            const cashHand = parseFloat(cashHandEl?.value) || 0;
            const cashAccount = parseFloat(cashAccountEl?.value) || 0;
            const total = cashHand + cashAccount;

            totalReceivedEl.value = total.toFixed(2);
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.vin-select').forEach(function(select) {
        select.addEventListener('change', function() {
            const assignmentId = this.dataset.assignmentId;
            const selectedOption = this.options[this.selectedIndex];
            const model = selectedOption.getAttribute('data-model') || '';

            const modelInput = document.getElementById('edit_model_' + assignmentId);
            if (modelInput) {
                modelInput.value = model;
            }
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[type="datetime-local"], input[type="date"]').forEach(input => {
        const now = new Date();

        if (input.type === 'date') {
            input.min = now.toISOString().split('T')[0]; // YYYY-MM-DD
        } else if (input.type === 'datetime-local') {
            input.min = now.toISOString().slice(0, 16); // YYYY-MM-DDTHH:mm
        }
    });
});
</script>