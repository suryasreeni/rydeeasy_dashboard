<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


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

        .nav-link {
            font-size: 13px;
            color: black;
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
            /* Light gray background on hover */
            color: #333;
            /* Darker text color */
            text-decoration: none;
            /* Remove underline */
            transition: 0.3s;
            /* Smooth transition effect */
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


        /* search */
        .search-button {
            padding: 10px 10px;
            margin-left: 5px;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
        }

        .search-button i {
            font-size: 16px;
        }

        .form-search {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            max-width: 300px;
        }

        .custom-search-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .custom-search-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .custom-search-input:focus {
            border-color: #80bfff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .custom-button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .custom-cancel-button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 14px;
        }

        .custom-apply-button {
            background: #d9d9d9;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            cursor: not-allowed;
            color: #666;
        }

        .custom-apply-button.active {
            background: #007bff;
            color: white;
            cursor: pointer;
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
                                    <h3>
                                        Service Entry

                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w208" href="{{url('/AddService')}}">
                                            <i class="icon-plus"></i>
                                            Add

                                            Service
                                        </a>
                                    </ul>
                                </div>
                                <!-- contents -->
                                <div class="container mt-4">
                                    <!-- Navigation Tabs -->

                                    <!-- Tab Content -->
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <!-- Vehicle Table -->

                                            <div class="wg-box" id="vehicle-table">
                                                <div class="filter-container">
                                                    <input type="text" placeholder="Search" class="search-input"
                                                        id="searchInput">
                                                    <button onclick="filterTable()" class="search-button">
                                                        <i class="fa fa-search"></i>
                                                    </button>











                                                </div>
                                                <div class="wg-table table-product-list">
                                                    <ul class="table-title">
                                                        <li class="body-title">Vehicle</li>
                                                        <li class="body-title">Vendor</li>
                                                        <li class="body-title">Serviced On</li>
                                                        <li class="body-title">Odometer</li>
                                                        <li class="body-title">Completed Task</li>
                                                        <li class="body-title">Total</li>
                                                        <li class="body-title">Action</li>
                                                    </ul>
                                                    <ul>
                                                        @foreach ($service_entries as $service_entry)
                                                            <li class="product-item d-flex flex-wrap">
                                                                <div class="body-text">
                                                                    @if(
                                                                            $service_entry->vehicle &&
                                                                            $service_entry->vehicle->vehicle_image
                                                                        )
                                                                        <img src="{{ asset('storage/' . $service_entry->vehicle->vehicle_image) }}"
                                                                            alt="Vehicle Image"
                                                                            style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                                    @else
                                                                        <img src="{{ asset('images/placeholder-car.png') }}"
                                                                            alt="No Image"
                                                                            style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                                    @endif
                                                                    <div>{{ $service_entry->service_vehicle }}</div>
                                                                </div>

                                                                <div class="body-text">{{ $service_entry->vendor }}</div>
                                                                <div class="body-text">
                                                                    {{ \Carbon\Carbon::parse($service_entry->serviced_on)->format('d M Y') }}
                                                                </div>
                                                                <div class="body-text">
                                                                    {{ $service_entry->service_odometer }} km
                                                                </div>

                                                                <div class="body-text">
                                                                    @if(is_array($service_entry->completed_task))
                                                                        {{ implode(', ', $service_entry->completed_task) }}
                                                                    @else
                                                                        {{ $service_entry->completed_task }}
                                                                    @endif
                                                                </div>

                                                                <div class="body-text">₹
                                                                    {{ number_format($service_entry->total, 2) }}
                                                                </div>

                                                                <div class="body-text d-flex justify-content-center gap-2">
                                                                    <!-- Edit -->

                                                                    <button type="button"
                                                                        class="btn btn-icon btn-sm btn-outline-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#serviceDetailModal{{ $service_entry->id }}"
                                                                        title="Edit Service">
                                                                        <i class="icon-eye" style="font-size:15px;"></i>
                                                                    </button>
                                                                    <!-- View Details -->
                                                                    <button type="button"
                                                                        class="btn btn-icon btn-sm btn-outline-info"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#serviceEditModal{{ $service_entry->id }}"
                                                                        title="View Details">
                                                                        <i class="icon-edit" style="font-size:15px;"></i>
                                                                    </button>

                                                                    <!-- Delete -->
                                                                    <form
                                                                        action="{{ route('service.delete', $service_entry->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-icon btn-sm btn-outline-danger"
                                                                            title="Delete">
                                                                            <i class="icon-trash-2"
                                                                                style="font-size:15px;"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </li>

                                                            <!-- view modal -->
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="divider"></div>
                                            </div>
                                        </div>

                                        @include('service.viewservice')
                                        @include('service.editservice')


                                    </div>
                                </div>
                                <!-- contents end -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('home.bottomlinks')

        <script>
            function filterTable() {
                // Your filtering logic here
            }
        </script>
        <script>
            function setupSearch(inputId, buttonId, clearFunction) {
                const searchInput = document.getElementById(inputId);
                const applyButton = document.getElementById(buttonId);

                searchInput.addEventListener("input", () => {
                    if (searchInput.value.trim() !== "") {
                        applyButton.classList.add("active");
                        applyButton.removeAttribute("disabled");
                    } else {
                        applyButton.classList.remove("active");
                        applyButton.setAttribute("disabled", "true");
                    }
                });

                window[clearFunction] = function () {
                    searchInput.value = "";
                    applyButton.classList.remove("active");
                    applyButton.setAttribute("disabled", "true");
                };
            }

            setupSearch("customSearchInput", "customApplyButton", "clearCustomSearch");
            setupSearch("contactSearchInput", "contactApplyButton", "clearContactSearch");
            setupSearch("contactPhoneSearchInput", "contactPhoneApplyButton", "clearContactPhoneSearch");
            setupSearch("labelSearchInput", "labelApplyButton", "clearLabelSearch");
        </script>
</body>



</html>