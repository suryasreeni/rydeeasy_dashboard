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

        .name-container {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Space between image and name */
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
                                    <h3>Contacts

                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">
                                        <!-- <li><a href="#">
                                                <div class="text-tiny">Vehicle</div>
                                            </a></li>
                                        <li><i class="icon-chevron-right"></i></li>
                                        <li>
                                            <div class="text-tiny">Assignment History</div>
                                        </li> -->
                                        <a class="tf-button style-1 w208" href="{{url('/AddContact')}}">
                                            <i class="icon-plus"></i>New Contact
                                        </a>
                                    </ul>
                                </div>

                                <div class="wg-box">


                                    <div class="flex items-center justify-between gap10 flex-wrap">


                                        <div class="filter-container">
                                            <input type="text" placeholder="Search" class="search-input"
                                                id="searchInput" onkeyup="filterTable()">

                                            <!-- <div class="dropdown">
                                                <button class="dropbtn">User Status ▼</button>
                                                <div class="dropdown-content">
                                                    <form class="form-search">
                                                        <fieldset class="name">
                                                            <input type="text" placeholder="Search here..." name="name"
                                                                required>
                                                        </fieldset>
                                                        <div class="button-submit">
                                                            <button type="submit"><i class="icon-search"></i></button>
                                                        </div>
                                                    </form>
                                                    <a href="#">&#128994 Active</a>
                                                    <a href="#">&#128308 Inactive</a>
                                                    <a href="#">&#9899; No Access</a>
                                                    <a href="#">&#128309 Needs Invite</a>
                                                    <a href="#">&#128995; Invited</a>
                                                    <a href="#">&#128996; Dormant</a>





                                                </div>
                                            </div>

                                            <div class="dropdown">
                                                <button class="dropbtn">User Type ▼</button>
                                                <div class="dropdown-content">
                                                    <a href="#">Admin</a>
                                                    <a href="#">User</a>
                                                </div>
                                            </div>

                                            <div class="dropdown">
                                                <button class="dropbtn">Classification ▼</button>
                                                <div class="dropdown-content">
                                                    <a href="#">Operator</a>
                                                    <a href="#">Manager</a>
                                                </div>
                                            </div>

                                            <div class="dropdown">
                                                <button class="dropbtn">Group ▼</button>
                                                <div class="dropdown-content">
                                                    <a href="#">Sales</a>
                                                    <a href="#">Support</a>
                                                </div>
                                            </div>

                                            <button class="filter-btn"> <i class="icon-filter"></i> Filters</button> -->
                                        </div>



                                        <div class="wg-table table-product-list"><br><br>
                                            <!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif


                                            <!-- Table Header -->
                                            <ul class="table-title">
                                                <li class="body-title column-name">Name</li>
                                                <li class="body-title">Email</li>
                                                <li class="body-title">Mobile</li>
                                                <li class="body-title">Group</li>
                                                <li class="body-title">Status</li> {{-- ✅ NEW --}}
                                                <li class="body-title">Vehicle VIN</li> {{-- ✅ NEW --}}
                                                <li class="body-title column-action">Action</li>
                                            </ul>

                                            <!-- Table Body -->
                                            <ul>
                                                @foreach ($contacts as $contact)
                                                    <li class="product-item">
                                                        <!-- Name -->
                                                        <div class="body-text column-name name-container"
                                                            onclick="viewContact({{ $contact->id }})"
                                                            style="cursor: pointer;">
                                                            <span class="image">
                                                                @if (
                                                                        $contact->filename &&
                                                                        file_exists(public_path('storage/' . $contact->filename))
                                                                    )
                                                                    <img src="{{ asset('storage/' . $contact->filename) }}"
                                                                        alt="Profile Image">
                                                                @else
                                                                    <img src="{{ asset('images/default-profile.png') }}"
                                                                        alt="Default Profile Image">
                                                                @endif
                                                            </span>
                                                            <span class="contact-name">{{ $contact->name }}
                                                                {{ $contact->lastname }}</span>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="body-text">{{ $contact->email }}</div>

                                                        <!-- Mobile -->
                                                        <div class="body-text">{{ $contact->mobile }}</div>

                                                        <!-- Group -->
                                                        <div class="body-text">{{ $contact->group }}</div>

                                                        <!-- Assignment Status -->
                                                        <div class="body-text">
                                                            {{ $contact->assigned_status ?? '—' }}
                                                        </div>

                                                        <!-- Assigned Vehicle VIN -->
                                                        <div class="body-text">
                                                            {{ $contact->assigned_vin ?? '—' }}
                                                        </div>

                                                        <!-- Action Buttons -->
                                                        <div class="list-icon-function column-action d-flex gap-2">
                                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#editModal{{ $contact->id }}">
                                                                <i class="icon-edit-3"></i>
                                                            </button>

                                                            <form action="{{ route('contact.delete', $contact->id) }}"
                                                                method="POST" onsubmit="return confirm('Are you sure?')">
                                                                @csrf
                                                                @method('POST')
                                                                <button class="btn btn-sm btn-danger">
                                                                    <i class="icon-trash-2"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </li>

                                                    @include('contact.edit')
                                                @endforeach
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