@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{route('todos.create')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="text" placeholder="Введите новую задачу">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{route('todos.select')}}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Поиск по тексту" value="{{ request('search') }}">
                        <input type="date" class="form-control" name="start_date" placeholder="Начальная дата" value="{{ request('start_date') }}">
                        <input type="date" class="form-control" name="end_date" placeholder="Конечная дата" value="{{ request('end_date') }}">
                        <button class="btn btn-primary" type="submit">Фильтровать</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center my-4">
            {!! $todos->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="list-group">
                    @foreach($todos as $todo)
                        <li class="list-group-item">
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Удалить</button>
                            </form>
                            {{ $todo->created_at->format('d.m.Y') }}
                            {{ $todo->text }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
