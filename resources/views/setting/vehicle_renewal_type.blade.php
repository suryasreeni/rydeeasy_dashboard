<div id="vehicle_renewal_type" class="tab-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0" style="font-weight: 500;">service renewal type setting</h3>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
            data-bs-target="#serviceRenewalModal">
            Add Renewal Type
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


                @foreach ($renewaltypes as $renewaltype)


                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>
                            {{$renewaltype->service_renewal_name}}
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editServiceRenewalModal{{$renewaltype->id}}">
                                <i class=" bi bi-pencil-square"></i>
                            </button>

                            <!-- Delete Form -->
                            <form action="{{ route('renewaltype.destroy', $renewaltype->id) }}" method=" POST"
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
                    <div class="modal fade" id="editServiceRenewalModal{{$renewaltype->id}}" tabindex=" -1"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('renewaltype.update', $renewaltype->id) }}" method=" POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Service Renewal Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Service Renewal Type Name</label>
                                            <input type="text" name="service_renewal_name" class="form-control"
                                                value="{{$renewaltype->service_renewal_name}}" required>
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
                    <!-- Add service renewal type
                                                                                                                                                                                                                                                                                                                                                 Modal -->
                    <div class="modal fade" id="serviceRenewalModal" tabindex="-1"
                        aria-labelledby="serviceRenewalModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('renewaltype.store') }}" method=" POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Service Renewal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Status Name -->
                                        <div class="mb-3">
                                            <label for="service_renewal_name" class="form-label">Service Renewal
                                                Name</label>
                                            <input type="text" class="form-control" id="service_renewal_name"
                                                name="service_renewal_name" required>

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

                    <!-- Edit service reminder
                                                                                                                                                                                                                                                                                                                                                 Modal -->

                @endforeach
            </tbody>
        </table>

    </div>
</div>