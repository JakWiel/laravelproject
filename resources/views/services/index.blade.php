@extends ("main", ["title" => "Services table"])
@include("createModal")
@include("editModal")

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Services</h2>
            <a href="/services/create" class="btn btn-success create-event" data-bs-toggle="modal"
                data-bs-target="#createModal">Add
                New</a>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Active</th>
                    <th>Created At</th>
                    <th>Edited At</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($models as $model)
                    <tr class="align-middle text-center">
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->description }}</td>
                        <td>{{ $model->price }}</td>
                        <td>{{ $model->isActive ? '✅' : '❌' }}</td>
                        <td>{{ $model->dateCreated }}</td>
                        <td>{{ $model->dateEdited ?? 'N/A' }}</td>
                        <td>{{ $model->dateDeleted ?? 'N/A' }}</td>
                        <td>
                            <a href="services/edit/{{$model->id}}" class="btn btn-sm btn-warning edit-event"
                                data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                            <form action="services/delete/{{$model->id}}" method="POST" style="display:inline-block;"
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(".create-event").on("click", function (e) {
            console.log(this);
            const elem = this;
            $.ajax({
                url: "/services/create",
                method: "get",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "html",
                success: function (result) {
                    console.log(elem);
                    document.getElementById('createModalBody').innerHTML = result;
                }
            });
        });
        $(".edit-event").on("click", function (e) {
            e.preventDefault();
            const clickedId = $(this).attr('href').split('/').pop();
            $.ajax({
                url: "/services/edit/" + clickedId,
                method: "get",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "html",
                success: function (result) {
                    document.getElementById('editModalBody').innerHTML = result;
                }
            });
        });
    </script>
@endsection