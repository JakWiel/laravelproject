<?php

namespace App\Services;
use App\Models\BookingServiceModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookingServiceService extends BaseService
{
    public function get(): Collection
    {
        return BookingServiceModel::get();
    }
    public function getById(int $id)
    {
        return BookingServiceModel::find($id);
    }
    public function delete(int $id): void
    {
        $model = BookingServiceModel::find($id);
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