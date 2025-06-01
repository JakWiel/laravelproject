<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use Request;

class PetController extends Controller
{
    private PetService $service;
    public function __construct()
    {
        $this->service = new PetService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('pets.index', ['models' => $models]);
    }
    public function create()
    {
        // $attachments = (new AttachmentService())->get();
        return view("pets.create");
    }
    public function addToDB(Request $request)
    {
        $this->service->create($request);
        return redirect("/pets");
    }
}
