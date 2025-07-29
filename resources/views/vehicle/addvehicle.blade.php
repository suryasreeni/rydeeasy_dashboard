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

                                    <form action="{{ route('vehicle.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-container">
                                            <h5 class="form-title">Basic Details</h5>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <!-- number plate -->
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vin">Number Plate</label>
                                                    <input type="text" id="vin" name="vin" onblur="checkVin()">
                                                    <small id="vin-error" class="text-danger"
                                                        style="display: none;">This number plate already exists!</small>

                                                </fieldset>
                                                <!-- vehicle name -->
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_name">Vehicle Name</label>
                                                    <input type="text" id="vehicle_name" name="vehicle_name">
                                                </fieldset>
                                                <!-- vehicle type -->
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_type">Vehicle Type</label>
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
                                                <!-- fuel type -->
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="year">Fuel Type</label>
                                                    <select name="fueltype">
                                                        <option value="">-- Select Fuel Type --</option>

                                                        @foreach ($fueltypes as $fueltype)
                                                        <option value="{{ $fueltype->fuel_type }}">
                                                            {{ $fueltype->fuel_type }}
                                                        </option>


                                                        @endforeach

                                                    </select>
                                                </fieldset>

                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <!-- brand -->

                                                <!-- year -->
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="year">Year</label>
                                                    <input type="text" name="year">
                                                </fieldset>

                                                <!-- status -->
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="status_id">Status</label>
                                                    <select name="status_id" id="status_id"
                                                        onchange="updateStatusDot(this)">
                                                        @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            data-color="{{ $status->status_color }}"
                                                            {{ $status->status_name === 'Inactive' ? 'selected hidden' : '' }}>
                                                            {{ $status->status_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>



                                                    <!-- Note: default inactive status -->
                                                    <small class="form-text text-muted"
                                                        style="color: #888; display: block; margin-top: 4px;">
                                                        <strong>Note:</strong> Set all new vehicles as
                                                        <strong>Inactive</strong> by default.
                                                    </small>
                                                </fieldset>
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

                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">


                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="engine_no">Engine Number</label>
                                                    <input type="text" name="engine_no" id="engine_no">
                                                </fieldset>
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="chassis_no">Chassis Number</label>
                                                    <input type="text" name="chassis_no" id="chassis_no">
                                                </fieldset>

                                            </div>
                                        </div>



                                        <!-- Lifecycle Tab -->

                                        <div class="form-container">
                                            <h5 class="form-title">Advance Details</h5>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="owner">Owner</label>
                                                    <select name="owner" id="owner">
                                                        <option value="">-- Select Contact --</option>

                                                        @foreach($contacts as $contact)
                                                        <option value="{{ $contact->name }}">
                                                            {{ $contact->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="location">Location</label>
                                                    <select name="location">
                                                        <option value="">-- Select location --</option>

                                                        @foreach($locations as $location)
                                                        <option value="{{$location->location_name}}">
                                                            {{$location->location_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="brand_id">Vehicle Brand</label>
                                                    <select id="brand_id" name="brand_id">
                                                        <option value="">-- Select Brand --</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                                <!-- model -->
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="model_id">Vehicle Model</label>
                                                    <select id="model_id" name="model_id">
                                                        <option value="">-- Select Model --</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_tyre_size">Vehicle Tyre Size</label>
                                                    <input type="text" id="vehicle_tyre_size" name="vehicle_tyre_size">
                                                </fieldset>
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_tons">Vehicle Tons</label>
                                                    <input type="text" id="vehicle_tons" name="vehicle_tons">
                                                </fieldset>
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="odometer_reading">Odometer Reading</label>
                                                    <input type="text" id="odometer_reading" name="odometer_reading">
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="form-container">
                                            <h5 class="form-title">Reminder Date</h5>

                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="insurance_no">Insurance No</label>
                                                    <input type="text" id="insurance_no" name="insurance_no">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="insurance_start_date">Insurance Start Date</label>
                                                    <input type="date" id="insurance_start_date"
                                                        name="insurance_start_date">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="insurance_end_date">Insurance End Date</label>
                                                    <input type="date" id="insurance_end_date"
                                                        name="insurance_end_date">

                                                </fieldset>
                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="roadtex_no">RoadTex No</label>
                                                    <input type="text" id="roadtex_no" name="roadtex_no">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="roadtex_last_date">RoadTex Last Date</label>
                                                    <input type="date" id="roadtex_last_date" name="roadtex_last_date">

                                                </fieldset>

                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="permit_no">Permit No</label>
                                                    <input type="text" id="permit_no" name="permit_no">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="permit_last_date">Permit Last Date</label>
                                                    <input type="date" id="permit_last_date" name="permit_last_date">

                                                </fieldset>

                                            </div>

                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="puc_no">PUC No</label>
                                                    <input type="text" id="puc_no" name="puc_no">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="puc_last_date">PUC Last Date</label>
                                                    <input type="date" id="puc_last_date" name="puc_last_date">

                                                </fieldset>

                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="registration_no">Registration No</label>
                                                    <input type="text" id="registration_no" name="registration_no">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="registration_valid_from">Registration Valid From</label>
                                                    <input type="date" id="registration_valid_from"
                                                        name="registration_valid_from">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="registration_valid_to">Registration Valid To</label>
                                                    <input type="date" id="registration_valid_to"
                                                        name="registration_valid_to">

                                                </fieldset>

                                            </div>

                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="state_permit_start_date">State Permit Start Date</label>
                                                    <input type="date" id="state_permit_start_date"
                                                        name="state_permit_start_date">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="state_permit_end_date">State Permit End Date</label>
                                                    <input type="date" id="state_permit_end_date"
                                                        name="state_permit_end_date">

                                                </fieldset>

                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="national_permit_start_date">National Permit Start
                                                        Date</label>
                                                    <input type="date" id="national_permit_start_date"
                                                        name="national_permit_start_date">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="national_permit_end_date">National Permit End
                                                        Date</label>
                                                    <input type="date" id="national_permit_end_date"
                                                        name="national_permit_end_date">

                                                </fieldset>

                                            </div>
                                            <div style="display: flex; gap: 20px; align-items: center;">

                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="fitness_certificate_start_date">Fitnes Certificate Start
                                                        Date</label>
                                                    <input type="date" id="fitness_certificate_start_date"
                                                        name="fitness_certificate_start_date">

                                                </fieldset>
                                                <fieldset class="input-group" style="flex:1">
                                                    <label for="fitness_certificate_end_date">Fitness Certificate End
                                                        Date</label>
                                                    <input type="date" id="fitness_certificate_end_date"
                                                        name="fitness_certificate_end_date">

                                                </fieldset>

                                            </div>

                                        </div>



                                        <!-- Financial Tab -->


                                        <div class="form-container">
                                            <h5 class="form-title">Image Uploading</h5>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="input-group" style="flex: 1;">
                                                    <label for="vehicle_image">Vehicle Image</label>
                                                    <input type="file" id="vehicle_image" name="vehicle_image">
                                                </fieldset>



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
    document.addEventListener('DOMContentLoaded', function() {
        const brandSelect = document.getElementById('brand_id');
        const modelSelect = document.getElementById('model_id');

        brandSelect.addEventListener('change', function() {
            const brandId = this.value;

            modelSelect.innerHTML = '<option value="">-- Select Model --</option>';

            if (brandId) {
                fetch(`/vehicle/models/fetch?brand_id=${brandId}`)
                    .then(res => res.json())
                    .then(data => {
                        for (const id in data) {
                            const option = document.createElement('option');
                            option.value = id;
                            option.text = data[id];
                            modelSelect.appendChild(option);
                        }
                    });
            }
        });
    });
    </script>
    <script>
    function checkVin() {
        const vin = document.getElementById('vin').value.trim();
        if (!vin) return;

        fetch(`/check-vin?vin=${encodeURIComponent(vin)}`)
            .then(res => res.json())
            .then(data => {
                const errorMsg = document.getElementById('vin-error');
                if (data.exists) {
                    errorMsg.style.display = 'block';
                } else {
                    errorMsg.style.display = 'none';
                }
            })
            .catch(err => console.error('VIN check error:', err));
    }
    </script>

</body>

</html>