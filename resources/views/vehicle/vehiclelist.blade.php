<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles List</title>
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

    .filter-options {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }

    .filter-options button {
        padding: 8px 12px;
        border: none;
        background: #007bff;
        color: white;
        cursor: pointer;
        border-radius: 4px;
    }

    .filter-options button:hover {
        background: #0056b3;
    }

    .add-new-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .body-text {
        font-size: 14px;
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
                                        <form class="form-search">
                                            <fieldset class="name">
                                                <input type="text" placeholder="Search here..." name="name" required>
                                            </fieldset>
                                            <div class="button-submit">
                                                <button type="submit"><i class="icon-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="wg-table table-product-list">
                                        <ul class="table-title">
                                            <li class="body-title">VIN</li>
                                            <li class="body-title">Name</li>
                                            <li class="body-title">Year</li>
                                            <li class="body-title">Model</li>
                                            <li class="body-title">Type</li>
                                            <li class="body-title">Group</li>
                                            <li class="body-title">Status</li>
                                        </ul>

                                        @foreach($vehicles as $vehicle)
                                        <ul>
                                            <li class="product-item">
                                                <div class="body-text" onclick="viewContact({{ $vehicle->id }})"
                                                    style="display: flex; align-items: center; gap: 10px;cursor: pointer;">

                                                    <img src="{{ asset('storage/' . $vehicle->vehicle_image) }}"
                                                        alt="Vehicle Image"
                                                        style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                    <span>{{ $vehicle->vin }}</span>




                                                </div>
                                                <div class="body-text">
                                                    {{ $vehicle->vehicle_name }} [{{ $vehicle->year }}
                                                    {{ $vehicle->model }}]
                                                </div>
                                                <div class="body-text">{{ $vehicle->year }}</div>
                                                <div class="body-text">{{ $vehicle->model }}</div>
                                                <div class="body-text">{{ $vehicle->vehicle_type }}</div>
                                                <div class="body-text">{{ $vehicle->group }}</div>
                                                <div class="body-text">
                                                    <span
                                                        style="width: 10px; height: 10px; border-radius: 50%; background-color: {{ $vehicle->status->status_color }}; display: inline-block; margin-right: 6px;"></span>
                                                    {{ $vehicle->status->status_name ?? 'N/A' }}
                                                </div>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </div>



                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 entries</div>
                                        <ul class="wg-pagination">
                                            <li><a href="#"><i class="icon-chevron-left"></i></a></li>
                                            <li><a href="#">1</a></li>
                                            <li class="active"><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#"><i class="icon-chevron-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Detail Modal -->
    <div class="modal fade" id="vehicleDetailModal" tabindex="-1" role="dialog"
        aria-labelledby="vehicleDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
    </style>
</body>

</html>