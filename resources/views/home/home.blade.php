@extends('layouts.app')
@include('createModal')

@section('title', 'Welcome to WoofWorks')

@push('styles')
    @if(isset($dogImageUrl))
        <style>
            .hero-section {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $dogImageUrl }}');
                background-size: cover;
                background-position: center;
                color: white;
                padding: 100px 0;
                margin-bottom: 50px;
            }
        </style>
    @endif
@endpush

@section('content')
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Your Pet's Home Away From Home</h1>
            <p class="lead mb-5">Premium boarding services with love and care for your furry friends</p>
            <a href="#booking" class="btn btn-primary btn-lg px-4 me-2">Book Now</a>
            <a href="#services" class="btn btn-outline-light btn-lg px-4">Our Services</a>
        </div>
    </section>

    <section class="container mb-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Safe & Secure</h3>
                <p>24/7 monitored facilities with secure kennels and play areas</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h3>Certified Staff</h3>
                <p>Our team is trained in pet first aid and animal behavior</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Loving Care</h3>
                <p>Daily playtime, cuddles, and individual attention</p>
            </div>
        </div>
    </section>

    <section id="booking" class="bg-light py-5 mb-5">
        <div class="container">
            <h2 class="text-center mb-5">Make a Reservation</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body p-5">
                            @if(isset($userEmail))
                                <div class="text-center">
                                    <h4>Your Pet</h4>
                                    @if($userPets->count() > 0)
                                        <div class="row mt-4">
                                            @foreach($userPets as $pet)
                                                <div class="card w-100">
                                                    @if($pet->profile_pic)
                                                        <img src="{{ $pet->profile_pic }}" class="card-img-top" alt="{{ $pet->name }}">
                                                    @else
                                                        <img src="{{ $dogImageUrl }}" class="card-img-top" alt="{{ $pet->name }}">
                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $pet->name }}</h5>
                                                        <p class="card-text">
                                                            <strong>Breed:</strong> {{ $pet->breed }}<br>
                                                            <strong>Age:</strong> {{ $pet->age }} years
                                                        </p>
                                                        <button class="btn btn-primary create-event" data-bs-toggle="modal"
                                                            data-bs-target="#createModal" data-pet-id="{{ $pet->id }}"
                                                            data-pet-name="{{ $pet->name }}">Book for {{ $pet->name }}</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>You haven't added any pets yet.</p>
                                        <a href="/pets/create" class="btn btn-primary">Add Your First Pet</a>
                                    @endif
                                </div>
                            @else
                                <div class="text-center">
                                    <h4>Please login to make a booking</h4>
                                    <p>Manage your pet's stays with our easy booking system</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="container mb-5">
        <h2 class="text-center mb-5">Our Services</h2>

        @if(count($services) > 0)
            <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @foreach($services->chunk(3) as $chunkIndex => $serviceChunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="cards-wrapper d-flex justify-content-center">
                                @foreach($serviceChunk as $service)
                                    <div class="card mx-2 {{ $loop->index > 0 ? 'd-none d-md-block' : '' }}">
                                        <img src="{{ url('/images/service-' . $service->id) . '.jpg' }}" class="card-img-top">

                                        <div class="card-body">
                                            <h5 class="card-title">{{ $service->name }} - {{ $service->price }} zł</h5>
                                            <p class="card-text">{{ $service->description }}</p>
                                            <button class="btn btn-primary">Go somewhere</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(".create-event").on("click", function (e) {
            const petId = $(this).data('pet-id');
            const petName = $(this).data('pet-name');
            $.ajax({
                url: "/book-service",
                method: "get",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "html",
                success: function (result) {
                    document.getElementById('createModalBody').innerHTML = result;
                    document.getElementById('petId').value = petId;
                    document.getElementById('petName').textContent = petName;
                }
            });
        });
    </script>
@endsection