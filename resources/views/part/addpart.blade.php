<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment History</title>
    <style>
        .wg-table {
            width: 100%;
        }

        .table-title,
        .product-item {
            display: flex;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .table-title {
            background: #f4f4f4;
            font-weight: bold;
        }

        .table-title li,
        .product-item div {
            flex: 1;
            text-align: center;
            padding: 5px;
            box-sizing: border-box;
        }

        .list-icon-function {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .list-icon-function .item i {
            cursor: pointer;
            padding: 5px;
        }

        /* Optional: Adjust widths if needed */
        .column-sno {
            flex: 0.5;
        }

        .column-name {
            flex: 1.5;
        }

        .column-action {
            flex: 1.2;
        }

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

        .upload-btn {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            border: none;
        }

        .upload-btn:hover {
            background-color: #0056b3;
        }

        .upload-btn .icon {
            margin-right: 5px;
            font-size: 16px;
        }

        .classifications-container {
            display: flex;
            flex-wrap: wrap;
            /* Allows wrapping to the next line if needed */
            gap: 2rem;
            /* Spacing between classification blocks */
            margin-bottom: 1rem;
        }

        /* Individual classification block */
        .classification-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            /* Small gap between label row and description */
            width: 25rem;
            /* Adjust the width as needed */
        }

        /* Row containing checkbox and label side by side */
        .classification-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 15px;
            color: black;
            font-weight: bold;
            /* Spacing between checkbox and label */
        }

        /* Description text */
        .classification-desc {
            margin-left: 1.5rem;
            /* Indent to line up under the label */
            font-size: 12px;
            /* Slightly smaller text */
            color: black;
            /* Gray text color */
        }

        .submit-btn {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;



        }

        .submit-btn:hover {
            background: #0056b3;
        }

        .upload-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .upload-btn {
            display: flex;
            align-items: center;
            padding: 8px 15px;
            background-color: #198754;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }

        .upload-btn:hover {
            background-color: #145c36;
        }

        .drop-area {
            border: 2px dashed #aaa;
            padding: 10px 15px;
            color: #555;
            border-radius: 5px;
            text-align: center;
            flex: 1;
        }

        .file-status {
            font-style: italic;
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>

<body class="body">
    <div id="wrapper">
        <div id="page">
            <div class="layout-wrap">
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                @include('home.sidebar')
                <div class="section-content-right">
                    @include('home.header')
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>
                                        Add
                                        Part



                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w150" href="{{url('/VehicleList')}}">
                                            </i>Cancel
                                        </a>
                                    </ul>
                                </div>

                                <!-- add-new-user -->
                                <form class="form-add-new-user form-style-2" action="{{ route('part.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- identification -->
                                    <div class="wg-box">



                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Details</h5>
                                            </div><br><br><br>
                                            <div class="row" style="display: flex;gap: 20px;">
                                                <fieldset class="col-md-4 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Part Number</div>
                                                    <input type="text" name="part_no" value="{{ $nextPartNo ?? '' }}"
                                                        readonly tabindex="0" aria-required="true">
                                                </fieldset>
                                                <fieldset class="col-md-4 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Part Category</div>
                                                    <select id="part_category" name="part_category">
                                                        <option value="">Please select Part Category</option>
                                                        @foreach ($partcategories as $part)
                                                            <option value="{{$part->part_category_name}}">
                                                                {{$part->part_category_name}}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                                <fieldset class=" col-md-4 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Part Name</div>
                                                    <input type="text" name="part_name" tabindex="0"
                                                        aria-required="true">

                                                </fieldset>


                                            </div>
                                            <div class="row" style="display: flex;gap: 20px;">

                                                <fieldset class="col-md-3 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Type of Unit</div>
                                                    <select id="measurement_unit" name="measurement_unit">
                                                        <option value=""> select Type of Unit</option>
                                                        @foreach ($measurements as $measure)
                                                            <option value="{{$measure->measurement_unit_name}}">
                                                                {{$measure->measurement_unit_name}}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                                <fieldset class="col-md-3 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Part Quantity</div>
                                                    <input type="number" name="part_qty" id="part_qty" tabindex="0"
                                                        aria-required="true">
                                                </fieldset>

                                                <fieldset class="col-md-3 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Price Per Unit</div>
                                                    <input type="number" name="price_per_unit" id="price_per_unit"
                                                        tabindex="0" aria-required="true">
                                                </fieldset>

                                                <fieldset class="col-md-3 email mb-24" style="flex: 1;width:50%;">
                                                    <div class="body-title mb-10">Total Price</div>
                                                    <input type="number" name="total_price" id="total_price"
                                                        tabindex="0" aria-required="true" readonly>
                                                </fieldset>


                                            </div>


                                            <fieldset class="col-md-4" style="width:100%;">
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Vendor Type</div>

                                                    <select id="vendor_type" name="vendor_type"
                                                        onchange="toggleVendorFields()">
                                                        <option value="">-- Select Type --</option>
                                                        <option value="regular">Regular Vendor</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <!-- Regular Vendor Dropdown -->
                                            <div class="row mb-3" id="regular_vendor_section"
                                                style="display: none;margin-top:50px;">
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Select Vendor</div>

                                                    <select id="regular_vendor_id" name="regular_vendor_id"
                                                        onchange="populateVendorDetails()">
                                                        <option value="">-- Select Vendor --</option>
                                                        @foreach($vendors as $vendor)
                                                            <option value="{{ $vendor->id }}"
                                                                data-shop="{{ $vendor->name }}"
                                                                data-address="{{ $vendor->address1 }}"
                                                                data-phone="{{ $vendor->contact_phone }}">
                                                                {{ $vendor->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Shop Name</div>

                                                    <input type="text" class="form-control" id="vendor_shop" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Address</div>

                                                    <input type="text" class="form-control" id="vendor_address"
                                                        readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Phone</div>

                                                    <input type="text" class="form-control" id="vendor_phone" readonly>
                                                </div>
                                            </div>

                                            <!-- Other Vendor Fields -->
                                            <div class="row mb-3" id="other_vendor_section"
                                                style="display: none;margin-top:50px;">
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Vendor Name</div>

                                                    <input type="text" class="form-control" name="other_vendor_name">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Address</div>

                                                    <input type="text" class="form-control" name="other_vendor_address">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="body-title mb-10">Phone</div>

                                                    <input type="text" class="form-control" name="other_vendor_phone">
                                                </div>
                                            </div>

                                            <div class="row" style="display: flex;gap: 20px;margin-top:30px;">


                                                <fieldset class=" col-md-3 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Purchase Date</div>
                                                    <input type="date" name="purchase_date" tabindex="0"
                                                        aria-required="true" min="{{ date('Y-m-d') }}">

                                                </fieldset>

                                                <fieldset class="col-md-3 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Part Color</div>
                                                    <input type="text" name="part_color" tabindex="0"
                                                        aria-required="true">


                                                </fieldset>
                                                <fieldset class="col-md-3 email mb-24" style="flex: 1;width:50%;">
                                                    <div class="body-title mb-10">Part Status</div>

                                                    <select name="part_status">
                                                        <option value="">Select Part Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>


                                                    </select>

                                                </fieldset>
                                                <fieldset class="col-md-4 email mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Part Photo</div>
                                                    <input type="file" name="part_photo" tabindex="0"
                                                        aria-required="true">
                                                </fieldset>

                                            </div>





                                        </div>

                                    </div>

                                    <div>
                                        <button class="submit-btn" type="button">Cancel</button>
                                        <button class="submit-btn" type="submit" style="float:end">Save</button>

                                    </div>

                                </form>
                                <!-- /add-new-user -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.bottomlinks')
    <script>
        function handleFileChange(inputId, statusId) {
            const input = document.getElementById(inputId);
            const status = document.getElementById(statusId);

            input.addEventListener('change', function () {
                if (input.files.length > 0) {
                    status.textContent = input.files[0].name;
                } else {
                    status.textContent = "No file selected";
                }
            });
        }

        handleFileChange("photoFile", "photoStatus");
        handleFileChange("documentFile", "documentStatus");
    </script>
    <script>
        function toggleVendorFields() {
            const type = document.getElementById("vendor_type").value;
            document.getElementById("regular_vendor_section").style.display = type === "regular" ? "flex" : "none";
            document.getElementById("other_vendor_section").style.display = type === "other" ? "flex" : "none";
        }

        function populateVendorDetails() {
            const select = document.getElementById("regular_vendor_id");
            const selected = select.options[select.selectedIndex];
            document.getElementById("vendor_shop").value = selected.dataset.shop || '';
            document.getElementById("vendor_address").value = selected.dataset.address || '';
            document.getElementById("vendor_phone").value = selected.dataset.phone || '';
        }

        document.getElementById("part_qty").addEventListener("input", calculateTotal);
        document.getElementById("price_per_unit").addEventListener("input", calculateTotal);

        function calculateTotal() {
            let qty = parseFloat(document.getElementById("part_qty").value) || 0;
            let unitPrice = parseFloat(document.getElementById("price_per_unit").value) || 0;
            document.getElementById("total_price").value = (qty * unitPrice).toFixed(2);
        }
    </script>



</body>

</html>