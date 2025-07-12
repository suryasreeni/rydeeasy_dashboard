<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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

        .classification-container {
            width: 100%;
            /* max-width: 600px; */


            padding: 20px;
            border-radius: 10px;

            font-family: Arial, sans-serif;
        }

        .classification-title {
            font-size: 12px;


            margin-bottom: 15px;
        }

        .classification-item {
            display: flex;
            align-items: flex-start;
            gap: 25px;
            margin-bottom: 15px;
        }

        .classification-item input {
            margin-top: 5px;
        }

        .classification-label {
            font-size: 14px;
            font-weight: bold;
            color: black;
        }

        .classification-description {
            font-size: 12px;
            color: #555;
            margin-top: 3px;
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
                                        Add Service Reminder



                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w150" href="{{url('/VehicleList')}}">
                                            </i>Cancel
                                        </a>
                                    </ul>
                                </div>

                                <!-- add-new-user -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form class="form-add-new-user form-style-2" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="wg-box">
                                        <div class="right flex-grow">

                                            <div class="form-row">
                                                <fieldset class="email mb-24">
                                                    <div class="body-title mb-10">Vehicle *</div>
                                                    <select name="vehicle_id" required>
                                                        <option value="">-- Select Vehicle --</option>
                                                        @foreach ($allvehicle as $vehicle)
                                                            <option value="{{$vehicle->id}}">
                                                                {{ $vehicle->vin }} ({{ $vehicle->vehicle_name }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>

                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">Service Task *</div>
                                                    <select name="service_task_id" required>
                                                        <option value="">-- Select Service Task--</option>
                                                        @foreach ($servicetasks as $servicetask)
                                                            <option value="{{$servicetask->id}}">
                                                                {{ $servicetask->service_task_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>

                                            <div class="form-row row align-items-end">

                                                <!-- Time Interval -->
                                                <div class="col-md-3">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">
                                                            Time Interval
                                                            <i class="bi bi-question-circle text-muted"
                                                                data-bs-toggle="tooltip"
                                                                title="Set how often this service should occur (e.g., every 3 months)"
                                                                style="font-size: 16px;"></i>
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Every</span>
                                                            <input type="number" name="time_interval"
                                                                class="form-control" min="1">
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Interval Unit -->
                                                <div class="col-md-2">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">&nbsp;</div>
                                                        <select name="time_interval_unit">
                                                            <option value="">Select</option>
                                                            <option value="day">Day(s)</option>
                                                            <option value="week">Week(s)</option>
                                                            <option value="month">Month(s)</option>
                                                            <option value="year">Year(s)</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <!-- Time Due Soon Threshold -->
                                                <div class="col-md-3">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">
                                                            Time Due Soon Threshold
                                                            <i class="bi bi-question-circle text-muted"
                                                                data-bs-toggle="tooltip"
                                                                title="How soon to warn before due (e.g., 7 days before)"
                                                                style="font-size: 16px;"></i>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="number" name="time_threshold"
                                                                class="form-control" min="0">
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Threshold Unit -->
                                                <div class="col-md-2">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">&nbsp;</div>
                                                        <select name="time_threshold_unit">
                                                            <option value="">Select</option>
                                                            <option value="day">Day(s)</option>
                                                            <option value="week">Week(s)</option>
                                                            <option value="month">Month(s)</option>
                                                            <option value="year">Year(s)</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                            </div>

                                            <div class="form-row row align-items-end">

                                                <!-- Meter Interval -->
                                                <div class="col-md-4">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">
                                                            Primary Meter Interval
                                                            <i class="bi bi-question-circle text-muted"
                                                                data-bs-toggle="tooltip"
                                                                title="Use this option to set a service reminder based on usage (for example, Oil Change every 5,000 miles). Leave blank if you don't want to use this option. Units are determined by the vehicle's primary meter."
                                                                style="font-size: 16px;"></i>
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Every</span>
                                                            <input type="number" name="primary_meter_interval"
                                                                class="form-control" min="1">
                                                            <span class="input-group-text">mi</span>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Meter Threshold -->
                                                <div class="col-md-4">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">
                                                            Primary Meter Due Soon Threshold
                                                            <i class="bi bi-question-circle text-muted"
                                                                data-bs-toggle="tooltip"
                                                                title="The number of miles/km/hours in advance you consider this reminder to be due soon (for example, 500 miles is common for a typical fleet vehicle)"
                                                                style="font-size: 16px;"></i>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="number" name="primary_meter_due_soon_threshold"
                                                                class="form-control" min="0">
                                                            <span class="input-group-text">mi</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>


                                            <div class="form-row row align-items-end">

                                                <!-- Meter Interval -->
                                                <div class="col-md-4">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">
                                                            Next Due Date

                                                        </div>
                                                        <div class="input-group">
                                                            <input type="date" name="next_due_date" class="form-control"
                                                                min="1">
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Meter Threshold -->
                                                <div class="col-md-4">
                                                    <fieldset class="name mb-24">
                                                        <div class="body-title mb-10">
                                                            Next Due Primary Meter

                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-text">At</span>

                                                            <input type="number" name="next_due_primary_meter"
                                                                class="form-control" min="0">
                                                            <span class="input-group-text">mi</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <br><br>

                                    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                        <a href="" class="submit-btn"
                                            style="background-color: black; padding: 20px; color: white; border: none; border-radius: 5px;font-size:15px;">
                                            Cancel
                                        </a>
                                        <button class="submit-btn" type="submit"
                                            style="background-color: #FF6A00; padding: 20px; color: white; border: none; border-radius: 5px;font-size:15px;">
                                            Save Reminder
                                        </button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>

</body>

</html>