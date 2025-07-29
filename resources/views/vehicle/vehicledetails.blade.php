<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background: #f2f2f2;
        }

        .sidebar {
            width: 280px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            overflow-y: auto;
        }

        .vehicle-header {
            text-align: center;
            padding: 20px;
            background: #fafafa;
            border-bottom: 1px solid #ddd;
        }

        .vehicle-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .vehicle-header h2 {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }

        .navigation {
            padding: 10px;
        }

        .navigation p {
            font-size: 14px;
            color: #999;
            margin: 10px 0;
        }

        .navigation ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            padding: 12px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            color: #333;
            border-left: 4px solid transparent;
            transition: background 0.3s, border-left 0.3s;
            font-size: 14px;
        }

        .nav-item i {
            margin-right: 10px;
            min-width: 20px;
        }

        .nav-item:hover {
            background-color: #f5f5f5;
        }

        .nav-item.active {
            background-color: #fff;
            border-left: 4px solid orange;
            font-weight: bold;
        }

        .content-area {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background: #f9f9f9;
        }

        .tab-content {
            display: none;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .tab-content.active {
            display: block;
        }

        .vehicle-details-card {
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 12px;
            font-size: 14px;
            color: #2c3e50;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            max-width: 960px;
            margin: auto;
        }

        .vehicle-header-details {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .vehicle-image {
            width: 90px;
            height: 90px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #e9ecef;
        }

        .vehicle-title {
            font-size: 22px;
            font-weight: 600;
            color: #212529;
        }

        .vehicle-subtext {
            font-size: 13px;
            color: #6c757d;
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .data-item .data-label {
            font-weight: 400;
            margin-bottom: 4px;
            color: #495057;
        }

        .data-item .data-value {
            background-color: #f8f9fa;
            padding: 10px 14px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            color: #343a40;
        }

        .section-heading {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 20px;
        }

        hr {
            margin: 30px 0;
            border: none;
            border-top: 1px solid #e0e0e0;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="vehicle-header">
            <img src="{{ asset('storage/' . $vehicle->vehicle_image) }}" alt="Vehicle Image"
                style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
            <h2>{{$vehicle->vin}}</h2>
        </div>

        <div class="navigation">
            <p>Navigations</p>
            <ul>
                <li class="nav-item active" data-target="basic-details"><i class="fas fa-car"></i> VEHICLE DETAILS</li>
                <li class="nav-item" data-target="documents"><i class="fas fa-file-alt"></i> MANAGE DOCUMENTS</li>
                <li class="nav-item" data-target="tyres"><i class="fas fa-tire"></i> MANAGE TYRES</li>
                <li class="nav-item" data-target="replacements"><i class="fas fa-wrench"></i> TYRE REPLACEMENTS</li>
                <li class="nav-item" data-target="pending-inspections"><i class="fas fa-search"></i> PENDING INSPECTIONS
                </li>
                <li class="nav-item" data-target="completed-inspections"><i class="fas fa-check-square"></i> COMPLETED
                    INSPECTIONS</li>
                <li class="nav-item" data-target="pending-quotations"><i class="fas fa-receipt"></i> PENDING QUOTATIONS
                </li>
                <li class="nav-item" data-target="approved-quotations"><i class="fas fa-thumbs-up"></i> APPROVED
                    QUOTATIONS</li>
                <li class="nav-item" data-target="services"><i class="fas fa-cogs"></i> SERVICES</li>
                <li class="nav-item" data-target="expenses"><i class="fas fa-wallet"></i> OTHER EXPENSES</li>
                <li class="nav-item" data-target="fueling"><i class="fas fa-gas-pump"></i> FUELING</li>
                <li class="nav-item" data-target="mileage"><i class="fas fa-tachometer-alt"></i> KM AND MILEAGE</li>
            </ul>
        </div>
    </div>

    <!-- Content Area -->

    <div class="content-area">
        <div class="tab-content active" id="basic-details">

            <!-- BASIC DETAILS -->
            <h5 class="mt-4 mb-3">Basic Details</h5>
            <div class="data-grid">
                <div class="data-item">
                    <div class="data-label">VIN</div>
                    <div class="data-value">{{ $vehicle->vin }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Vehicle Name</div>
                    <div class="data-value">{{ $vehicle->vehicle_name }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Vehicle Type</div>
                    <div class="data-value">{{ $vehicle->vehicle_type }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Fuel Type</div>
                    <div class="data-value">{{ $vehicle->fueltype }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Year</div>
                    <div class="data-value">{{ $vehicle->year }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Status</div>
                    <div class="data-value">{{ $vehicle->status->status_name ?? 'N/A' }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Engine No</div>
                    <div class="data-value">{{ $vehicle->engine_no }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Chassis No</div>
                    <div class="data-value">{{ $vehicle->chassis_no }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Tyre Size</div>
                    <div class="data-value">{{ $vehicle->vehicle_tyre_size }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Vehicle Tons</div>
                    <div class="data-value">{{ $vehicle->vehicle_tons }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Odometer Reading</div>
                    <div class="data-value">{{ $vehicle->odometer_reading }}</div>
                </div>
            </div>

            <!-- OWNERSHIP DETAILS -->
            <h5 class="mt-4 mb-3">Ownership & Location</h5>
            <div class="data-grid">
                <div class="data-item">
                    <div class="data-label">Owner</div>
                    <div class="data-value">{{ $vehicle->owner }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Location</div>
                    <div class="data-value">{{ $vehicle->location->location_name ?? 'N/A' }}
                    </div>
                </div>
                <div class="data-item">
                    <div class="data-label">Brand</div>
                    <div class="data-value">{{ $vehicle->brand->brand_name ?? 'N/A' }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Model</div>
                    <div class="data-value">{{ $vehicle->model->model_name ?? 'N/A' }}</div>
                </div>
            </div>

            <!-- DOCUMENT DETAILS -->
            <h5 class="mt-4 mb-3">Document Details</h5>
            <div class="data-grid">
                <div class="data-item">
                    <div class="data-label">Insurance No</div>
                    <div class="data-value">{{ $vehicle->insurance_no }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Insurance Start</div>
                    <div class="data-value">{{ $vehicle->insurance_start_date }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Insurance End</div>
                    <div class="data-value">{{ $vehicle->insurance_end_date }}</div>
                </div>

                <div class="data-item">
                    <div class="data-label">Road Tax No</div>
                    <div class="data-value">{{ $vehicle->roadtex_no }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Road Tax Last Date</div>
                    <div class="data-value">{{ $vehicle->roadtex_last_date }}</div>
                </div>

                <div class="data-item">
                    <div class="data-label">Permit No</div>
                    <div class="data-value">{{ $vehicle->permit_no }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Permit Last Date</div>
                    <div class="data-value">{{ $vehicle->permit_last_date }}</div>
                </div>

                <div class="data-item">
                    <div class="data-label">PUC No</div>
                    <div class="data-value">{{ $vehicle->puc_no }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">PUC Last Date</div>
                    <div class="data-value">{{ $vehicle->puc_last_date }}</div>
                </div>

                <div class="data-item">
                    <div class="data-label">Registration No</div>
                    <div class="data-value">{{ $vehicle->registration_no }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Valid From</div>
                    <div class="data-value">{{ $vehicle->registration_valid_from }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Valid To</div>
                    <div class="data-value">{{ $vehicle->registration_valid_to }}</div>
                </div>

                <div class="data-item">
                    <div class="data-label">State Permit Start</div>
                    <div class="data-value">{{ $vehicle->state_permit_start_date }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">State Permit End</div>
                    <div class="data-value">{{ $vehicle->state_permit_end_date }}</div>
                </div>

                <div class="data-item">
                    <div class="data-label">National Permit Start</div>
                    <div class="data-value">{{ $vehicle->national_permit_start_date }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">National Permit End</div>
                    <div class="data-value">{{ $vehicle->national_permit_end_date }}</div>
                </div>

                <div class="data-item">
                    <div class="data-label">Fitness Certificate Start</div>
                    <div class="data-value">{{ $vehicle->fitness_certificate_start_date }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Fitness Certificate End</div>
                    <div class="data-value">{{ $vehicle->fitness_certificate_end_date }}</div>
                </div>


            </div>
        </div>

        <!-- Other tabs -->
        <div class="tab-content" id="documents">
            <h3>Manage Documents</h3>
            <p>Upload and view vehicle documents here.</p>
        </div>
        <div class="tab-content" id="tyres">
            <h3>Manage Tyres</h3>
            <p>Tyre condition and status.</p>
        </div>
        <div class="tab-content" id="replacements">
            <h3>Tyre Replacements</h3>
            <p>Replacement history.</p>
        </div>
        <div class="tab-content" id="pending-inspections">
            <h3>Pending Inspections</h3>
            <p>Upcoming inspections list.</p>
        </div>
        <div class="tab-content" id="completed-inspections">
            <h3>Completed Inspections</h3>
            <p>Completed inspections log.</p>
        </div>
        <div class="tab-content" id="pending-quotations">
            <h3>Pending Quotations</h3>
            <p>Pending service quotes.</p>
        </div>
        <div class="tab-content" id="approved-quotations">
            <h3>Approved Quotations</h3>
            <p>Approved quotations history.</p>
        </div>
        <div class="tab-content" id="services">
            <h3>Services</h3>
            <p>Service logs and alerts.</p>
        </div>
        <div class="tab-content" id="expenses">
            <h3>Other Expenses</h3>
            <p>Miscellaneous vehicle expenses.</p>
        </div>
        <div class="tab-content" id="fueling">
            <h3>Fueling</h3>
            <p>Fuel records and efficiency.</p>
        </div>
        <div class="tab-content" id="mileage">
            <h3>KM and Mileage</h3>
            <p>Performance tracking.</p>
        </div>
    </div>

    <!-- JS -->
    <script>
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

                item.classList.add('active');
                const target = item.getAttribute('data-target');
                document.getElementById(target).classList.add('active');
            });
        });
    </script>

</body>

</html>