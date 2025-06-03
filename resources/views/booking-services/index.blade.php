@extends ("main", ["title" => "Booking Services table"])
@include("createModal")
@include("editModal")

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Booking Services</h2>
            <a href="/bookings/create" class="btn btn-success create-event" data-bs-toggle="modal"
                data-bs-target="#createModal">Add New</a>
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
                    <th>Booking ID</th>
                    <th>Service ID</th>
                    <th>Quentity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($models as $model)
                    <tr class="align-middle text-center">
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->booking_id }}</td>
                        <td>{{ $model->service_id }}</td>
                        <td>{{ $model->quantity }}</td>
                        <td>{{ $model->price }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No users found.</td>
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
                url: "/booking-services/create",
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
            console.log(this);
            const elem = this;
            $.ajax({
                url: "/booking-services/edit/{{$model->id}}",
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