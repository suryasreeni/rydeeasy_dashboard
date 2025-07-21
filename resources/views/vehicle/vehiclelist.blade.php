<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles List</title>
    <style>
    /* Table wrapper with scroll */
    .wg-table {
        width: 100% !important;
        overflow-x: auto !important;
        border: 1px solid #ddd !important;
        border-radius: 4px !important;
    }

    /* Make it behave like a real table */
    .table-title,
    .product-item {
        display: grid !important;
        grid-template-columns:
            280px
            /* VIN + Image */
            200px
            /* Name */
            80px
            /* Year */
            120px
            /* Model */
            100px
            /* Type */
            100px
            /* Group */
            130px
            /* Status */
            150px
            /* Action */
             !important;
        gap: 0 !important;
        border-bottom: 1px solid #ddd !important;
        align-items: center !important;
        min-width: 1160px !important;
    }

    .table-title {
        background: #f4f4f4 !important;
        font-weight: bold !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 10 !important;
    }

    /* All cells styling */
    .table-title li,
    .product-item>div {
        padding: 10px 5px !important;
        border-right: 1px solid #eee !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        white-space: nowrap !important;
        box-sizing: border-box !important;
    }

    /* Remove border from last column */
    .table-title li:last-child,
    .product-item>div:last-child {
        border-right: none !important;
    }

    /* Column-specific alignments */
    .table-title li:nth-child(1),
    .product-item>div:nth-child(1) {
        text-align: left !important;
        white-space: normal !important;
        /* Allow wrapping for VIN + image */
    }

    .table-title li:nth-child(2),
    .product-item>div:nth-child(2) {
        text-align: left !important;
    }

    .table-title li:nth-child(3),
    .table-title li:nth-child(4),
    .table-title li:nth-child(5),
    .table-title li:nth-child(6),
    .table-title li:nth-child(7),
    .table-title li:nth-child(8),
    .product-item>div:nth-child(3),
    .product-item>div:nth-child(4),
    .product-item>div:nth-child(5),
    .product-item>div:nth-child(6),
    .product-item>div:nth-child(7),
    .product-item>div:nth-child(8) {
        text-align: center !important;
    }

    /* Override any conflicting inline styles */
    .product-item>div:nth-child(1) {
        width: auto !important;
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
    }

    /* Image in first column */
    .product-item>div:nth-child(1) img {
        width: 60px !important;
        height: 40px !important;
        object-fit: cover !important;
        border-radius: 4px !important;
        flex-shrink: 0 !important;
    }

    /* Status column with indicator */
    .product-item>div:nth-child(7) {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 6px !important;
    }

    /* Action buttons */
    .product-item>div:nth-child(8) {
        display: flex !important;
        justify-content: center !important;
        gap: 8px !important;
        align-items: center !important;
    }

    /* Scrollbar styling */
    .wg-table::-webkit-scrollbar {
        height: 10px !important;
    }

    .wg-table::-webkit-scrollbar-track {
        background: #f1f1f1 !important;
    }

    .wg-table::-webkit-scrollbar-thumb {
        background: #c1c1c1 !important;
        border-radius: 5px !important;
    }

    .wg-table::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8 !important;
    }

    /* Row hover effect */
    .product-item:hover {
        background-color: #f8f9fa !important;
    }

    /* Rest of the styles */
    .list-icon-function {
        display: flex !important;
        justify-content: center !important;
        gap: 10px !important;
    }

    .list-icon-function .item i {
        cursor: pointer !important;
        padding: 5px !important;
    }

    .filter-options {
        display: flex !important;
        gap: 10px !important;
        margin-bottom: 15px !important;
        flex-wrap: wrap !important;
    }

    .filter-options button {
        padding: 8px 12px !important;
        border: none !important;
        background: #007bff !important;
        color: white !important;
        cursor: pointer !important;
        border-radius: 4px !important;
    }

    .filter-options button:hover {
        background: #0056b3 !important;
    }

    .add-new-container {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        margin-bottom: 15px !important;
        flex-wrap: wrap !important;
    }

    .body-text {
        font-size: 14px !important;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {

        .table-title,
        .product-item {
            grid-template-columns:
                250px 180px 70px 100px 90px 90px 120px 140px !important;
            min-width: 1040px !important;
        }

        .body-text {
            font-size: 12px !important;
        }
    }
    </style>
    <script>
    function showTable(type) {
        document.getElementById('vehicle-table').style.display = (type !== 'Archived') ? 'block' : 'none';
        document.getElementById('archived-table').style.display = (type === 'Archived') ? 'block' : 'none';
    }
    </script>
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
                                    <h3>Vehicle List

                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w208" href="{{url('/AddVehicle')}}">
                                            <i class="icon-plus"></i>New Vehicle
                                        </a>
                                    </ul>
                                </div>

                                <div class="wg-box" id="vehicle-table">
                                    <div class="wg-filter flex-grow">
                                        <form class="form-search" method="GET" action="{{ route('vehicle.vehicle') }}">
                                            <fieldset class="name">
                                                <input type="text" placeholder="Search here..." name="name"
                                                    value="{{ request('name') }}">
                                            </fieldset>
                                            <div class="button-submit">
                                                <button type="submit"><i class="icon-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="wg-table table-product-list">
                                        <ul class="table-title">
                                            <li class="body-title">VIN</li>
                                            <li class="body-title">Name</li>
                                            <li class="body-title">Year</li>
                                            <li class="body-title">Model</li>
                                            <li class="body-title">Type</li>
                                            <li class="body-title">Group</li>
                                            <li class="body-title">Status</li>
                                            <li class="body-title">Action</li>
                                        </ul>

                                        @foreach($vehicles as $vehicle)
                                        <ul>
                                            <li class="product-item">
                                                <!-- VIN + Image -->
                                                <div class="body-text"
                                                    style="width: 500px; align-items: center; gap: 10px; cursor: pointer;"
                                                    onclick="viewContact({{ $vehicle->id }})">
                                                    <img src="{{ asset('storage/' . $vehicle->vehicle_image) }}"
                                                        alt="Vehicle Image"
                                                        style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                    <span>{{ $vehicle->vin }}</span>
                                                </div>

                                                <!-- Vehicle Name -->
                                                <div class="body-text">
                                                    {{ $vehicle->vehicle_name }}
                                                    [{{ $vehicle->year }}
                                                    {{ optional($vehicle->model)->model_name ?? 'N/A' }}]
                                                </div>


                                                <div class="body-text">{{ $vehicle->year }}</div>
                                                <div class="body-text">
                                                    {{ optional($vehicle->model)->model_name ?? 'N/A' }}</div>
                                                <div class="body-text">{{ $vehicle->vehicle_type }}</div>
                                                <div class="body-text">{{ $vehicle->group }}</div>

                                                <!-- Status -->
                                                <div class="body-text">
                                                    <span
                                                        style="width: 10px; height: 10px; border-radius: 50%; background-color: {{ $vehicle->status->status_color }}; display: inline-block; margin-right: 6px;"></span>
                                                    {{ $vehicle->status->status_name ?? 'N/A' }}
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="body-text d-flex justify-content-center gap-2">
                                                    <!-- Edit -->
                                                    <a href="#" class="btn btn-icon btn-sm btn-outline-primary"
                                                        title="Edit" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $vehicle->id }}">
                                                        <i class="icon-edit" style="font-size:15px;"></i>
                                                    </a>

                                                    <!-- Change Status -->
                                                    <a href="#" class="btn btn-icon btn-sm btn-outline-warning"
                                                        title="Change Status" data-bs-toggle="modal"
                                                        data-bs-target="#changeStatusModal{{ $vehicle->id }}">
                                                        <i class="icon-refresh-cw" style="font-size:15px;"></i>
                                                    </a>

                                                    <!-- Delete -->
                                                    <form action="{{ route('vehicle.destroy', $vehicle->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-icon btn-sm btn-outline-danger"
                                                            title="Delete">
                                                            <i class="icon-trash-2" style="font-size:15px;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>

                                        <!-- Change Status Modal -->
                                        <div class="modal fade" id="changeStatusModal{{ $vehicle->id }}" tabindex="-1"
                                            aria-labelledby="changeStatusModalLabel{{ $vehicle->id }}"
                                            aria-hidden="true">


                                            <div class="modal-dialog">
                                                <form action="{{ route('vehicle.updateStatus', $vehicle->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="changeStatusModalLabel{{ $vehicle->id }}">
                                                                Change Status - {{ $vehicle->vin }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="status_id_{{ $vehicle->id }}">Select New
                                                                    Status</label>
                                                                <select name="status_id"
                                                                    id="status_id_{{ $vehicle->id }}"
                                                                    class="form-control" required>
                                                                    <option value="" disabled>Select Status</option>
                                                                    @foreach($statuses as $status)
                                                                    <option value="{{ $status->id }}"
                                                                        {{ $vehicle->status_id == $status->id ? 'selected' : '' }}>
                                                                        {{ $status->status_name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Update
                                                                Status</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="divider"></div>

                                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-4">
                                        <div class="text-tiny">
                                            Showing {{ $vehicles->firstItem() }} to {{ $vehicles->lastItem() }} of
                                            {{ $vehicles->total() }} entries
                                        </div>
                                        <div>
                                            {!! $vehicles->appends(request()->query())->links('pagination::bootstrap-5')
                                            !!}
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
    @include('vehicle.edit')
    <!-- Vehicle Detail Modal -->
    <div class="modal fade" id="vehicleDetailModal" tabindex="-1" role="dialog"
        aria-labelledby="vehicleDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vehicleDetailModalLabel">Vehicle Profile</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" style="padding: 5px;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M4 4L16 16M4 16L16 4" stroke="black" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>



                </div>
                <div class="modal-body" id="vehicleDetailContent">
                    <!-- Dynamic content will be loaded here -->
                    <div class="text-center">Loading...</div>
                </div>
            </div>
        </div>
    </div>



    @include('home.bottomlinks')
    <script>
    function viewContact(id) {
        // Show modal first
        $('#vehicleDetailModal').modal('show');

        // Show loading text
        $('#vehicleDetailContent').html('<div class="text-center">Loading...</div>');

        // Fetch content via AJAX
        fetch(`/vehicle-detail/${id}`)
            .then(response => response.text())
            .then(html => {
                $('#vehicleDetailContent').html(html);
            })
            .catch(error => {
                console.error('Error fetching contact:', error);
                $('#vehicleDetailContent').html(
                    '<div class="text-danger">Failed to load contact details.</div>');
            });
    }
    </script>
    <style>
    .modal-content {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 16px;
        line-height: 1.6;
    }

    .modal-header h5 {
        font-size: 20px;
    }

    .btn-close {
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        background-color: #ff6a00 !important;
        opacity: 1 !important;
        filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.9));
    }

    .btn-close:hover {
        background-color: #e65a00 !important;
    }

    .pagination {
        display: flex !important;
        justify-content: center;
    }
    </style>
</body>

</html>