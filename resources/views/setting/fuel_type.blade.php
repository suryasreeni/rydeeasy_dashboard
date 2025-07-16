<div id="fuel_type" class="tab-content p-4" style="display: none;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Fuel Type</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
            data-bs-target="#addFueltypeModal">
            Add Fuel Type
        </button>
    </div>

    <!-- Table wrapper -->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 800px;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fuel Type</th>
                    <th scope="col" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fueltypes as $index => $fueltype)


                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <span style="display: inline-flex; align-items: center;">
                                {{$fueltype->fuel_type}} </span>
                        </td>
                        <td>


                            <!-- Delete Form -->
                            <form action="{{ route('fueltype.destroy', $fueltype->id) }}" method="POST"
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
                <!-- Add Vehicle Type Modal -->
                <div class="modal fade" id="addFueltypeModal" tabindex="-1" aria-labelledby="addFueltypeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('fueltype.store') }}" method="GET">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addFueltypeModalLabel">Add Fuel Type</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Type Name -->
                                    <div class="mb-3">
                                        <label for="fuel_type" class="form-label">Fuel Type Name</label>
                                        <input type="text" class="form-control" id="fuel_type" name="fuel_type"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Fuel Type</button>
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