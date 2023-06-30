<?php

namespace App\Services\Todo;

use App\Models\Todo;

class Service
{
    public function applyFilters(array $validatedData)
    {
        $todos = auth()->user()->todos();
        if (isset($validatedData['search'])) {
            $todos->where('text', 'LIKE', '%' . $validatedData['search'] . '%');
        }

        if (isset($validatedData['start_date'])) {
            $todos->whereDate('created_at', '>=', $validatedData['start_date']);
        }

        if (isset($validatedData['end_date'])) {
            $todos->whereDate('created_at', '<=', $validatedData['end_date']);
        }

        return $todos;
    }

    public function paginateTodos($todos)
    {
        $todos = $todos->paginate(10);

        $todos->withPath(url()->current());

        return $todos;
    }

    public function create($data)
    {
        return auth()->user()->todos()->create($data);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $this->authorizeUser($todo);
        $todo->delete();
    }

    public function authorizeUser($todo)
    {
        if ($todo->user_id !== auth()->id()) {
            abort(403, 'Вы не можете удалить эту задачу.');
        }
    }
}
