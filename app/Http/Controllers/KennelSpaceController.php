<?php

namespace App\Http\Controllers;

use App\Models\KennelSpaceModel;
use App\Services\KennelSpaceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class KennelSpaceController extends Controller
{
    private KennelSpaceService $service;
    public function __construct()
    {
        $this->service = new KennelSpaceService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('kennel-spaces.index', ['models' => $models]);
    }
    public function create()
    {
        return view("kennel-spaces.create");
    }
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/kennel-spaces");
    }
    public function edit(int $id)
    {
        $model = $this->service->getById($id);
        return view("kennel-spaces.edit", ["model" => $model]);
    }
    public function update(Request $request, int $id)
    {
        $this->service->edit($request, $id);
        return redirect("/kennel-spaces");
    }
    public function delete(int $id)
    {
        $this->service->delete($id);
        return redirect("/kennel-spaces");
    }
}
