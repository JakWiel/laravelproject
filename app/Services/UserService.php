<?php

namespace App\Services;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Database\Eloquent\Collection;

class UserService extends BaseService
{
    public function get(): Collection
    {
        return UserModel::all();
    }
    public function getById(int $id)
    {
        return UserModel::find($id);
    }
    public function create(Request $request): void
    {
        $model = new UserModel();
        $model->name = $request->input("name");
        $model->email = $request->input("email");
        $model->password = Hash::make($request->input('password'));
        $model->role = $request->input("role");
        $model->isActive = true;
        $model->save();
    }
    public function edit(Request $request, int $id): void
    {
        $model = UserModel::find($id);
        $model->name = $request->input("name");
        // $model->password = $request->input("password");
        $model->email = $request->input("email");
        $model->role = $request->input("role");
        if ($request->has('password') && !empty($request->input('password'))) {
            $model->password = Hash::make($request->input('password'));
        }
        $model->save();
    }
    public function delete(int $id): void
    {
        $model = UserModel::find($id);
        $model->isActive = false;
        $model->dateDeleted = now();
        $model->save();
    }
}
