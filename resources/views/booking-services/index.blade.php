@extends ("main", ["title" => "Booking Services table"])
@include("createModal")

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Booking Services</h2>
            <a href="/booking-services/create" class="btn btn-success">Add New</a>
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
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->booking_id }}</td>
                        <td>{{ $model->service_id }}</td>
                        <td>{{ $model->quantity }}</td>
                        <td>{{ $model->price }}</td>
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