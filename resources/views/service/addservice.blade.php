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
            font-family: 'Poppins', sans-serif;
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
            background-color: hsl(25, 100.00%, 50.00%);
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            border: none;
        }

        .upload-btn:hover {
            background-color: rgb(223, 122, 33);
        }

        .upload-btn .icon {
            margin-right: 5px;
            font-size: 16px;
        }

        .body-title {
            font-weight: 500;
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
            padding: 18px;
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
</head>

<body class="body">
    <div id="wrapper">
        <div id="page">
            <div class="layout-wrap">

                @include('home.sidebar')
                <div class="section-content-right">
                    @include('home.header')
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>New Service Entry</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="text-tiny">Service Entry</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Add Service Entry</div>
                                        </li>
                                    </ul>
                                </div>
                                <form class="form-add-new-user form-style-2" action="{{ route('service.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- basic information -->
                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Service Details</h5>
                                            </div><br><br><br>
                                            <div class="form-row">
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Vehicle</div>
                                                    <select name="service_vehicle">
                                                        <option value="" disabled selected>--- select vehicle ---
                                                        </option>
                                                        @foreach ($allvehicle as $vehicle)
                                                            <option value="{{ $vehicle->vin }}">{{ $vehicle->vin }}</option>

                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Serviced On</div>
                                                    <input type="date" name="serviced_on" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                            </div><br>
                                            <div class="form-row">
                                                <fieldset class="email">
                                                    <div class="body-title mb-10">Odometer</div>
                                                    <input type="number" placeholder="Enter Odometer"
                                                        name="service_odometer" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <label class="body-title mb-2">Completed Services</label>

                                                    <div class="checkbox-dropdown">
                                                        <div class="dropdown-btn" onclick="toggleDropdown()">Select
                                                            Services</div>
                                                        <div class="checkbox-list" id="checkboxDropdown">
                                                            @foreach ($servicetasks as $servicetask)
                                                                <label>
                                                                    <input type="checkbox" name="completed_task[]"
                                                                        value="{{ $servicetask->service_task_name }}">
                                                                    {{ $servicetask->service_task_name }}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </fieldset>

                                            </div><br>
                                            <div class="form-row">
                                                <fieldset class="email" id="resolvedIssueContainer">
                                                    <div class="body-title mb-10">Resolved Issues</div>
                                                    <div class="resolved-group mb-2 d-flex align-items-center gap-2">
                                                        <input type="text" name="resolved_issues[]"
                                                            placeholder="Enter Resolved Issue"
                                                            class="form-control w-100" required>
                                                        <button type="button" onclick="addResolvedIssue()"
                                                            class="btn btn-sm btn-outline-secondary" title="Add Issue">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Vendor</div>
                                                    <select name="vendor">
                                                        <option value="" disabled selected>Please Select Vendor</option>
                                                        @foreach ($vendors as $vendor)
                                                            <option value="{{ $vendor->name }}">
                                                                {{ $vendor->name }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                            </div><br>

                                            <fieldset class="email">
                                                <div class="body-title mb-10">Comment</div>
                                                <input type="text" placeholder="Enter Comment" name="service_comment">
                                            </fieldset>


                                        </div>
                                    </div>

                                    <!-- contact information -->
                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Invoice Detsils</h5>
                                            </div><br><br><br>
                                            <div class="form-row">
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Labour (₹)</div>
                                                    <input type="number" step="0.01" name="labour" id="labour"
                                                        class="form-control" oninput="calculateTotal()">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Parts (₹)</div>
                                                    <input type="number" step="0.01" name="parts" id="parts"
                                                        class="form-control" oninput="calculateTotal()">
                                                </fieldset>
                                            </div><br>
                                            <div class="form-row">
                                                <fieldset class="email">
                                                    <div class="body-title mb-10">Tax (%)</div>
                                                    <input type="number" step="0.01" name="tax" id="tax"
                                                        class="form-control" oninput="calculateTotal()">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Total</div>
                                                    <input type="text" name="total" id="total" class="form-control"
                                                        readonly>
                                                </fieldset>
                                            </div><br>

                                            <div class="form-row">
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Invoice Number</div>
                                                    <input type="text" name="invoice_number" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                                <fieldset>
                                                    <div class="body-title">Upload Invoice <span
                                                            class="tf-color-1">*</span>
                                                    </div>

                                                    <div class="upload-image">
                                                        <label class="upload-btn" for="myFile">
                                                            <span class="icon">
                                                                <i class="icon-upload-cloud"></i>
                                                            </span>
                                                            Pick File
                                                        </label>
                                                        <input type="file" id="myFile" name="filename" hidden
                                                            onchange="showFileName(this)">
                                                        <p id="file-name" style="margin-top: 10px; color: #333;"></p>

                                                        {{-- Show validation error --}}
                                                        @error('filename')
                                                            <div style="color: red; margin-top: 5px;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </fieldset>
                                            </div><br>

                                        </div>
                                    </div>




                                    <div class="bot">
                                        <button class="tf-button w180" type="submit">Save</button>
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
        function toggleDropdown() {
            var dropdown = document.getElementById("checkboxDropdown");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }

        // Optional: Close dropdown if clicked outside
        document.addEventListener("click", function (event) {
            var target = event.target;
            if (!target.closest(".checkbox-dropdown")) {
                document.getElementById("checkboxDropdown").style.display = "none";
            }
        });
    </script>
    <script>
        function showFileName(input) {
            const fileName = input.files.length > 0 ? input.files[0].name : '';
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
    <script>
        function addResolvedIssue() {
            const container = document.getElementById('resolvedIssueContainer');
            const inputGroup = document.createElement('div');
            inputGroup.classList.add('resolved-group', 'mb-2', 'd-flex', 'align-items-center', 'gap-2');

            inputGroup.innerHTML = `
        <input type="text" name="resolved_issues[]" placeholder="Enter Resolved Issue" class="form-control w-100" required>
        <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.parentElement.remove()" title="Remove">
            <i class="fas fa-minus"></i>
        </button>
    `;

            container.insertBefore(inputGroup, container.querySelector('button').parentElement.nextSibling);
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

</body>

</html>