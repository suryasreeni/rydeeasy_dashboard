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
                                    <h3>RoadTax Reminder List

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
                                                <li class="body-title">RoadTax No</li>
                                                <li class="body-title">RoadTax Last Date</li>
                                                <li class="body-title">Action</li>

                                                <li class="body-title column-action">Status</li>
                                            </ul>

                                            <!-- Table Body -->
                                            <ul>
                                                @forelse ($roadTaxList as $roadtax)
                                                    <li class="product-item">
                                                        <div class="body-text">{{ $roadtax->vin }}</div>
                                                        <div class="body-text">{{ $roadtax->vehicle_name }}</div>
                                                        <div class="body-text">{{ $roadtax->roadtex_no }}</div>
                                                        <div class="body-text">{{ $roadtax->roadtex_last_date }}
                                                        </div>

                                                        <div class="body-text">
                                                            @if($roadtax->roadtex_last_date < now()) <span
                                                                class="badge bg-danger">Overdue</span>
                                                            @elseif(
                                                                    $roadtax->roadtex_last_date <= now()->
                                                                        addWeek()
                                                                )
                                                                <span class="badge bg-warning text-dark">Due Soon</span>
                                                            @else
                                                                        <span class="badge bg-success">Valid</span>
                                                                    @endif

                                                        </div>

                                                        <div class="body-text">
                                                            <a href="{{ route('vehicle.detail', $roadtax->id) }}"
                                                                class="btn btn-outline-primary">
                                                                View
                                                            </a>
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#UpdateModal{{ $roadtax->id }}">
                                                                Update
                                                            </button>
                                                        </div>



                                                    </li>
                                                    <div class="modal fade" id="UpdateModal{{ $roadtax->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="UpdateModalLabel{{ $roadtax->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <form method="POST"
                                                                    action="{{ route('roadtax.update', $roadtax->id) }}">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="UpdateModalLabel{{ $roadtax->id }}">
                                                                            Update RoadTax
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="row g-3">
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">RoadTax No</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $roadtax->roadtex_no }}"
                                                                                    min="{{ date('Y-m-d') }}" readonly>
                                                                            </div>

                                                                            <!-- RoadTax Last Date -->
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">RoadTax Last
                                                                                    Date</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="roadtex_last_date_{{ $roadtax->id }}"
                                                                                    name="roadtex_last_date"
                                                                                    value="{{ \Carbon\Carbon::parse($roadtax->roadtex_last_date)->format('Y-m-d') }}"
                                                                                    min="{{ date('Y-m-d') }}">
                                                                            </div>
                                                                        </div>

                                                                        <!-- Quick Date Buttons -->
                                                                        <div class="row mt-3">
                                                                            <div class="col-12">
                                                                                <label class="form-label">Quick Set Due
                                                                                    Date:</label>
                                                                                <div class="btn-group d-block" role="group">
                                                                                    <!-- +5 Year -->
                                                                                    <!-- +5 Year -->
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm"
                                                                                        onclick="
                                                                        var today = new Date();
                                                                        today.setFullYear(today.getFullYear() + 5);
                                                                        var yyyy = today.getFullYear();
                                                                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                                                                        var dd = String(today.getDate()).padStart(2, '0');
                                                                        document.getElementById('roadtex_last_date_{{ $roadtax->id }}').value = yyyy + '-' + mm + '-' + dd;
                                                                    ">
                                                                                        +5 Year
                                                                                    </button>

                                                                                    <!-- +15 Year -->
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm"
                                                                                        onclick="
                                                                        var today = new Date();
                                                                        today.setFullYear(today.getFullYear() + 15);
                                                                        var yyyy = today.getFullYear();
                                                                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                                                                        var dd = String(today.getDate()).padStart(2, '0');
                                                                        document.getElementById('roadtex_last_date_{{ $roadtax->id }}').value = yyyy + '-' + mm + '-' + dd;
                                                                    ">
                                                                                        +15 Year
                                                                                    </button>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Save changes
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <li class="product-item text-center py-4">
                                                        <div class="body-text w-100 text-muted">No roadtax data
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