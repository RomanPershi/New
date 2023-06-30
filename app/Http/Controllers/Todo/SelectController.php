<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\SelectRequest;
use App\Http\Requests\Todo\StoreRequest;
use App\Models\Todo;
use Faker\Provider\Base;

class SelectController extends BaseTodoController
{
    public function __invoke(SelectRequest $request)
    {
        $todos = $this->service->applyFilters($request->validated());
        $todos = $this->service->paginateTodos($todos);

        return view('todo', compact('todos'));
    }
}
