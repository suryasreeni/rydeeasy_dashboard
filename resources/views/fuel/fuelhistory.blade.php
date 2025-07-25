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
            padding: 10px 5px;
            box-sizing: border-box;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .table-title li:last-child,
        .product-item div:last-child {
            /* No border needed */
        }

        /* Table scroll container */
        .table-scroll-container {
            overflow-x: auto;
            overflow-y: visible;
            width: 100%;
            border-radius: 5px;
        }

        .table-scroll-container::-webkit-scrollbar {
            height: 8px;
        }

        .table-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-scroll-container::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .table-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        .wg-table.table-product-list {
            min-width: 1400px;
        }

        .body-text {
            font-size: 12px;
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
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
                                        Fuel History
                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">
                                        <a class="tf-button style-1 w208" href="{{url('/AddFuelHistory')}}">
                                            <i class="icon-plus"></i>
                                            Add Fuel History
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

                                                    <div class="dropdown">
                                                        <button class="dropbtn">Date ▼</button>
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
                                                        <button class="dropbtn">Vehicle ▼</button>
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

                                                </div>

                                                <!-- Table with horizontal scroll -->
                                                <div class="table-scroll-container">
                                                    <div class="wg-table table-product-list">
                                                        <ul class="table-title">
                                                            <li class="body-title">Fueling Date</li>
                                                            <li class="body-title">VIN</li>
                                                            <li class="body-title">Vehicle Name</li>
                                                            <li class="body-title">Fuel Type</li>
                                                            <li class="body-title">Fuel Station</li>
                                                            <li class="body-title">Price Per Unit</li>
                                                            <li class="body-title">Qty</li>
                                                            <li class="body-title">Total Amount</li>
                                                            <li class="body-title">Odometer</li>
                                                            <li class="body-title">Invoice No/Bill No</li>
                                                            <li class="body-title">Invoice/Bill Photo</li>
                                                            <li class="body-title">Action</li>
                                                        </ul>
                                                        <ul>
                                                            <li class="product-item">
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                                <div class="body-text">test</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                            </div>
                                            <!-- end of vehiclelist -->
                                        </div>
                                    </div>
                                </div>
                                <!-- contents end -->

                            </div>
                            <!--main-content-wrap -->
                        </div>
                        <!--main-content-inner -->
                    </div>
                    <!--main-content -->
                </div>
            </div>
        </div>

        @include('home.bottomlinks')

        <!-- filtering -->
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
        </script>
        <!-- filter -->
</body>

</html>