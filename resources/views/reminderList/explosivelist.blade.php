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
                                    <h3>Explosive Certificate Reminder List

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
                                                <li class="body-title">Explosive Certificate Start Date</li>
                                                <li class="body-title">Explosive Certificate End Date</li>

                                                <li class="body-title column-action">Status</li>
                                                <li class="body-title column-action">Action</li>

                                            </ul>

                                            <!-- Table Body -->
                                            <ul>
                                                @forelse ($explosiveList as $explosive)
                                                    <li class="product-item">
                                                        <div class="body-text">{{ $explosive->vin }}</div>
                                                        <div class="body-text">{{ $explosive->vehicle_name }}</div>
                                                        <div class="body-text">
                                                            {{ $explosive->explosive_certificate_start_date }}
                                                        </div>
                                                        <div class="body-text">
                                                            {{ $explosive->explosive_certificate_end_date }}
                                                        </div>

                                                        <div class="body-text">
                                                            @if($explosive->explosive_certificate_end_date < now()) <span
                                                                class="badge bg-danger">
                                                                Overdue</span>
                                                            @elseif(
                                                                    $explosive->explosive_certificate_end_date <= now()->
                                                                        addWeek()
                                                                )
                                                                <span class="badge bg-warning text-dark">Due Soon</span>
                                                            @else
                                                                        <span class="badge bg-success">Valid</span>
                                                                    @endif

                                                        </div>
                                                        <div class="body-text">


                                                            <a href="{{ route('vehicle.detail', $explosive->id) }}"
                                                                class="btn btn-outline-primary">
                                                                View
                                                            </a>


                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#UpdateModal{{ $explosive->id }}">
                                                                Update
                                                            </button>


                                                        </div>
                                                        <div class="modal fade" id="UpdateModal{{ $explosive->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="UpdateModalLabel{{ $explosive->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <form method="POST"
                                                                        action="{{ route('explosive.update', $explosive->id) }}">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="UpdateModalLabel{{ $explosive->id }}">
                                                                                Update Explosive Certificate
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div class="row g-3">

                                                                                <!-- Start Date -->
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Explosive
                                                                                        Certificate
                                                                                        Start Date</label>
                                                                                    <input type="date" class="form-control"
                                                                                        id="explosive_certificate_start_date_{{ $explosive->id }}"
                                                                                        name="explosive_certificate_start_date"
                                                                                        value="{{ date('Y-m-d') }}"
                                                                                        min="{{ date('Y-m-d') }}">
                                                                                </div>

                                                                                <!-- End Date -->
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Explosive
                                                                                        Certificate End
                                                                                        Date</label>
                                                                                    <input type="date" class="form-control"
                                                                                        id="explosive_certificate_end_date_{{ $explosive->id }}"
                                                                                        name="explosive_certificate_end_date"
                                                                                        value="{{ date('Y-m-d') }}"
                                                                                        min="{{ date('Y-m-d') }}" required>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Quick Date Buttons -->
                                                                            <div class="row mt-3">
                                                                                <div class="col-12">
                                                                                    <label class="form-label">Quick Set Due
                                                                                        Date:</label>
                                                                                    <div class="btn-group d-block"
                                                                                        role="group">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-primary btn-sm me-2"
                                                                                            onclick="
                                                                                                                                                    var startDate = document.getElementById('explosive_certificate_start_date_{{ $explosive->id }}').value;
                                                                                                                                                    if (!startDate) { alert('Please select a start date first'); return; }
                                                                                                                                                    var date = new Date(startDate);
                                                                                                                                                    date.setMonth(date.getMonth() + 3);
                                                                                                                                                    if (date.getDate() !== new Date(startDate).getDate()) { date.setDate(0); }
                                                                                                                                                    var yyyy = date.getFullYear();
                                                                                                                                                    var mm = String(date.getMonth() + 1).padStart(2, '0');
                                                                                                                                                    var dd = String(date.getDate()).padStart(2, '0');
                                                                                                                                                    document.getElementById('explosive_certificate_end_date_{{ $explosive->id }}').value = yyyy + '-' + mm + '-' + dd;
                                                                                                                                                ">
                                                                                            +3 Months
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-primary btn-sm me-2"
                                                                                            onclick="
                                                                                                                                                    var startDate = document.getElementById('explosive_certificate_start_date_{{ $explosive->id }}').value;
                                                                                                                                                    if (!startDate) { alert('Please select a start date first'); return; }
                                                                                                                                                    var date = new Date(startDate);
                                                                                                                                                    date.setMonth(date.getMonth() + 6);
                                                                                                                                                    if (date.getDate() !== new Date(startDate).getDate()) { date.setDate(0); }
                                                                                                                                                    var yyyy = date.getFullYear();
                                                                                                                                                    var mm = String(date.getMonth() + 1).padStart(2, '0');
                                                                                                                                                    var dd = String(date.getDate()).padStart(2, '0');
                                                                                                                                                    document.getElementById('explosive_certificate_end_date_{{ $explosive->id }}').value = yyyy + '-' + mm + '-' + dd;
                                                                                                                                                ">
                                                                                            +6 Months
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-primary btn-sm"
                                                                                            onclick="
                                                                                                                                                    var startDate = document.getElementById('explosive_certificate_start_date_{{ $explosive->id }}').value;
                                                                                                                                                    if (!startDate) { alert('Please select a start date first'); return; }
                                                                                                                                                    var date = new Date(startDate);
                                                                                                                                                    date.setMonth(date.getMonth() + 12);
                                                                                                                                                    if (date.getDate() !== new Date(startDate).getDate()) { date.setDate(0); }
                                                                                                                                                    var yyyy = date.getFullYear();
                                                                                                                                                    var mm = String(date.getMonth() + 1).padStart(2, '0');
                                                                                                                                                    var dd = String(date.getDate()).padStart(2, '0');
                                                                                                                                                    document.getElementById('explosive_certificate_end_date_{{ $explosive->id }}').value = yyyy + '-' + mm + '-' + dd;
                                                                                                                                                ">
                                                                                            +1 Year
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="product-item text-center py-4">
                                                        <div class="body-text w-100 text-muted">No Explosive Certificate
                                                            data
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
        <scr ipt>
            func tion filterTable() {
            let input = document.getElementById("searchInput");
            let filter = input.value.toUpperCase();
            let table = document.querySelector(".wg-table");
            let rows = table.getElementsByTagName("li");

            for (let i = 1; i < rows.length; i++) { let txtValue=rows[i].textContent || rows[i].innerText;
                rows[i].style.display=txtValue.toUpperCase().indexOf(filter)> -1 ? "" : "none";
                }
                }
                </script>

</body>



</html>