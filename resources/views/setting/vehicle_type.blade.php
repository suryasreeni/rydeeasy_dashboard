<div id="vehicle_type" class="tab-content p-4" style="display: none;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Vehicle Type</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addTypeModal">
            Add Type
        </button>
    </div>

    <!-- Table wrapper -->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 800px;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $index => $type)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <span style="display: inline-flex; align-items: center;">
                                {{ $type->type_name }}
                            </span>
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editTypeModal{{ $type->id }}">
                                <i class=" bi bi-pencil-square"></i>
                            </button>

                            <!-- Delete Form -->
                            <form action="{{ route('type.destroy', $type->id) }}" method="POST" style="display: inline;">
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
                    <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('type.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addTypeModalLabel">Add Vehicle Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Type Name -->
                                        <div class="mb-3">
                                            <label for="typeName" class="form-label">Type Name</label>
                                            <input type="text" class="form-control" id="typeName" name="type_name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Add Type</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Example Edit Modal -->
                    <div class="modal fade" id="editTypeModal{{ $type->id }}" tabindex=" -1"
                        aria-labelledby="editTypeModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('type.update', $type->id) }}" method=" POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editTypeModalLabel1">Edit Vehicle Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Type Name -->
                                        <div class="mb-3">
                                            <label for="editTypeName1" class="form-label">Type Name</label>
                                            <input type="text" class="form-control" id="editTypeName1"
                                                value="{{ $type->type_name }}" name=" type_name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update Type</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>
    </div>



</div>