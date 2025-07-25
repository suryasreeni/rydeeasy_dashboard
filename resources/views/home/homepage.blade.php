@include('home.headerlinks')
<style>
    .reminder-wrapper {
        padding: 20px;
        background: none;
    }

    .reminder-title {
        background-color: #ff5722;
        color: #fff;
        font-weight: bold;
        text-align: center;
        padding: 12px;
        font-size: 18px;
        border-radius: 4px;
        margin-bottom: 25px;
    }

    .reminder-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .reminder-card {
        display: block;
        width: 100%;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s;
        color: #000;
        text-decoration: none;
    }

    .reminder-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        background-color: #f9f9f9;
    }

    .reminder-card h5 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
    }

    .reminder-card p {
        font-size: 15px;
        margin: 5px 0;
    }
</style>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <!-- <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div> -->
                <!-- /preload -->
                @include('home.sidebar')
                <!-- section-content-right -->
                <div class="section-content-right">
                    @include('home.header')
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <!-- <div class="tf-section-4 mb-30">
                                 <p>Contents here.............</p>
                                  </div> -->

                                <div class="tf-section-4 mb-30">
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14" style="cursor: pointer;"
                                                onclick="loadDueAssignments()" data-bs-toggle="modal"
                                                data-bs-target="#dueTomorrowModal">

                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                                        viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#22C55E" />
                                                    </svg>
                                                    <!-- Bell Icon -->
                                                    <i
                                                        class="fa fa-bell fs-4 text-white position-absolute top-50 start-50 translate-middle"></i>

                                                    <!-- Red Dot Badge (initially hidden) -->
                                                    <span id="reminder-badge"
                                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                        style="display: none;">
                                                    </span>



                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">
                                                        Reminder
                                                    </div>
                                                    <h4>
                                                        Assignment
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Reminder Modal -->
                                    <div class="modal fade" id="dueTomorrowModal" tabindex="-1"
                                        aria-labelledby="dueTomorrowModalLabel" aria-hidden="true">
                                        <div
                                            class="modal-dialog modal-fullscreen-md-down modal-lg modal-dialog-scrollable">
                                            <div class="modal-content"
                                                style="border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                                <div class="modal-header bg-dark text-white"
                                                    style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                                                    <h5 class="modal-title">
                                                        <span style="font-size: 20px;">🚨 Vehicle Return
                                                            Reminders</span>
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="due-tomorrow-body" style="padding: 24px;">
                                                    <p>Loading...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- /chart-default -->
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14">
                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                                        viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#FF5200" />
                                                    </svg>
                                                    <i class="fa fa-bell"></i>
                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">Reminder</div>
                                                    <h4>RoadTex
                                                    </h4>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    <!-- /chart-default -->
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14">
                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                                        viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#CBD5E1" />
                                                    </svg>
                                                    <i class="fa fa-bell"></i>
                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">Reminder</div>
                                                    <h4>National Permit</h4>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    <!-- /chart-default -->
                                    <!-- chart-default -->
                                    <div class="wg-chart-default">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap14">
                                                <div class="image type-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                                        viewBox="0 0 48 52" fill="none">
                                                        <path
                                                            d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                                            fill="#2377FC" />
                                                    </svg>
                                                    <i class="fa fa-bell"></i>
                                                </div>
                                                <div>
                                                    <div class="body-text mb-2">
                                                        Reminder
                                                    </div>
                                                    <h4>POC</h4>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    <!-- /chart-default -->
                                </div>
                                <div class="tf-section-6 mb-30">
                                    <!-- best-shop-sellers -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Vehicle List</h5>
                                            <div class="default">

                                                <a href="{{ route('vehicle.vehicle') }}" class="view-all">View
                                                    all</a>


                                            </div>
                                        </div>
                                        <div class="wg-table table-best-shop-sellers" style="height:400px !important;">
                                            <!-- Table Header -->
                                            <ul class="table-title"
                                                style="display: flex !important; justify-content: space-between !important; padding: 0 10px !important;">
                                                <li style="width: 50% !important;">
                                                    <div class="body-title">Vin</div>
                                                </li>
                                                <li style="width: 50% !important;">
                                                    <div class="body-title">Status</div>
                                                </li>
                                            </ul>

                                            <!-- Table Body -->
                                            <ul class="flex flex-column"
                                                style="padding: 0 !important; margin: 0 !important;">
                                                @foreach($vehicles as $vehicle)
                                                    <li class="shop-item"
                                                        style="display: flex !important; justify-content: space-between !important; align-items: center !important; gap: 10px !important; padding: 12px 10px !important; border-bottom: 1px solid #eee !important;">

                                                        <!-- VIN + Image -->
                                                        <div
                                                            style="display: flex !important; align-items: center !important; gap: 10px !important; width: 50% !important;">
                                                            <img src="{{ asset('storage/' . $vehicle->vehicle_image) }}"
                                                                alt="Vehicle Image"
                                                                style="width: 32px !important; height: 32px !important; border-radius: 50% !important; object-fit: cover !important;">
                                                            <span class="body-text"
                                                                style="font-size: 14px !important;">{{ $vehicle->vin }}</span>
                                                        </div>

                                                        <!-- Status -->
                                                        <div
                                                            style="display: flex !important; align-items: center !important; gap: 6px !important; width: 50% !important;">
                                                            <span
                                                                style="width: 10px !important; height: 10px !important; border-radius: 50% !important; background-color: {{ $vehicle->status->status_color ?? '#ccc' }} !important; display: inline-block !important;"></span>
                                                            <span class="body-text"
                                                                style="font-size: 14px !important;">{{ $vehicle->status->status_name ?? 'N/A' }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="flex items-center justify-between flex-wrap gap10 mt-3">
                                            <div class="text-tiny">
                                                Showing {{ $vehicles->firstItem() }} to {{ $vehicles->lastItem() }} of
                                                {{ $vehicles->total() }} entries
                                            </div>
                                            <div>
                                                @if ($vehicles->hasPages())
                                                    <ul class="wg-pagination"
                                                        style="display: flex; align-items: center; gap: 8px; list-style: none; padding: 0; margin: 0;">

                                                        {{-- Previous Page --}}
                                                        <li>
                                                            <a href="{{ $vehicles->previousPageUrl() ?? 'javascript:void(0);' }}"
                                                                style="display: flex; justify-content: center; align-items: center; width: 36px; height: 36px; border-radius: 50%; background-color: #f5f5f5; color: #666; text-decoration: none; font-size: 16px; @if($vehicles->onFirstPage()) opacity: 0.5; pointer-events: none; @endif">
                                                                <i class="icon-chevron-left"></i>
                                                            </a>
                                                        </li>

                                                        {{-- Page Links --}}
                                                        @foreach ($vehicles->getUrlRange(1, $vehicles->lastPage()) as $page
                                                            => $url)
                                                            <li>
                                                                <a href="{{ $url }}"
                                                                    style="display: flex; justify-content: center; align-items: center; width: 36px; height: 36px; border-radius: 50%; text-decoration: none; font-size: 14px; font-weight: 600; background-color: {{ $vehicles->currentPage() == $page ? '#1e7eff' : '#fff' }}; color: {{ $vehicles->currentPage() == $page ? '#fff' : '#111' }}; border: 1px solid {{ $vehicles->currentPage() == $page ? '#1e7eff' : '#ccc' }};">
                                                                    {{ $page }}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                        {{-- Next Page --}}
                                                        <li>
                                                            <a href="{{ $vehicles->nextPageUrl() ?? 'javascript:void(0);' }}"
                                                                style="display: flex; justify-content: center; align-items: center; width: 36px; height: 36px; border-radius: 50%; background-color: #f5f5f5; color: #666; text-decoration: none; font-size: 16px; @if(!$vehicles->hasMorePages()) opacity: 0.5; pointer-events: none; @endif">
                                                                <i class="icon-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>




                                    </div>
                                    <!-- /best-shop-sellers -->
                                    <div class="wg-box">
                                        <div class="reminder-wrapper">
                                            <div class="reminder-title">UPCOMING EXPIRY DATE REMINDERS FOR VEHICLE
                                                DOCUMENTS</div>
                                            <div class="reminder-cards row">
                                                @php
                                                    $reminderItems = [
                                                        [
                                                            'title' => 'Insurance',
                                                            'key' => 'insurance',
                                                            'route' =>
                                                                route('insurance.list')
                                                        ],
                                                        [
                                                            'title' => 'Registrations',
                                                            'key' => 'registration',
                                                            'route' =>
                                                                route('registration.list')
                                                        ],
                                                        [
                                                            'title' => 'RoadTax',
                                                            'key' => 'roadtax',
                                                            'route' =>
                                                                route('roadtax.list')
                                                        ],
                                                        ['title' => 'PUC', 'key' => 'puc', 'route' => route('puc.list')],
                                                        [
                                                            'title' => 'State Permit',
                                                            'key' => 'state_permit',
                                                            'route' =>
                                                                route('statepermit.list')
                                                        ],
                                                        [
                                                            'title' => 'National Permit',
                                                            'key' => 'national_permit',
                                                            'route' =>
                                                                route('nationalpermit.list')
                                                        ],
                                                        [
                                                            'title' => 'Fitness',
                                                            'key' => 'fitness',
                                                            'route' =>
                                                                route('fitness.list')
                                                        ],
                                                        [
                                                            'title' => 'Explosive',
                                                            'key' => 'explosive',
                                                            'route' =>
                                                                route('explosive.list')
                                                        ],
                                                        [
                                                            'title' => 'Environmental',
                                                            'key' => 'environmental',
                                                            'route' =>
                                                                route('enviornmental.list')
                                                        ],
                                                    ];
                                                @endphp

                                                @foreach ($reminderItems as $item)
                                                    <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                        <a href="{{ $item['route'] }}" class="reminder-card">
                                                            <h5>{{ $item['title'] }}</h5>
                                                            <p
                                                                class="{{ ($reminders[$item['key']]['due_soon'] ?? 0) > 0 ? 'text-warning fw-bold' : 'text-secondary' }}">
                                                                Due Soon: {{ $reminders[$item['key']]['due_soon'] ?? 0 }}
                                                            </p>
                                                            <p
                                                                class="{{ ($reminders[$item['key']]['overdue'] ?? 0) > 0 ? 'text-danger fw-bold' : 'text-secondary' }}">
                                                                Overdue: {{ $reminders[$item['key']]['overdue'] ?? 0 }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>





                                    <!-- /product-overview -->
                                </div>



                                <!-- /top-countries -->
                            </div>



                            <!-- /main-content -->
                        </div>
                        <!-- /section-content-right -->
                    </div>
                    <!-- /layout-wrap -->
                </div>
                <!-- /#page -->
            </div>
            <!-- /#wrapper -->

            @include('home.bottomlinks')

            <script>
            func tion loadDueAssignments() {
                  fetc   h("{{ route('assignments.due') }}")
                        .then(res => res.json())
                    .the     n(data => {
                        const badge = document.getElementById('reminder-badge');
  
                              // If no reminders
                        if (data.length === 0) {
                            docu     ment.getElementById('due-tomorrow-body').innerHTML =
                                    '<p>No upcoming assignments.</p>';
                                badge.style.display = 'none'; // Hide badge if no due
                                return;
                        }
  
                              // Show count or dot
                            badge.style.display = 'inline-block';
                        badge.textContent = data.length > 9 ? '9+' : data.length;
 
                               // Build table
                        let html = `<div style="overflow-x:auto;">
                <table class="table" style="min-width: 600px; font-size: 17px; border-radius: 12px; overflow: hidden;">
                    <thead style="background: #f8f9fa;">
                        <tr style="font-weight: bold;">
                            <th style="padding: 14px;">VIN</th>
                            <th style="padding: 14px;">Expected Return</th>
                            <th style="padding: 14px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>`;
  
                           data   .forEach(row => {
                               let  bg = '',
                                    badgeStyle = '',
                                label = '';

                                  if (  row.status === 'overdue') {
                                    bg = '#fff5f5';
                                    badgeStyle = 'background:#ef4444; color:white;';
                                    label = 'Overdue';
                            }
                                el se
                              if (  row.status === 'today') {
                                    bg = '#fffbe6';
                                    badgeStyle = 'background:#eab308; color:white;';
                                    label = 'Due Today';
                            }
                                el se
                               if ( row.status === 'tomorrow') {
                                    bg = '#f0fdf4';
                                    badgeStyle = 'background:#22c55e; color:white;';
                                    label = 'Due Tomorrow';
                            }
  
                              html += `<tr style="background-color: ${bg};">
                    <td style="padding: 14px; font-weight: 500;">${row.vin}</td>
                    <td style="padding: 14px;">${row.expected_return}</td>
                    <td style="padding: 14px;">
                        <span style="padding: 6px 16px; border-radius: 20px; font-weight: 600; ${badgeStyle} box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
                            ${label}
                        </span>
                    </td>
                                      </tr>`;
                        });
  
                              html += `</tbody></table></div>`;
                            document.getElementById('due-tomorrow-body').innerHTML = html;
                            })
                         .cat    ch(err => {
                        console.error(err);
                           docu      ment.getElementById('due-tomorrow-body').innerHTML =
                                    '<p class="text-danger">Error loading data.</p>';
                        });
            }
            </script>



</body>




</html>