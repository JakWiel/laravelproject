<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use App\Services\ServiceService;
use App\Models\KennelSpaceModel;
use App\Models\ServiceModel;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://dog.ceo/api/breeds/image/random');
        $dogImageUrl = $response->json()['message'];
        $userEmail = session('user.email');
        $userId = session('user.id');
        $rep = Http::get('https://api.thecatapi.com/v1/breeds');
        $breeds = $rep->json();
        $allServices = new ServiceService();
        $services = $allServices->get();
        $userEmail = session('user.email');
        $pets = new PetService();
        $userPets = $pets->get()->where('user_id', $userId);
        return view('home.home', compact('dogImageUrl', 'userEmail', 'breeds', 'services', 'userPets', 'userId'));
    }

    public function openBookingModal()
    {
        $kennelSpaces = KennelSpaceModel::where('availability_status', 'available')->get();
        $services = ServiceModel::where('isActive', true)->get();
        return view('home.booking', compact('kennelSpaces', 'services'))->render();
    }
}
