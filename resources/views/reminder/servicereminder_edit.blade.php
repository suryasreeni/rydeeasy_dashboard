<div class="modal fade" id="editReminderModal{{ $reminder->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-4 position-relative">
            <!-- Close Button -->


            <form class="form-add-new-user form-style-2" action="{{ route('update.servicereminder',$reminder->id) }}"
                method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="wg-box">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <div class="right flex-grow">
                        <div class="form-row">
                            <fieldset class="email mb-24">
                                <div class="body-title mb-10">Vehicle *</div>
                                <select name="vehicle_id" required>
                                    <option value="">-- Select Vehicle --</option>
                                    @foreach ($allvehicle as $vehicle)
                                    <option value="{{ $vehicle->id }}"
                                        {{ $reminder->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                                        {{ $vehicle->vin }} ({{ $vehicle->vehicle_name }})
                                    </option>
                                    @endforeach
                                </select>
                            </fieldset>

                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Service Task *</div>
                                <select name="service_task_id" required>
                                    <option value="">-- Select Service Task--</option>
                                    @foreach ($servicetasks as $servicetask)
                                    <option value="{{ $servicetask->id }}"
                                        {{ $reminder->service_task_id == $servicetask->id ? 'selected' : '' }}>
                                        {{ $servicetask->service_task_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="form-row row align-items-end">
                            <div class="col-md-3">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Time Interval <i
                                            class="bi bi-question-circle text-muted" data-bs-toggle="tooltip"
                                            title="Set how often this service should occur (e.g., every 3 months)"></i>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Every</span>
                                        <input type="number" name="time_interval" class="form-control" min="1"
                                            value="{{ $reminder->time_interval }}">
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-2">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">&nbsp;</div>
                                    <select name="time_interval_unit">
                                        <option value="">Select</option>
                                        @foreach([
                                        'day' => 'Day(s)',
                                        'week' => 'Week(s)',
                                        'month' => 'Month(s)',
                                        'year'
                                        => 'Year(s)'
                                        ] as $val => $label)
                                        <option value="{{ $val }}"
                                            {{ $reminder->time_interval_unit == $val ? 'selected' : '' }}>{{ $label }}
                                        </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-md-3">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Time Due Soon Threshold <i
                                            class="bi bi-question-circle text-muted" data-bs-toggle="tooltip"
                                            title="How soon to warn before due (e.g., 7 days before)"></i></div>
                                    <div class="input-group">
                                        <input type="number" name="time_threshold" class="form-control" min="0"
                                            value="{{ $reminder->time_threshold }}">
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-2">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">&nbsp;</div>
                                    <select name="time_threshold_unit">
                                        <option value="">Select</option>
                                        @foreach([
                                        'day' => 'Day(s)',
                                        'week' => 'Week(s)',
                                        'month' => 'Month(s)',
                                        'year'
                                        => 'Year(s)'
                                        ] as $val => $label)
                                        <option value="{{ $val }}"
                                            {{ $reminder->time_threshold_unit == $val ? 'selected' : '' }}>{{ $label }}
                                        </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <div class="form-row row gx-3 align-items-end">
                            <div class="col-md-3">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Current Reading <i
                                            class="bi bi-question-circle text-muted" data-bs-toggle="tooltip"
                                            title="Enter the current reading from the odometer manually"></i></div>
                                    <div class="input-group">
                                        <input type="number" name="current_reading" id="current_reading"
                                            class="form-control" min="1" value="{{ $reminder->current_reading }}">
                                        <span class="input-group-text">meter</span>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Primary Meter Interval <i
                                            class="bi bi-question-circle text-muted" data-bs-toggle="tooltip"
                                            title="Set the meter interval like 5000 km"></i></div>
                                    <div class="input-group">
                                        <span class="input-group-text">Every</span>
                                        <input type="number" name="primary_meter_interval" id="primary_meter_interval"
                                            class="form-control" min="1"
                                            value="{{ $reminder->primary_meter_interval }}">
                                        <span class="input-group-text">mi</span>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Primary Meter Due Soon Threshold <i
                                            class="bi bi-question-circle text-muted" data-bs-toggle="tooltip"
                                            title="How soon before due should alert show (e.g., 500 km)"></i></div>
                                    <div class="input-group">
                                        <input type="number" name="primary_meter_due_soon_threshold"
                                            class="form-control" min="0"
                                            value="{{ $reminder->primary_meter_due_soon_threshold }}">
                                        <span class="input-group-text">mi</span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="form-row row align-items-end">
                            <div class="col-md-4">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Next Due Date</div>
                                    <div class="input-group">
                                        <input type="date" name="next_due_date" class="form-control"
                                            value="{{ $reminder->next_due_date }}">
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4">
                                <fieldset class="name mb-24">
                                    <div class="body-title mb-10">Next Due Primary Meter</div>
                                    <div class="input-group">
                                        <span class="input-group-text">At</span>
                                        <input type="number" name="next_due_primary_meter" id="next_due_primary_meter"
                                            class="form-control" min="0"
                                            value="{{ $reminder->next_due_primary_meter }}">
                                        <span class="input-group-text">mi</span>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <button type="button" class="submit-btn" data-bs-dismiss="modal"
                        style="background-color: black; padding: 20px; color: white; border: none; border-radius: 5px;font-size:15px;">
                        Cancel
                    </button>
                    <button class="submit-btn" type="submit"
                        style="background-color: #FF6A00; padding: 20px; color: white; border: none; border-radius: 5px;font-size:15px;">
                        Update Reminder
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
.wg-table {
    width: 100%;
}

.table-title,
.product-item {
    display: flex;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.table-title {
    background: #f4f4f4;
    font-weight: bold;
}

.table-title li,
.product-item div {
    flex: 1;
    text-align: center;
    padding: 5px;
    box-sizing: border-box;
}

.list-icon-function {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.list-icon-function .item i {
    cursor: pointer;
    padding: 5px;
}

/* Optional: Adjust widths if needed */
.column-sno {
    flex: 0.5;
}

.column-name {
    flex: 1.5;
}

.column-action {
    flex: 1.2;
}

.form-row {
    display: flex;
    gap: 20px;
    /* Adjust spacing between fields */
    align-items: center;
    /* Aligns elements vertically */
}

.form-row fieldset {
    border: none;
    /* Removes fieldset border */
    flex: 1;
    /* Ensures both fields take equal space */
    min-width: 200px;
    /* Prevents fields from becoming too small */
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const intervalInput = document.querySelector('input[name="time_interval"]');
    const unitSelect = document.querySelector('select[name="time_interval_unit"]');
    const dueDateInput = document.querySelector('input[name="next_due_date"]');

    function calculateNextDueDate() {
        const interval = parseInt(intervalInput.value);
        const unit = unitSelect.value;
        const today = new Date();

        if (!isNaN(interval) && unit) {
            let nextDue = new Date(today);

            switch (unit) {
                case "day":
                    nextDue.setDate(today.getDate() + interval);
                    break;
                case "week":
                    nextDue.setDate(today.getDate() + (interval * 7));
                    break;
                case "month":
                    nextDue.setMonth(today.getMonth() + interval);
                    break;
                case "year":
                    nextDue.setFullYear(today.getFullYear() + interval);
                    break;
            }

            // Format the date as yyyy-mm-dd
            const yyyy = nextDue.getFullYear();
            const mm = String(nextDue.getMonth() + 1).padStart(2, '0');
            const dd = String(nextDue.getDate()).padStart(2, '0');
            dueDateInput.value = `${yyyy}-${mm}-${dd}`;
        }
    }

    intervalInput.addEventListener("input", calculateNextDueDate);
    unitSelect.addEventListener("change", calculateNextDueDate);
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const currentReadingInput = document.getElementById("current_reading");
    const intervalInput = document.getElementById("primary_meter_interval");
    const nextDueInput = document.getElementById("next_due_primary_meter");

    function updateNextDueMeter() {
        const current = parseInt(currentReadingInput.value);
        const interval = parseInt(intervalInput.value);

        if (!isNaN(current) && !isNaN(interval)) {
            nextDueInput.value = current + interval;
        } else {
            nextDueInput.value = '';
        }
    }

    currentReadingInput.addEventListener("input", updateNextDueMeter);
    intervalInput.addEventListener("input", updateNextDueMeter);
});
</script>