<div id="location" class="tab-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Vehicle Location</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
            data-bs-target="#addLocationModal">
            Add Location
        </button>
    </div>

    <!-- Table wrapper -->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 800px;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vehicle Location</th>
                    <th scope="col" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <th scope="row">1</th>
                    <td>
                        <span style="display: inline-flex; align-items: center;">
                            kochi </span>
                    </td>
                    <td>


                        <!-- Delete Form -->
                        <form action="" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Add Vehicle Type Modal -->
                <div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('location.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addLocationModalLabel">Add Vehicle Location</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Type Name -->
                                    <div class="mb-3">
                                        <label for="location_name" class="form-label">Location Name</label>
                                        <input type="text" class="form-control" id="location_name" name="location_name"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Location</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </tbody>
        </table>
    </div>
</div>