<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseService
{
    public abstract function get(): Collection;
    public abstract function getById(int $id);
    public abstract function create(Request $request): void;
    public abstract function edit(Request $request, int $id): void;
    public abstract function delete(int $id): void;

}