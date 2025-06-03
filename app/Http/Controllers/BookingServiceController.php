<?php

namespace App\Http\Controllers;
use App\Services\BookingServiceService;
use Illuminate\Http\Request;

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
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/booking-services");
    }
    public function edit(int $id)
    {
        $model = $this->service->getById($id);
        return view("booking-services.edit", ["model" => $model]);
    }
    public function update(Request $request, int $id)
    {
        $this->service->edit($request, $id);
        return redirect("/booking-services");
    }
    public function delete(int $id)
    {
        $this->service->delete($id);
        return redirect("/booking-services");
    }
}
