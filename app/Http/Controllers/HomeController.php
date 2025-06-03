<?php

namespace App\Http\Controllers;
use App\Models\BookingModel;
use App\Models\KennelSpaceModel;
use App\Models\PetModel;
use App\Models\ServiceModel;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Dashboard statistics
        $stats = [
            'petCount' => PetModel::where('isActive', true)->count(),
            'currentBookingCount' => BookingModel::where('isActive', true)
                ->where('status', '!=', 'canceled')
                ->where('check_in_date', '<=', Carbon::today())
                ->where('check_out_date', '>=', Carbon::today())
                ->count(),
            'availableKennelCount' => KennelSpaceModel::where('isActive', true)
                ->where('availability_status', 'available')
                ->count(),
            'serviceCount' => ServiceModel::where('isActive', true)->count(),
        ];

        // Upcoming bookings (next 7 days)
        $upcomingBookings = BookingModel::with(['pet', 'kennelSpace'])
            ->where('isActive', true)
            ->where('status', '!=', 'canceled')
            ->where('check_in_date', '>=', Carbon::today())
            ->where('check_in_date', '<=', Carbon::today()->addDays(7))
            ->orderBy('check_in_date')
            ->limit(5)
            ->get();

        // User pets (for owners)
        $userPets = [];
        if ($user->role === 'owner') {
            $userPets = PetModel::where('user_id', $user->id)
                ->where('isActive', true)
                ->orderBy('name')
                ->limit(4)
                ->get();
        }

        // Kennel spaces (for staff/admin)
        $kennelSpaces = [];
        if (in_array($user->role, ['staff', 'admin'])) {
            $kennelSpaces = KennelSpaceModel::where('isActive', true)
                ->orderBy('name')
                ->get();
        }

        return view('home', array_merge($stats, [
            'upcomingBookings' => $upcomingBookings,
            'userPets' => $userPets,
            'kennelSpaces' => $kennelSpaces,
        ]));
    }
}
