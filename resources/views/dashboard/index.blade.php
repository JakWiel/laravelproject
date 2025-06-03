@extends ("main", ["title" => "Dashboard"])
@section('content')
    <div class="container">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text h4">{{ $usersCount ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Pets</h5>
                        <p class="card-text h4">{{ $petsCount ?? 0  }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Bookings Today</h5>
                        <p class="card-text h4">{{ $bookingsCount ?? 0  }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Available Kennels</h5>
                        <p class="card-text h4">{{ $kennelsCount ?? 0  }}</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection