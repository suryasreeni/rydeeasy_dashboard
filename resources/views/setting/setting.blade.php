<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Settings Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 320px;
            background-color: #f5f5f5;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            padding: 20px;
            transition: width 0.3s;
            position: relative;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .toggle-btn {
            cursor: pointer;
            background: none;
            border: none;
            font-size: 18px;
            color: #333;
            transition: transform 0.3s;
        }

        .toggle-btn.rotate {
            transform: rotate(180deg);
        }

        .sidebar h1 {
            font-size: 24px;
            font-weight: 600;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #555;
            white-space: nowrap;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 5px;
        }

        .sidebar a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background 0.3s;
            white-space: nowrap;
            font-size: 14px;
            line-height: 12px;
        }

        .sidebar a:hover,
        .sidebar a.active-tab {
            background-color: #d9e7fd;
            color: #1a73e8;
            font-weight: 600;
        }

        .content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .tab-content {
            display: none;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .tab-content h3 {
            margin-top: 0;
            font-size: 18px;
            font-weight: 200;
        }

        #content-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        /* Collapse style */
        .sidebar.collapsed .logo span,
        .sidebar.collapsed h2,
        .sidebar.collapsed a {
            display: none;
        }

        h1 {
            font-weight: 300;
            font-size: 30px;
            letter-spacing: 2px;
        }

        /* search box */
        .search-container {
            background-color: white;
            border-radius: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 3px;
            max-width: 500px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-container:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .form-control.search-input {
            border: none;
            background: transparent;
            padding-left: 20px;
            font-size: 1rem;
            height: 50px;
        }

        .form-control.search-input:focus {
            box-shadow: none;
            outline: none;
        }

        .btn-search {
            background-color: rgb(245, 138, 8);
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-search:hover {
            background-color: rgb(249, 125, 8);
            transform: scale(1.05);
        }

        .search-icon {
            color: #6c757d;
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <span><a href="{{ route('home') }}" style="color:black;font-size:13px;right:20px;position:relative;"><i
                    class="bi bi-arrow-left"></i> Back to
                RydeEasy</a><br></span>

        <h1>Settings</h1><br>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="search-container position-relative mb-3">
                    <form class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="search-icon feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input class="form-control search-input ps-5" type="search" placeholder="Search anything..."
                            aria-label="Search">
                        <button class="btn btn-search ms-2" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- start first section -->
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px;">
            <h2 style="font-size: 18px; font-weight: 500; font-family: 'Poppins', sans-serif;">
                {{ Auth::user()->name }}
            </h2>
            <a href="#"
                style="text-decoration: none; color:rgb(38, 46, 55); font-weight: 100; font-family: 'Poppins', sans-serif;font-size:15px;">
                Logout
            </a>
        </div>
        <ul>
            <li><a href="#profile" class="tab-link">Profile</a></li>
            <li><a href="#notification_setting" class="tab-link">Notifications Settings</a></li>
            <li><a href="#custom_dashboard" class="tab-link">Custom Dashboard</a></li>
        </ul>
        <!-- end first section -->
        <!-- start second section -->
        <h2>User Access</h2>
        <ul>
            <li><a href="#manage_users" class="tab-link">Manage Users</a></li>
            <li><a href="#security" class="tab-link">Security</a></li>
            <li><a href="#roles" class="tab-link">Roles</a></li>
            <li><a href="#record_set" class="tab-link">Record set</a></li>
        </ul>
        <!-- end second section -->
        <!-- start third section -->
        <h2>Vehicles</h2>
        <ul>
            <li><a href="#vehicle_status" class="tab-link">Vehicle Statuses</a></li>
            <li><a href="#vehicle_type" class="tab-link">Vehicle Type</a></li>
            <li><a href="#external_vehicle_id" class="tab-link">External Vehicle IDs</a></li>
            <li><a href="#expense_type" class="tab-link">Expense Types</a></li>
            <li><a href="#expense_setting" class="tab-link">Expense Settings</a></li>
            <li><a href="#tyre_management_setting" class="tab-link">Tyre Management Settings</a></li>

        </ul>
        <!-- end third section -->
        <!-- start fourth section -->
        <h2>Inspections</h2>
        <ul>
            <li><a href="#inspection_setting" class="tab-link">Inspection Setting</a></li>
        </ul>
        <!-- end fourth section -->
        <!-- start fifth section -->
        <h2>Issues</h2>
        <ul>
            <li><a href="#issue_priority" class="tab-link">Issue Priorities</a></li>
            <li><a href="#fault_rule" class="tab-link">Fault Rules</a></li>

        </ul>
        <!-- end fifth section -->
        <!-- start sixth section -->
        <h2>Reminders</h2>
        <ul>
            <li><a href="#service_reminder_setting" class="tab-link">Service Reminder Settings</a></li>
            <li><a href="#vehicle_renewal_type" class="tab-link">Vehicle Renewal Types</a></li>
            <li><a href="#contact_renewal_type" class="tab-link">Contact Renewal Types</a></li>

        </ul>
        <!-- end sixth section -->
        <!-- start seventh section -->
        <h2>Services</h2>
        <ul>
            <li><a href="#maintanace_setting" class="tab-link">maintenance Settings</a></li>
            <li><a href="#work_order_statuses" class="tab-link">Work Order Statuses</a></li>
            <li><a href="#reason_for_repair_code" class="tab-link">Reason for Repair Codes</a></li>
            <li><a href="#Repair_Priority_Class_Codes" class="tab-link">Repair Priority Class Codes</a></li>
            <li><a href="#System_Assembly_Component_Codes" class="tab-link">System/Assembly/Component Codes</a></li>

        </ul>
        <!-- end seventh section -->
        <!-- start eigth section -->
        <h2>Parts & Inventory</h2>
        <ul>
            <li><a href="#part_location" class="tab-link">Part Locations</a></li>
            <li><a href="#part_categories" class="tab-link">Part Categories</a></li>
            <li><a href="#Part_manufacturers" class="tab-link">Part Manufacturers</a></li>
            <li><a href="#Measurement_units" class="tab-link">Measurement Units</a></li>
        </ul>
        <!-- end eigth section -->
        <!-- start nine section -->
        <h2>Fuel & Energy</h2>
        <ul>
            <li><a href="#fuel_energy_setting" class="tab-link">Fuel & Energy Settings</a></li>
            <li><a href="#fuel_type" class="tab-link">Fuel Types</a></li>
        </ul>
        <!-- end nine section -->
    </div>

    <div class="content tab-wrapper">
        <div id="content-wrapper">
            <h1>Welcome to Settings</h1>
            <p>Select an option from the left sidebar to manage your preferences.</p>
        </div>
        <!-- start first section -->
        <div id="profile" class="tab-content">
            <h3>Profile Settings</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="notification_setting" class="tab-content">
            <h3>Notification Settings</h3>
            <p>Update your profile information here.</p>
        </div>

        <div id="custom_dashboard" class="tab-content">
            <h3>Custom Dashboard</h3>
            <p>Manage your login and account details.</p>
        </div>
        <!-- end first section -->

        <!-- start second section -->
        <div id="manage_users" class="tab-content">
            <h3>Manage Users</h3>
            <p>Configure your notification preferences.</p>
        </div>

        <div id="security" class="tab-content">
            <h3>Security</h3>
            <p>Adjust your privacy settings.</p>
        </div>

        <div id="roles" class="tab-content">
            <h3>Roles</h3>
            <p>System-wide preferences and general options.</p>
        </div>

        <div id="record_set" class="tab-content">
            <h3>Recorde Set</h3>
            <p>Customize how your app looks.</p>
        </div>
        <!-- end second section -->
        <!-- start third section -->

        <!-- Vehicle Status Section -->
        <div id="vehicle_status" class="tab-content p-4" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Vehicle Status</h3>
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#addStatusModal">
                    Add Status
                </button>
            </div>

            <!-- Table wrapper -->
            <div class="d-flex justify-content-center">
                <table class="table table-bordered" style="width: 800px;">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statuses as $index => $status)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>
                                    <span style="display: inline-flex; align-items: center;">
                                        <span
                                            style="width: 10px; height: 10px; border-radius: 50%; background-color: {{ $status->status_color }}; display: inline-block; margin-right: 6px;"></span>
                                        {{ $status->status_name }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editStatusModal{{ $status->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <!-- Delete Form -->
                                    <form action="{{ route('statuses.destroy', $status->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editStatusModal{{ $status->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('statuses.update', $status->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Status Name</label>
                                                    <input type="text" name="status_name" class="form-control"
                                                        value="{{ $status->status_name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Status Color</label>
                                                    <input type="color" name="status_color"
                                                        class="form-control form-control-color"
                                                        value="{{ $status->status_color }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <!-- Bootstrap Modal for Add Status -->
        <div class="modal fade" id="addStatusModal" tabindex="-1" aria-labelledby="addStatusModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('vehicle-status.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Vehicle Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Status Name -->
                            <div class="mb-3">
                                <label for="statusName" class="form-label">Status Name</label>
                                <input type="text" class="form-control" id="statusName" name="status_name" required>
                            </div>
                            <!-- Status Color -->
                            <div class="mb-3">
                                <label for="statusColor" class="form-label">Status Color</label>
                                <input type="color" class="form-control form-control-color" id="statusColor"
                                    name="status_color" value="#008000" title="Choose your color">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Status</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- --------------------------------------
**vehicle type**
-------------------------------------- -->

        <div id="vehicle_type" class="tab-content" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Vehicle Type</h3>
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#addTypeModal">
                    Add Type
                </button>
            </div>

            <!-- Table wrapper -->
            <div class="d-flex justify-content-center">
                <table class="table table-bordered" style="width: 800px;">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $index => $type)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>
                                    <span style="display: inline-flex; align-items: center;">
                                        {{ $type->type_name }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editTypeModal1">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <!-- Delete Form -->
                                    <form action="" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Add Vehicle Type Modal -->
                            <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('type.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addTypeModalLabel">Add Vehicle Type</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Type Name -->
                                                <div class="mb-3">
                                                    <label for="typeName" class="form-label">Type Name</label>
                                                    <input type="text" class="form-control" id="typeName" name="type_name"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Add Type</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Example Edit Modal for a vehicle type (repeat with unique IDs for each type) -->
                            <div class="modal fade" id="editTypeModal1" tabindex="-1" aria-labelledby="editTypeModalLabel1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editTypeModalLabel1">Edit Vehicle Type</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Type Name -->
                                                <div class="mb-3">
                                                    <label for="editTypeName1" class="form-label">Type Name</label>
                                                    <input type="text" class="form-control" id="editTypeName1"
                                                        name="type_name" value="type1" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update Type</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                </table>
            </div>



        </div>

        <!-- --------------------------------------
**external vehicle**
-------------------------------------- -->
        <div id="external_vehicle_id" class="tab-content">
            <h3>external vehicle id</h3>
            <p>Define and manage types of vehicles.</p>
        </div>

        <div id="expense_type" class="tab-content">
            <h3>Expense Type</h3>
            <p>Set up and modify fuel categories.</p>
        </div>

        <div id="expense_setting" class="tab-content">
            <h3>expense setting</h3>
            <p>Schedule and track vehicle maintenance.</p>
        </div>
        <div id="tyre_management_setting" class="tab-content">
            <h3>Tyre Management Setting</h3>
            <p>Schedule and track vehicle maintenance.</p>
        </div>
        <!-- end third section -->
        <!-- start fourth section -->
        <div id="inspection_setting" class="tab-content">
            <h3>Inspection Settings</h3>
            <p>Update your profile information here.</p>
        </div>
        <!-- end fourth section -->
        <!-- start fifth section -->
        <div id="issue_priority" class="tab-content">
            <h3>issue priority</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="fault_rule" class="tab-content">
            <h3>fault rule</h3>
            <p>Update your profile information here.</p>
        </div>
        <!-- end fifth section -->
        <!-- start sixth section -->
        <div id="service_reminder_setting" class="tab-content">
            <h3>service reminder setting</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="vehicle_renewal_type" class="tab-content">
            <h3>Vehicle renewal type</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="contact_renewal_type" class="tab-content">
            <h3>Contact renewal type</h3>
            <p>Update your profile information here.</p>
        </div>
        <!-- end sixth section -->
        <!-- start seventh section -->
        <div id="maintanace_setting" class="tab-content">
            <h3>maintanance setting</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="work_order_statuses" class="tab-content">
            <h3>Work order statuses</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="reason_for_repair_code" class="tab-content">
            <h3>reason for repair code</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="Repair_Priority_Class_Codes" class="tab-content">
            <h3>repair priority class code</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="System_Assembly_Component_Codes" class="tab-content">
            <h3>system assembly component
                codes</h3>
            <p>Update your profile information here.</p>
        </div>
        <!-- end seventh section -->
        <!-- start eigth section -->
        <div id="part_location" class="tab-content">
            <h3>part location</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="part_categories" class="tab-content">
            <h3>part category</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="Part_manufacturers" class="tab-content">
            <h3>part manufacturer</h3>
            <p>Update your profile information here.</p>
        </div>
        <div id="Measurement_units" class="tab-content">
            <h3>measurement units</h3>
            <p>Update your profile information here.</p>
        </div>
        <!-- end eigth section -->
    </div>

    @if(session('scrollTo'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var id = "{{ session('scrollTo') }}";
                var triggerTabEl = document.querySelector('[data-bs-target="#' + id + '"]');
                if (triggerTabEl) {
                    var tab = new bootstrap.Tab(triggerTabEl);
                    tab.show();
                }
                setTimeout(function () {
                    var el = document.getElementById(id);
                    if (el) {
                        el.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }, 300);
            });
        </script>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll(".tab-link");
            const contents = document.querySelectorAll(".tab-content");

            // Hide all tab contents initially
            contents.forEach(c => c.style.display = 'none');

            // Show welcome message
            document.getElementById("content-wrapper").style.display = 'block';

            links.forEach(link => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    // Hide welcome message
                    document.getElementById("content-wrapper").style.display = 'none';

                    // Hide all contents
                    contents.forEach(c => c.style.display = 'none');

                    // Show the one clicked
                    const targetId = this.getAttribute("href").substring(1);
                    const target = document.getElementById(targetId);
                    if (target) {
                        target.style.display = 'block';
                    }

                    // Toggle active class
                    links.forEach(l => l.classList.remove("active-tab"));
                    this.classList.add("active-tab");
                });
            });

            // Toggle sidebar collapse
            const sidebar = document.getElementById("sidebar");
            const toggleBtn = document.getElementById("toggleBtn");

            toggleBtn.addEventListener("click", function () {
                sidebar.classList.toggle("collapsed");
                this.classList.toggle("rotate");
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const hash = window.location.hash;
            const wrapper = document.querySelector('.tab-wrapper'); // only affect this section
            const allTabs = wrapper.querySelectorAll('.tab-content');
            const allLinks = document.querySelectorAll('.tab-link');

            function activateTab(tabId) {
                allTabs.forEach(tab => tab.style.display = 'none');
                allLinks.forEach(link => link.classList.remove('active'));

                const tab = document.querySelector(tabId);
                const link = document.querySelector(`a[href="${tabId}"]`);

                if (tab) tab.style.display = 'block';
                if (link) link.classList.add('active');
            }

            allLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('href');
                    activateTab(tabId);
                    history.replaceState(null, null, tabId);
                });
            });

            if (hash) {
                activateTab(hash);
            } else if (allLinks.length) {
                activateTab(allLinks[0].getAttribute('href'));
            }
        });
    </script>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>