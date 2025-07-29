<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment History</title>

    <!-- Leaflet CSS for Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

    <style>
        /* Upload & Submit Buttons */
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

        .tooltip-icon {
            cursor: pointer;
            margin-left: 5px;
            font-size: 14px;
            color: #555;
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 2px 6px;
            display: inline-block;
            font-weight: 400;
            position: relative;
        }

        .tooltip {
            position: absolute;
            background: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            bottom: 120%;
            left: 10%;
            transform: translateX(-50%);
            max-width: 200px;
            white-space: normal;
            word-wrap: break-word;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            z-index: 100;
        }

        .tooltip-icon:hover+.tooltip {
            visibility: visible;
            opacity: 1;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
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
                    <div class="preloading"><span></span></div>
                </div>

                @include('home.sidebar')
                <div class="section-content-right">
                    @include('home.header')
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Fuel History</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">
                                        <a class="tf-button style-1 w150" href="">Cancel</a>
                                    </ul>
                                </div>

                                <!-- Add New Place Form -->
                                <form class="form-add-new-user form-style-2" action="{{ route('store.fuelhistory') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <h5 class="mb-4">Details</h5><br><br><br>

                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Fuel Entry Date</div>
                                                    <input type="date" id="fuel_entry_date" name="fuel_entry_date"
                                                        min="{{ date('Y-m-d') }}">

                                                </fieldset>
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Select Vehicle</div>
                                                    <select id="fuel_vehicle" name="fuel_vehicle">
                                                        <option value="">Select Vehicle</option>
                                                        @foreach ($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->vin }}"
                                                                data-vehicle_name="{{ $vehicle->vehicle_name }}"
                                                                data-fuel_type="{{ $vehicle->fueltype }}">
                                                                {{ $vehicle->vin }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Vehicle name</div>
                                                    <input type="text" id="fuel_vehicle_name" name="fuel_vehicle_name"
                                                        readonly>
                                                </fieldset>

                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Fuel Type</div>
                                                    <input type="text" id="fuel_type" name="fuel_type" readonly>
                                                </fieldset>


                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Fuel Station</div>
                                                    <input type="text" id="fuel_station" name="fuel_station">
                                                </fieldset>
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Per Liter Price</div>
                                                    <input type="number" id="per_ltr_price" name="per_ltr_price"
                                                        step="0.01" min="0">
                                                </fieldset>

                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Qty in Ltr</div>
                                                    <input type="number" id="qty_in_ltr" name="qty_in_ltr" min="0">
                                                </fieldset>
                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Total Amount</div>
                                                    <input type="number" id="total_amount" name="total_amount" readonly>
                                                </fieldset>
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Odometer</div>
                                                    <input type="text" id="fuel_odometer" name="fuel_odometer">
                                                </fieldset>
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Invoice Number</div>
                                                    <input type="text" id="invoice_number" name="invoice_number">
                                                </fieldset>
                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="md-6" style="flex: 1;">
                                                    <div class="body-title mb-10">Invoice / Bill Photo</div>

                                                    <input type="file" id="invoice_photo" name="invoice_photo">

                                                </fieldset>
                                            </div>



                                        </div>
                                    </div>

                                    <div style="margin-top:10px;">
                                        <button class="submit-btn" type="button"
                                            onclick="window.location.href='{{ route('place.place') }}';">Cancel</button>
                                        <button class="submit-btn" type="submit"
                                            style="right:0;position:absolute;">Save</button>
                                    </div>


                                </form>
                                <!-- /Add New Place Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.bottomlinks')

    <!-- Leaflet.js for Map -->
    <script>
        document.getElementById('fuel_vehicle').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];

            const vehicleName = selectedOption.getAttribute('data-vehicle_name') || '';
            const fuelType = selectedOption.getAttribute('data-fuel_type') || '';

            document.getElementById('fuel_vehicle_name').value = vehicleName;
            document.getElementById('fuel_type').value = fuelType;
        });
    </script>


    <script>
        function calculateTotalAmount() {
            const price = parseFloat(document.getElementById('per_ltr_price').value) || 0;
            const qty = parseFloat(document.getElementById('qty_in_ltr').value) || 0;
            const total = (price * qty).toFixed(2);
            document.getElementById('total_amount').value = total;
        }

        document.getElementById('per_ltr_price').addEventListener('input', calculateTotalAmount);
        document.getElementById('qty_in_ltr').addEventListener('input', calculateTotalAmount);
    </script>
</body>

</html>