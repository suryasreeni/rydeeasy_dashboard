<div class="modal fade" id="vendorDetailModal{{ $vendor->id }}" tabindex="-1"
    aria-labelledby="vendorModalLabel{{ $vendor->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-4 overflow-hidden">
            <!-- Header -->
            <div class="modal-header" style="background-color: #ff6a00; color: white;">
                <h5 class="modal-title fw-semibold fs-5" id="vendorModalLabel{{ $vendor->id }}">
                    {{ $vendor->name }} - Details
                </h5>
                <button type="button" class="btn-close btn-close-white fs-5" data-bs-dismiss="modal" aria-label="Close"
                    style="filter: drop-shadow(0 0 2px rgba(255,255,255,0.9));"></button>
            </div>

            <!-- Body -->
            <div class="modal-body px-4 py-4" style="font-size: 16px;">
                <div class="row mb-3">
                    <label class="col-md-4 fw-bold">Address:</label>
                    <div class="col-md-8">
                        {{ $vendor->address1 }}{{ $vendor->address2 ? ', ' . $vendor->address2 : '' }},
                        {{ $vendor->city }}{{ $vendor->state ? ', ' . $vendor->state : '' }}{{ $vendor->zip ? ' - ' . $vendor->zip : '' }},
                        {{ $vendor->country }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-4 fw-bold">Email:</label>
                    <div class="col-md-8">{{ $vendor->email ?? '-' }}</div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 fw-bold">Phone:</label>
                    <div class="col-md-8">{{ $vendor->contact_phone ?? '-' }}</div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 fw-bold">Website:</label>
                    <div class="col-md-8">
                        @if($vendor->website)
                            <a href="{{ $vendor->website }}" target="_blank" rel="noopener" style="color:#ff6a00;">
                                {{ $vendor->website }}
                            </a>
                        @else
                            -
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 fw-bold">Contact Name:</label>
                    <div class="col-md-8">{{ $vendor->contact_name ?? '-' }}</div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 fw-bold">Contact Email:</label>
                    <div class="col-md-8">{{ $vendor->contact_email ?? '-' }}</div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 fw-bold">Labels:</label>
                    <div class="col-md-8">
                        {{ 
                          collect([
        $vendor->is_charging ? 'Charging' : null,
        $vendor->is_tools ? 'Tools' : null,
        $vendor->is_fuel ? 'Fuel' : null,
        $vendor->is_service ? 'Service' : null,
        $vendor->is_vehicle ? 'Vehicle' : null,
    ])->filter()->implode(', ') ?: '-' 
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 16px;
        line-height: 1.6;
    }

    .modal-header h5 {
        font-size: 20px;
    }

    .btn-close {
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        background-color: #ff6a00 !important;
        opacity: 1 !important;
        filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.9));
    }

    .btn-close:hover {
        background-color: #e65a00 !important;
    }
</style>