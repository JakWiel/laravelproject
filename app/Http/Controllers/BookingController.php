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
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/bookings");
    }
    public function edit(int $id)
    {
        $model = $this->service->getById($id);
        return view("bookings.edit", ["model" => $model]);
    }
    public function update(Request $request, int $id)
    {
        $this->service->edit($request, $id);
        return redirect("/bookings");
    }
    public function delete(int $id)
    {
        $this->service->delete($id);
        return redirect("/bookings");
    }
}
