<div id="part_categories" class="tab-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0" style="font-weight: 500;">Category setting</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#PartModal">
            Add Category
        </button>
    </div>

    <!-- Table wrapper -->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 800px;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($partcategories as $index => $part)

                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            {{$part->part_category_name}}
                        </td>
                        <td>


                            <!-- Delete Form -->
                            <form action="{{ route('partcategory.delete', $part->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <!-- Add service reminder
                         Modal -->
                <div class="modal fade" id="PartModal" tabindex="-1" aria-labelledby="PartModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('partcategory.store') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Status Name -->
                                    <div class="mb-3">
                                        <label for="part_category_name" class="form-label">Category
                                            Name</label>
                                        <input type="text" class="form-control" id="part_category_name"
                                            name="part_category_name" required>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit service reminder
                         Modal -->


            </tbody>
        </table>

    </div>
</div>

<div id="Measurement_units" class="tab-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0" style="font-weight: 500;">Parts/Tools Measurement Units setting</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
            data-bs-target="#MeasurementModal">
            Add Measurement
        </button>
    </div>

    <!-- Table wrapper -->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 800px;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Measurement Unit</th>
                    <th scope="col" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($measurements as $index => $measurement)

                    <tr>
                        <th scope="row">{{$index + 1}}</th>
                        <td>
                            {{$measurement->measurement_unit_name}}
                        </td>
                        <td>


                            <!-- Delete Form -->
                            <form action="{{ route('measurement.destroy', $measurement->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach


                <!-- Add service reminder
                         Modal -->
                <div class="modal fade" id="MeasurementModal" tabindex="-1" aria-labelledby="MeasurementUnitModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('measurement.store') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Measurement Unit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Status Name -->
                                    <div class="mb-3">
                                        <label for="measurement_unit_name" class="form-label">Measurement Unit
                                            Name</label>
                                        <input type="text" class="form-control" id="measurement_unit_name"
                                            name="measurement_unit_name" required>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Measurement Unit</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit service reminder
                         Modal -->


            </tbody>
        </table>

    </div>
</div>