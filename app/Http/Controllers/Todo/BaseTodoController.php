<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\SelectRequest;
use App\Http\Requests\Todo\StoreRequest;
use App\Models\Todo;
use App\Services\Todo\Service;

class BaseTodoController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }
}
