<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vehicles list</title>
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

        }

        .list-icon-function .item i {
            cursor: pointer;

        }

        .column-sno {
            flex: 0.5;
        }

        .column-name {
            flex: 1.5;
        }

        .column-action {
            flex: 1.2;
        }

        .column-status {
            flex: 1;
        }

        .all-menu {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .all-menu li {
            margin-right: 20px;

        }

        .all-menu li:last-child {
            margin-right: 0;
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 350px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: rgba(128, 128, 128, 0.2);
            border: none;
            cursor: pointer;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 15px;
            color: black;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 300px;
            box-shadow: 0px 4px 6px rgba(31, 23, 35, 0.5);
            z-index: 1;
        }

        .dropdown-content a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: black;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
            color: #333;
            text-decoration: none;
            transition: 0.3s;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .filter-btn {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 14px;
        }

        .name-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .image img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .count-container {
            display: flex;
            gap: 20px;
            max-width: 600px;
        }

        .status-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1;
            min-width: 200px;
        }

        .card-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .card-number {
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }

        .overdue .card-number {
            color: #d32f2f;
        }

        .due-soon .card-number {
            color: #f57c00;
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
                                    <h3>Service Reminders</h3>

                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">
                                        <a class="tf-button style-1 w300" href="{{ route('add.servicereminder') }}">
                                            <i class="icon-plus"></i> Add Service Reminder
                                        </a>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="filter-container">
                                            <input type="text" placeholder="Search" class="search-input"
                                                id="searchInput" onkeyup="filterTable()">
                                        </div>

                                        <div class="wg-table table-product-list">
                                            <div class="count-container">
                                                <div class="status-card overdue">
                                                    <div class="card-title">Overdue Vehicles</div>
                                                    <div class="card-number">{{ $overdueCount }}</div>
                                                </div>

                                                <div class="status-card due-soon">
                                                    <div class="card-title">Due Soon Vehicles</div>
                                                    <div class="card-number">{{ $dueSoonCount }}</div>
                                                </div>

                                                <div class="status-card upcoming">
                                                    <div class="card-title">Upcoming</div>
                                                    <div class="card-number">{{ $upcomingCount }}</div>
                                                </div>
                                            </div>

                                            <br><br>

                                            @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif

                                            <!-- Table Header -->
                                            <ul class="table-title">
                                                <li class="body-title column-name">Vehicle</li>
                                                <li class="body-title">Service Task</li>
                                                <li class="body-title">Status</li>
                                                <li class="body-title">Next Due</li>
                                                <li class="body-title">Notify</li>
                                                <li class="body-title column-action">Action</li>
                                            </ul>


                                            @foreach($reminders as $reminder)
                                                @php
                                                    $now = \Carbon\Carbon::now();
                                                    $dueDate = $reminder->next_due_date ?
                                                        \Carbon\Carbon::parse($reminder->next_due_date) : null;
                                                    $nextDue = $dueDate ? $dueDate->format('d M Y') : '-';

                                                    $milesOverdue = '';
                                                    if ($reminder->next_due_primary_meter && $reminder->current_reading) {
                                                        $diff = $reminder->current_reading - $reminder->next_due_primary_meter;
                                                        if ($diff > 0) {
                                                            $milesOverdue = "<br><small class='text-danger'>{$diff} miles
                                                                                                overdue</small>";
                                                        }
                                                    }
                                                @endphp

                                                <ul class="product-item">
                                                    <div
                                                        class="body-text column-name name-container d-flex align-items-center gap-2">
                                                        @if(
                                                                $service_entry->vehicle &&
                                                                $service_entry->vehicle->vehicle_image
                                                            )
                                                            <img src="{{ Storage::url($service_entry->vehicle->vehicle_image) }}"
                                                                alt="Vehicle Image"
                                                                style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                        @else
                                                            <img src="{{ asset('images/placeholder-car.png') }}" alt="No Image"
                                                                style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                        @endif

                                                        <div>
                                                            <div class="fw-bold">
                                                                {{ $reminder->vehicle->vehicle_name ?? 'N/A' }}
                                                            </div>
                                                            <div class="text-muted small">
                                                                {{ $reminder->vehicle->vin ?? 'VIN: N/A' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="body-text">
                                                        {{ $reminder->serviceTask->service_task_name ?? 'N/A' }}<br>
                                                        <small>
                                                            @if ($reminder->time_interval)
                                                                Every {{ $reminder->time_interval }}
                                                                {{ Str::plural($reminder->time_interval_unit, $reminder->time_interval) }}
                                                            @endif
                                                            @if ($reminder->primary_meter_interval)
                                                                {{ $reminder->time_interval ? 'or' : '' }}
                                                                {{ number_format($reminder->primary_meter_interval) }} miles
                                                            @endif
                                                        </small>
                                                    </div>

                                                    <div class="body-text">
                                                        @if ($dueDate && $dueDate->isPast())
                                                            <span class="badge bg-danger">Overdue</span>
                                                        @elseif (
                                                                $dueDate && $dueDate->diffInDays($now) <= ($reminder->
                                                                    time_threshold ?? 0)
                                                            )
                                                            <span class="badge bg-warning text-dark">Due Soon</span>
                                                        @else
                                                                <span class="badge bg-success">Upcoming</span>
                                                            @endif
                                                    </div>

                                                    <div class="body-text">
                                                        {!! $nextDue !!} {!! $milesOverdue !!}
                                                    </div>

                                                    <div class="body-text">
                                                        @if (
                                                                $reminder->time_threshold ||
                                                                $reminder->primary_meter_due_soon_threshold
                                                            )
                                                            <span class="badge bg-info text-dark">
                                                                @if ($reminder->time_threshold)
                                                                    {{ $reminder->time_threshold }}
                                                                    {{ Str::plural($reminder->time_threshold_unit, $reminder->time_threshold) }}
                                                                    early
                                                                @endif
                                                                @if ($reminder->primary_meter_due_soon_threshold)
                                                                    @if ($reminder->time_threshold)<br>@endif
                                                                    {{ number_format($reminder->primary_meter_due_soon_threshold) }}
                                                                    mi early
                                                                @endif
                                                            </span>
                                                        @else
                                                            <span class="text-muted">—</span>
                                                        @endif
                                                    </div>

                                                    <div class="list-icon-function column-action d-flex gap-2">
                                                        <button class="btn btn-lg btn-info text-white"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewReminderModal{{ $reminder->id }}">
                                                            <i class="icon-eye"></i>
                                                        </button>
                                                        <button class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#editReminderModal{{ $reminder->id }}">
                                                            <i class="icon-edit-3"></i>
                                                        </button>
                                                        <form action="{{ route('destroy.servicereminder', $reminder->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this reminder?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-lg btn-danger">
                                                                <i class="icon-trash-2"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </ul>

                                                @include('reminder.servicereminder_detail', ['reminder' => $reminder])

                                                @include('reminder.servicereminder_edit', [
                                                    'reminder' => $reminder,
                                                    'allvehicle' => $allvehicle,
                                                    'servicetasks' => $servicetasks
                                                ])

                                            @endforeach

                                        </div>
                                    </div>
                                </div>


                                <!-- Pagination & Footer -->
                                <div class="divider"></div>
                                <div class="flex items-center justify-between flex-wrap gap10">
                                    <div class="text-tiny">Showing entries</div>
                                    {{-- Optional pagination if using paginate() --}}
                                    {{-- {{ $reminders->links() }} --}}
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