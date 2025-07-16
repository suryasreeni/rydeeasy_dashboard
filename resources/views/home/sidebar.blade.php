<!-- section-menu-left -->

<head>
    <style>
        .sub-menu-item.active a {
            color: #007bff;





            display: inline-block;
            /* Ensures proper spacing */
        }

        .menu-item.has-children.active>a {
            color: #007bff !important;
        }
    </style>
</head>

<body>


    <div class="section-menu-left">
        <div class="box-logo">
            <a href="" id="site-logo-inner">
                <img id="logo_header" alt="Your Logo Here" src="Assets/images/logo/rideeasy.png">
            </a>
            <div class="button-show-hide">
                <i class="icon-menu-left"></i>
            </div>
        </div>
        <div class="section-menu-left-wrap">
            <div class="center">

                <div class="center-item">
                    <!-- <div class="center-heading">All pages</div> -->
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="{{url('/home')}}" class="">
                                <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
                                <div class="text">Dashboard
                                </div>
                            </a>
                        </li>

                        <li
                            class="menu-item has-children {{ request()->is('VehicleList') || request()->is('VehicleAssignment') || request()->is('MeterHistory') || request()->is('ExpenseHistory') || request()->is('ReplacementAnalysis') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="menu-item-button">
                                <div class="icon"><i class="fas fa-car"></i></div>
                                <div class="text">Vehicle Management</div>
                            </a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item {{ request()->is('VehicleList') ? 'active' : '' }}">
                                    <a href="{{url('/VehicleList')}}">
                                        <div class="text">Vehicles</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item {{ request()->is('VehicleAssignment') ? 'active' : '' }}">
                                    <a href="{{url('/VehicleAssignment')}}">
                                        <div class="text">Vehicle Assignments</div>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('Tool')}}" class="">
                                <div class="icon"><i class="fas fa-tools"></i></div>
                                <div class="text">Tools
                                </div>
                            </a>
                        </li>
                        <li class="menu-item has-children">
                            <a href="javascript:void(0);" class="menu-item-button">
                                <div class="icon"><i class="fas fa-clipboard-list"></i> </div>
                                <div class="text">Inspection</div>
                            </a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a href="{{url('/InspectionHistory')}}">
                                        <div class="text">Inspection History</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/ItemFailure')}}">
                                        <div class="text">Item Failures</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/Schedule')}}">
                                        <div class="text">Schedules</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/Form')}}">
                                        <div class="text">Forms</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item has-children">
                            <a href="javascript:void(0);" class="menu-item-button">
                                <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                                <div class="text">Issues</div>
                            </a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a href="{{url('/Issue')}}">
                                        <div class="text">Issues</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/Fault')}}">
                                        <div class="text">Faults</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/Recall')}}">
                                        <div class="text">Recalls</div>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item has-children">
                            <a href="javascript:void(0);" class="menu-item-button">
                                <div class="icon"><i class="fas fa-bell"></i></div>
                                <div class="text">Reminders</div>
                            </a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a href="{{url('/ServiceReminder')}}">
                                        <div class="text">Service Reminders</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/VehicleRenewal')}}">
                                        <div class="text">Vehicle Renewals</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/ContactRenewal')}}">
                                        <div class="text">Contact Renewals </div>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('/Service')}}">
                                <div class="icon"><i class="fas fa-cogs"></i> </div>
                                <div class="text">Services Entry</div>
                            </a>


                        </li>


                        <li class="menu-item">
                            <a href="{{url('/Contact')}}" class="">
                                <div class="icon"><i class="fas fa-address-book"></i></div>
                                <div class="text">Contact
                                </div>
                            </a>
                        </li>



                        <li class="menu-item">
                            <a href="{{url('/Vendor')}}" class="">
                                <div class="icon"><i class="fas fa-handshake"></i>
                                </div>
                                <div class="text">Vendors
                                </div>
                            </a>
                        </li>
                        <li class="menu-item has-children">
                            <a href="javascript:void(0);" class="menu-item-button">
                                <div class="icon"><i class="fas fa-gas-pump"></i></div>
                                <div class="text">Fuel & Energy</div>
                            </a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a href="{{url('/FuelHistory')}}">
                                        <div class="text">Fuel History</div>
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="{{url('/ChargingHistory')}}">
                                        <div class="text">Charging History</div>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('/Part')}}" class="">
                                <div class="icon"><i class="fas fa-wrench"></i> </div>
                                <div class="text">Parts
                                </div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{url('/Place')}}" class="">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="text">Places</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('/Document')}}" class="">
                                <div class="icon"><i class="fas fa-file"></i> </div>
                                <div class="text">Documents
                                </div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('/Integration')}}" class="">
                                <div class="icon"><i class="fas fa-plug"></i>

                                </div>
                                <div class="text">Integrations
                                </div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('/Report')}}" class="">
                                <div class="icon"><i class="fas fa-file-alt"></i> </div>
                                <div class="text">Reports
                                </div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{url('/Setting')}}" class="">
                                <div class="icon"><i class="fas fa-cogs"></i>
                                </div>
                                <div class="text">Settings
                                </div>
                            </a>
                        </li>











                    </ul>
                </div>


            </div>

        </div>
    </div>
</body>
<script>
    function updateLogo() {
        let body = document.body;
        let logo = document.getElementById("logo_header");

        // Light & Dark Mode Logo Paths
        let lightLogo = "Assets/images/logo/rideeasy.png";
        let darkLogo = "Assets/images/logo/rideeasy-dark.png";

        // Check if dark mode is active
        if (body.classList.contains("dark-mode")) {
            logo.src = darkLogo; // Set Dark Mode Logo
        } else {
            logo.src = lightLogo; // Set Light Mode Logo
        }
    }

    // Run function when page loads
    window.onload = updateLogo;
</script>
<!-- /section-menu-left -->