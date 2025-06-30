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
                                    <h3>Vehicle Assignment

                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w208" href="{{url('/AddAssignment')}}">
                                            <i class="icon-plus"></i>New Assignment
                                        </a>
                                    </ul>
                                </div>
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="wg-box" id="vehicle-table">
                                    <div class="wg-filter flex-grow">
                                        <form class="form-search" method="GET" action="">
                                            <fieldset class="name">
                                                <input type="text" placeholder="Search here..." name="name" value="">
                                            </fieldset>
                                            <div class="button-submit">
                                                <button type="submit"><i class="icon-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="wg-table table-assignment-list">

                                        {{-- Table Header --}}
                                        <ul class="table-title d-flex">
                                            <li class="body-title">VIN</li>
                                            <li class="body-title">Customer</li>
                                            <li class="body-title">Contact</li>
                                            <li class="body-title">Start</li>
                                            <li class="body-title">End</li>
                                            <li class="body-title">Model</li>
                                            <li class="body-title">Yard</li>
                                            <li class="body-title">Rent (₹)</li>
                                            <li class="body-title">Action</li>
                                        </ul>

                                        {{-- Table Body --}}
                                        <ul class="table-body">
                                            @foreach ($assignments as $assignment)
                                            <li class="product-item d-flex align-items-center"
                                                style="gap: 16px; padding: 12px 0;">

                                                {{-- VIN + Image --}}
                                                <div class="body-text d-flex align-items-center gap-2">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#AssignmentDetailModal{{ $assignment->id }}"
                                                        class="d-flex align-items-center gap-2"
                                                        style="text-decoration: none; color: inherit;">
                                                        @if($assignment->vehicle && $assignment->vehicle->vehicle_image)
                                                        <img src="{{ asset('storage/' . $assignment->vehicle->vehicle_image) }}"
                                                            alt="Vehicle Image"
                                                            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                                        @else
                                                        <div
                                                            style="width: 40px; height: 40px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                                            <span style="font-size: 10px; color: #888;">No Img</span>
                                                        </div>
                                                        @endif
                                                        <span style="font-weight: 500;">{{ $assignment->vin }}</span>
                                                    </a>
                                                </div>

                                                {{-- Customer --}}
                                                <div class="body-text">{{ $assignment->contacts->name ?? 'N/A' }}</div>

                                                {{-- Contact --}}
                                                <div class="body-text">{{ $assignment->contact }}</div>

                                                {{-- Start --}}
                                                <div class="body-text">
                                                    {{ date('d M Y, h:i A', strtotime($assignment->start_date . ' ' . $assignment->start_time)) }}
                                                </div>

                                                {{-- End --}}
                                                <div class="body-text">
                                                    {{ date('d M Y, h:i A', strtotime($assignment->end_date . ' ' . $assignment->end_time)) }}
                                                </div>

                                                {{-- Model --}}
                                                <div class="body-text">{{ $assignment->model }}</div>

                                                {{-- Yard --}}
                                                <div class="body-text">
                                                    {{ $assignment->yard == 0 ? 'Malappuram' : 'Kochi' }}
                                                </div>

                                                {{-- Rent --}}
                                                <div class="body-text">₹{{ number_format($assignment->total_final, 2) }}
                                                </div>

                                                {{-- Actions --}}
                                                <div class="body-text d-flex gap-2">
                                                    <a href="#" class="btn btn-icon btn-sm btn-outline-primary"
                                                        title="Edit" data-bs-toggle="modal"
                                                        data-bs-target="#editAssignmentModal{{ $assignment->id }}">
                                                        <i class="icon-edit" style="font-size:15px;"></i>
                                                    </a>

                                                    <form action="" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this assignment?');">
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

                                            {{-- Modal --}}
                                            @include('vehicle.assignmentdetail')
                                            @include('vehicle.assignmentedit')

                                            @endforeach
                                        </ul>
                                    </div>



                                    <div class="divider"></div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-4">
                                        <div class="text-tiny">
                                            Showing to of
                                            entries
                                        </div>
                                        <div>

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