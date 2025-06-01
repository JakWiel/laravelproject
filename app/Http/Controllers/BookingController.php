<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Services\BookingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingService $service;
    public function __construct()
    {
        $this->service = new BookingService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('bookings.index', ['models' => $models]);
    }
    public function create()
    {
        return view("bookings.create");
    }
}
