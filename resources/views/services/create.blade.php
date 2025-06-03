<div class="card shadow rounded">
    <div class="card-body">
        <form action="users/create" method="POST" id="createUsersForm">
            @csrf
            <div class="modal-header border-0">
                <h5 class="modal-title h2">ADD NEW</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="description" class="form-control" id="description" name="description" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Service</button>
            <a href="/users" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>