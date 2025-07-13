@foreach ($reminders as $reminder)

    <div class="modal fade" id="viewReminderModal{{ $reminder->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reminder Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">




                    <p><strong>Vehicle:</strong>
                        {{ $reminder->vehicle->vehicle_name ?? 'N/A' }} (VIN:
                        {{ $reminder->vehicle->vin ?? 'N/A' }})
                    </p>
                    <p><strong>Service Task:</strong>
                        {{ $reminder->serviceTask->service_task_name ?? 'N/A' }}
                    </p>
                    <p><strong>Next Due Date:</strong>
                        {{ $dueDate ? $dueDate->format('d M Y') : 'N/A' }}</p>

                    <p><strong>Next Due Meter:</strong>
                        {{ $reminder->next_due_primary_meter ?? 'N/A' }}</p>

                    <p><strong>Current Meter:</strong>
                        {{ $reminder->current_reading ?? 'N/A' }}</p>
                    <p><strong>Notification Time Interval:</strong>
                        Every
                        {{ $reminder->time_interval ?? 'N/A' }}{{ $reminder->time_interval_unit ?? 'N/A' }}
                    </p>
                    <p><strong>Status:</strong>
                        @if ($dueDate && $dueDate->isPast())
                            <span class="badge bg-danger">Overdue</span>
                        @elseif (
                                $dueDate && $dueDate->diffInDays($now) <= ($reminder->
                                    time_threshold ?? 0)
                            )
                            <span class="badge bg-warning text-dark">Due
                                Soon</span>
                        @else
                                <span class="badge bg-success">Upcoming</span>
                            @endif
                    </p>
                    <p><strong>Notification Threshold:</strong>
                        @if ($reminder->time_threshold)
                            {{ $reminder->time_threshold }}
                            {{ Str::plural($reminder->time_threshold_unit, $reminder->time_threshold) }}
                            early
                        @endif
                        @if ($reminder->primary_meter_due_soon_threshold)
                            <br>{{ number_format($reminder->primary_meter_due_soon_threshold) }}
                            mi early
                        @endif
                    </p>

                </div>
            </div>
        </div>
    </div>
@endforeach