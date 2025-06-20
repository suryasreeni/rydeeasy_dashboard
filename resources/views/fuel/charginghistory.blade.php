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

    /* filter */

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
        font-size: 12px;
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

    /* search bar */

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

    /* filter search */

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

    .fuel-stats-container {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 1200px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        background: white;
    }

    .stat-box {
        flex: 1;
        text-align: center;
        border-right: 1px solid #ddd;
        padding: 10px;
    }

    .stat-box:last-child {
        border-right: none;
    }

    .stat-title {
        font-size: 12px;
        color: #555;
    }

    .stat-value {
        font-size: 16px;
        font-weight: bold;
        color: #000;
    }

    .stat-unit {
        font-size: 14px;
        color: #777;
    }

    /* tooltip */
    .tooltip {
        position: absolute;
        /* This keeps it within the <li> */
        background: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        top: 100%;
        /* Position below the text */
        left: 50%;
        transform: translateX(-50%);
        width: 400px;
        /* Fixed width (adjust as needed) */
        max-width: 100vw;
        /* Prevents overflowing */
        white-space: normal;
        text-align: center;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        z-index: 1000;
    }

    /* Tooltip icon styling */
    .tooltip-icon {
        position: relative;
        display: inline-block;
        cursor: pointer;




    }

    /* Show tooltip on hover */
    .tooltip-icon:hover+.tooltip {
        visibility: visible;
        opacity: 1;
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

                                        Charging History
                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w208" href="{{url('/AddChargingHistory')}}">
                                            <i class="icon-plus"></i>
                                            Add History
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
                                                <div class="fuel-stats-container">
                                                    <div class="stat-box">
                                                        <div class="stat-title">Total Charging Cost</div>
                                                        <div class="stat-value">$634.83</div>
                                                    </div>

                                                    <div class="stat-box">
                                                        <div class="stat-title">Total Energy</div>
                                                        <div class="stat-value">247.17 <span
                                                                class="stat-unit">kWh</span></div>
                                                    </div>



                                                    <div class="stat-box">
                                                        <div class="stat-title">Average Energy Economy</div>
                                                        <div class="stat-value">--</div>
                                                    </div>

                                                    <div class="stat-box">
                                                        <div class="stat-title">Avg. Cost</div>
                                                        <div class="stat-value">$2.57 <span class="stat-unit">/
                                                                kWh</span></div>
                                                    </div>
                                                </div>


                                                <div class="filter-container">
                                                    <input type="text" placeholder="Search" class="search-input"
                                                        id="searchInput">
                                                    <button onclick="filterTable()" class="search-button">
                                                        <i class="fa fa-search"></i>
                                                    </button>

                                                    <div class="dropdown">
                                                        <button class="dropbtn">Start At ▼</button>
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
                                                        <button class="dropbtn">End At ▼</button>
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



                                                    <div class="dropdown">
                                                        <button class="dropbtn">Vendor ▼</button>
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
                                                    <button class="filter-btn"> <i class="icon-filter"></i>
                                                        Filters
                                                    </button>
                                                </div>
                                                <div class="wg-table table-product-list">
                                                    <ul class="table-title">
                                                        <li class="body-title">Vehicle</li>
                                                        <li class="body-title">Start Date</li>
                                                        <li class="body-title">End Time</li>
                                                        <li class="body-title">Duration</li>
                                                        <li class="body-title">Vendor</li>
                                                        <li class="body-title"
                                                            style="position: relative; display: inline-block;">
                                                            <span class="tooltip-icon">Meter Entry</span>
                                                            <div class="tooltip">Primary meter units per vehicle
                                                                settings</div>
                                                        </li>
                                                        <li class="body-title"
                                                            style="position: relative; display: inline-block;">
                                                            <span class="tooltip-icon">Usage</span>
                                                            <div class="tooltip">Difference in primary meter between
                                                                current and previous fuel entry</div>
                                                        </li>
                                                        <li class="body-title">Economy</li>
                                                        <li class="body-title">Total Energy</li>
                                                        <li class="body-title">Unit Price</li>
                                                        <li class="body-title">Energy Cost</li>
                                                        <li class="body-title">Cost Per Meter</li>

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

            window[clearFunction] = function() {
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
        <!-- filter -->
</body>



</html>