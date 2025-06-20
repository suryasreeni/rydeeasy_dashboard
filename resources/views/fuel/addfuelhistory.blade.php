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

    .tooltip-icon {
        cursor: pointer;
        margin-left: 5px;
        font-size: 14px;
        color: #555;
        border: 1px solid #ccc;
        border-radius: 50%;
        padding: 2px 6px;
        display: inline-block;
        font-weight: 400;
        position: relative;
    }

    .tooltip {
        position: absolute;
        background: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        bottom: 120%;
        left: 10%;
        transform: translateX(-50%);
        max-width: 200px;
        white-space: normal;
        word-wrap: break-word;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        z-index: 100;
    }

    .tooltip-icon:hover+.tooltip {
        visibility: visible;
        opacity: 1;
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 10px;
    }

    .upload-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .upload-btn {
        display: flex;
        align-items: center;
        padding: 8px 15px;
        background-color: #198754;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        border: none;
    }

    .upload-btn:hover {
        background-color: #145c36;
    }

    .drop-area {
        border: 2px dashed #aaa;
        padding: 10px 15px;
        color: #555;
        border-radius: 5px;
        text-align: center;
        flex: 1;
    }

    .file-status {
        font-style: italic;
        color: #666;
        font-size: 0.9em;
        margin-top: 5px;
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
                                                <div class="body-title mb-10">Vehicle</div>
                                                <select id="geofenceRadius" required>
                                                    <option value="" disabled selected>Please select</option>
                                                    <option value="100">vehicle 1</option>
                                                    <option value="200">vehicle 1</option>
                                                    <option value="300">vehicle 1</option>
                                                    <option value="400">vehicle 1</option>
                                                </select>
                                            </fieldset>
                                            <div style="display: flex; gap: 20px; align-items: center;">
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Fuel Entry Date</div>
                                                    <input type="date" id="purchase-date" name="purchase-date" required>
                                                </fieldset>
                                                <fieldset class="mb-24" style="flex: 1;">
                                                    <div class="body-title mb-10">Time</div>
                                                    <input type="time" id="purchase-price" name="purchase-price"
                                                        required>
                                                </fieldset>
                                            </div>
                                            <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                                            <fieldset class="mb-24">
                                                <div class="body-title mb-10">Vendor Name</div>
                                                <select id="geofenceRadius" required>
                                                    <option value="" disabled selected>Please select</option>
                                                    <option value="100">vehicle 1</option>
                                                    <option value="200">vehicle 1</option>
                                                    <option value="300">vehicle 1</option>
                                                    <option value="400">vehicle 1</option>
                                                </select>
                                            </fieldset>
                                            <fieldset class="mb-24" style="flex: 1;">
                                                <div class="body-title mb-10">Reference</div>
                                                <input type="text" id="purchase-price" name="purchase-price" required>
                                                <span style="font-size: 10px; color: gray;">Track an
                                                    e.g. invoice number, transaction ID, etc.</span>
                                            </fieldset>
                                            <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                                            <fieldset class="mb-24">
                                                <div class="body-title mb-10">Flags</div>
                                                <p style="font-size:10px;">
                                                    Enable the options below to flag transactions for personal use, to
                                                    ensure accurate metrics for partial fill-ups, or to reset usage
                                                    after a missed entry
                                                </p>

                                                <div class="input-group">
                                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                    <label for="vehicle1" class="body-text">Personal</label>
                                                    <span class="tooltip-icon">i</span>
                                                    <div class="tooltip">Check if this fuel entry was for personal use.
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                                    <label for="vehicle2" class="body-text">Partial Fuel-up</label>
                                                    <span class="tooltip-icon">i</span>
                                                    <div class="tooltip">Check if the tank was not filled up to "full."
                                                    </div>
                                                </div>

                                                <!-- <div class="input-group">
                                                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                                    <label for="vehicle3" class="body-text">Reset Usage</label>
                                                    <span class="tooltip-icon"></span>
                                                    <div class="tooltip">Check if this fuel entry was for personal use.
                                                    </div>
                                                </div> -->
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="row" style="display: flex;gap: 20px;">
                                                <fieldset class="md-6" style="flex: 1;">
                                                    <div class="body-title">Photo</div>
                                                    <div class="upload-container">
                                                        <label class="upload-btn" for="photoFile">
                                                            Pick File
                                                        </label>
                                                        <div class="drop-area">Or drop file here</div>
                                                        <input type="file" id="photoFile" name="photoFile" hidden>
                                                    </div>
                                                    <div class="file-status" id="photoStatus">No file selected</div>
                                                </fieldset>
                                                <fieldset class="md-6" style="flex: 1;">
                                                    <div class="body-title">Document</div>
                                                    <div class="upload-container">
                                                        <label class="upload-btn" for="documentFile">
                                                            Pick File
                                                        </label>
                                                        <div class="drop-area">Or drop file here</div>
                                                        <input type="file" id="documentFile" name="documentFile" hidden>
                                                    </div>
                                                    <div class="file-status" id="documentStatus">No file selected</div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <fieldset class="mb-24" style="flex: 1;">
                                                <div class="body-title mb-10">Comment</div>
                                                <textarea id="purchase-price" name="purchase-price" required></textarea>


                                            </fieldset>
                                        </div>
                                    </div>
                                    <div style="margin-top:10px;">
                                        <button class="submit-btn" type="button"
                                            onclick="window.location.href='{{ route('place.place') }}';">Cancel</button>
                                        <button class="submit-btn" type="submit"
                                            style="right:0;position:absolute;">Save</button>
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


    <script>
    function handleFileChange(inputId, statusId) {
        const input = document.getElementById(inputId);
        const status = document.getElementById(statusId);

        input.addEventListener('change', function() {
            if (input.files.length > 0) {
                status.textContent = input.files[0].name;
            } else {
                status.textContent = "No file selected";
            }
        });
    }

    handleFileChange("photoFile", "photoStatus");
    handleFileChange("documentFile", "documentStatus");
    </script>
</body>

</html>