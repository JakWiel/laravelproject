<div class="card shadow rounded">
    <div class="card-body">
        <form action="/users/edit/{{ $model->id }}" method="POST" id="editUsersForm">
            @csrf
            <div class="modal-header border-0">
                <h5 class="modal-title h2">{{ $model->id }}: {{ $model->name }} - EDIT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $model->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $model->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $model->password }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="">-- Select Role --</option>
                    <option value="admin" {{ $model->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="owner" {{ $model->role == 'owner' ? 'selected' : '' }}>Owner</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
            <a href="/users" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>