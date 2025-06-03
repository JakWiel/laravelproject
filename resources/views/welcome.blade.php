@php
    // Fetch the random dog image URL
    $dogApiResponse = file_get_contents('https://dog.ceo/api/breeds/image/random');
    $dogData = json_decode($dogApiResponse, true);
    $dogImageUrl = $dogData['message'] ?? 'fallback-image.jpg';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoofWorks</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/images/logohead.svg') }}">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url({{ $dogImageUrl }});
            background-size: contain;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #4e73df;
            margin-bottom: 1rem;
        }

        .kennel-card {
            transition: transform 0.3s;
        }

        .kennel-card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .cards-wrapper {
            display: flex;
            justify-content: center;
        }

        .card img {
            max-width: 100%;
            max-height: 100%;
        }

        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
            border-radius: 0;
        }

        .carousel-inner {
            padding: 1em;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: #e1e1e1;
            width: 5vh;
            height: 5vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ url('/images/logo.svg') }}" alt="logo">
            </a>
            <div class="ms-auto">
                <a href="{{ route('') }}" class="btn btn-outline-light me-2 text-white">Sign-in</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Your Pet's Home Away From Home</h1>
            <p class="lead mb-5">Premium boarding services with love and care for your furry friends</p>
            <a href="#booking" class="btn btn-primary btn-lg px-4 me-2">Book Now</a>
            <a href="#services" class="btn btn-outline-light btn-lg px-4">Our Services</a>
        </div>
    </section>

    <!-- Features Section -->
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

    <!-- Booking Section -->
    <section id="booking" class="bg-light py-5 mb-5">
        <div class="container">
            <h2 class="text-center mb-5">Make a Reservation</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body p-5">
                            @guest
                                <div class="text-center">
                                    <h4>Please login to make a booking</h4>
                                    <p>Manage your pet's stays with our easy booking system</p>
                                </div>
                            @else
                                <div class="text-center">
                                    <h4>Welcome back, {{ Auth::user()->name }}!</h4>
                                    <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-lg mt-3">Create New
                                        Booking</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="container mb-5">
        <h2 class="text-center mb-5">Our Services</h2>
        <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- First Slide (Active) -->
                <div class="carousel-item active">
                    <div class="cards-wrapper d-flex justify-content-center">
                        <div class="card mx-2">
                            <img src="https://img4.gelbooru.com//samples/57/8d/sample_578d1b56d741ae83731a46525860a201.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <button class="btn btn-primary">Go somewhere</button>
                            </div>
                        </div>
                        <div class="card mx-2 d-none d-md-block">
                            <img src="https://img4.gelbooru.com//samples/57/8d/sample_578d1b56d741ae83731a46525860a201.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <button class="btn btn-primary">Go somewhere</button>
                            </div>
                        </div>
                        <div class="card mx-2 d-none d-md-block">
                            <img src="https://img4.gelbooru.com//samples/57/8d/sample_578d1b56d741ae83731a46525860a201.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <button class="btn btn-primary">Go somewhere</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Slide -->
                <div class="carousel-item">
                    <div class="cards-wrapper d-flex justify-content-center">
                        <div class="card mx-2">
                            <img src="https://img4.gelbooru.com//samples/57/8d/sample_578d1b56d741ae83731a46525860a201.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <button class="btn btn-primary">Go somewhere</button>
                            </div>
                        </div>
                        <div class="card mx-2 d-none d-md-block">
                            <img src="https://img4.gelbooru.com//samples/57/8d/sample_578d1b56d741ae83731a46525860a201.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <button class="btn btn-primary">Go somewhere</button>
                            </div>
                        </div>
                        <div class="card mx-2 d-none d-md-block">
                            <img src="https://img4.gelbooru.com//samples/57/8d/sample_578d1b56d741ae83731a46525860a201.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title.</p>
                                <button class="btn btn-primary">Go somewhere</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5><i class="fas fa-paw me-2"></i>Pet Paradise</h5>
                    <p>Providing loving care for your pets since 2010.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Contact Us</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i>123 Pet Street, Animal City</p>
                    <p><i class="fas fa-phone me-2"></i>(555) 123-4567</p>
                    <p><i class="fas fa-envelope me-2"></i>info@petparadise.com</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Hours</h5>
                    <p>Monday - Friday: 7am - 7pm</p>
                    <p>Saturday - Sunday: 9am - 5pm</p>
                    <p>24/7 Drop-off/Pick-up by appointment</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2023 Pet Paradise. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="/js/bootstrap.min.js"></script>

</body>

</html>