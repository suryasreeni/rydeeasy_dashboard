<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>vehicles list</title>
    <style>
        .table-scroll-container {
            overflow-x: auto;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        /* Main table style */
        .wg-table {
            width: 100%;
            min-width: 1400px;
            border-collapse: collapse;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
        }

        /* Table Headings */
        .wg-table thead {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .wg-table th {
            padding: 12px 15px;
            text-align: center;
            font-weight: 600;
            color: #343a40;
            font-size: 14px;
            white-space: nowrap;
        }

        /* Table Data - FIXED TEXT OVERFLOW */
        .wg-table td {
            padding: 10px 15px;
            text-align: center;
            font-size: 14px;
            color: #212529;
            /* REMOVED: white-space: nowrap; */
            border-bottom: 1px solid #dee2e6;
            word-wrap: break-word;
            word-break: break-word;
            vertical-align: top;
        }

        /* Hover row effect */
        .wg-table tbody tr:hover {
            background-color: #f1f3f5;
            transition: background 0.2s ease-in-out;
        }

        /* Links (e.g., View/Edit/Delete) */
        .wg-table a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .wg-table a:hover {
            text-decoration: underline;
        }

        /* Muted text for empty photo field */
        .text-muted {
            color: #6c757d;
            font-style: italic;
        }

        /* Fixed column widths */
        .wg-table th:nth-child(1),
        .wg-table td:nth-child(1) {
            width: 120px;
        }

        /* Fueling Date */
        .wg-table th:nth-child(2),
        .wg-table td:nth-child(2) {
            width: 140px;
        }

        /* VIN */
        .wg-table th:nth-child(3),
        .wg-table td:nth-child(3) {
            width: 160px;
        }

        /* Vehicle Name */
        .wg-table th:nth-child(4),
        .wg-table td:nth-child(4) {
            width: 110px;
        }

        /* Fuel Type */
        .wg-table th:nth-child(5),
        .wg-table td:nth-child(5) {
            width: 160px;
        }

        /* Fuel Station */
        .wg-table th:nth-child(6),
        .wg-table td:nth-child(6) {
            width: 120px;
        }

        /* Price/Unit */
        .wg-table th:nth-child(7),
        .wg-table td:nth-child(7) {
            width: 100px;
        }

        /* Qty */
        .wg-table th:nth-child(8),
        .wg-table td:nth-child(8) {
            width: 130px;
        }

        /* Total */
        .wg-table th:nth-child(9),
        .wg-table td:nth-child(9) {
            width: 130px;
        }

        /* Odometer */
        .wg-table th:nth-child(10),
        .wg-table td:nth-child(10) {
            width: 150px;
        }

        /* Invoice No */
        .wg-table th:nth-child(11),
        .wg-table td:nth-child(11) {
            width: 150px;
        }

        /* Photo */
        .wg-table th:nth-child(12),
        .wg-table td:nth-child(12) {
            width: 180px;
        }

        /* Action */



        .body-text {
            font-size: 15px;
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 350px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: rgba(128, 128, 128, 0.2);
            border: none;
            cursor: pointer;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 15px;
            color: black;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 300px;
            box-shadow: 0px 4px 6px rgba(31, 23, 35, 0.5);
            z-index: 1;
        }

        .dropdown-content a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: black;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
            color: #333;
            text-decoration: none;
            transition: 0.3s;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .search-button {
            padding: 10px 10px;
            margin-left: 5px;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
        }

        .search-button i {
            font-size: 16px;
        }

        .form-search {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            max-width: 300px;
        }

        .custom-search-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .custom-search-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .custom-search-input:focus {
            border-color: #80bfff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .custom-button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .custom-cancel-button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 14px;
        }

        .custom-apply-button {
            background: #d9d9d9;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            cursor: not-allowed;
            color: #666;
        }

        .custom-apply-button.active {
            background: #007bff;
            color: white;
            cursor: pointer;
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
                                        Fuel History
                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">
                                        <a class="tf-button style-1 w208" href="{{url('/AddFuelHistory')}}">
                                            <i class="icon-plus"></i>
                                            Add Fuel History
                                        </a>
                                    </ul>
                                </div>
                                <!-- contents -->
                                <div class="container mt-4">

                                    <!-- Tab Content -->
                                    <div class="tab-content mt-3" id="myTabContent">

                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <!-- Vehicle Table -->

                                            <div class="wg-box" id="vehicle-table">
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                <div class="filter-container">
                                                    <input type="text" placeholder="Search" class="search-input"
                                                        id="searchInput">
                                                    <button onclick="filterTable()" class="search-button">
                                                        <i class="fa fa-search"></i>
                                                    </button>

                                                    <div class="dropdown">
                                                        <button class="dropbtn">Date ▼</button>
                                                        <div class="dropdown-content">
                                                            <form class="form-search">
                                                                <div class="custom-search-container">
                                                                    <input type="text" placeholder="Search Contact"
                                                                        class="custom-search-input"
                                                                        id="contactSearchInput">
                                                                    <div class="custom-button-group">
                                                                        <button type="button"
                                                                            class="custom-cancel-button"
                                                                            onclick="clearContactSearch()">Cancel</button>
                                                                        <button type="submit"
                                                                            class="custom-apply-button"
                                                                            id="contactApplyButton"
                                                                            disabled>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="dropdown">
                                                        <button class="dropbtn">Vehicle ▼</button>
                                                        <div class="dropdown-content">
                                                            <form class="form-search">
                                                                <div class="custom-search-container">
                                                                    <input type="text" placeholder="Search text"
                                                                        class="custom-search-input"
                                                                        id="customSearchInput">
                                                                    <div class="custom-button-group">
                                                                        <button type="button"
                                                                            class="custom-cancel-button"
                                                                            onclick="clearCustomSearch()">Cancel</button>
                                                                        <button type="submit"
                                                                            class="custom-apply-button"
                                                                            id="customApplyButton"
                                                                            disabled>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Table with horizontal scroll -->
                                                <div class="table-scroll-container">
                                                    <table class="wg-table table-product-list">
                                                        <thead>
                                                            <tr>
                                                                <th>Fueling Date</th>
                                                                <th>VIN</th>
                                                                <th>Vehicle Name</th>
                                                                <th>Fuel Type</th>
                                                                <th>Fuel Station</th>
                                                                <th>Price Per Unit</th>
                                                                <th>Qty</th>
                                                                <th>Total Amount</th>
                                                                <th>Odometer</th>
                                                                <th>Invoice No/Bill No</th>
                                                                <th>Invoice/Bill Photo</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($fuel_entry as $fuel)
                                                                <tr>
                                                                    <td>{{ $fuel->fuel_entry_date }}</td>
                                                                    <td>{{ $fuel->fuel_vehicle }}</td>
                                                                    <td>{{ $fuel->fuel_vehicle_name }}</td>
                                                                    <td>{{ $fuel->fuel_type }}</td>
                                                                    <td>{{ $fuel->fuel_station }}</td>
                                                                    <td>{{ $fuel->per_ltr_price }}</td>
                                                                    <td>{{ $fuel->qty_in_ltr }}</td>
                                                                    <td>{{ $fuel->total_amount }}</td>
                                                                    <td>{{ $fuel->fuel_odometer }}</td>
                                                                    <td>{{ $fuel->invoice_number }}</td>
                                                                    <td>
                                                                        @if ($fuel->invoice_photo)
                                                                            <a href="{{ asset('storage/' . $fuel->invoice_photo) }}"
                                                                                target="_blank">View</a>
                                                                        @else
                                                                            <span class="text-muted">No file</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <!-- Example actions -->
                                                                        <!-- Trigger Update Modal -->
                                                                        <button class="btn btn-lg btn-warning"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editFuelModal{{ $fuel->id }}">Edit</button>


                                                                        <form
                                                                            action="{{ route('fuelhistory.destroy', $fuel->id) }}"
                                                                            method="POST" style="display:inline-block;"
                                                                            onsubmit="return confirm('Are you sure?');">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-lg btn-danger">Delete</button>
                                                                        </form>
                                                                    </td>
                                                                    <!-- Update Modal -->
                                                                    <!-- Edit Modal -->


                                                                </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                @foreach ($fuel_entry as $fuel)
                                                    <div class="modal fade" id="editFuelModal{{ $fuel->id }}" tabindex="-1"
                                                        aria-labelledby="editFuelModalLabel{{ $fuel->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <form method="POST"
                                                                    action="{{ route('update.fuelhistory', $fuel->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editFuelModalLabel{{ $fuel->id }}">Edit Fuel
                                                                            Entry</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row g-3">
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Fuel Entry
                                                                                    Date</label>
                                                                                <input type="date" class="form-control"
                                                                                    name="fuel_entry_date"
                                                                                    value="{{ $fuel->fuel_entry_date }}">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Vehicle
                                                                                    VIN</label>
                                                                                <select class="form-select"
                                                                                    name="fuel_vehicle"
                                                                                    id="fuel_vehicle_{{ $fuel->id }}"
                                                                                    onchange="updateFuelFields(this, {{ $fuel->id }})">
                                                                                    @foreach ($vehicles as $vehicle)
                                                                                        <option value="{{ $vehicle->vin }}"
                                                                                            data-name="{{ $vehicle->vehicle_name }}"
                                                                                            data-fuel="{{ $vehicle->fueltype }}"
                                                                                            @if(
                                                                                                $vehicle->vin ===
                                                                                                $fuel->fuel_vehicle
                                                                                            ) selected @endif>
                                                                                            {{ $vehicle->vin }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Vehicle
                                                                                    Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="fuel_vehicle_name"
                                                                                    id="fuel_vehicle_name_{{ $fuel->id }}"
                                                                                    value="{{ $fuel->fuel_vehicle_name }}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Fuel Type</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="fuel_type"
                                                                                    id="fuel_type_{{ $fuel->id }}"
                                                                                    value="{{ $fuel->fuel_type }}" readonly>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Fuel
                                                                                    Station</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="fuel_station"
                                                                                    value="{{ $fuel->fuel_station }}">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Per Liter
                                                                                    Price</label>
                                                                                <input type="number" class="form-control"
                                                                                    step="0.01" name="per_ltr_price"
                                                                                    id="price_{{ $fuel->id }}"
                                                                                    value="{{ $fuel->per_ltr_price }}"
                                                                                    oninput="calculateTotal({{ $fuel->id }})">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Quantity in
                                                                                    Ltr</label>
                                                                                <input type="number" class="form-control"
                                                                                    step="0.01" name="qty_in_ltr"
                                                                                    id="qty_{{ $fuel->id }}"
                                                                                    value="{{ $fuel->qty_in_ltr }}"
                                                                                    oninput="calculateTotal({{ $fuel->id }})">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Total
                                                                                    Amount</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="total_amount"
                                                                                    id="total_{{ $fuel->id }}"
                                                                                    value="{{ $fuel->total_amount }}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Odometer</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="fuel_odometer"
                                                                                    value="{{ $fuel->fuel_odometer }}">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Invoice
                                                                                    Number</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="invoice_number"
                                                                                    value="{{ $fuel->invoice_number }}">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Invoice Photo
                                                                                    (Optional)</label>
                                                                                <input type="file" class="form-control"
                                                                                    name="invoice_photo">

                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="form-label">Current
                                                                                    Photo</label><br><br>


                                                                                @if($fuel->invoice_photo)
                                                                                    <a href="{{ asset('storage/' . $fuel->invoice_photo) }}"
                                                                                        target="_blank"
                                                                                        style="font-size:15px;padding:10px;background-color:orange;">View</a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Update
                                                                            Fuel</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="divider"></div>
                                            </div>
                                            <!-- end of vehiclelist -->
                                        </div>
                                    </div>
                                </div>
                                <!-- contents end -->

                            </div>
                            <!--main-content-wrap -->
                        </div>
                        <!--main-content-inner -->
                    </div>
                    <!--main-content -->
                </div>
            </div>
        </div>

        @include('home.bottomlinks')

        <!-- filtering -->
        <script>
            function setupSearch(inputId, buttonId, clearFunction) {
                const searchInput = document.getElementById(inputId);
                const applyButton = document.getElementById(buttonId);

                searchInput.addEventListener("input", () => {
                    if (searchInput.value.trim() !== "") {
                        applyButton.classList.add("active");
                        applyButton.removeAttribute("disabled");
                    } else {
                        applyButton.classList.remove("active");
                        applyButton.setAttribute("disabled", "true");
                    }
                });

                window[clearFunction] = function () {
                    searchInput.value = "";
                    applyButton.classList.remove("active");
                    applyButton.setAttribute("disabled", "true");
                };
            }

            setupSearch("customSearchInput", "customApplyButton", "clearCustomSearch");
            setupSearch("contactSearchInput", "contactApplyButton", "clearContactSearch");

            // Add filter table functionality
            function filterTable() {
                const searchInput = document.getElementById("searchInput");
                const filter = searchInput.value.toUpperCase();
                const table = document.querySelector(".wg-table");
                const rows = table.getElementsByTagName("tr");

                for (let i = 1; i < rows.length; i++) {
                    let row = rows[i];
                    let shouldShow = false;
                    let cells = row.getElementsByTagName("td");

                    for (let j = 0; j < cells.length; j++) {
                        let cell = cells[j];
                        if (cell && cell.textContent.toUpperCase().indexOf(filter) > -1) {
                            shouldShow = true;
                            break;
                        }
                    }

                    row.style.display = shouldShow ? "" : "none";
                }
            }

            // Add enter key support for search
            document.getElementById("searchInput").addEventListener("keypress", function (event) {
                if (event.key === "Enter") {
                    filterTable();
                }
            });
        </script>

        <script>
            function updateFuelFields(selectElement, fuelId) {
                const selectedOption = selectElement.options[selectElement.selectedIndex];
                const vehicleName = selectedOption.getAttribute('data-name');
                const fuelType = selectedOption.getAttribute('data-fuel');

                document.getElementById(`fuel_vehicle_name_${fuelId}`).value = vehicleName || '';
                document.getElementById(`fuel_type_${fuelId}`).value = fuelType || '';
            }

            function calculateTotal(fuelId) {
                const price = parseFloat(document.getElementById(`price_${fuelId}`).value) || 0;
                const qty = parseFloat(document.getElementById(`qty_${fuelId}`).value) || 0;
                const total = price * qty;

                document.getElementById(`total_${fuelId}`).value = total.toFixed(2);
            }
        </script>

        <!-- filter -->
</body>

</html>