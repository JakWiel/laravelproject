<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\PetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $owners = UserModel::where(column: 'role', operator: 'owner')->get();
        $rep = Http::get('https://api.thecatapi.com/v1/breeds');
        $breeds = $rep->json();
        return view("pets.create", ['owners' => $owners, 'breeds' => $breeds]);
    }
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/pets");
    }
    public function edit(int $id)
    {
        $model = $this->service->getById($id);
        $owners = UserModel::where('role', 'owner')->get();
        $rep = Http::get('https://api.thecatapi.com/v1/breeds');
        $breeds = $rep->json();
        return view("pets.edit", [
            "model" => $model,
            "owners" => $owners,
            "breeds" => $breeds
        ]);
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
