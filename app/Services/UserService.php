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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|required',
            'role' => 'required|string|in:admin,owner',
        ]);

        $model = new UserModel();
        $model->name = $validatedData['name'];
        $model->email = $validatedData['email'];
        $model->password = Hash::make($validatedData['password']);
        $model->role = $validatedData['role'];
        $model->save();
    }
    public function edit(Request $request, int $id): void
    {
        $model = UserModel::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|required',
            'role' => 'required|string|in:admin,owner'
        ]);

        $model->name = $validatedData['name'];
        $model->email = $validatedData['email'];
        $model->role = $validatedData['role'];

        if (!empty($validatedData['password'])) {
            $model->password = Hash::make($validatedData['password']);
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
