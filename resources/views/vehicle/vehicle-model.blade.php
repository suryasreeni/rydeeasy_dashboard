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

<div class="vehicle-details-card">
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

    <div class="row">
        @foreach([
        'Vehicle Type' => $vehicle->vehicle_type,
        'Model' => $vehicle->model,
        'Year' => $vehicle->year,
        'Status ID' => $vehicle->status_id,
        'Ownership' => $vehicle->ownership,
        'In Service Date' => $vehicle->in_service_date,
        'In Service Odometer' => $vehicle->in_service_odometer,
        'Out of Service Date' => $vehicle->out_of_service_date,
        'Out of Service Odometer' => $vehicle->out_of_service_odometer,
        'Purchase Vendor' => $vehicle->purchase_vendor,
        'Purchase Date' => $vehicle->purchase_date,
        'Odometer' => $vehicle->odometer,
        'Purchase Price' => $vehicle->purchase_price,
        'Purchase Type' => $vehicle->purchase_type,
        'Lender' => $vehicle->lender,
        'Date of Loan' => $vehicle->date_of_loan,
        'Amount of Loan' => $vehicle->amount_of_loan,
        'Annual % Rate' => $vehicle->annual_percentage_rate,
        'Down Payment' => $vehicle->down_payment,
        'First Payment Date' => $vehicle->first_payment_date,
        'Monthly Payment' => $vehicle->monthly_payment,
        'Number of Payments' => $vehicle->number_of_payment,
        'Loan End Date' => $vehicle->loan_end_date,
        'Account Number' => $vehicle->account_number,
        ] as $label => $value)
        <div class="col-md-6">
            <div class="data-label">{{ $label }}</div>
            <div class="data-value">{{ $value ?? '-' }}</div>
        </div>
        @endforeach
    </div>
</div>