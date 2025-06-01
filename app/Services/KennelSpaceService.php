<?php

namespace App\Services;

use App\Models\KennelSpaceModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class KennelSpaceService extends BaseService
{

    public function get(): Collection
    {
        return KennelSpaceModel::where("isActive", "=", true)->get();
    }
    public function getById(int $id)
    {
        return KennelSpaceModel::find($id);
    }
    public function delete(int $id): void
    {
        $model = KennelSpaceModel::find($id);
        $model->isActive = false;
        $model->dateDeleted = now();
        $model->save();
    }
    public function create(Request $request): void
    {
        return;
    }
    public function edit(Request $request, int $id): void
    {
        return;
    }
}