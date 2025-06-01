<?php

namespace App\Services;
use App\Models\PetModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PetService extends BaseService
{
    public function get(): Collection
    {
        return PetModel::where("isActive", "=", true)->get();
    }
    public function getById(int $id)
    {
        return PetModel::find($id);
    }
    public function create(Request $request): void
    {
        $model = new PetModel();
        $model->user_id = $request->input("user_id");
        $model->name = $request->input("name");
        $model->breed = $request->input("breed");
        $model->age = $request->input("age");
        $model->medical_notes = $request->input("medical_notes");
        $model->profile_pic = $request->input("profile_pic");
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
        return;
    }

}