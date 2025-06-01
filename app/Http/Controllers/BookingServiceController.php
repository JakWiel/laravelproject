<?php

namespace App\Http\Controllers;
use App\Services\BookingServiceService;

class BookingServiceController extends Controller
{
    private BookingServiceService $service;
    public function __construct()
    {
        $this->service = new BookingServiceService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('booking-services.index', ['models' => $models]);
    }
    public function create()
    {
        return view("booking-services.create");
    }
}
