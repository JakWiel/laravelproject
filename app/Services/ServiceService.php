<?php

namespace App\Services;
use App\Models\ServiceModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ServiceService extends BaseService
{
    public function get(): Collection
    {
        return ServiceModel::all();
    }
    public function getById(int $id)
    {
        return ServiceModel::find($id);
    }
    public function delete(int $id): void
    {
        $model = ServiceModel::find($id);
        $model->isActive = false;
        $model->dateDeleted = now();
        $model->save();
    }
    public function create(Request $request): void
    {
        $model = new ServiceModel();

        $model->save();
    }
    public function edit(Request $request, int $id): void
    {
        $model = ServiceModel::find($id);

        $model->save();
    }

}