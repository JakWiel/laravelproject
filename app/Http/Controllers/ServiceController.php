<?php

namespace App\Http\Controllers;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    private ServiceService $service;
    public function __construct()
    {
        $this->service = new ServiceService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('services.index', ['models' => $models]);
    }
    public function create()
    {
        // $attachments = (new AttachmentService())->get();
        return view("services.create");
    }
}
