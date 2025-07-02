@include('home.headerlinks')

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
                                    <!-- product-overview -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Assignment List</h5>
                                            <div class="default">

                                                <a href="{{ route('list.assignment') }}" class="view-all">View all</a>


                                            </div>
                                        </div>
                                        <div class="wg-table table-product-overview">
                                            <!-- Header Row -->
                                            <ul class="table-title"
                                                style="display: flex; gap: 20px; margin-bottom: 14px;">
                                                <li style="width: 25%;">
                                                    <div class="body-title">Vin</div>
                                                </li>
                                                <li style="width: 25%;">
                                                    <div class="body-title">Customer</div>
                                                </li>
                                                <li style="width: 25%;">
                                                    <div class="body-title">Start</div>
                                                </li>
                                                <li style="width: 25%;">
                                                    <div class="body-title">Expected Return</div>
                                                </li>
                                            </ul>

                                            <!-- Data Rows -->
                                            @foreach ($assignments as $assignment)
                                            <ul style="display: flex; gap: 20px; margin-bottom: 10px;">
                                                <!-- VIN and Image -->
                                                <li style="width: 25%; display: flex; align-items: center; gap: 10px;">
                                                    @if($assignment->vehicle && $assignment->vehicle->vehicle_image)
                                                    <img src="{{ asset('storage/' . $assignment->vehicle->vehicle_image) }}"
                                                        alt="Vehicle Image"
                                                        style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                                    @else
                                                    <div
                                                        style="width: 40px; height: 40px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                                        <span style="font-size: 10px; color: #888;">No Img</span>
                                                    </div>
                                                    @endif
                                                    <span class="body-text">{{ $assignment->vin }}</span>
                                                </li>

                                                <!-- Customer -->
                                                <li style="width: 25%; display: flex; align-items: center;">
                                                    <div class="body-text">{{ $assignment->contacts->name ?? 'N/A' }}
                                                    </div>
                                                </li>

                                                <!-- Start Date and Time -->
                                                <li style="width: 25%; display: flex; align-items: center;">
                                                    <div class="body-text">
                                                        {{ \Carbon\Carbon::parse($assignment->start_date)->format('Y-m-d') }}
                                                        {{ \Carbon\Carbon::parse($assignment->start_time)->format('h:i A') }}
                                                    </div>
                                                </li>

                                                <!-- Expected Return -->
                                                <li style="width: 25%; display: flex; align-items: center;">
                                                    <div class="body-text">{{ $assignment->expected_return ?? 'N/A' }}
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>

                                        <div class="divider"></div>
                                        <div class="flex items-center justify-between flex-wrap gap10">
                                            <div class="text-tiny">
                                                Showing {{ $assignments->firstItem() }} to
                                                {{ $assignments->lastItem() }} of {{ $assignments->total() }} entries
                                            </div>

                                            {{-- Use Laravel's pagination links with custom wrapper --}}
                                            <ul class="wg-pagination"
                                                style="display: flex; list-style: none; gap: 6px; padding: 0;">
                                                {{-- Previous Page --}}
                                                @if ($assignments->onFirstPage())
                                                <li><span style="opacity: 0.5;"><i class="icon-chevron-left"></i></span>
                                                </li>
                                                @else
                                                <li><a href="{{ $assignments->previousPageUrl() }}"><i
                                                            class="icon-chevron-left"></i></a></li>
                                                @endif

                                                {{-- Loop Through Page Numbers --}}
                                                @php
                                                $current = $assignments->currentPage();
                                                $last = $assignments->lastPage();
                                                @endphp

                                                @for ($page = 1; $page <= $last; $page++) @if ($page==$current) <li
                                                    class="active" style="font-weight: bold;"><a
                                                        href="#">{{ $page }}</a></li>
                                                    @else
                                                    <li><a href="{{ $assignments->url($page) }}">{{ $page }}</a></li>
                                                    @endif
                                                    @endfor

                                                    {{-- Next Page --}}
                                                    @if ($assignments->hasMorePages())
                                                    <li><a href="{{ $assignments->nextPageUrl() }}"><i
                                                                class="icon-chevron-right"></i></a></li>
                                                    @else
                                                    <li><span style="opacity: 0.5;"><i
                                                                class="icon-chevron-right"></i></span></li>
                                                    @endif
                                            </ul>
                                        </div>

                                    </div>
                                    <!-- /product-overview -->
                                </div>

                                <div class="tf-section-5 mb-30">
                                    <!-- chart -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Recent Order</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0);">This Week</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Last Week</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="line-chart-5"></div>
                                    </div>
                                    <!-- /chart -->
                                    <!-- top-product -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Top Products</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="view-all">View all<i
                                                            class="icon-chevron-down"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0);">3 days</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">7 days</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wg-table table-top-product">
                                            <ul class="flex flex-column gap14">
                                                <li class="product-item">
                                                    <div class="image">
                                                        <img src="images/products/1.png" alt="">
                                                    </div>
                                                    <div class="flex items-center justify-between flex-grow">
                                                        <div class="name">
                                                            <a href="product-list.html" class="body-title-2">Patimax
                                                                Fragrance Long...</a>
                                                            <div class="text-tiny mt-3">100 Items</div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny mb-3">Coupon Code</div>
                                                            <div class="body-text">Sflat</div>
                                                        </div>
                                                        <div class="country">
                                                            <img src="images/country/2.png" alt="">
                                                        </div>
                                                        <div>
                                                            <div class="body-title-2 mb-3">-15%</div>
                                                            <div class="text-tiny">$27.00</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="product-item">
                                                    <div class="image">
                                                        <img src="Assets/images/products/2.png" alt="">
                                                    </div>
                                                    <div class="flex items-center justify-between flex-grow">
                                                        <div class="name">
                                                            <a href="product-list.html" class="body-title-2">Nulo
                                                                MedalSeries Adult Cat...</a>
                                                            <div class="text-tiny mt-3">100 Items</div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny mb-3">Coupon Code</div>
                                                            <div class="body-text">Sflat</div>
                                                        </div>
                                                        <div class="country">
                                                            <img src="images/country/3.png" alt="">
                                                        </div>
                                                        <div>
                                                            <div class="body-title-2 mb-3">-15%</div>
                                                            <div class="text-tiny">$27.00</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="product-item">
                                                    <div class="image">
                                                        <img src="images/products/3.png" alt="">
                                                    </div>
                                                    <div class="flex items-center justify-between flex-grow">
                                                        <div class="name">
                                                            <a href="product-list.html" class="body-title-2">Pedigree
                                                                Puppy Dry Dog...</a>
                                                            <div class="text-tiny mt-3">100 Items</div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny mb-3">Coupon Code</div>
                                                            <div class="body-text">Sflat</div>
                                                        </div>
                                                        <div class="country">
                                                            <img src="images/country/1.png" alt="">
                                                        </div>
                                                        <div>
                                                            <div class="body-title-2 mb-3">-15%</div>
                                                            <div class="text-tiny">$27.00</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="product-item">
                                                    <div class="image">
                                                        <img src="images/products/4.png" alt="">
                                                    </div>
                                                    <div class="flex items-center justify-between flex-grow">
                                                        <div class="name">
                                                            <a href="product-list.html" class="body-title-2">Biscoito
                                                                Premier Cookie...</a>
                                                            <div class="text-tiny mt-3">100 Items</div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny mb-3">Coupon Code</div>
                                                            <div class="body-text">Sflat</div>
                                                        </div>
                                                        <div class="country">
                                                            <img src="images/country/4.png" alt="">
                                                        </div>
                                                        <div>
                                                            <div class="body-title-2 mb-3">-15%</div>
                                                            <div class="text-tiny">$27.00</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="product-item">
                                                    <div class="image">
                                                        <img src="images/products/5.png" alt="">
                                                    </div>
                                                    <div class="flex items-center justify-between flex-grow">
                                                        <div class="name">
                                                            <a href="product-list.html"
                                                                class="body-title-2 mb-3">Pedigree Adult Dry Dog...</a>
                                                            <div class="text-tiny">100 Items</div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny mb-3">Coupon Code</div>
                                                            <div class="body-text">Sflat</div>
                                                        </div>
                                                        <div class="country">
                                                            <img src="images/country/5.png" alt="">
                                                        </div>
                                                        <div>
                                                            <div class="body-title-2 mb-3">-15%</div>
                                                            <div class="text-tiny">$27.00</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /top-product -->
                                    <!-- top-countries -->
                                    <div class="wg-box">
                                        <div class="flex items-center justify-between">
                                            <h5>Top Countries By Sales</h5>
                                            <div class="dropdown default">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="view-all">View all<i
                                                            class="icon-chevron-down"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0);">3 days</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">7 days</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap10">
                                            <h4>$37,802</h4>
                                            <div class="box-icon-trending up">
                                                <i class="icon-trending-up"></i>
                                                <div class="body-title number">1.56%</div>
                                            </div>
                                            <div class="text-tiny">since last weekend</div>
                                        </div>
                                        <ul class="flex flex-column justify-between gap10 h-full">
                                            <li class="country-item">
                                                <div class="image">
                                                    <img src="images/country/6.png" alt="">
                                                </div>
                                                <div class="flex-grow flex items-center justify-between">
                                                    <a href="countries.html" class="body-text name">Turkish Flag</a>
                                                    <div class="box-icon-trending up">
                                                        <i class="icon-trending-up"></i>
                                                    </div>
                                                    <div class="body-text number">6,972</div>
                                                </div>
                                            </li>
                                            <li class="country-item">
                                                <div class="image">
                                                    <img src="images/country/7.png" alt="">
                                                </div>
                                                <div class="flex-grow flex items-center justify-between">
                                                    <a href="countries.html" class="body-text name">Belgium</a>
                                                    <div class="box-icon-trending up">
                                                        <i class="icon-trending-up"></i>
                                                    </div>
                                                    <div class="body-text number">6,972</div>
                                                </div>
                                            </li>
                                            <li class="country-item">
                                                <div class="image">
                                                    <img src="images/country/8.png" alt="">
                                                </div>
                                                <div class="flex-grow flex items-center justify-between">
                                                    <a href="countries.html" class="body-text name">Sweden</a>
                                                    <div class="box-icon-trending down">
                                                        <i class="icon-trending-down"></i>
                                                    </div>
                                                    <div class="body-text number">6,972</div>
                                                </div>
                                            </li>
                                            <li class="country-item">
                                                <div class="image">
                                                    <img src="images/country/9.png" alt="">
                                                </div>
                                                <div class="flex-grow flex items-center justify-between">
                                                    <a href="countries.html" class="body-text name">Vietnamese</a>
                                                    <div class="box-icon-trending up">
                                                        <i class="icon-trending-up"></i>
                                                    </div>
                                                    <div class="body-text number">6,972</div>
                                                </div>
                                            </li>
                                            <li class="country-item">
                                                <div class="image">
                                                    <img src="images/country/10.png" alt="">
                                                </div>
                                                <div class="flex-grow flex items-center justify-between">
                                                    <a href="countries.html" class="body-text name">Australia</a>
                                                    <div class="box-icon-trending down">
                                                        <i class="icon-trending-down"></i>
                                                    </div>
                                                    <div class="body-text number">6,972</div>
                                                </div>
                                            </li>
                                            <li class="country-item">
                                                <div class="image">
                                                    <img src="images/country/11.png" alt="">
                                                </div>
                                                <div class="flex-grow flex items-center justify-between">
                                                    <a href="countries.html" class="body-text name">Saudi Arabia</a>
                                                    <div class="box-icon-trending down">
                                                        <i class="icon-trending-down"></i>
                                                    </div>
                                                    <div class="body-text number">6,972</div>
                                                </div>
                                            </li>
                                        </ul>
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
                function loadDueAssignments() {
                    fetch("{{ route('assignments.due') }}")
                        .then(res => res.json())
                        .then(data => {
                            const badge = document.getElementById('reminder-badge');

                            // If no reminders
                            if (data.length === 0) {
                                document.getElementById('due-tomorrow-body').innerHTML =
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

                            data.forEach(row => {
                                let bg = '',
                                    badgeStyle = '',
                                    label = '';

                                if (row.status === 'overdue') {
                                    bg = '#fff5f5';
                                    badgeStyle = 'background:#ef4444; color:white;';
                                    label = 'Overdue';
                                } else if (row.status === 'today') {
                                    bg = '#fffbe6';
                                    badgeStyle = 'background:#eab308; color:white;';
                                    label = 'Due Today';
                                } else if (row.status === 'tomorrow') {
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
                        .catch(err => {
                            console.error(err);
                            document.getElementById('due-tomorrow-body').innerHTML =
                                '<p class="text-danger">Error loading data.</p>';
                        });
                }
                </script>



</body>




</html>