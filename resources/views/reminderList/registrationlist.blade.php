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
            /* Adjust spacing between menu items */
        }

        .all-menu li:last-child {
            margin-right: 0;
            /* Remove margin for the last item */
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
    </style>
</head>

<body class="body">
    <div id="wrapper">
        <div id="page">
            <div class="layout-wrap">
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                @include('home.sidebar')
                <div class="section-content-right">
                    @include('home.header')
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Registration Reminder List

                                    </h3>

                                </div>

                                <div class="wg-box">


                                    <div class="flex items-center justify-between gap10 flex-wrap">


                                        <div class="filter-container">
                                            <input type="text" placeholder="Search" class="search-input"
                                                id="searchInput" onkeyup="filterTable()">


                                        </div>



                                        <div class="wg-table table-product-list">

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            <!-- Table Header -->
                                            <ul class="table-title">
                                                <li class="body-title column-name">Vehicle VIN</li>
                                                <li class="body-title">Vehicle Name</li>
                                                <li class="body-title">Registration Number</li>
                                                <li class="body-title">Registration Start Date</li>

                                                <li class="body-title">Registration End Date</li>
                                                <li class="body-title column-action">Status</li>
                                            </ul>

                                            <!-- Table Body -->
                                            <ul>
                                                @forelse ($registrationList as $registration)
                                                    <li class="product-item">
                                                        <div class="body-text">{{ $registration->vin }}</div>
                                                        <div class="body-text">{{ $registration->vehicle_name }}</div>
                                                        <div class="body-text">{{ $registration->registration_no }}</div>
                                                        <div class="body-text">{{ $registration->registration_valid_from }}
                                                        </div>
                                                        <div class="body-text">
                                                            {{ $registration->registration_valid_to }}

                                                        </div>
                                                        <div class="body-text">
                                                            @php
                                                                $today = \Carbon\Carbon::now();
                                                                $registrationEnd =
                                                                    \Carbon\Carbon::parse($registration->registration_valid_to);
                                                            @endphp

                                                            @if (
                                                                    $registrationEnd->isToday() ||
                                                                    $registrationEnd->isBetween(
                                                                        $today,
                                                                        $today->copy()->addDays(7)
                                                                    )
                                                                )
                                                                <span class="text-warning">Due Soon</span>
                                                            @elseif ($registrationEnd->lt($today))
                                                                <span class="text-danger">Overdue</span>
                                                            @else
                                                                <span class="text-success">Active</span>
                                                            @endif
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="product-item text-center py-4">
                                                        <div class="body-text w-100 text-muted">No registration data
                                                            available.
                                                        </div>
                                                    </li>
                                                @endforelse
                                            </ul>

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


        @include('home.bottomlinks')
        <script>
            function filterTable() {
                let input = document.getElementById("searchInput");
                let filter = input.value.toUpperCase();
                let table = document.querySelector(".wg-table");
                let rows = table.getElementsByTagName("li");

                for (let i = 1; i < rows.length; i++) {
                    let txtValue = rows[i].textContent || rows[i].innerText;
                    rows[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
                }
            }
        </script>

</body>



</html>