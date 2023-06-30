<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\SelectRequest;
use App\Http\Requests\Todo\StoreRequest;
use App\Models\Todo;

class CreateController extends BaseTodoController
{
    public function __invoke(StoreRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->back();
    }
}
