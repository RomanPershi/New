<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\SelectRequest;
use App\Http\Requests\Todo\StoreRequest;

class DeleteController extends BaseTodoController
{
    public function __invoke($id)
    {
        $this->service->delete($id);

        return redirect()->back();
    }
}
