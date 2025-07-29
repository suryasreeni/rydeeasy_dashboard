<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts List</title>

    <style>
    /* Table Styling */
    .wg-table {
        width: 100%;
        border-collapse: collapse;
    }

    .form-control.input {
        width: 40px;
        border-radius: 10px;
    }

    .table-title,
    .product-item {
        display: flex;
        align-items: center;
        padding: 12px 8px;
        border-bottom: 1px solid #e5e7eb;
    }

    .table-title {
        background: #f9fafb;
        font-weight: 600;
        color: #374151;
        border-bottom: 2px solid #d1d5db;
    }

    .table-title li,
    .product-item>div {
        flex: 1;
        text-align: center;
        padding: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 50px;
    }

    .product-item:hover {
        background-color: #f9fafb;
    }

    /* Search and Filter Container */
    .filter-container {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .search-input {
        padding: 10px 15px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        width: 300px;
        font-size: 14px;
    }

    .search-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .search-button {
        padding: 10px 15px;
        background-color: #3b82f6;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.2s;
    }

    .search-button:hover {
        background-color: #2563eb;
    }

    /* Dropdown Styling */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        background-color: #f3f4f6;
        border: 1px solid #d1d5db;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        color: #374151;
        transition: all 0.2s;
    }

    .dropbtn:hover {
        background-color: #e5e7eb;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 300px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        border-radius: 6px;
        z-index: 1000;
        border: 1px solid #e5e7eb;
        top: 100%;
        left: 0;
        margin-top: 5px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content .form-search {
        padding: 15px;
    }

    .custom-search-input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .custom-button-group {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .custom-cancel-button {
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
        padding: 6px 12px;
        font-size: 14px;
    }

    .custom-apply-button {
        background: #d1d5db;
        border: none;
        padding: 6px 16px;
        border-radius: 4px;
        font-size: 14px;
        cursor: not-allowed;
        color: #9ca3af;
        transition: all 0.2s;
    }

    .custom-apply-button.active {
        background: #3b82f6;
        color: white;
        cursor: pointer;
    }

    /* Button Styling */
    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.2s;
        margin: 0 2px;
    }

    .btn-primary {
        background-color: #3b82f6;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2563eb;
    }

    .btn-secondary {
        background-color: #6b7280;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #4b5563;
    }

    /* Image in table */
    .product-item img {
        width: 50px;
        height: 40px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 8px;
    }

    .product-item a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #374151;
    }

    .product-item a:hover {
        color: #3b82f6;
    }

    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: 8px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        background-color: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
        padding: 20px;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #111827;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        background-color: #f9fafb;
        border-top: 1px solid #e5e7eb;
        padding: 15px 20px;
    }

    /* Form elements in modal */
    .form-label {
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e7eb !important;
        padding-bottom: 8px;
        font-size: 14px;
        color: #374151;
    }

    .bg-light {
        background-color: #f9fafb !important;
    }

    /* Breadcrumb and header */
    .breadcrumbs {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tf-button {
        background-color: #3b82f6;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.2s;
    }

    .tf-button:hover {
        background-color: #2563eb;
        color: white;
        text-decoration: none;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .filter-container {
            flex-direction: column;
            align-items: stretch;
        }

        .search-input {
            width: 100%;
        }

        .table-title li,
        .product-item>div {
            font-size: 12px;
            padding: 4px;
        }

        .product-item img {
            width: 40px;
            height: 30px;
        }
    }

    /* Clean up unused styles */
    .body-text {
        color: #374151;
        font-size: 14px;
    }

    .text-muted {
        color: #6b7280 !important;
    }

    .text-dark {
        color: #111827 !important;
    }

    .fw-semibold {
        font-weight: 600;
    }

    .fw-bold {
        font-weight: 700;
    }

    .small {
        font-size: 0.875rem;
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
                                    <h3>Parts</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">
                                        <a class="tf-button style-1 w208" href="{{url('/AddPart')}}">
                                            <i class="icon-plus"></i>
                                            Add Part
                                        </a>
                                    </ul>
                                </div>

                                <!-- Main Content -->
                                <div class="container mt-4">
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">

                                            <div class="wg-box" id="vehicle-table">
                                                <!-- Search and Filter Section -->
                                                <div class="filter-container">
                                                    <input type="text" placeholder="Search parts..."
                                                        class="search-input" id="searchInput">
                                                    <button onclick="filterTable()" class="search-button">
                                                        <i class="fa fa-search"></i>
                                                    </button>

                                                    <div class="dropdown">
                                                        <button class="dropbtn">Part Category ▼</button>
                                                        <div class="dropdown-content">
                                                            <form class="form-search">
                                                                <div class="custom-search-container">
                                                                    <input type="text" placeholder="Search category..."
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
                                                </div>

                                                <!-- Parts Table -->
                                                <div class="wg-table table-product-list">
                                                    <ul class="table-title">
                                                        <li class="body-title">Part No</li>
                                                        <li class="body-title">Part Name</li>
                                                        <li class="body-title">Category</li>
                                                        <li class="body-title">Price/Unit</li>
                                                        <li class="body-title">Qty</li>
                                                        <li class="body-title">Total Amount</li>
                                                        <li class="body-title">Vendor</li>
                                                        <li class="body-title">Actions</li>
                                                    </ul>

                                                    <ul>
                                                        @foreach ($parts as $part)
                                                        <li class="product-item">
                                                            <div class="body-text">
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#PartDetailModal{{ $part->id }}">
                                                                    <img src="{{ asset('storage/' . $part->part_photo) }}"
                                                                        alt="Part Image">
                                                                    <span>{{ $part->part_no }}</span>
                                                                </a>
                                                            </div>
                                                            <div class="body-text">{{ $part->part_name }}</div>
                                                            <div class="body-text">{{ $part->part_category }}</div>
                                                            <div class="body-text">
                                                                ₹{{ number_format($part->price_per_unit, 2) }}</div>
                                                            <div class="body-text">{{ $part->part_qty }}</div>
                                                            <div class="body-text">
                                                                ₹{{ number_format($part->total_price, 2) }}</div>
                                                            <div class="body-text">
                                                                {{ $part->vendor_type === 'regular' && $part->vendor ? $part->vendor->name : ($part->vendor_name ?? 'N/A') }}
                                                            </div>
                                                            <div class="body-text">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#PartEditModal{{ $part->id }}">Edit</button>



                                                                <form action="{{ route('part.delete', $part->id) }}"
                                                                    method="POST" style="display:inline-block;"
                                                                    onsubmit="return confirm('Are you sure?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-lg btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </li>

                                                        <!-- Modal for Part Details -->
                                                        <div class="modal fade" id="PartDetailModal{{ $part->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="PartDetailLabel{{ $part->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="w-100">
                                                                            <h4 class="modal-title fw-bold"
                                                                                id="PartDetailLabel{{ $part->id }}">Part
                                                                                Details</h4>
                                                                            <p class="text-muted mb-0">
                                                                                {{ $part->part_no }}
                                                                            </p>
                                                                        </div>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="row mb-4">
                                                                            <!-- Image Section -->
                                                                            <div class="col-md-4 mb-4">
                                                                                <h6 class="fw-semibold mb-3 small">
                                                                                    PRODUCT IMAGE</h6>
                                                                                <div
                                                                                    class="border rounded p-3 text-center bg-light">
                                                                                    @if ($part->part_photo)
                                                                                    <img src="{{ asset('storage/' . $part->part_photo) }}"
                                                                                        class="img-fluid rounded"
                                                                                        style="max-height: 200px;">
                                                                                    @else
                                                                                    <div class="py-5">
                                                                                        <p class="text-muted mb-0">No
                                                                                            image available</p>
                                                                                    </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <!-- Details Section -->
                                                                            <div class="col-md-8">
                                                                                <h6 class="fw-semibold mb-3 small">PART
                                                                                    INFORMATION</h6>
                                                                                <div class="row g-4">
                                                                                    @foreach ([
                                                                                    'Part Number' => $part->part_no,
                                                                                    'Part Name' => $part->part_name,
                                                                                    'Category' => $part->part_category,
                                                                                    'Status' => $part->part_status,
                                                                                    'Quantity' => $part->part_qty . ' '
                                                                                    . $part->measurement_unit,
                                                                                    'Unit Price' => '₹' .
                                                                                    number_format(
                                                                                    $part->price_per_unit,
                                                                                    2
                                                                                    ),
                                                                                    'Total Price' => '₹' .
                                                                                    number_format(
                                                                                    $part->total_price,
                                                                                    2
                                                                                    ),
                                                                                    'Purchase Date' =>
                                                                                    \Carbon\Carbon::parse($part->purchase_date)->format('d
                                                                                    M Y')
                                                                                    ] as $label => $value)
                                                                                    <div class="col-md-6 col-lg-4">
                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                class="form-label">{{ $label }}</label>
                                                                                            <div class="border-bottom">
                                                                                                {{ $value }}</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Vendor Section -->
                                                                        <div class="border-top pt-4">
                                                                            <h6 class="fw-semibold mb-3 small">VENDOR
                                                                                INFORMATION</h6>
                                                                            <div class="row g-4">
                                                                                <div class="col-md-3">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Vendor
                                                                                            Type</label>
                                                                                        <div class="border-bottom">
                                                                                            {{ ucfirst($part->vendor_type) }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Vendor
                                                                                            Name</label>
                                                                                        <div class="border-bottom">
                                                                                            @if (
                                                                                            $part->vendor_type ===
                                                                                            'regular' && $part->vendor
                                                                                            )
                                                                                            {{ $part->vendor->name }}
                                                                                            @else
                                                                                            {{ $part->vendor_name ?? 'Not specified' }}
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="mb-3">
                                                                                        <label
                                                                                            class="form-label">Contact
                                                                                            Phone</label>
                                                                                        <div class="border-bottom">
                                                                                            @if (
                                                                                            $part->vendor_type ===
                                                                                            'regular' && $part->vendor
                                                                                            )
                                                                                            <a href="tel:{{ $part->vendor->contact_phone }}"
                                                                                                class="text-decoration-none text-dark">
                                                                                                {{ $part->vendor->contact_phone }}
                                                                                            </a>
                                                                                            @else
                                                                                            {{ $part->vendor_phone ?? 'Not available' }}
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="mb-3">
                                                                                        <label
                                                                                            class="form-label">Address</label>
                                                                                        <div class="border-bottom">
                                                                                            @if (
                                                                                            $part->vendor_type ===
                                                                                            'regular' && $part->vendor
                                                                                            )
                                                                                            {{ $part->vendor->address1 }}
                                                                                            @else
                                                                                            {{ $part->vendor_address ?? 'Not provided' }}
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- edit modal -->

                                                        @endforeach
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
            </div>
        </div>
    </div>

    @include('home.bottomlinks')
    @include('part.edit')


    <script>
    function filterTable() {
        // Filtering logic here
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.product-item');

        rows.forEach(row => {
            const text = row.textContent.toL owerCase();
            row.style.display = text.includes(searchInput) ? 'flex' : 'none';
        });
    }

    function setupSearch(inputId, buttonId, clearFunction) {
        const searchInput = document.getElementById(inputId);
        const applyButton = document.getElementById(buttonId);

        if (searchInput && applyButton) {
            searchInput.addEventListener("input", () => {
                if (searchInput.value.trim() !== "") {
                    applyButton.classList.add("active");
                    applyButton.removeAttribute("disabled");
                } else {
                    applyButton.classList.remove("active");
                    applyButton.setAttribute("disabled", "true");
                }
            });

            window[clearFunction] = function() {
                searchInput.value = "";
                applyButton.classList.remove("active");
                applyButton.setAttribute("disabled", "true");
            };
        }
    }

    // Initialize search functionality
    document.addEventListener('DOMContentLoaded', function() {
        setupSearch("contactSearchInput", "contactApplyButton", "clearContactSearch");

        // Add search functionality to main search input
        document.getElementById('searchInput').addEventListener('input', filterTable);
    });
    </script>
</body>

</html>