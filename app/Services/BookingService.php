<?php

namespace App\Services;

use App\Models\BookingModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookingService extends BaseService
{
    public function get(): Collection
    {
        return BookingModel::all();
    }
    public function getById(int $id)
    {
        return BookingModel::find($id);
    }
    public function delete(int $id): void
    {
        $model = BookingModel::find($id);
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
