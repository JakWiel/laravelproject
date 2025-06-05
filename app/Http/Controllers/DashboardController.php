<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\KennelSpaceModel;
use App\Models\PetModel;
use App\Models\UserModel;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = $this->getUsersNumber();
        $petsCount = $this->getPetsNumber();
        $bookingsCount = $this->getBookingsNumber();
        $kennelsCount = $this->getKennelsNumber();
        $userEmail = session('user.email');

        return view('dashboard.index', compact('usersCount', 'petsCount', 'bookingsCount', 'kennelsCount', 'userEmail'));
    }

    public function getUsersNumber()
    {
        return UserModel::count();
    }

    public function getPetsNumber()
    {
        return PetModel::count();
    }

    public function getBookingsNumber()
    {
        return BookingModel::count();
    }

    public function getKennelsNumber()
    {
        return KennelSpaceModel::where('availability_status', 'available')->count();
    }
}
