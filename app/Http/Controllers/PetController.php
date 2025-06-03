<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    private PetService $service;
    public function __construct()
    {
        $this->service = new PetService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('pets.index', ['models' => $models]);
    }
    public function create()
    {
        return view("pets.create");
    }
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/pets");
    }
    public function edit(int $id)
    {
        $model = $this->service->getById($id);
        return view("pets.edit", ["model" => $model]);
    }
    public function update(Request $request, int $id)
    {
        $this->service->edit($request, $id);
        return redirect("/pets");
    }
    public function delete(int $id)
    {
        $this->service->delete($id);
        return redirect("/pets");
    }
}
