<?php

namespace App\Services;
use App\Models\PetModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PetService extends BaseService
{
    public function get(): Collection
    {
        return PetModel::all();
    }
    public function getById(int $id)
    {
        return PetModel::find($id);
    }
    public function create(Request $request): void
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'medical_notes' => 'nullable|string',
            'profile_pic' => 'nullable|string',
        ]);

        $model = new PetModel();
        $model->user_id = $validated['user_id'];
        $model->name = $validated['name'];
        $model->breed = $validated['breed'];
        $model->age = $validated['age'];
        $model->medical_notes = $validated['medical_notes'] ?? '';
        $model->profile_pic = $validated['profile_pic'] ?? '';
        $model->isActive = true;
        $model->save();
    }
    public function delete(int $id): void
    {
        $model = PetModel::find($id);
        $model->isActive = false;
        $model->dateDeleted = now();
        $model->save();
    }
    public function edit(Request $request, int $id): void
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'medical_notes' => 'nullable|string',
            'profile_pic' => 'nullable|string',
        ]);

        $model = PetModel::findOrFail($id); // Load the existing pet or throw 404

        $model->user_id = $validated['user_id'];
        $model->name = $validated['name'];
        $model->breed = $validated['breed'];
        $model->age = $validated['age'];
        $model->medical_notes = $validated['medical_notes'] ?? '';
        $model->profile_pic = $validated['profile_pic'] ?? '';

        $model->save();
    }


}