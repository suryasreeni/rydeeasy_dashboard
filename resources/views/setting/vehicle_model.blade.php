<div id="vehicle_model" class="tab-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Vehicle Model</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addModelModal">
            Add Modal
        </button>
    </div>

    <!-- Table wrapper -->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" style="width: 800px;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vehicle Model</th>
                    <th scope="col">Vehicle Brand</th>

                    <th scope="col" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicle_model as $index => $model)


                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <span style="display: inline-flex; align-items: center;">
                                {{$model->model_name}}</span>
                        </td>
                        <td>
                            <span style="display: inline-flex; align-items: center;">
                                {{ $model->brand->brand_name ?? 'N/A' }}
                            </span>
                        </td>
                        <td>


                            <!-- Delete Form -->
                            <form action="{{ route('model.destroy', $model->id) }}" method="POST" style="display: inline;">
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
                <div class="modal fade" id="addModelModal" tabindex="-1" aria-labelledby="addModelModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('model.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Vehicle Model</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Select Brand -->
                                    <div class="mb-3">
                                        <label for="brand_id" class="form-label">Select Brand</label>
                                        <select name="brand_id" class="form-select" required>
                                            <option value="" disabled selected>Select Brand</option>
                                            @foreach($vehicle_brand as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Model Name -->
                                    <div class="mb-3">
                                        <label for="model_name" class="form-label">Model Name</label>
                                        <input type="text" name="model_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Model</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            </tbody>
        </table>
    </div>
</div>