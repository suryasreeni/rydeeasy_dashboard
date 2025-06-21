<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles List</title>
    <style>
        /* Sidebar (Bootstrap Pills) */
        .sidebar {
            width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            height: fit-content;
            margin-bottom: 150px;
            display: flex;
            flex-direction: column;


        }

        /* Sidebar Buttons (Nav-Pills) */
        .sidebar .nav-link {
            padding: 12px;
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            background: transparent;
            border: none;
            text-align: left;
            width: 100%;
            color: black;
            transition: background 0.3s ease-in-out;
            font-weight: 400;
        }

        /* Hover Effect */
        .sidebar .nav-link:hover {
            background: #f0f0f0;
        }

        /* Active Tab */
        .sidebar .nav-link.active {
            background: rgb(235, 237, 239);
            color: black;
        }

        /* form */
        .form-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
            /* Takes up full width next to the sidebar */
            margin-left: 20px;
            /* Space from sidebar */
            min-height: auto;
            margin-bottom: 30px;
        }

        .form-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            font-size: 12px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;

        }

        .submit-btn:hover {
            background: #0056b3;
        }

        /* maintanance */
        .service-program {
            max-width: 100%;
            font-family: Arial, sans-serif;
        }

        .description {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .option {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            flex-direction: column;
            transition: all 0.3s;



        }

        .option:hover {
            border-color: #007bff;
        }

        .radio-container {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 8px;
            cursor: pointer;
        }

        .radio-container input {
            display: none;
        }

        .custom-radio {
            width: 18px;
            height: 18px;
            border: 2px solid #007bff;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            margin-right: 10px;
        }

        .radio-container input:checked+.custom-radio::after {
            content: "";
            width: 10px;
            height: 10px;
            background: #007bff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .option-label {
            font-size: 12px;
            font-weight: 500;
            flex-grow: 1;
        }

        .option-description {
            font-size: 12px;
            color: gray;
        }

        .hidden-dropdown {
            width: 100%;
            margin-top: 10px;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: none;
            /* Initially hidden */
        }

        .loan-container {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            width: 100%;
        }

        .loan-option {
            flex: 1;
            padding: 15px;
            cursor: pointer;
            border-right: 1px solid #ccc;
            text-align: left;
        }

        .loan-option:last-child {
            border-right: none;
        }

        .loan-option input {
            margin-right: 10px;
        }

        .loan-option.active {
            background-color: #eaf4ff;
        }

        .checkbox-container {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 10px;
        }

        .checkbox-container input {
            margin-top: 4px;
        }

        .checkbox-container label {
            font-size: 12px;
            line-height: 1.4;
        }

        .checkbox-container a {
            color: #007bff;
            text-decoration: none;
        }

        .checkbox-container a:hover {
            text-decoration: underline;
        }

        .tooltip-icon {
            cursor: pointer;
            margin-left: 5px;
            font-size: 14px;
            color: #555;
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 2px 4px;
            display: inline-block;
            font-weight: 400;
        }

        .tooltip {
            position: absolute;
            background: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            bottom: 120%;
            left: 0;
            max-width: 300px;
            /* Adjust as needed */
            white-space: normal;
            /* Allows text to wrap */
            word-wrap: break-word;
            /* Ensures text wraps */
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .input-group:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }

        .input-group span {
            font-size: 14px;
            color: #555;
        }

        .unit {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            color: #555;


            pointer-events: none;
            /* Prevent clicking */
        }

        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            /* Creates spacing between each radio button-label pair */
            margin-top: 20px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 5px;
            /* Adds space between radio button and label */
        }

        .radio-group label {
            font-size: 12px;
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
                                    <h3>
                                        Add vehicle



                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w150" href="{{url('/VehicleList')}}">
                                            </i>Cancel
                                        </a>
                                    </ul>
                                </div>


                                <div class="d-flex align-items-start">


                                    <form method="POST" action="" enctype="multipart/form-data" id="addRentalForm">
                                        @csrf

                                        <table>
                                            <tr>
                                                <th>Name</th>
                                                <td colspan="2"><input type="text" name="name"></td>
                                                <th>Booking Details</th>
                                                <td colspan="2"><input type="text" name="booking_details"></td>
                                            </tr>

                                            <tr>
                                                <th>Address</th>
                                                <td colspan="2"><input type="text" name="address"></td>
                                                <th>Expected Return</th>
                                                <td colspan="2"><input type="datetime-local" name="expected_return">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>VIN</th>
                                                <td>
                                                    <div class="dropdown w-100 position-relative">
                                                        <input type="hidden" name="vin" id="selectedVinInput">

                                                        <button class="btn btn-light dropdown-toggle w-100 text-start"
                                                            type="button" id="vinDropdownButton"
                                                            data-bs-toggle="dropdown">
                                                            Select Vehicle
                                                        </button>
                                                        <ul class="dropdown-menu w-100" style="width: 500px;">
                                                            @foreach($statuses as $status)
                                                                <option value="{{ $status->id }}"
                                                                    data-color="{{ $status->status_color }}">

                                                                    <div id="status-dot"
                                                                        style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; margin-left: 6px; background-color: #ddd; vertical-align: middle;">
                                                                    </div>
                                                                    {{ $status->status_name }}
                                                                </option>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>

                                                <th>Model</th>
                                                <td><input type="text" name="model" id="model"></td>

                                                <th>Status</th>
                                                <td>
                                                    <select name="status_id" id="status_id" class="form-control">
                                                        <option value="">Select Status</option>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->id }}">{{ $status->status_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Start Date & Time</th>
                                                <td><input type="date" name="start_date"></td>
                                                <td><input type="time" name="start_time"></td>
                                                <th>End Date & Time</th>
                                                <td><input type="date" name="end_date"></td>
                                                <td><input type="time" name="end_time"></td>
                                            </tr>

                                            <tr>
                                                <th>Start KM</th>
                                                <td><input type="number" name="start_km_1"></td>
                                                <td>
                                                    <select name="start_km_2" class="form-control">
                                                        <option value="KM">KM</option>
                                                        <option value="Miles">Miles</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>End KM</th>
                                                <td><input type="number" name="end_km_1"></td>
                                                <td>
                                                    <select name="end_km_2" class="form-control">
                                                        <option value="KM">KM</option>
                                                        <option value="Miles">Miles</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Start Fuel</th>
                                                <td><input type="number" name="start_fuel_1"></td>
                                                <td>
                                                    <select name="start_fuel_2" class="form-control">
                                                        <option value="L">L</option>
                                                        <option value="Gallons">Gallons</option>
                                                    </select>
                                                </td>

                                                <th>End Fuel</th>
                                                <td><input type="number" name="end_fuel_1"></td>
                                                <td>
                                                    <select name="end_fuel_2" class="form-control">
                                                        <option value="L">L</option>
                                                        <option value="Gallons">Gallons</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Contact</th>
                                                <td colspan="2"><input type="tel" name="contact"></td>
                                                <th>Reference Number</th>
                                                <td colspan="2"><input type="text" name="reference_number"></td>
                                            </tr>

                                            <tr>
                                                <th>Purpose</th>
                                                <td colspan="2"><input type="text" name="purpose"></td>
                                            </tr>

                                            <!-- Upload Documents -->
                                            <tr>
                                                <td colspan="3" style="padding: 20px;">
                                                    <label for="document_upload">Upload Documents</label><br>
                                                    <input type="file" id="document_upload" name="document_images[]"
                                                        class="form-control" multiple>
                                                </td>
                                            </tr>

                                            <!-- Account Details -->
                                            <tr>
                                                <td colspan="6" style="font-size:18px;font-weight:bold;">Account Details
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Account Name</th>
                                                <td colspan="2"><input type="text" name="account_name"></td>
                                                <th>Account Number</th>
                                                <td colspan="2"><input type="text" name="account_number"></td>
                                            </tr>
                                            <tr>
                                                <th>IFSC Code</th>
                                                <td colspan="2"><input type="text" name="ifsc_code"></td>
                                                <th>Refund Amount</th>
                                                <td colspan="2"><input type="text" name="refund_amount"></td>
                                            </tr>
                                        </table>

                                        <button class="submit-btn" type="submit"
                                            style="margin-top: 50px; padding:10px 15px;">Add Rental</button>
                                    </form>



                                </div>


                            </div>
                        </div>


                    </div>
                </div>


            </div>




        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    @include('home.bottomlinks')


</body>

</html>