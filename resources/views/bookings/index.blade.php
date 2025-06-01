@extends ("main", ["title" => "Bookings table"])
@include("createModal")

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Bookings</h2>
            <a href="/bookings/create" class="btn btn-success">Add New</a>
        </div>

        <div class="w-50">
            <form class="d-flex" role="search" action="/users/search" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pet ID</th>
                    <th>Space ID</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Active</th>
                    <th>Created At</th>
                    <th>Edited At</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($models as $model)
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->pet_id }}</td>
                        <td>{{ $model->kennel_space_id }}</td>
                        <td>{{ $model->check_in_date }}</td>
                        <td>{{ $model->check_out_date }}</td>
                        <td>{{ $model->status }}</td>
                        <td>{{ $model->isActive ? '✅' : '❌' }}</td>
                        <td>{{ $model->dateCreated }}</td>
                        <td>{{ $model->dateEdited ?? 'N/A' }}</td>
                        <td>{{ $model->dateDeleted ?? 'N/A' }}</td>
                        <td>
                            <a href="bookings/edit/{{$model->id}}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="bookings/delete/{{$model->id}}" method="POST" style="display:inline-block;"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection