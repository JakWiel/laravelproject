<?php

namespace App\Http\Controllers;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private ServiceService $service;
    public function __construct()
    {
        $this->service = new ServiceService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('services.index', ['models' => $models]);
    }
    public function create()
    {
        return view("services.create");
    }
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/services");
    }
    public function edit(int $id)
    {
        $model = $this->service->getById($id);
        return view("services.edit", ["model" => $model]);
    }
    public function update(Request $request, int $id)
    {
        $this->service->edit($request, $id);
        return redirect("/services");
    }
    public function delete(int $id)
    {
        $this->service->delete($id);
        return redirect("/services");
    }
}
