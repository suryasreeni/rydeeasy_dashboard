@foreach ($service_entries as $service_entry)
    <!-- Detail Modal -->
    <div class="modal fade" id="serviceDetailModal{{ $service_entry->id }}" tabindex="-1"
        aria-labelledby="modalLabel{{ $service_entry->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content shadow-lg rounded-3">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-semibold" id="modalLabel{{ $service_entry->id }}">
                        <i class="bi bi-tools me-2"></i>Service Details - {{ $service_entry->service_vehicle }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <table class="table table-bordered table-striped align-middle" style="font-size: 15px;">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Vehicle</th>
                                <td>{{ $service_entry->service_vehicle }}</td>
                            </tr>
                            <tr>
                                <th>Vendor</th>
                                <td>{{ $service_entry->vendor }}</td>
                            </tr>
                            <tr>
                                <th>Serviced On</th>
                                <td>{{ \Carbon\Carbon::parse($service_entry->serviced_on)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th>Odometer</th>
                                <td>{{ $service_entry->service_odometer }} km</td>
                            </tr>
                            <tr>
                                <th>Completed Tasks</th>
                                <td>
                                    @if(is_array($service_entry->completed_task))
                                        <ol class="mb-0 ps-3">
                                            @foreach ($service_entry->completed_task as $task)
                                                <li>- {{ $task }}</li><br>
                                            @endforeach
                                        </ol>
                                    @elseif(!empty($service_entry->completed_task))
                                        <ol class="mb-0 ps-3">
                                            <li>{{ $service_entry->completed_task }}</li>
                                        </ol>
                                    @else
                                        <span class="text-muted">No tasks recorded</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Resolved Issues</th>
                                <td>
                                    @if(is_array($service_entry->resolved_issues))
                                        <ol class="mb-0 ps-3">
                                            @foreach ($service_entry->resolved_issues as $issue)
                                                <li>- {{ $issue }}</li><br>
                                            @endforeach
                                        </ol>
                                    @elseif(!empty($service_entry->resolved_issues))
                                        <ol class="mb-0 ps-3">
                                            <li>{{ $service_entry->resolved_issues }}</li>
                                        </ol>
                                    @else
                                        <span class="text-muted">No issues recorded</span>
                                    @endif
                                </td>
                            </tr>


                            <tr>
                                <th>Comment</th>
                                <td>{{ $service_entry->service_comment ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Labour</th>
                                <td>₹ {{ number_format($service_entry->labour, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Parts</th>
                                <td>₹ {{ number_format($service_entry->parts, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Tax (%)</th>
                                <td>{{ $service_entry->tax }}%</td>
                            </tr>
                            <tr class="table-success">
                                <th>Total</th>
                                <td><strong>₹ {{ number_format($service_entry->total, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <th>Invoice Number</th>
                                <td>{{ $service_entry->invoice_number }}</td>
                            </tr>
                            <tr>
                                <th>Invoice File</th>
                                <td>
                                    @if ($service_entry->filename)
                                        <a href="{{ asset('storage/' . $service_entry->filename) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-file-earmark-text me-1"></i>View Invoice
                                        </a>
                                    @else
                                        <span class="text-muted">No file</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer bg-light">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach