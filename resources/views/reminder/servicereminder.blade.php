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

                                            <!-- Table Body -->
                                            <ul class="product-item">
                                                <!-- Vehicle -->
                                                <div class="body-text column-name name-container">
                                                    <span class="contact-name">dfdsf</span>
                                                </div>

                                                <!-- Service Task -->
                                                <div class="body-text">dfsdf</div>

                                                <!-- Status -->
                                                <div class="body-text">dfdf</div>

                                                <!-- Next Due (Date or Meter) -->
                                                <div class="body-text">
                                                    fsfsf
                                                </div>

                                                <!-- Notify -->
                                                <div class="body-text">
                                                    <span> fdfd </span>
                                                </div>

                                                <!-- Actions -->
                                                <div class="list-icon-function column-action d-flex gap-2">
                                                    <a href="#" class="btn btn-sm btn-primary">
                                                        <i class="icon-edit-3"></i>
                                                    </a>

                                                    <form action="" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this reminder?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="icon-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </ul>

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
        <!-- Contact Detail Modal -->
        <div class="modal fade" id="contactDetailModal" tabindex="-1" role="dialog"
            aria-labelledby="contactDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactDetailModalLabel">Contact Profile</h5>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"
                            style="padding: 5px;">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4 4L16 16M4 16L16 4" stroke="black" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </button>



                    </div>
                    <div class="modal-body" id="contactDetailContent">
                        <!-- Dynamic content will be loaded here -->
                        <div class="text-center">Loading...</div>
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
        <script>
            function viewContact(id) {
                // Show modal first
                $('#contactDetailModal').modal('show');

                // Show loading text
                $('#contactDetailContent').html('<div class="text-center">Loading...</div>');

                // Fetch content via AJAX
                fetch(`/contact-detail/${id}`)
                    .then(response => response.text())
                    .then(html => {
                        $('#contactDetailContent').html(html);
                    })
                    .catch(error => {
                        console.error('Error fetching contact:', error);
                        $('#contactDetailContent').html(
                            '<div class="text-danger">Failed to load contact details.</div>');
                    });
            }
        </script>

</body>



</html>