@foreach($assignments as $assignment)
    {{-- Assignment Detail Modal --}}
    <div class="modal fade" id="AssignmentDetailModal{{ $assignment->id }}" tabindex="-1"
        aria-labelledby="modalLabel{{ $assignment->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assignment Details (VIN: {{ $assignment->vin }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        {{-- Customer Information Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Customer Information</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Customer</div>
                                        <div class="value text-dark">
                                            {{ $assignment->contacts->name . ' ' . $assignment->contacts->lastname ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Contact</div>
                                        <div class="value text-dark">{{ $assignment->contact ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Address</div>
                                        <div class="value text-dark">{{ $assignment->address ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Booking Details Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Booking Details</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Booking Details</div>
                                        <div class="value text-dark">{{ $assignment->booking_details ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Reference Number</div>
                                        <div class="value text-dark">{{ $assignment->reference_number ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Expected Return</div>
                                        <div class="value text-dark">{{ $assignment->expected_return ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Purpose</div>
                                        <div class="value text-dark">{{ $assignment->purpose ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Vehicle Information Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Vehicle Information</h2>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">VIN</div>
                                        <div class="value text-dark">{{ $assignment->vin ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Status</div>
                                        <div class="value text-dark d-flex align-items-center gap-2">
                                            <span class="status-dot"
                                                style="background-color: {{ $assignment->statusRelation->status_color ?? '#6c757d' }}"></span>
                                            {{ $assignment->statusRelation->status_name ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Model</div>
                                        <div class="value text-dark">{{ $assignment->model ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Yard</div>
                                        <div class="value text-dark">{{ $assignment->yard == 0 ? 'Malappuram' : 'Kochi' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Rental Period Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Rental Period</h2>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Start Date & Time</div>
                                        <div class="value text-dark">
                                            {{ $assignment->start_date . ' ' . $assignment->start_time }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">End Date & Time</div>
                                        <div class="value text-dark">
                                            {{ $assignment->end_date . ' ' . $assignment->end_time }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Vehicle Condition Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Vehicle Condition</h2>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Start KM</div>
                                        <div class="value text-dark">{{ $assignment->start_km ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">End KM</div>
                                        <div class="value text-dark">{{ $assignment->end_km ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Start Fuel</div>
                                        <div class="value text-dark">
                                            {{ $assignment->start_fuel . ' ' . $assignment->start_fuel_unit }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">End Fuel</div>
                                        <div class="value text-dark">
                                            {{ $assignment->end_fuel . ' ' . $assignment->end_fuel_unit }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Rent Details Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Rent Details</h2>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <h6 class="subsection-title">Given Amounts</h6>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Deposit Given</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->deposit_given, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Rent Given</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->rent_given, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">GST Given</div>
                                                <div class="value text-dark">₹{{ number_format($assignment->gst_given, 2) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">KM Given</div>
                                                <div class="value text-dark">₹{{ number_format($assignment->km_given, 2) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Hour Given</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->hour_given, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Other Given</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->other_given, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="profile-field total-field">
                                                <div class="label fw-bold text-muted mb-1">Total Given</div>
                                                <div class="value text-dark fw-bold">
                                                    ₹{{ number_format($assignment->total_given, 2) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="subsection-title">Final Amounts</h6>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Deposit Final</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->deposit_final, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Rent Final</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->rent_final, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">GST Final</div>
                                                <div class="value text-dark">₹{{ number_format($assignment->gst_final, 2) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">KM Final</div>
                                                <div class="value text-dark">₹{{ number_format($assignment->km_final, 2) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Hour Final</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->hour_final, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="profile-field">
                                                <div class="label fw-bold text-muted mb-1">Other Final</div>
                                                <div class="value text-dark">
                                                    ₹{{ number_format($assignment->other_final, 2) }}</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="profile-field total-field">
                                                <div class="label fw-bold text-muted mb-1">Total Final</div>
                                                <div class="value text-dark fw-bold">
                                                    ₹{{ number_format($assignment->total_final, 2) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Driver Information & Documents Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Driver Information & Documents</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Driving License</div>
                                        <div class="value text-dark">{{ $assignment->driving_license }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Document Collected</div>
                                        <div class="value text-dark">{{ $assignment->document_collected }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Document Number</div>
                                        <div class="value text-dark">{{ $assignment->document_number }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Documents Collected</div>
                                        <div class="value text-dark">
                                            {{ is_array($assignment->documents_collected) ? implode(', ', $assignment->documents_collected) : $assignment->documents_collected }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Payment Details Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Payment Details</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Cash in Hand</div>
                                        <div class="value text-dark">₹{{ number_format($assignment->cash_hand, 2) }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Cash Account</div>
                                        <div class="value text-dark">₹{{ number_format($assignment->cash_account, 2) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-field total-field">
                                        <div class="label fw-bold text-muted mb-1">Total Received</div>
                                        <div class="value text-dark fw-bold">
                                            ₹{{ number_format($assignment->total_received, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Account Details & Refund Section --}}
                        <div class="section-group">
                            <h2 class="section-title">Account Details & Refund</h2>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Account Name</div>
                                        <div class="value text-dark">{{ $assignment->account_name }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Account Number</div>
                                        <div class="value text-dark">{{ $assignment->account_number }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">IFSC Code</div>
                                        <div class="value text-dark">{{ $assignment->ifsc_code }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-field">
                                        <div class="label fw-bold text-muted mb-1">Refund Amount</div>
                                        <div class="value text-dark">₹{{ number_format($assignment->refund_amount, 2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Document Images Section --}}
                        @if (is_array($assignment->document_images))
                            <div class="section-group">
                                <h2 class="section-title">Document Images</h2>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($assignment->document_images as $img)
                                        <img src="{{ asset('storage/' . $img) }}" alt="Document Image"
                                            style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; border: 2px solid #e9ecef;">
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

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

    .section-group {
        margin-bottom: 30px;
        padding: 20px;
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e9ecef;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #3498db;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 50px;
        height: 2px;
        background: #e74c3c;
    }

    .subsection-title {
        font-size: 16px;
        font-weight: 600;
        color: #34495e;
        margin-bottom: 15px;
        padding-bottom: 5px;
        border-bottom: 1px solid #bdc3c7;
    }

    .profile-field {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 12px 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        height: 100%;
        transition: all 0.2s ease;
    }

    .profile-field:hover {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transform: translateY(-1px);
    }

    .total-field {
        background: linear-gradient(135deg, #e8f5e8 0%, #f0f8f0 100%);
        border: 1px solid #27ae60;
    }

    .profile-field .label {
        font-size: 13px;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .profile-field .value {
        font-size: 15px;
        font-weight: 500;
        word-break: break-word;
        margin-top: 4px;
    }

    .status-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.8);
    }

    .modal-body {
        max-height: 80vh;
        overflow-y: auto;
    }

    /* Scrollbar styling */
    .modal-body::-webkit-scrollbar {
        width: 6px;
    }

    .modal-body::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }

    .modal-body::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>