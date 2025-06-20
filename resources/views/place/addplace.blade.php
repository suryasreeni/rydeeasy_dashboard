<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment History</title>

    <!-- Leaflet CSS for Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

    <style>
        /* Upload & Submit Buttons */
        .submit-btn {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #0056b3;
        }

        /* Address Autocomplete */
        .autocomplete-container {
            position: relative;
        }

        .autocomplete-suggestions {
            position: absolute;
            width: 100%;
            background: white;
            border: 1px solid #007bff;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }

        .autocomplete-suggestions div {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: background 0.3s ease;
        }

        .autocomplete-suggestions div:hover {
            background: #007bff;
            color: white;
        }

        /* Map Styles */
        #map {
            height: 350px;
            width: 100%;
            border-radius: 10px;
            border: 2px solid #007bff;
            margin-top: 10px;
        }
    </style>
</head>

<body class="body">
    <div id="wrapper">
        <div id="page">
            <div class="layout-wrap">
                <div id="preload" class="preload-container">
                    <div class="preloading"><span></span></div>
                </div>

                @include('home.sidebar')
                <div class="section-content-right">
                    @include('home.header')
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Place</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">
                                        <a class="tf-button style-1 w150" href="{{url('/VehicleList')}}">Cancel</a>
                                    </ul>
                                </div>

                                <!-- Add New Place Form -->
                                <form class="form-add-new-user form-style-2" action="{{ route('contact.post') }}"
                                    method="POST">
                                    @csrf

                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <h5 class="mb-4">Details</h5><br><br><br>

                                            <fieldset class="mb-24">
                                                <div class="body-title mb-10">Number</div>
                                                <input type="text" placeholder="Enter Name" name="email" required>
                                            </fieldset>

                                            <fieldset class="mb-24">
                                                <div class="body-title mb-10">Description</div>
                                                <textarea name="group" required></textarea>
                                            </fieldset>

                                            <fieldset class="mb-24">
                                                <div class="body-title mb-10">Address</div>
                                                <div class="autocomplete-container">
                                                    <input type="text" id="addressInput" placeholder="Enter Address"
                                                        required>
                                                    <div id="addressSuggestions" class="autocomplete-suggestions"></div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="mb-24">
                                                <div class="body-title mb-10">Geofence Radius</div>
                                                <select id="geofenceRadius" required>
                                                    <option value="" disabled selected>Please select</option>
                                                    <option value="100">100 meters</option>
                                                    <option value="200">200 meters</option>
                                                    <option value="300">300 meters</option>
                                                    <option value="400">400 meters</option>
                                                </select>
                                                <p style="font-size:10px;">
                                                    The geofence radius is used to determine the location entries that
                                                    are associated with this place.
                                                </p>
                                            </fieldset>

                                            <!-- Map Section -->
                                            <div id="map"></div>

                                            <div style="margin-top:10px;">
                                                <button class="submit-btn" type="button"
                                                    onclick="window.location.href='{{ route('place.place') }}';">Cancel</button>
                                                <button class="submit-btn" type="submit"
                                                    style="right:0;position:absolute;">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- /Add New Place Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.bottomlinks')

    <!-- Leaflet.js for Map -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([10.8505, 76.2711], 10); // Kerala Default

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([10.8505, 76.2711], {
            draggable: true
        }).addTo(map)
            .bindPopup("Selected Location")
            .openPopup();

        var geofenceCircle = L.circle([10.8505, 76.2711], {
            radius: 100,
            color: "red"
        }).addTo(map);

        function updateMap(lat, lon) {
            map.setView([lat, lon], 15);
            marker.setLatLng([lat, lon]).bindPopup("Selected Location").openPopup();
            updateGeofence(lat, lon);
        }

        function updateGeofence(lat, lon) {
            var radius = document.getElementById('geofenceRadius').value || 100;
            geofenceCircle.setLatLng([lat, lon]).setRadius(radius);
        }

        marker.on('dragend', function (e) {
            var lat = marker.getLatLng().lat;
            var lon = marker.getLatLng().lng;
            updateMap(lat, lon);
        });

        document.getElementById('geofenceRadius').addEventListener('change', function () {
            var lat = marker.getLatLng().lat;
            var lon = marker.getLatLng().lng;
            updateGeofence(lat, lon);
        });

        document.getElementById('addressInput').addEventListener('input', function () {
            let query = this.value;
            let suggestionsContainer = document.getElementById('addressSuggestions');

            if (query.length === 0) {
                suggestionsContainer.style.display = "none";
                return;
            }

            fetch(`https://nominatim.openstreetmap.org/search?format=json&countrycodes=IN&q=${query}`)
                .then(response => response.json())
                .then(data => {
                    suggestionsContainer.innerHTML = '';
                    suggestionsContainer.style.display = "block";

                    data.forEach(place => {
                        let div = document.createElement('div');
                        div.textContent = place.display_name;
                        div.dataset.lat = place.lat;
                        div.dataset.lon = place.lon;

                        div.addEventListener('click', function () {
                            document.getElementById('addressInput').value = this.textContent;
                            updateMap(this.dataset.lat, this.dataset.lon);
                            suggestionsContainer.style.display = "none";
                        });

                        suggestionsContainer.appendChild(div);
                    });
                });
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.autocomplete-container')) {
                document.getElementById('addressSuggestions').style.display = "none";
            }
        });
    </script>

</body>

</html>