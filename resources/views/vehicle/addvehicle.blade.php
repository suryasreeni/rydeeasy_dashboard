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
                                <!-- <hr style="height:0.5px;border-width:0;color:gray;background-color:gray"> -->


                                <div class="d-flex align-items-start">
                                    <!-- Sidebar -->
                                    <!-- <div class="sidebar nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-details-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-details" type="button" role="tab"
                                            aria-controls="v-pills-details" aria-selected="true">Details</button>




                                        <button class="nav-link" id="v-pills-lifecycle-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-lifecycle" type="button" role="tab"
                                            aria-controls="v-pills-lifecycle" aria-selected="false">Lifecycle</button>

                                        <button class="nav-link" id="v-pills-financial-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-financial" type="button" role="tab"
                                            aria-controls="v-pills-financial" aria-selected="false">Financial</button>



                                    </div> -->

                                    <!-- Tab Content -->
                                    <!-- <div class="tab-content flex-grow-1" id="v-pills-tabContent" style="width: 100%;"> -->

                                    <!-- Details Tab -->

                                    <form action="{{ route('vehicle.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-container">
                                            <h5 class="form-title">Add with a VIN</h5>
                                            <fieldset class="input-group" style="width:50%">
                                                <label for="vin">VIN/SN</label>
                                                <input type="text" id="vin" name="vin">
                                                <p style="font-size:10px;">Vehicle Identification Number or
                                                    Serial Number</p>
                                            </fieldset>
                                        </div>

                                        <div class="form-container">
                                            <h5 class="form-title">Identification</h5>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_name">Vehicle Name</label>
                                                    <input type="text" id="vehicle_name" name="vehicle_name">
                                                </fieldset>
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_type">Type</label>
                                                    <select id="vehicle_type" name="vehicle_type">
                                                        <option value="" disabled selected>Please select
                                                        </option>
                                                        @foreach($types as $type)
                                                            <option value="{{ $type->type_name }}">
                                                                {{ $type->type_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="model">Model Name</label>
                                                    <input type="text" id="model" name="model">
                                                </fieldset>

                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="year">Year</label>
                                                    <select id="year" name="year">
                                                        <option value="" disabled selected>Please select
                                                        </option>
                                                        @for($year = date('Y'); $year >= 2000; $year--)
                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </fieldset>

                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="status_id">Status</label>
                                                    <select name="status_id" id="status_id"
                                                        onchange="updateStatusDot(this)">
                                                        <option value="" disabled selected>Please select
                                                        </option>
                                                        @foreach($statuses as $status)
                                                            <option value="{{ $status->id }}"
                                                                data-color="{{ $status->status_color }}">

                                                                <div id="status-dot"
                                                                    style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; margin-left: 6px; background-color: #ddd; vertical-align: middle;">
                                                                </div>
                                                                {{ $status->status_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- Just add this dot next to your select -->

                                                </fieldset>




                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="ownership">Ownership</label>
                                                    <select name="ownership" id="ownership">
                                                        <option value="" disabled selected>Please select
                                                        </option>
                                                        <option value="Owned">Owned</option>
                                                        <option value="Leased">Leased</option>
                                                        <option value="Rented">Rented</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="group">Group</label>
                                                    <select name="group" id="group">
                                                        <option value="" disabled selected>Please select
                                                        </option>
                                                        <option value="Rental">Rental</option>
                                                        <option value="Employee Transport">Employee Transport
                                                        </option>
                                                        <option value="Pickup & Delivery">Pickup & Delivery
                                                        </option>
                                                        <option value="Service Vehicle">Service Vehicle</option>
                                                        <option value="Replacement Vehicle">Replacement Vehicle
                                                        </option>
                                                        <option value="Demo/Test Drive">Demo/Test Drive</option>
                                                        <option value="Customer Travel">Customer Travel</option>
                                                        <option value="Standby">Standby</option>
                                                    </select>
                                                </fieldset>
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_image">Vehicle Image</label>
                                                    <input type="file" id="vehicle_image" name="vehicle_image">
                                                </fieldset>
                                            </div>
                                        </div>



                                        <!-- Lifecycle Tab -->

                                        <div class="form-container">
                                            <h5 class="form-title">In-Service</h5>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="in_service_date">In-Service Date</label>
                                                    <input type="date" id="in_service_date" name="in_service_date">
                                                    <p style="font-size:10px;">Date vehicle entered active fleet
                                                        service</p>
                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="in_service_odometer">In-Service Odometer</label>
                                                    <input type="text" id="in_service_odometer"
                                                        name="in_service_odometer">
                                                    <p style="font-size:10px;">Odometer reading on in-service
                                                        date
                                                    </p>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="form-container">
                                            <h5 class="form-title">Out-of-Service</h5>

                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="out_of_service_date">Out-of-Service Date</label>
                                                    <input type="date" id="out_of_service_date"
                                                        name="out_of_service_date">
                                                    <p style="font-size:10px;">Date vehicle was retired from
                                                        fleet
                                                        service

                                                    </p>
                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="out_of_service_odometer">Out-of-Service Odometer</label>
                                                    <input type="text" id="out_of_service_odometer"
                                                        name="out_of_service_odometer">
                                                    <p style="font-size:10px;">
                                                        Final odometer reading on out-of-service date
                                                    </p>
                                                </fieldset>
                                            </div>
                                        </div>



                                        <!-- Financial Tab -->


                                        <div class="form-container">
                                            <h5 class="form-title">Purchase Details</h5>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="purchase-vendor" style="font-size:12px;">Purchase
                                                        Vendor</label>
                                                    <select id="purchase-vendor" name="purchase_vendor">
                                                        <option value="" disabled selected style="font-size:12px;">
                                                            Please select</option>
                                                        @foreach ($vendors as $vendor)
                                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="purchase-date">Purchase Date</label>
                                                    <input type="date" id="purchase-date" name="purchase_date">
                                                </fieldset>
                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="purchase-price">Purchase Price</label>
                                                    <input type="text" id="purchase-price" name="purchase_price">
                                                </fieldset>

                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="odometer">Odometer(mi)</label>
                                                    <input type="text" id="odometer" name="odometer">
                                                </fieldset>
                                            </div>

                                        </div>
                                        <div class="form-container">
                                            <h5>Loan/Lease</h5><br>

                                            <div class="loan-container">
                                                <label class="loan-option active">
                                                    <input type="radio" name="purchase_type" value="loan" checked
                                                        onclick="toggleLoanForm()">
                                                    <strong style="font-size: 14px;">Loan</strong><br><br>
                                                    <span>This vehicle is associated with a loan</span>
                                                </label>
                                                <label class="loan-option">
                                                    <input type="radio" name="purchase_type" value="lease"
                                                        onclick="toggleLoanForm()">
                                                    <strong style="font-size: 14px;">Lease</strong><br><br>
                                                    <span>This vehicle is being leased</span>
                                                </label>
                                                <label class="loan-option">
                                                    <input type="radio" name="purchase_type" value="none"
                                                        onclick="toggleLoanForm()">
                                                    <strong style="font-size: 14px;">None</strong><br><br>
                                                    <span>This vehicle is not being financed</span>
                                                </label>
                                            </div>

                                            <!-- Loan Details Form (Initially Hidden) -->
                                            <div id="loan-form">

                                                <div style="margin-top: 20px;">
                                                    <h5 class="form-title">Loan Details</h5>
                                                    <div style="display: flex; gap: 20px; align-items: center;">

                                                        <fieldset class="input-group" style="flex:1">
                                                            <label for="lender" style="font-size:12px;">Lender
                                                                Name</label>
                                                            <select id="lender" name="lender">
                                                                <option value="" disabled selected
                                                                    style="font-size:12px;">Please select
                                                                </option>
                                                                @foreach ($contacts as $contact)
                                                                    <option value="{{ $contact->id }}">
                                                                        {{ $contact->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </fieldset>


                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="date_of_loan"> Date of Loan</label>
                                                            <input type="date" id="date_of_loan" name="date_of_loan">

                                                        </fieldset>
                                                    </div>

                                                    <div style="display: flex; gap: 20px; align-items: center;">

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="amount_of_loan">Amount of
                                                                Loan</label>
                                                            <input type="text" id="amount_of_loan"
                                                                name="amount_of_loan">
                                                        </fieldset>

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="annual_percentage_rate">Annual Percentage Rate
                                                                (APR)(%)</label>
                                                            <input type="text" id="annual_percentage_rate"
                                                                name="annual_percentage_rate">
                                                        </fieldset>
                                                    </div>

                                                    <div style="display: flex; gap: 20px; align-items: center;">

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="down_payment">Down Payment</label>
                                                            <input type="text" id="down_payment" name="down_payment">

                                                        </fieldset>

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="first_payment_date">First Payment
                                                                Date</label>
                                                            <input type="date" id="first_payment_date"
                                                                name="first_payment_date">
                                                        </fieldset>
                                                    </div>

                                                    <div style="display: flex; gap: 20px; align-items: center;">

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="montly_payment">Monthly
                                                                Payment</label>
                                                            <input type="text" id="monthly_payment"
                                                                name="monthly_payment">

                                                        </fieldset>

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="number_of_payment">Number of
                                                                Payments</label>
                                                            <input type="text" id="number_of_payment"
                                                                name="number_of_payment">

                                                        </fieldset>
                                                    </div>
                                                    <div style="display: flex; gap: 20px; align-items: center;">

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="loan_end_date">Loan End
                                                                Date</label>
                                                            <input type="date" id="loan_end_date" name="loan_end_date">
                                                        </fieldset>

                                                        <fieldset class="input-group" style="flex: 1;">
                                                            <label for="account_number">Account Number</label>
                                                            <input type="text" id="account_number"
                                                                name="account_number">

                                                        </fieldset>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="submit-btn"
                                                style="float:left;margin-left:20px;margin-bottom:20px;" type="button"
                                                onclick="window.location.href='{{ route('vehicle.vehicle') }}';">Cancel</button>
                                            <button class="submit-btn" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>

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

    @include('home.bottomlinks')

    <script>
        function updateStatusDot(sel) {
            const selectedOption = sel.selectedOptions[0];
            const color = selectedOption ? selectedOption.getAttribute('data-color') : '#ddd';
            document.getElementById('status-dot').style.backgroundColor = color || '#ddd';
        }
    </script>
    <script>
        function toggleDropdown(show) {
            let dropdown = document.getElementById("serviceDropdown");
            if (show) {
                dropdown.style.display = "block";
            } else {
                dropdown.style.display = "none";
            }
        }
    </script>
    <!-- loan -->
    <script>
        document.querySelectorAll('.loan-option').forEach(option => {
            option.addEventListener('click', function () {
                document.querySelectorAll('.loan-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                this.querySelector('input').checked = true;
            });
        });
    </script>
    <script>
        function toggleLoanForm() {
            var loanForm = document.getElementById("loan-form");
            var selectedValue = document.querySelector('input[name="loan"]:checked').value;

            if (selectedValue === "loan") {
                loanForm.style.display = "block";
            } else {
                loanForm.style.display = "none";
            }
        }

        // Ensure form visibility on page load if "Loan" is preselected
        document.addEventListener("DOMContentLoaded", function () {
            toggleLoanForm();
        });
    </script>
</body>

</html>