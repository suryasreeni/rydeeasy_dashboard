<!-- Edit Modal -->
<div class="modal fade" id="serviceEditModal{{ $service_entry->id }}" tabindex="-1"
    aria-labelledby="editModalLabel{{ $service_entry->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-xl rounded-3">
            <form action="{{ route('service.update', $service_entry->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title fw-semibold" id="editModalLabel{{ $service_entry->id }}">
                        <i class="bi bi-pencil-square me-2"></i>Edit Service - {{ $service_entry->service_vehicle }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="left">
                            <h5 class="mb-4">Basic Detsils</h5>
                        </div><br><br><br>
                        <div class="form-row">
                            <!-- vehicle name -->
                            <fieldset class="name">
                                <div class="body-title mb-10" for="vehicle{{ $service_entry->id }}">Vehicle</div>
                                <select name="service_vehicle" id="vehicle{{ $service_entry->id }}">
                                    <option value="" disabled selected>Please Select Vehicle</option>
                                    @foreach ($allvehicle as $vehicle)
                                    <option value="{{ $vehicle->vin }}"
                                        {{ $vehicle->vin == $service_entry->service_vehicle ? 'selected' : '' }}>
                                        {{ $vehicle->vin }}
                                    </option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <!-- vendor -->
                            <fieldset class="name">
                                <div class="body-title mb-10">Vendor</div>
                                <select name="vendor">
                                    <option value="" disabled selected>Please Select Vendor</option>
                                    @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ $vendor->name == $service_entry->vendor ? 'selected' : '' }}>
                                        {{ $vendor->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="form-row">
                            <!-- service task -->
                            <fieldset class="name">
                                <label class="body-title mb-10">Completed Services</label>

                                <div class="checkbox-dropdown">
                                    <div class="dropdown-btn" onclick="toggleDropdown()">Select Services</div>
                                    <div class="checkbox-list" id="checkboxDropdown">
                                        @php
                                        $selected_tasks = $service_entry->completed_task;
                                        @endphp
                                        @foreach ($servicetasks as $servicetask)
                                        <label>
                                            <input type="checkbox" name="completed_task[]"
                                                value="{{ $servicetask->service_task_name }}"
                                                {{ in_array($servicetask->service_task_name, $selected_tasks) ? 'checked' : '' }}>
                                            {{ $servicetask->service_task_name }}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            <!-- serviced on -->

                            <fieldset class="name">
                                <div class="body-title mb-10">Serviced On</div>
                                <input type="date" name="serviced_on" value="{{ $service_entry->serviced_on}}">
                            </fieldset>


                        </div>
                        <div class="form-row">

                            <fieldset class="email" id="resolvedIssueContainer">
                                <div class="body-title mb-10">Resolved Issues</div>

                                @php
                                $resolved_issues = is_array($service_entry->resolved_issues)
                                ? $service_entry->resolved_issues
                                : json_decode($service_entry->resolved_issues, true);
                                @endphp

                                @if (!empty($resolved_issues))
                                @foreach ($resolved_issues as $index => $issue)
                                <div class="resolved-group mb-2 d-flex align-items-center gap-2">
                                    <input type="text" name="resolved_issues[]" value="{{ $issue }}"
                                        placeholder="Enter Resolved Issue" class="form-control w-100" required>
                                    @if ($index == 0)
                                    <button type="button" onclick="addResolvedIssue()"
                                        class="btn btn-sm btn-outline-secondary" title="Add Issue">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                        onclick="removeResolvedIssue(this)" title="Remove">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                <div class="resolved-group mb-2 d-flex align-items-center gap-2">
                                    <input type="text" name="resolved_issues[]" placeholder="Enter Resolved Issue"
                                        class="form-control w-100" required>
                                    <button type="button" onclick="addResolvedIssue()"
                                        class="btn btn-sm btn-outline-secondary" title="Add Issue">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                @endif
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Odometer</div>
                                <input type="text" name="odometer" value="{{ $service_entry->service_odometer}}">
                            </fieldset>


                        </div>

                        <div class="form-row">
                            <fieldset class="name">
                                <div class="body-title mb-10">comment</div>
                                <input type="text" name="service_comment" value="{{ $service_entry->service_comment}}">
                            </fieldset>
                        </div><br>
                    </div><br><br><br>
                    <div class="row g-3">

                        <div class="left">
                            <h5 class="mb-4">Invoice Detsils</h5><br><br>
                        </div><br><br><br>
                        <div class="form-row">
                            <fieldset class="name">
                                <div class="body-title mb-10">Labour (₹)</div>
                                <input type="text" name="labour" id="labour" value="{{ $service_entry->labour}}"
                                    oninput="calculateTotal()">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Parts (₹)</div>
                                <input type="text" name="parts" id="parts" value="{{ $service_entry->parts}}"
                                    oninput="calculateTotal()">
                            </fieldset>
                        </div>
                        <div class="form-row">
                            <fieldset class="name">
                                <div class="body-title mb-10">Tax (%)</div>
                                <input type="text" name="tax" id="tax" value="{{ $service_entry->tax}}"
                                    oninput="calculateTotal()">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Total</div>
                                <input type="text" name="total" id="total" value="{{ $service_entry->total}}" readonly>
                            </fieldset>
                        </div>
                        <div class="form-row">
                            <fieldset class="name">
                                <div class="body-title mb-10">Invoice Number</div>
                                <input type="text" name="invoice_number" value="{{ $service_entry->invoice_number}}">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Invoice File</div>
                                <input type="file" class="form-control" name="invoice_file">
                                @if ($service_entry->filename)
                                <small class="d-block mt-1" style="font-size:15px;">
                                    <a href="{{ asset('storage/' . $service_entry->filename) }}" target="_blank">
                                        View existing file
                                    </a>
                                </small>
                                @endif
                            </fieldset>
                        </div>


                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding:10px;">
                        <i class="bi bi-x-circle me-1"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" style="padding:10px;">
                        <i class="bi bi-save me-1"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
.form-row {
    display: flex;
    gap: 20px;
    /* Adjust spacing between fields */
    align-items: center;
    /* Aligns elements vertically */
}

.form-row fieldset {
    border: none;
    /* Removes fieldset border */
    flex: 1;
    /* Ensures both fields take equal space */
    min-width: 200px;
    /* Prevents fields from becoming too small */
}

/* dropdown */
.select2-selection__placeholder {
    color: #999;
    font-style: italic;
}

.tf-button {
    background-color: hsl(25, 100.00%, 50.00%);
    border: none;
}

.checkbox-dropdown {
    position: relative;
    width: 100%;
}

.checkbox-dropdown .dropdown-btn {
    width: 100%;
    padding: 16px;
    border: 1px solid #ccc;
    cursor: pointer;
    background: #fff;
    text-align: left;
    border-radius: 8px;
    font-size: 14px;
}

.checkbox-dropdown .checkbox-list {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ccc;
    background: #fff;
    z-index: 1000;
    display: none;
    border-radius: 4px;
    font-size: 14px;

}

.checkbox-dropdown .checkbox-list label {
    display: block;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 14px;

}

.checkbox-dropdown .checkbox-list input[type="checkbox"] {
    margin-right: 8px;
}
</style>
<script>
function toggleDropdown() {
    var dropdown = document.getElementById("checkboxDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}

// Optional: Close dropdown if clicked outside
document.addEventListener("click", function(event) {
    var target = event.target;
    if (!target.closest(".checkbox-dropdown")) {
        document.getElementById("checkboxDropdown").style.display = "none";
    }
});
</script>
<script>
function addResolvedIssue() {
    const container = document.getElementById('resolvedIssueContainer');
    const newGroup = document.createElement('div');
    newGroup.className = 'resolved-group mb-2 d-flex align-items-center gap-2';
    newGroup.innerHTML = `
        <input type="text" name="resolved_issues[]" placeholder="Enter Resolved Issue"
            class="form-control w-100" required>
        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeResolvedIssue(this)" title="Remove">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(newGroup);
}

function removeResolvedIssue(button) {
    const group = button.closest('.resolved-group');
    if (group) group.remove();
}
</script>
<script>
function calculateTotal() {
    const labour = parseFloat(document.getElementById('labour').value) || 0;
    const parts = parseFloat(document.getElementById('parts').value) || 0;
    const tax = parseFloat(document.getElementById('tax').value) || 0;

    const subtotal = labour + parts;
    const taxAmount = (subtotal * tax) / 100;
    const total = subtotal + taxAmount;

    document.getElementById('total').value = total.toFixed(2);
}
</script>
<script>
function showFileName(input) {
    const fileName = input.files.length > 0 ? input.files[0].name : '';
    document.getElementById('file-name').textContent = fileName;
}
</script>