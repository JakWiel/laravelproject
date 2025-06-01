<?php

namespace App\Http\Controllers;

use App\Models\KennelSpaceModel;
use App\Services\KennelSpaceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class KennelSpaceController extends Controller
{
    private KennelSpaceService $service;
    public function __construct()
    {
        $this->service = new KennelSpaceService();
    }
    public function index()
    {
        $models = $this->service->get();
        return view('kennel-spaces.index', ['models' => $models]);
    }
    public function create()
    {
        // $attachments = (new AttachmentService())->get();
        return view("kennel-spaces.create");
    }
}
