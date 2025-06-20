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

    .btn-icon {
        width: 32px;
        height: 32px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        padding: 0;
    }

    .vendor-name-link {
        display: inline-block;
        text-decoration: none;
        color: rgb(0, 0, 0);
        cursor: pointer;
    }

    .vendor-name-link:hover {
        text-decoration: none;
        color: #0056b3;
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
                                        Vendors

                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w208" href="{{url('/AddVendor')}}">
                                            <i class="icon-plus"></i>
                                            Add Vendor
                                        </a>
                                    </ul>
                                </div>
                                <!-- contents -->
                                <div class="container mt-4">

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
                                                    <!-- <div class="dropdown">
                                                        <button class="dropbtn">Contact Name ▼</button>
                                                        <div class="dropdown-content">
                                                            <form class="form-search">
                                                                <div class="custom-search-container">
                                                                    <input type="text" placeholder="Search Contact"
                                                                        class="custom-search-input"
                                                                        id="contactSearchInput">
                                                                    <div class="custom-button-group">
                                                                        <button type="button"
                                                                            class="custom-cancel-button"
                                                                            onclick="clearContactSearch()">Cancel</button>
                                                                        <button type="submit"
                                                                            class="custom-apply-button"
                                                                            id="contactApplyButton"
                                                                            disabled>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="dropdown">
                                                        <button class="dropbtn">Classification ▼</button>
                                                        <div class="dropdown-content">
                                                            <form class="form-search">
                                                                <div class="custom-search-container">
                                                                    <input type="text" placeholder="Search text"
                                                                        class="custom-search-input"
                                                                        id="customSearchInput">
                                                                    <div class="custom-button-group">
                                                                        <button type="button"
                                                                            class="custom-cancel-button"
                                                                            onclick="clearCustomSearch()">Cancel</button>
                                                                        <button type="submit"
                                                                            class="custom-apply-button"
                                                                            id="customApplyButton"
                                                                            disabled>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="dropdown">
                                                        <button class="dropbtn">Contact Phone ▼</button>
                                                        <div class="dropdown-content">
                                                            <form class="form-search">
                                                                <div class="custom-search-container">
                                                                    <input type="text" placeholder="Search Phone"
                                                                        class="custom-search-input"
                                                                        id="contactPhoneSearchInput">
                                                                    <div class="custom-button-group">
                                                                        <button type="button"
                                                                            class="custom-cancel-button"
                                                                            onclick="clearContactPhoneSearch()">Cancel</button>
                                                                        <button type="submit"
                                                                            class="custom-apply-button"
                                                                            id="contactPhoneApplyButton"
                                                                            disabled>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="dropbtn">Label ▼</button>
                                                        <div class="dropdown-content">
                                                            <form class="form-search">
                                                                <div class="custom-search-container">
                                                                    <input type="text" placeholder="Search Label"
                                                                        class="custom-search-input"
                                                                        id="labelSearchInput">
                                                                    <div class="custom-button-group">
                                                                        <button type="button"
                                                                            class="custom-cancel-button"
                                                                            onclick="clearLabelSearch()">Cancel</button>
                                                                        <button type="submit"
                                                                            class="custom-apply-button"
                                                                            id="labelApplyButton"
                                                                            disabled>Apply</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> -->


                                                </div>
                                                <div class="wg-table table-product-list">
                                                    @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                    @endif
                                                    <ul class="table-title">
                                                        <li class="body-title">Name</li>
                                                        <li class="body-title">Full Address</li>
                                                        <li class="body-title">Phone</li>
                                                        <li class="body-title">Website</li>
                                                        <li class="body-title">Contact Name</li>
                                                        <li class="body-title">Email</li>
                                                        <li class="body-title">Labels</li>
                                                        <li class="body-title">Action</li>
                                                    </ul>

                                                    @foreach($vendors as $vendor)
                                                    <ul id="vendorList">
                                                        <li class="product-item">
                                                            <!-- Name -->
                                                            <div class="body-text text-center">
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#vendorDetailModal{{ $vendor->id }}"
                                                                    class="vendor-name-link">
                                                                    <span>{{ $vendor->name }}</span>
                                                                </a>
                                                            </div>


                                                            <!-- Full Address -->
                                                            <div class="body-text">
                                                                {{ $vendor->address1 }}, {{ $vendor->address2 }},
                                                                {{ $vendor->city }}, {{ $vendor->state }} -
                                                                {{ $vendor->zip }}, {{ $vendor->country }}
                                                            </div>

                                                            <!-- Phone -->
                                                            <div class="body-text">{{ $vendor->contact_phone }}</div>

                                                            <!-- Website -->
                                                            <div class="body-text">{{ $vendor->website }}</div>

                                                            <!-- Contact Name -->
                                                            <div class="body-text">{{ $vendor->contact_name }}</div>

                                                            <!-- Email -->
                                                            <div class="body-text">{{ $vendor->contact_email }}</div>

                                                            <!-- Labels -->
                                                            <div class="body-text">
                                                                @php
                                                                $labels = [];
                                                                if ($vendor->is_charging)
                                                                $labels[] = 'Charging';
                                                                if ($vendor->is_tools)
                                                                $labels[] = 'Tools';
                                                                if ($vendor->is_fuel)
                                                                $labels[] = 'Fuel';
                                                                if ($vendor->is_service)
                                                                $labels[] = 'Service';
                                                                if ($vendor->is_vehicle)
                                                                $labels[] = 'Vehicle';
                                                                @endphp
                                                                {{ implode(', ', $labels) ?: '-' }}
                                                            </div>

                                                            <!-- Actions -->
                                                            <div class="body-text d-flex justify-content-center gap-2">
                                                                <!-- Edit -->
                                                                <a href="#"
                                                                    class="btn btn-icon btn-sm btn-outline-primary"
                                                                    title="Edit" data-bs-toggle="modal"
                                                                    data-bs-target="#editVendorModal{{ $vendor->id }}">
                                                                    <i class="icon-edit" style="font-size:15px;"></i>
                                                                </a>



                                                                <!-- Delete -->
                                                                <form
                                                                    action="{{ route('vendor.destroy', $vendor->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this vendor?');">
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
                                                    </ul>

                                                    <!-- Vendor Detail Modal -->
                                                    @include('vendor.detail')
                                                    @include('vendor.edit')

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

                                        <!-- Other Tab Content (Empty for Now) -->
                                        <div class="tab-pane fade" id="charging" role="tabpanel"
                                            aria-labelledby="charging-tab">Charging Content
                                        </div>
                                        <div class="tab-pane fade" id="fuel" role="tabpanel" aria-labelledby="fuel-tab">
                                            Fuel Content</div>
                                        <div class="tab-pane fade" id="service" role="tabpanel"
                                            aria-labelledby="service-tab">Service Content</div>
                                        <div class="tab-pane fade" id="tools" role="tabpanel"
                                            aria-labelledby="tools-tab">Tools Content</div>
                                        <div class="tab-pane fade" id="vehicle" role="tabpanel"
                                            aria-labelledby="vehicle-tab">Vehicle Content</div>
                                        <div class="tab-pane fade" id="archived" role="tabpanel"
                                            aria-labelledby="archived-tab">Archived Content
                                        </div>
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
            // Get the search input value, convert to lower case for case-insensitive matching
            const filter = document.getElementById('searchInput').value.toLowerCase();

            // Get all vendor list items
            const items = document.querySelectorAll('#vendorList .product-item');

            // Loop through each vendor item
            items.forEach(item => {
                // Combine text content of all relevant vendor info fields into one string
                const text = item.textContent.toLowerCase();

                // If the text includes the filter string, show it; else hide it
                if (text.includes(filter)) {
                    item.style.display = "";
                } else {
                    item.style.display = "none";
                }
            });
        }
        </script>
</body>



</html>