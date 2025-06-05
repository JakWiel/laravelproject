<div class="card shadow rounded">
    <div class="card-body">
        <form action="/pets/edit/{{ $model->id }}" method="POST" id="editPetForm">
            @csrf

            <div class="modal-header border-0">
                <h5 class="modal-title h2">EDIT PET</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Owner</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="">-- Select Owner --</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}" {{ old('user_id', $model->user_id) == $owner->id ? 'selected' : '' }}>
                            {{ $owner->name }} ({{ $owner->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Pet Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $model->name) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="breed" class="form-label">Breed</label>
                <select class="form-select" id="breed" name="breed" required>
                    <option value="">-- Select Breed --</option>
                    @foreach($breeds as $breed)
                        <option value="{{ $breed['name'] }}" {{ old('breed', $model->breed) == $breed['name'] ? 'selected' : '' }}>
                            {{ $breed['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age (years)</label>
                <input type="number" min="0" class="form-control" id="age" name="age"
                    value="{{ old('age', $model->age) }}">
            </div>

            <div class="mb-3">
                <label for="medical_notes" class="form-label">Medical Notes</label>
                <textarea class="form-control" id="medical_notes" name="medical_notes"
                    rows="3">{{ old('medical_notes', $model->medical_notes) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="profile_pic" class="form-label">Profile Picture URL</label>
                <input type="url" class="form-control" id="profile_pic" name="profile_pic"
                    value="{{ old('profile_pic', $model->profile_pic) }}" placeholder="https://example.com/pic.jpg">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-3">Update Pet</button>
                <a href="{{ url('pets') }}" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>