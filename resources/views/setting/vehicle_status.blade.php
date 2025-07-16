<div id="vehicle_status" class="tab-content p-4" style="display: none;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Vehicle Status</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addStatusModal">
            Add Status
        </button>
    </div>

    <!-- Table wrapper -->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 800px;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statuses as $index => $status)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <span style="display: inline-flex; align-items: center;">
                                <span
                                    style="width: 10px; height: 10px; border-radius: 50%; background-color: {{ $status->status_color }}; display: inline-block; margin-right: 6px;"></span>
                                {{ $status->status_name }}
                            </span>
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editStatusModal{{ $status->id }}">
                                <i class=" bi bi-pencil-square"></i>
                            </button>

                            <!-- Delete Form -->
                            <form action="{{ route('statuses.destroy', $status->id) }}" method=" POST"
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
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editStatusModal{{ $status->id }}" tabindex=" -1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('statuses.update', $status->id) }}" method=" POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Status Name</label>
                                            <input type="text" name="status_name" class="form-control"
                                                value="{{ $status->status_name }}" required>
                                        </div>
                                        <div class=" mb-3">
                                            <label>Status Color</label>
                                            <input type="color" name="status_color" class="form-control form-control-color"
                                                value="{{ $status->status_color }}" required>
                                        </div>
                                    </div>
                                    <div class=" modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
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

<!-- Bootstrap Modal for Add Status -->
<div class="modal fade" id="addStatusModal" tabindex="-1" aria-labelledby="addStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('vehicle-status.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Vehicle Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Status Name -->
                    <div class="mb-3">
                        <label for="statusName" class="form-label">Status Name</label>
                        <input type="text" class="form-control" id="statusName" name="status_name" required>
                    </div>
                    <!-- Status Color -->
                    <div class="mb-3">
                        <label for="statusColor" class="form-label">Status Color</label>
                        <input type="color" class="form-control form-control-color" id="statusColor" name="status_color"
                            value="#008000" title="Choose your color">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Status</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>