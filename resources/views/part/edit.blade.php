@foreach ($parts as $edit)
<!-- Modal -->
<div class="modal fade" id="PartEditModal{{ $edit->id }}" tabindex="-1" aria-labelledby="PartEditLabel{{ $edit->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="w-100">
                    <h4 class="modal-title fw-bold" id="PartDetailLabel{{ $edit->id }}">Part Details</h4>
                    <p class="text-muted mb-0">{{ $edit->part_no }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body py-4 px-4">
                <form class="form-edit-user form-style-2" action="{{ route('part.update',$edit->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="wg-box">
                        <div class="right flex-grow">
                            <div class="row g-3">

                                <!-- Part Details -->
                                <div class="col-md-4">
                                    <label class="form-label">Part Number</label>
                                    <input type="text" name="part_no" value="{{ $edit->part_no }}" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Part Category</label>
                                    <select id="part_category" name="part_category">
                                        <option value="">Select</option>
                                        @foreach ($partcategories as $cat)
                                        <option value="{{ $cat->part_category_name }}"
                                            {{ $edit->part_category == $cat->part_category_name ? 'selected' : '' }}>
                                            {{ $cat->part_category_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Part Name</label>
                                    <input type="text" name="part_name" value="{{ $edit->part_name }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Type of Unit</label>
                                    <select id="measurement_unit" name="measurement_unit">
                                        @foreach ($measurements as $measure)
                                        <option value="{{ $measure->measurement_unit_name }}"
                                            {{ $edit->measurement_unit == $measure->measurement_unit_name ? 'selected' : '' }}>
                                            {{ $measure->measurement_unit_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Part Quantity</label>
                                    <input type="number" name="part_qty" id="part_qty" value="{{ $edit->part_qty }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Price Per Unit</label>
                                    <input type="number" name="price_per_unit" id="price_per_unit"
                                        value="{{ $edit->price_per_unit }}" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Total Price</label>
                                    <input type="number" name="total_price" id="total_price"
                                        value="{{ $edit->total_price }}" class="form-control" readonly>
                                </div>

                                <!-- Vendor Section -->
                                <div class="col-md-4">
                                    <label class="form-label">Vendor Type</label>
                                    <select name="vendor_type" id="vendor_type_{{ $edit->id }}"
                                        onchange="toggleVendorType('{{ $edit->id }}')">
                                        <option value="regular"
                                            {{ $edit->vendor_type === 'regular' ? 'selected' : '' }}>Regular</option>
                                        <option value="other" {{ $edit->vendor_type === 'other' ? 'selected' : '' }}>
                                            Other</option>
                                    </select>
                                </div>

                                <!-- Regular Vendor Dropdown -->
                                <div class="col-md-4 vendor_regular_{{ $edit->id }}" style="display: none;">
                                    <label class="form-label">Select Vendor</label>
                                    <select name="vendor_id" id="vendor_id_{{ $edit->id }}"
                                        onchange="populateVendorDetails('{{ $edit->id }}')">
                                        <option value="">-- Select Vendor --</option>
                                        @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" data-name="{{ $vendor->name }}"
                                            data-address="{{ $vendor->address1 }}"
                                            data-phone="{{ $vendor->contact_phone }}"
                                            {{ $edit->vendor_id == $vendor->id ? 'selected' : '' }}>
                                            {{ $vendor->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Other Vendor Fields -->
                                <div class="col-md-4 vendor_other_{{ $edit->id }}" style="display: none;">
                                    <label class="form-label">Other Vendor Name</label>
                                    <input type="text" class="form-control" name="vendor_name"
                                        value="{{ $edit->vendor_name }}">
                                </div>

                                <!-- Common Vendor Fields -->
                                <div class="col-md-4">
                                    <label class="form-label">Vendor Address</label>
                                    <input type="text" class="form-control" name="vendor_address"
                                        id="vendor_address_{{ $edit->id }}"
                                        value="{{ $edit->vendor_type == 'regular' ? ($edit->vendor->address1 ?? '') : $edit->vendor_address }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Vendor Phone</label>
                                    <input type="text" class="form-control" name="vendor_phone"
                                        id="vendor_phone_{{ $edit->id }}"
                                        value="{{ $edit->vendor_type == 'regular' ? ($edit->vendor->contact_phone ?? '') : $edit->vendor_phone }}">
                                </div>

                                <!-- Additional Part Info -->
                                <div class="col-md-4">
                                    <label class="form-label">Purchase Date</label>
                                    <input type="date" class="form-control" name="purchase_date"
                                        value="{{ $edit->purchase_date }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Part Color</label>
                                    <input type="text" class="form-control" name="part_color"
                                        value="{{ $edit->part_color }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Part Status</label>
                                    <select name="part_status">
                                        <option value="active" {{ $edit->part_status == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive"
                                            {{ $edit->part_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <!-- File Upload and Current Image -->
                                <div class="col-md-4">
                                    <label class="form-label">Part Photo</label>
                                    <input type="file" class="form-control" name="part_photo" style="height:45px;">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Current Part Photo</label><br>
                                    @if($edit->part_photo)
                                    <img src="{{ asset('storage/' . $edit->part_photo) }}" alt="Part Image"
                                        style="width: 200px; height: 200px;">
                                    @else
                                    <span class="text-muted">No image available</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <button class="btn btn-secondary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
function calculateTotal() {
    let qty = parseFloat(document.getElementById("part_qty").value) || 0;
    let unitPrice = parseFloat(document.getElementById("price_per_unit").value) || 0;
    document.getElementById("total_price").value = (qty * unitPrice).toFixed(2);
}

document.getElementById("part_qty").addEventListener("input", calculateTotal);
document.getElementById("price_per_unit").addEventListener("input", calculateTotal);
</script>



<script>
function toggleVendorType(id) {
    const type = document.getElementById('vendor_type_' + id).value;

    const regularDiv = document.querySelector('.vendor_regular_' + id);
    const otherDiv = document.querySelector('.vendor_other_' + id);

    if (type === 'regular') {
        regularDiv.style.display = 'block';
        otherDiv.style.display = 'none';
        populateVendorDetails(id); // auto-fill address/phone
    } else {
        regularDiv.style.display = 'none';
        otherDiv.style.display = 'block';
    }
}

function populateVendorDetails(id) {
    const select = document.getElementById('vendor_id_' + id);
    const selectedOption = select.options[select.selectedIndex];

    const addressInput = document.getElementById('vendor_address_' + id);
    const phoneInput = document.getElementById('vendor_phone_' + id);

    if (selectedOption) {
        addressInput.value = selectedOption.getAttribute('data-address') || '';
        phoneInput.value = selectedOption.getAttribute('data-phone') || '';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    @foreach($parts as $edit)
    toggleVendorType('{{ $edit->id }}');
    @endforeach
});
</script>
@endforeach