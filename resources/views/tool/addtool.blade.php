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

    .upload-btn {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        font-size: 14px;
        font-weight: 500;
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
        border: none;
    }

    .upload-btn:hover {
        background-color: #0056b3;
    }

    .upload-btn .icon {
        margin-right: 5px;
        font-size: 16px;
    }

    .classifications-container {
        display: flex;
        flex-wrap: wrap;
        /* Allows wrapping to the next line if needed */
        gap: 2rem;
        /* Spacing between classification blocks */
        margin-bottom: 1rem;
    }

    /* Individual classification block */
    .classification-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
        /* Small gap between label row and description */
        width: 25rem;
        /* Adjust the width as needed */
    }

    /* Row containing checkbox and label side by side */
    .classification-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 15px;
        color: black;
        font-weight: bold;
        /* Spacing between checkbox and label */
    }

    /* Description text */
    .classification-desc {
        margin-left: 1.5rem;
        /* Indent to line up under the label */
        font-size: 12px;
        /* Slightly smaller text */
        color: black;
        /* Gray text color */
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
                                        Add Tool



                                    </h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap gap10">


                                        <a class="tf-button style-1 w150" href="{{url('/VehicleList')}}">
                                            </i>Cancel
                                        </a>
                                    </ul>
                                </div>

                                <!-- add-new-user -->
                                <form class="form-add-new-user form-style-2" action="{{ route('contact.post') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- identification -->
                                    <div class="wg-box">



                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Identification</h5>
                                            </div><br><br><br>


                                            <fieldset class="email mb-24">
                                                <div class="body-title mb-10">Name</div>
                                                <input type="email" placeholder="Enter Name" name="email" tabindex="0"
                                                    value="" aria-required="true" required="">
                                                <p style="font-size:10px;">Enter a nickname to distinguish this tool in
                                                    Rydeeasy.

                                                </p>
                                            </fieldset>

                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Type</div>
                                                <select id=" purchase-vendor" name="label" required>
                                                    <option value="" disabled selected style="font-size:12px;">
                                                        Please select</option>
                                                    <option value="vendor1">label 1</option>
                                                    <option value="vendor2">label 2</option>
                                                    <option value="vendor1">label 1</option>
                                                    <option value="vendor2">label 2</option>

                                                </select>
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Brand</div>
                                                <input type="text" placeholder="Please Select" name="group" tabindex="0"
                                                    value="" aria-required="true" required="">
                                                <p style="font-size:10px;">e.g. Deere, Stihl, etc.

                                                </p>
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Model</div>
                                                <input type="text" placeholder="Please Select" name="group" tabindex="0"
                                                    value="" aria-required="true" required="">
                                                <p style="font-size:10px;">Z200, WG14, etc.

                                                </p>
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Serial Number</div>
                                                <input type="text" placeholder="Please Select" name="group" tabindex="0"
                                                    value="" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Labels</div>
                                                <select id=" purchase-vendor" name="label" required>
                                                    <option value="" disabled selected style="font-size:12px;">
                                                        Please select</option>
                                                    <option value="vendor1">label 1</option>
                                                    <option value="vendor2">label 2</option>
                                                    <option value="vendor1">label 1</option>
                                                    <option value="vendor2">label 2</option>

                                                </select>
                                                <p style="font-size:10px;">Use labels to categorize, group and more.
                                                    (e.g. Electrical)


                                                </p>
                                            </fieldset>
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
                                                    <input type="file" id="myFile" name="filename" hidden>
                                                </div>
                                            </fieldset>


                                            <hr style="height:1px;border-width:0;color:gray;background-color:gray">



                                        </div>
                                    </div>

                                    <!-- custody -->
                                    <div class="wg-box">


                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Custody</h5>
                                            </div><br><br><br>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Linked Vehicle</div>
                                                <select id=" purchase-vendor" name="label" required>
                                                    <option value="" disabled selected style="font-size:12px;">
                                                        Please select</option>
                                                    <option value="vendor1">vehicle 1</option>
                                                    <option value="vendor2">vehicle 2</option>
                                                    <option value="vendor1">vehicle 1</option>
                                                    <option value="vendor2">vehicle 2</option>

                                                </select>
                                                <p style="font-size:10px;">The vehicle associated with this
                                                    tool.




                                                </p>
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Current Assignee</div>
                                                <select id=" purchase-vendor" name="label" required>
                                                    <option value="" disabled selected style="font-size:12px;">
                                                        Please select</option>
                                                    <option value="vendor1">Assignee 1</option>
                                                    <option value="vendor2">Assignee 2</option>
                                                    <option value="vendor1">Assignee 1</option>
                                                    <option value="vendor2">Assignee 2</option>

                                                </select>
                                                <p style="font-size:10px;">The person currently responsible for
                                                    this tool.



                                                </p>
                                            </fieldset>


                                        </div>
                                    </div>
                                    <!-- classification -->
                                    <div class="wg-box">


                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Classification</h5>
                                            </div><br><br><br>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Group</div>
                                                <select id=" purchase-vendor" name="label" required>
                                                    <option value="" disabled selected style="font-size:12px;">
                                                        Please select</option>
                                                    <option value="vendor1">vehicle 1</option>
                                                    <option value="vendor2">vehicle 2</option>
                                                    <option value="vendor1">vehicle 1</option>
                                                    <option value="vendor2">vehicle 2</option>

                                                </select>


                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">
                                                    Status
                                                </div>
                                                <select id=" purchase-vendor" name="label" required>
                                                    <option value="" disabled selected style="font-size:12px;">
                                                        Please select</option>
                                                    <option value="vendor1">Assignee 1</option>
                                                    <option value="vendor2">Assignee 2</option>
                                                    <option value="vendor1">Assignee 1</option>
                                                    <option value="vendor2">Assignee 2</option>

                                                </select>


                                            </fieldset>


                                        </div>
                                    </div>
                                    <!-- purchase information -->
                                    <div class="wg-box">


                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Purchase Information</h5>
                                            </div><br><br><br>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Purchase Vendor</div>
                                                <select id=" purchase-vendor" name="label" required>
                                                    <option value="" disabled selected style="font-size:12px;">
                                                        Please select</option>
                                                    <option value="vendor1">vehicle 1</option>
                                                    <option value="vendor2">vehicle 2</option>
                                                    <option value="vendor1">vehicle 1</option>
                                                    <option value="vendor2">vehicle 2</option>

                                                </select>


                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Purchase Price</div>
                                                <input type="number" name="group" tabindex="0" value=""
                                                    aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Purchase Rate</div>
                                                <input type="date" name="group" tabindex="0" value=""
                                                    aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Warranty Expiration Date</div>
                                                <input type="date" placeholder="Please Select" name="group" tabindex="0"
                                                    value="" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Purchase Comments</div>
                                                <textarea name="group" tabindex="0" value="" aria-required="true"
                                                    required=""></textarea>
                                            </fieldset>




                                        </div>
                                    </div>

                                    <!-- lifecycle -->
                                    <div class="wg-box">


                                        <div class="right flex-grow">
                                            <div class="left">
                                                <h5 class="mb-4">Lifecycle</h5>
                                            </div><br><br><br>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">In-Service Date</div>
                                                <input type="date" name="group" tabindex="0" value=""
                                                    aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Estimated Service Life in Months</div>
                                                <input type="number" name="group" tabindex="0" value=""
                                                    aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Estimated Resale Value</div>
                                                <input type="number" name="group" tabindex="0" value=""
                                                    aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="name mb-24">
                                                <div class="body-title mb-10">Out-of-Service Date</div>
                                                <input type="date" name="group" tabindex="0" value=""
                                                    aria-required="true" required="">
                                            </fieldset>




                                        </div>
                                    </div>






                                    <div>
                                        <button class="submit-btn" type="button"
                                            onclick="window.location.href='{{ route('vehicle.vehicle') }}';">Cancel</button>
                                        <button class="submit-btn" type="button" style="right:0;position:absolute;"
                                            onclick="window.location.href='{{ route('vehicle.vehicle') }}';">Save</button>
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