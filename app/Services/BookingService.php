<?php

namespace App\Services;

use App\Models\BookingModel;
use App\Models\ServiceModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\PetModel;
use App\Models\KennelSpaceModel;

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
        $validated = $request->validate([
            'pet_id' => 'required|exists:Pets,id',
            'kennel_space_id' => 'required|exists:Kennel_Spaces,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'services' => 'array',
            'services.*' => 'exists:Services,id',
            'service_quantities' => 'array',
            'service_quantities.*' => 'integer|min:1|max:10'
        ]);

        // Get the pet and kennel space using relationships
        $pet = PetModel::findOrFail($validated['pet_id']);
        $kennelSpace = KennelSpaceModel::findOrFail($validated['kennel_space_id']);

        // Create the booking using relationships
        $booking = $pet->bookings()->create([
            'kennel_space_id' => $kennelSpace->id,
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'status' => 'booked',
            'isActive' => true
        ]);

        // Add services if any were selected
        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $serviceId) {
                $service = ServiceModel::findOrFail($serviceId);
                $quantity = $validated['service_quantities'][$serviceId] ?? 1;

                $booking->bookingServices()->create([
                    'service_id' => $service->id,
                    'quantity' => $quantity,
                    'price' => $service->price
                ]);
            }
        }
    }
    public function edit(Request $request, int $id): void
    {
        return;
    }
}
