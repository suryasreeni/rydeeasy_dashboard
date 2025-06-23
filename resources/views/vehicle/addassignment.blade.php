<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Car Rental Form</title>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, rgb(255, 255, 255) 0%, rgb(217, 213, 221) 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .form-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 40px;
            text-align: center;
            position: relative;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        }

        .form-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .form-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .company-info {
            text-align: right;
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .form-content {
            padding: 50px;
        }

        .section-group {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 3px solid #3498db;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: #e74c3c;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group.half-width {
            grid-column: span 1;
        }

        .form-group label {
            font-weight: 600;
            color: #34495e;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            padding: 15px;
            border: 2px solid #e8ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            transform: translateY(-2px);
        }

        .form-control:hover {
            border-color: #bdc3c7;
        }

        .datetime-group {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 15px;
            align-items: end;
        }

        .datetime-separator {
            color: #7f8c8d;
            font-weight: 600;
            text-align: center;
            margin-bottom: 15px;
        }

        .measurement-group {
            display: grid;
            grid-template-columns: 1fr 100px;
            gap: 10px;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            font-weight: normal;
        }

        .checkbox-item input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
            transform: scale(1.2);
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: block;
            padding: 20px;
            border: 2px dashed #3498db;
            border-radius: 10px;
            text-align: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            border-color: #2980b9;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            transform: translateY(-2px);
        }

        .file-upload-icon {
            font-size: 2rem;
            color: #3498db;
            margin-bottom: 10px;
        }

        .rent-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .rent-table th,
        .rent-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e8ecef;
        }

        .rent-table th {
            background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
            color: white;
            font-weight: 600;
        }

        .rent-table tr:nth-child(even) {
            background: #f8f9fa;
        }

        .rent-table tr:hover {
            background: #e3f2fd;
        }

        .rent-table input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .total-row {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%) !important;
            color: white;
            font-weight: bold;
        }

        .total-row input {
            background: rgba(255, 255, 255, 0.9);
            font-weight: bold;
        }

        .submit-section {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid #e8ecef;
        }

        .submit-btn {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border: none;
            padding: 18px 50px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(52, 152, 219, 0.4);
        }

        .cancel-btn {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            color: white;
            border: none;
            padding: 18px 50px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(149, 165, 166, 0.3);
            margin-right: 20px;
        }

        .cancel-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(149, 165, 166, 0.4);
        }

        .required {
            color: #e74c3c;
        }

        .form-number {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 15px;
            border-radius: 10px;
            font-weight: bold;
            z-index: 2;
        }

        .currency-symbol {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
            font-weight: 600;
        }

        .currency-input {
            padding-left: 35px;
        }

        .input-with-currency {
            position: relative;
        }

        @media (max-width: 768px) {
            .form-content {
                padding: 30px 20px;
            }

            .form-header {
                padding: 30px 20px;
            }

            .form-header h1 {
                font-size: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .datetime-group {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .datetime-separator {
                display: none;
            }

            .rent-table {
                font-size: 0.9rem;
            }

            .rent-table th,
            .rent-table td {
                padding: 10px 8px;
            }
        }

        /* Style Select2 container */
        .select2-container--default .select2-selection--single {
            height: 45px !important;
            border-radius: 8px !important;
            padding: 6px 10px;
            border: 1px solid #ced4da;
            font-size: 14px;
        }

        /* Style dropdown search input */
        .select2-container .select2-search--dropdown .select2-search__field {
            padding: 8px 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        /* Match font size in results */

        .select2-results__option {
            font-size: 16px !important;
            font-weight: 400 !important;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-header">

            <h1>Vehicle Rental Assignment</h1>
            <p>Complete vehicle rental and assignment form</p>
        </div>

        <div class="form-content">
            <form method="POST" action="{{ route('assignments.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Customer Information Section -->
                <div class="section-group">
                    <h2 class="section-title">Customer Information</h2>
                    <div class="form-grid">
                        <div class="form-group" style="flex: 1;">
                            <label for="contact_id">Select Customer</label>
                            <select id="contact_id" name="contact_id" class="form-control select2"
                                style="width: 100%; height: 45px; border-radius: 8px; padding: 6px 10px;">
                                <option value="">Search and select a name</option>
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                @endforeach
                            </select>
                        </div>




                        <!-- Auto-filled contact number -->
                        <div class="form-group">
                            <label for="contact">Contact Number <span class="required">*</span></label>
                            <input type="tel" id="contact" name="contact" class="form-control" required>
                        </div>

                        <!-- Auto-filled address -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Booking Information Section -->
                <div class="section-group">
                    <h2 class="section-title">Booking Details</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="booking_details">Booking Details</label>
                            <input type="text" id="booking_details" name="booking_details" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reference_number">Reference Number</label>
                            <input type="text" id="reference_number" name="reference_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expected_return">Expected Return</label>
                            <input type="datetime-local" id="expected_return" name="expected_return"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="purpose">Purpose of Rental</label>
                            <input type="text" id="purpose" name="purpose" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Vehicle Information Section -->
                <div class="section-group">
                    <h2 class="section-title">Vehicle Information</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="vin">Registration No. <span class="required">*</span></label>
                            <select id="vin" name="vin" class="form-control" required>
                                <option value="">Select Vehicle</option>
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->status->status_name == 'Inactive')
                                        <option value="{{ $vehicle->vin }}" data-model="{{ $vehicle->model }}">
                                            {{ $vehicle->vin }} — {{ $vehicle->status->status_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="model">Vehicle Model</label>
                            <input type="text" id="model" name="model" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="yard">Yard</label>
                            <select id="yard" name="yard" class="form-control">
                                <option value="">Select Yard</option>
                                <option value="0">Malappuram</option>
                                <option value="1">Kochi</option>

                            </select>
                        </div>
                    </div>
                </div>

                <!-- Rental Period Section -->
                <div class="section-group">
                    <h2 class="section-title">Rental Period</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Start Date & Time <span class="required">*</span></label>
                            <div class="datetime-group">
                                <input type="date" name="start_date" class="form-control" required>
                                <div class="datetime-separator">at</div>
                                <input type="time" name="start_time" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>End Date & Time <span class="required">*</span></label>
                            <div class="datetime-group">
                                <input type="date" name="end_date" class="form-control">
                                <div class="datetime-separator">at</div>
                                <input type="time" name="end_time" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vehicle Condition Section -->
                <div class="section-group">
                    <h2 class="section-title">Vehicle Condition</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Start Odometer Reading (KM)</label>
                            <input type="number" name="start_km" class="form-control" placeholder="Enter KM reading">
                        </div>
                        <div class="form-group">
                            <label>End Odometer Reading (KM)</label>
                            <input type="number" name="end_km" class="form-control" placeholder="Enter KM reading">
                        </div>
                        <div class="form-group">
                            <label>Start Fuel Level</label>
                            <div class="measurement-group">
                                <input type="number" name="start_fuel" class="form-control" placeholder="Amount"
                                    step="0.1">
                                <select name="start_fuel_unit" class="form-control">
                                    <option value="L">Liters</option>
                                    <option value="Gallons">Gallons</option>
                                    <option value="%">Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>End Fuel Level</label>
                            <div class="measurement-group">
                                <input type="number" name="end_fuel" class="form-control" placeholder="Amount"
                                    step="0.1">
                                <select name="end_fuel_unit" class="form-control">
                                    <option value="L">Liters</option>
                                    <option value="Gallons">Gallons</option>
                                    <option value="%">Percentage</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rent Details Section -->
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
                                            placeholder="0.00" step="0.01">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="deposit_final" class="currency-input"
                                            placeholder="0.00" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Rent</strong></td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="rent_given" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="rent_final" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>GST</strong></td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="gst_given" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="gst_final" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>KM Charges</strong></td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="km_given" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="km_final" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Hour Charges</strong></td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="hour_given" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="hour_final" class="currency-input" placeholder="0.00"
                                            step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Other Charges (if any)</strong></td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="other_given" class="currency-input"
                                            placeholder="0.00" step="0.01">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="other_final" class="currency-input"
                                            placeholder="0.00" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr class="total-row">
                                <td><strong>TOTAL</strong></td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="total_given" class="currency-input"
                                            placeholder="0.00" step="0.01" readonly
                                            style="background: rgba(255,255,255,0.9); color: #2c3e50;">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-with-currency">

                                        <input type="number" name="total_final" class="currency-input"
                                            placeholder="0.00" step="0.01" readonly
                                            style="background: rgba(255,255,255,0.9); color: #2c3e50;">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Driver & Documents Section -->


                <!-- Driver & Documents Section -->
                <div class="section-group">
                    <h2 class="section-title"
                        style="margin-bottom: 24px; color: #333; font-size: 18px; font-weight: 600;">Driver
                        Information & Documents</h2>

                    <!-- First row: License Number and Document Collected -->
                    <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                        <div style="flex: 1;">
                            <label for="driving_license"
                                style="display: block; font-weight: 500; margin-bottom: 8px; font-size: 14px; color: #333;">Driving
                                License Number</label>
                            <input type="text" id="driving_license" name="driving_license" class="form-control"
                                placeholder=" Enter license number">
                        </div>

                        <div style="flex: 0 0 550px;">
                            <label
                                style="display: block; font-weight: 500; margin-bottom: 8px; font-size: 14px; color: #333;">Document
                                Collected</label>
                            <div style="display: flex; gap: 16px; padding-top: 2px;">
                                <label
                                    style="display: flex; align-items: center; font-weight: normal; font-size: 16px; cursor: pointer;">
                                    <input type="radio" name="document_collected" value="Yes"
                                        style="margin-right: 6px;">
                                    Yes
                                </label>
                                <label
                                    style="display: flex; align-items: center; font-weight: normal; font-size: 16px; cursor: pointer;">
                                    <input type="radio" name="document_collected" value="No" style="margin-right: 6px;">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Second row: Documents Collected and Document Number -->
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div style="flex: 1;">
                            <label
                                style="display: block; font-weight: 500; margin-bottom: 8px; font-size: 14px; color: #333;">Documents
                                Collected</label>
                            <div style="display: flex; flex-wrap: wrap; gap: 12px; padding: 8px 0;">
                                <label
                                    style="display: flex; align-items: center; font-weight: normal; font-size: 16px; cursor: pointer; margin-bottom: 4px;">
                                    <input type="checkbox" name="docs[]" value="Voter ID" style="margin-right: 6px;">
                                    Voter ID
                                </label>
                                <label
                                    style="display: flex; align-items: center; font-weight: normal; font-size: 16px; cursor: pointer; margin-bottom: 4px;">
                                    <input type="checkbox" name="docs[]" value="PAN" style="margin-right: 6px;">
                                    PAN Card
                                </label>
                                <label
                                    style="display: flex; align-items: center; font-weight: normal; font-size: 16px; cursor: pointer; margin-bottom: 4px;">
                                    <input type="checkbox" name="docs[]" value="Adhar Card" style="margin-right: 6px;">
                                    Aadhaar Card
                                </label>
                                <label
                                    style="display: flex; align-items: center; font-weight: normal; font-size: 16px; cursor: pointer; margin-bottom: 4px;">
                                    <input type="checkbox" name="docs[]" value="Passport" style="margin-right: 6px;">
                                    Passport
                                </label>
                            </div>
                        </div>

                        <div style="flex: 1;">
                            <label for="document_number"
                                style="display: block; font-weight: 500; margin-bottom: 8px; font-size: 14px; color: #333;">Document
                                Number</label>
                            <input type="text" id="document_number" name="document_number" class="form-control"
                                placeholder="Enter document number">
                        </div>
                    </div>
                </div>




                <!-- Payment Details Section -->
                <div class="section-group">
                    <h2 class="section-title">Payment Details</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="cash_hand">Cash by Hand</label>
                            <div class="input-with-currency">

                                <input type="number" id="cash_hand" name="cash_hand" class="form-control currency-input"
                                    placeholder="0.00" step="0.01">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cash_account">Cash by Account</label>
                            <div class="input-with-currency">

                                <input type="number" id="cash_account" name="cash_account"
                                    class="form-control currency-input" placeholder="0.00" step="0.01">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_received">Total Received</label>
                            <div class="input-with-currency">

                                <input type="number" id="total_received" name="total_received"
                                    class="form-control currency-input" placeholder="0.00" step="0.01" readonly
                                    style="background: #e8f4fd; font-weight: bold;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Details & Refund Section -->
                <div class="section-group">
                    <h2 class="section-title">Account Details & Refund</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" id="account_name" name="account_name" class="form-control"
                                placeholder="Account holder name">
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" id="account_number" name="account_number" class="form-control"
                                placeholder="Bank account number">
                        </div>
                        <div class="form-group">
                            <label for="ifsc_code">IFSC Code</label>
                            <input type="text" id="ifsc_code" name="ifsc_code" class="form-control"
                                placeholder="Bank IFSC code">
                        </div>
                        <div class="form-group">
                            <label for="refund_amount">Refund Amount</label>
                            <div class="input-with-currency">

                                <input type="number" id="refund_amount" name="refund_amount"
                                    class="form-control currency-input" placeholder="0.00" step="0.01">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents Upload Section -->
                <div class="section-group">
                    <h2 class="section-title">Documents Upload</h2>
                    <div class="form-group">
                        <label>Upload Supporting Documents</label>
                        <div class="file-upload">
                            <input type="file" name="document_images[]" multiple accept="image/*,.pdf,.doc,.docx">
                            <label class="file-upload-label">
                                <div class="file-upload-icon">📁</div>
                                <div>Click to upload or drag and drop</div>
                                <small>Images, PDF, DOC files accepted (Max 10MB each)</small>
                            </label>
                        </div>
                    </div>
                </div>


                <!-- Submit Section -->
                <div class="submit-section">
                    <button type="button" class="cancel-btn">Cancel</button>
                    <button type="submit" class="submit-btn">Submit Assignment</button>
                </div>

            </form>
        </div>
    </div>
    <!-- jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Your Custom Script -->
    <script>
        $(document).ready(function () {
            $('#contact_id').select2({
                placeholder: 'Search and select a name',
                allowClear: true
            });

            $('#contact_id').on('change', function () {
                const contactId = $(this).val();

                if (contactId) {
                    $.ajax({
                        url: '{{ url("/get-contact-info") }}/' + contactId,
                        type: 'GET',
                        success: function (data) {
                            $('#contact').val(data.mobile);
                            $('#address').val(data.address);
                            $('#driving_license').val(data.license);
                        },
                        error: function (xhr) {
                            console.error("Failed to fetch data:", xhr.responseText);
                        }
                    });
                } else {
                    $('#contact, #address, #driving_license').val('');
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
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.currency-input');
            inputs.forEach(input => {
                input.addEventListener('input', calculateTotals);
            });
        });
    </script>

    <script>
        function calculateTotalReceived() {
            const cashHand = parseFloat(document.getElementById('cash_hand')?.value) || 0;
            const cashAccount = parseFloat(document.getElementById('cash_account')?.value) || 0;
            const total = cashHand + cashAccount;

            document.getElementById('total_received').value = total.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('cash_hand').addEventListener('input', calculateTotalReceived);
            document.getElementById('cash_account').addEventListener('input', calculateTotalReceived);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const vinSelect = document.getElementById('vin');
            const modelInput = document.getElementById('model');

            vinSelect.addEventListener('change', function () {
                const selectedOption = vinSelect.options[vinSelect.selectedIndex];
                const model = selectedOption.getAttribute('data-model') || '';
                modelInput.value = model;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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