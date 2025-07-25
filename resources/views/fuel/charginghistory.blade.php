<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>vehicles list</title>
    <style>
        body {
            background: #f4f8fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-in-out;
        }

        .charging-icon {
            font-size: 60px;
            color: #0d6efd;
            animation: pulse 2s infinite;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.7;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .fade-text {
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>



</head>

<body class="body">
    <div id="wrapper">
        <div id="page">
            <div class="layout-wrap">

                @include('home.sidebar')
                <div class="section-content-right">
                    @include('home.header')
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="container py-5">
                                    <h5 class="mb-4 text-center fade-text">🔌 Charging Vehicle Status</h5>

                                    <!-- Currently Charging Vehicles -->
                                    <div class="mb-5">
                                        <div class="card p-4 text-center">
                                            <div class="charging-icon mb-3">⚡</div>
                                            <p class="text-muted mb-0">No electric vehicles are currently charging.</p>
                                        </div>
                                    </div>

                                    <!-- Charging History -->
                                    <div>
                                        <div class="card p-4 text-center">
                                            <div class="charging-icon mb-3">📉</div>
                                            <p class="text-muted mb-0">No charging history available. History will
                                                appear here once EVs are added.</p>
                                        </div>
                                    </div>
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
        setupSearch("contactPhoneSearchInput", "contactPhoneApplyButton", "clearContactPhoneSearch");
        setupSearch("labelSearchInput", "labelApplyButton", "clearLabelSearch");
    </script>
    <!-- filter -->
</body>



</html>