<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<div class="card shadow rounded">
    <div class="card-body">
        <form action="/bookings/create" method="POST" id="bookServiceForm">
            @csrf
            <input type="hidden" name="pet_id" id="petId">

            <div class="modal-header border-0">
                <h5 class="modal-title h2">Book Services for <span id="petName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="mb-3">
                <label for="kennel_space_id" class="form-label">Kennel Space</label>
                <select class="form-select" id="kennel_space_id" name="kennel_space_id" required>
                    <option value="">-- Select Kennel Space --</option>
                    @foreach($kennelSpaces as $space)
                        <option value="{{ $space->id }}">{{ $space->name }} ({{ $space->size }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" id="check_in_date" name="check_in_date" required
                    min="{{ date('Y-m-d') }}">
            </div>

            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-out Date</label>
                <input type="date" class="form-control" id="check_out_date" name="check_out_date" required
                    min="{{ date('Y-m-d') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Additional Services</label>
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]"
                                    value="{{ $service->id }}" id="service_{{ $service->id }}">
                                <label class="form-check-label" for="service_{{ $service->id }}">
                                    {{ $service->name }} - {{ $service->price }} zł
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-3">Create Booking</button>
                <a href="/" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="/js/bootstrap.min.js"></script>