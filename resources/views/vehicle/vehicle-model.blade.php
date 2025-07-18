<style>
    .vehicle-details-card {
        background-color: #ffffff;
        padding: 25px 30px;
        border-radius: 12px;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        color: #2c3e50;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        max-width: 960px;
        margin: auto;
    }

    .vehicle-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .vehicle-image {
        width: 90px;
        height: 90px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #e9ecef;
    }

    .vehicle-title {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 4px;
        color: #212529;
    }

    .vehicle-subtext {
        font-size: 13px;
        color: #6c757d;
    }

    .data-label {
        font-weight: 600;
        margin-bottom: 4px;
        color: #495057;
    }

    .data-value {
        background-color: #f8f9fa;
        padding: 10px 14px;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        margin-bottom: 18px;
        color: #343a40;
    }
</style>


<div class="modal-header border-0 pb-0">
    <h5 class="modal-title">Vehicle Info - VIN: {{ $vehicle->vin }}</h5>
</div>

<hr class="mb-4">

<div class="vehicle-header">
    <img src="{{ asset('storage/' . $vehicle->vehicle_image) }}" class="vehicle-image" alt="Vehicle Image">
    <div>
        <div class="vehicle-title">{{ $vehicle->vehicle_name }}</div>
        <div class="vehicle-subtext">Group: {{ $vehicle->group ?? '-' }}</div>
    </div>
</div>

<div class="row g-3">
    @foreach([
            'Vehicle Type' => $vehicle->vehicle_type ?? null,
            'Fuel Type' => $vehicle->fueltype ?? null,
            'Year' => $vehicle->year ?? null,
            'Status' => $vehicle->status->status_name ?? null,
            'Engine No' => $vehicle->engine_no ?? null,
            'Chassis No' => $vehicle->chassis_no ?? null,
            'Tyre Size' => $vehicle->vehicle_tyre_size ?? null,
            'Vehicle Tons' => $vehicle->vehicle_tons ?? null,
            'Odometer Reading' => $vehicle->odometer_reading ?? null,
            'Owner' => $vehicle->owner ?? null,
            'Location' => $vehicle->location ?? null,
            'Brand' => $vehicle->brand->brand_name ?? null,
            'Model' => $vehicle->model->model_name ?? null,

            // Document Dates
            'Insurance No' => $vehicle->insurance_no ?? null,
            'Insurance Start Date' => $vehicle->insurance_start_date ?? null,
            'Insurance End Date' => $vehicle->insurance_end_date ?? null,
            'Road Tax No' => $vehicle->roadtex_no ?? null,
            'Road Tax Last Date' => $vehicle->roadtex_last_date ?? null,
            'Permit No' => $vehicle->permit_no ?? null,
            'Permit Last Date' => $vehicle->permit_last_date ?? null,
            'PUC No' => $vehicle->puc_no ?? null,
            'PUC Last Date' => $vehicle->puc_last_date ?? null,
            'Registration No' => $vehicle->registration_no ?? null,
            'Registration Valid From' => $vehicle->registration_valid_from ?? null,
            'Registration Valid To' => $vehicle->registration_valid_to ?? null,
            'State Permit Start' => $vehicle->state_permit_start_date ?? null,
            'State Permit End' => $vehicle->state_permit_end_date ?? null,
            'National Permit Start' => $vehicle->national_permit_start_date ?? null,
            'National Permit End' => $vehicle->national_permit_end_date ?? null,
            'Fitness Cert Start' => $vehicle->fitness_certificate_start_date ?? null,
            'Fitness Cert End' => $vehicle->fitness_certificate_end_date ?? null,
            'Explosive Cert Start' => $vehicle->explosive_certificate_start_date ?? null,
            'Explosive Cert End' => $vehicle->explosive_certificate_end_date ?? null,
            'Environment Tax Start' => $vehicle->enviornment_tax_start_date ?? null,
            'Environment Tax End' => $vehicle->enviornment_tax_end_date ?? null,
        ] as $label => $value)
        <div class="col-md-4">
            <div class="data-label fw-bold text-muted">{{ $label }}</div>
            <div class="data-value">{{ $value !== null ? $value : 'null' }}</div>
        </div>
    @endforeach

</div>