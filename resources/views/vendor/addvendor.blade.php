<!DOCTYPE html>
<html lang="en">

@include('home.headerlinks')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment History</title>
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
        gap: 10px;
    }

    .list-icon-function .item i {
        cursor: pointer;
        padding: 5px;
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

    .form-row {
        display: flex;
        gap: 20px;
        /* Adjust spacing between fields */
        align-items: center;
        /* Aligns elements vertically */
    }

    .form-row fieldset {
        border: none;
        /* Removes fieldset border */
        flex: 1;
        /* Ensures both fields take equal space */
        min-width: 200px;
        /* Prevents fields from becoming too small */
    }

    .classification-container {
        width: 100%;
        /* max-width: 600px; */


        padding: 20px;
        border-radius: 10px;

        font-family: Arial, sans-serif;
    }

    .classification-title {
        font-size: 12px;


        margin-bottom: 15px;
    }

    .classification-item {
        display: flex;
        align-items: flex-start;
        gap: 25px;
        margin-bottom: 15px;
    }

    .classification-item input {
        margin-top: 5px;
    }

    .classification-label {
        font-size: 14px;
        font-weight: bold;
        color: black;
    }

    .classification-description {
        font-size: 12px;
        color: #555;
        margin-top: 3px;
    }

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
                                        Add Vendor



                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w150" href="{{url('/VehicleList')}}">
                                            </i>Cancel
                                        </a>
                                    </ul>
                                </div>

                                <!-- add-new-user -->
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form class="form-add-new-user form-style-2" action="{{ route('vendor.post') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Details</h5>
                                            </div><br><br><br>

                                            <div class="form-row">
                                                <fieldset class="email mb-24">
                                                    <div class="body-title mb-10">Name</div>
                                                    <input type="text" placeholder="Enter Name" name="name"
                                                        value="{{ old('name') }}">
                                                    @error('name')<div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </fieldset>

                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">Email</div>
                                                    <input type="email" placeholder="Enter Email" name="email"
                                                        value="{{ old('email') }}">
                                                    @error('email')<div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </fieldset>
                                            </div>

                                            <div class="form-row">
                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">Website</div>
                                                    <input type="text" placeholder="www.example.com" name="website"
                                                        value="{{ old('website') }}">
                                                </fieldset>

                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">Address</div>
                                                    <input type="text" name="address1" value="{{ old('address1') }}">
                                                    @error('address1')<div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </fieldset>
                                            </div>

                                            <div class="form-row">
                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">Address 2</div>
                                                    <input type="text" name="address2" value="{{ old('address2') }}">
                                                </fieldset>

                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">City</div>
                                                    <input type="text" name="city" value="{{ old('city') }}">
                                                    @error('city')<div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </fieldset>
                                            </div>

                                            <div class="form-row">
                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">State/Province/Region</div>
                                                    <input type="text" name="state" value="{{ old('state') }}">
                                                </fieldset>

                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">Zip/Postal Code</div>
                                                    <input type="text" name="zip" value="{{ old('zip') }}">
                                                </fieldset>
                                            </div>

                                            <fieldset class="name mb-24" style="width:50%">
                                                <div class="body-title mb-10">Country</div>
                                                <input type="text" name="country" value="{{ old('country') }}">
                                            </fieldset>
                                        </div>
                                    </div><br><br>

                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Contact Details</h5>
                                            </div><br><br><br>

                                            <div class="form-row">
                                                <fieldset class="email mb-24">
                                                    <div class="body-title mb-10">Contact Name</div>
                                                    <input type="text" name="Contactname"
                                                        value="{{ old('Contactname') }}">
                                                    @error('Contactname')<div class="text-danger mt-1">{{ $message }}
                                                    </div>@enderror
                                                </fieldset>

                                                <fieldset class="name mb-24">
                                                    <div class="body-title mb-10">Email</div>
                                                    <input type="email" name="contactemail"
                                                        value="{{ old('contactemail') }}">
                                                    @error('contactemail')<div class="text-danger mt-1">{{ $message }}
                                                    </div>@enderror
                                                </fieldset>
                                            </div>

                                            <fieldset class="name mb-24" style="width:50%">
                                                <div class="body-title mb-10">Phone</div>
                                                <input type="text" name="ContactPhone"
                                                    value="{{ old('ContactPhone') }}">
                                            </fieldset>
                                        </div>
                                    </div><br><br>

                                    <div class="wg-box">
                                        <div class="classification-container">
                                            <div class="left">
                                                <h5 class="mb-4">Classification</h5>
                                            </div><br><br><br>

                                            @php
                                            $old = old();
                                            @endphp

                                            <div class="classification-item">
                                                <input type="checkbox" id="charging" name="is_charging" value="1"
                                                    {{ old('is_charging') ? 'checked' : '' }}>
                                                <label for="charging" class="classification-label">Charging</label>
                                                <div class="classification-description">Charging classification allows
                                                    vendor to be listed on Charging Entries</div>
                                            </div>

                                            <div class="classification-item">
                                                <input type="checkbox" id="tools" name="is_tools" value="1"
                                                    {{ old('is_tools') ? 'checked' : '' }}>
                                                <label for="tools" class="classification-label">Tools</label>
                                                <div class="classification-description">Tools classification allows
                                                    vendor to be listed on Tools</div>
                                            </div>

                                            <div class="classification-item">
                                                <input type="checkbox" id="fuel" name="is_fuel" value="1"
                                                    {{ old('is_fuel') ? 'checked' : '' }}>
                                                <label for="fuel" class="classification-label">Fuel</label>
                                                <div class="classification-description">Fuel classification allows
                                                    vendor to be listed on Fuel Entries</div>
                                            </div>

                                            <div class="classification-item">
                                                <input type="checkbox" id="service" name="is_service" value="1"
                                                    {{ old('is_service') ? 'checked' : '' }}>
                                                <label for="service" class="classification-label">Service</label>
                                                <div class="classification-description">Service classification allows
                                                    vendor to be listed on Service Entries and Work Orders</div>
                                            </div>

                                            <div class="classification-item">
                                                <input type="checkbox" id="vehicle" name="is_vehicle" value="1"
                                                    {{ old('is_vehicle') ? 'checked' : '' }}>
                                                <label for="vehicle" class="classification-label">Vehicle</label>
                                                <div class="classification-description">Vehicle classification allows
                                                    vendor to be listed on Vehicle Acquisitions</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                        <button class="submit-btn" type="button"
                                            style="background-color: black; padding: 20px; color: white; border: none; border-radius: 5px;font-size:15px;">
                                            Cancel
                                        </button>

                                        <button class="submit-btn" type="submit"
                                            style="background-color: #FF6A00; padding: 20px; color: white; border: none; border-radius: 5px;font-size:15px;">
                                        </button>
                                    </div>
                                </form>

                                <!-- /add-new-user -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.bottomlinks')
</body>

</html>