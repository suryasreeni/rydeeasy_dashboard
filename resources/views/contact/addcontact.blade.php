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
        font-family: 'Poppins', sans-serif;
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

    .upload-btn {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        font-size: 14px;
        font-weight: 500;
        color: #fff;
        background-color: hsl(25, 100.00%, 50.00%);
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
        border: none;
    }

    .upload-btn:hover {
        background-color: rgb(223, 122, 33);
    }

    .upload-btn .icon {
        margin-right: 5px;
        font-size: 16px;
    }

    .body-title {
        font-weight: 500;
    }

    /* dropdown */
    .select2-selection__placeholder {
        color: #999;
        font-style: italic;
    }

    .tf-button {
        background-color: hsl(25, 100.00%, 50.00%);
        border: none;
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
                                    <h3>New Contact</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="text-tiny">Contact</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Add Contact</div>
                                        </li>
                                    </ul>
                                </div>
                                <form class="form-add-new-user form-style-2" action="{{ route('contact.post') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- basic information -->
                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Basic Details</h5>
                                            </div><br><br><br>
                                            <div class="form-row">
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Name</div>
                                                    <input type="text" placeholder="Username" name="name" tabindex="0"
                                                        value="" aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Last Name</div>
                                                    <input type="text" placeholder="Last Name" name="lastname"
                                                        tabindex="0" value="" aria-required="true">
                                                </fieldset>
                                            </div><br>
                                            <div class="form-row">
                                                <fieldset class="email">
                                                    <div class="body-title mb-10">Email</div>
                                                    <input type="email" placeholder="Email" name="email" tabindex="0"
                                                        value="" aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Group</div>
                                                    <select name="group" id="group-select" class="select2"
                                                        style="width: 100%;">
                                                        <option value="" disabled selected>Please Select</option>
                                                        <option value="Operator">Operator</option>
                                                        <option value="Employee">Employee</option>
                                                        <option value="Technician">Technician</option>
                                                        <option value="Driver">Driver</option>
                                                        <option value="Customer">Customer</option>
                                                        <option value="Fleet Manager">Fleet Manager</option>
                                                        <option value="Mechanic">Mechanic</option>
                                                        <option value="Vendor">Vendor</option>
                                                        <option value="Contractor">Contractor</option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Cleaner">Cleaner</option>
                                                        <option value="Agent">Agent</option>
                                                        <option value="Supervisor">Supervisor</option>
                                                        <option value="Partner">Partner</option>
                                                        <option value="Temporary Staff">Temporary Staff</option>
                                                    </select>
                                                </fieldset>
                                            </div><br>
                                            <fieldset>
                                                <div class="body-title">Profile Image <span class="tf-color-1">*</span>
                                                </div>

                                                <div class="upload-image">
                                                    <label class="upload-btn" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        Pick File
                                                    </label>
                                                    <input type="file" id="myFile" name="filename" hidden
                                                        onchange="showFileName(this)">
                                                    <p id="file-name" style="margin-top: 10px; color: #333;"></p>

                                                    {{-- Show validation error --}}
                                                    @error('filename')
                                                    <div style="color: red; margin-top: 5px;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>

                                    <!-- contact information -->
                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Contact Information</h5>
                                            </div><br><br><br>
                                            <div class="form-row">
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Mobile Number</div>
                                                    <input type="text" name="mobile" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Other Number</div>
                                                    <input type="text" name="other_mobile" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                            </div><br>
                                            <div class="form-row">
                                                <fieldset class="email">
                                                    <div class="body-title mb-10">Address</div>
                                                    <input type="text" placeholder="Enter your Address" name="address1"
                                                        tabindex="0" value="" aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Address 2</div>
                                                    <input type="text" placeholder="Enter Your Address" name="address2"
                                                        tabindex="0" value="" aria-required="true">
                                                </fieldset>
                                            </div><br>

                                            <div class="form-row">
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">City</div>
                                                    <input type="text" name="city" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">State/Province/Region</div>
                                                    <input type="text" name="state" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                            </div><br>
                                            <div class="form-row">
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Zip/Postal Code</div>
                                                    <input type="text" name="pincode" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Country</div>
                                                    <input type="text" name="country" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                            </div><br>
                                        </div>
                                    </div>

                                    <div class="wg-box">
                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Personal Details</h5>
                                            </div><br><br><br>
                                            <div class="form-row">
                                                <fieldset class="email">
                                                    <div class="body-title mb-10">Job Title</div>
                                                    <input type="text" name="jobtitle" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">Date of Birth</div>
                                                    <input type="date" name="dob" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                            </div><br>


                                            <div class="form-row">
                                                <fieldset class="email">
                                                    <div class=" body-title mb-10">License Number
                                                    </div>
                                                    <input type="text" name="licensenum" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                                <fieldset class="name">
                                                    <div class="body-title mb-10">License State/Province/Region</div>
                                                    <input type="text" name="licensestate" tabindex="0" value=""
                                                        aria-required="true">
                                                </fieldset>
                                            </div><br>

                                        </div>
                                    </div>



                                    <div class="bot">
                                        <button class="tf-button w180" type="submit">Save</button>
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

    <script>
    function showFileName(input) {
        const fileName = input.files.length > 0 ? input.files[0].name : '';
        document.getElementById('file-name').textContent = fileName;
    }
    </script>



</body>

</html>