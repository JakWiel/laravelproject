<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $service;
    public function __construct()
    {
        $this->service = new UserService();
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = UserModel::where('name', 'like', "%$search%")->get();
        return view('users.index', ['models' => $results]);
    }
    public function index()
    {
        $models = $this->service->get();
        return view('users.index', ['models' => $models]);
    }
    public function create()
    {
        return view("users.create");
    }
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/users");
    }
    public function edit(int $id)
    {
        $model = $this->service->getById($id);
        return view("users.edit", ["model" => $model]);
    }
    public function update(Request $request, int $id)
    {
        $this->service->edit($request, $id);
        return redirect("/users");
    }
    public function delete(int $id)
    {
        $this->service->delete($id);
        return redirect("/users");
    }
}
